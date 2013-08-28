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
		$dataProvider=new CActiveDataProvider('CodeRepository');
		$this->render('all',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionDeploy($id = 1)
	{
		$cr = CodeRepository::model()->findByPk($id);



		$head = cr_svn_get_head($cr->rc_url);
		// $cr->rc_head;
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
				$cli = "./cod {$model->project} {$model->version} {$model->server}";
				$bin = Yii::getPathOfAlias('webroot').'/bin/';
				chdir($bin);
				exec($cli, $output, $ret);
				echo $ret;
				return $this->render('/deploy/result', array('cli'=>$cli, 'output'=>$output, 'ret'=>$ret));
			}
			// $this->redirect(Yii::app()->user->returnUrl);
		}
		$model->project = $cr->name;
		$this->render('deploy', array('model'=>$model, 'versions'=>$versions));
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