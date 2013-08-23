<?php

class ActionController extends Controller
{
	public function actionDeploy($id)
	{
		$cr = CodeRepository::model()->findByPk($id);
		$head = $cr->rc_head;
		$versions = array();
		for ($i=0; $i<=10; $i++) {
			$versions[] = $head - $i;
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
				print_r($output);
				print_r($ret);
				return;
				// return $this->render('log', array('model'=>$model));
			}
			// $this->redirect(Yii::app()->user->returnUrl);
		}
		// displays the deploy form
		$this->render('deploy', array('model'=>$model, 'versions'=>$versions));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}