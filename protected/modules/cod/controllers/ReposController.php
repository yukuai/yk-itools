<?php

class ReposController extends Controller
{
	public function actionIndex()
	{
		$this->redirect(array('/cod/repos/all'));
	}

	/**
	 * Lists all models.
	 */
	public function actionAll()
	{
		$dataProvider=new CActiveDataProvider('Application');
		$this->render('all',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionDeploy($id = 1)
	{
		$app = Application::model()->findByPk($id);


		$app_ru = 'http://118.145.11.238:28763/svn'.$app->repo_path;
		$head = cr_svn_get_head($app_ru);
		// $app->rc_head;
		$versions = array();
		for ($i=0; $i<=10; $i++) {
			$ver = $head - $i;
			if ($ver < 0) break;
			$versions[$ver] = $ver;
		}

		$model = new DeployForm;
		if(isset($_POST['DeployForm']))
		{
			// collects user input data
			$model->attributes=$_POST['DeployForm'];
			// validates user input and redirect to previous page if validated
			if($model->validate()) {
				$cli = './cod';
				if ($model->forceRebuild == '1') {
					$cli .= ' -f';
				}
				$cli .= " {$model->project} {$model->version} {$model->server}";

				$bin = Yii::getPathOfAlias('webroot').'/bin/';
				chdir($bin);
				exec($cli, $output, $ret);

				return $this->render('/deploy/result', array('app'=>$app, 'cli'=>$cli, 'output'=>$output, 'ret'=>$ret));
			}
			// $this->redirect(Yii::app()->user->returnUrl);
		}
		$model->project = $app->name;
		$this->render('deploy', array('model'=>$model, 'versions'=>$versions, 'app'=>$app));
	}

	public function actionStatus()
	{
		$this->render('status');
	}


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				  'actions'=>array('index', 'all', 'deploy'),
				  'users'=>array('@'),
			),
			array('deny',  // deny all users
				  'users'=>array('*'),
			),
		);
	}

}