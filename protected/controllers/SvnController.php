<?php

class SvnController extends Controller
{
	public function actionLog()
	{
		svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME,             'luotao');
		svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD,             'Oq1Faeu7JIQpFqKT8e');
// svn_auth_set_parameter(PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS, true); // <--- Important for certificate issues!
		svn_auth_set_parameter(SVN_AUTH_PARAM_NON_INTERACTIVE,              true);
		svn_auth_set_parameter(SVN_AUTH_PARAM_NO_AUTH_CACHE,                true);

		$logs = svn_log('http://118.145.11.238:28763/svn/ykapp_yxt_moblie', SVN_REVISION_HEAD, 0);

		RcLog::model()->deleteAll();
		foreach( $logs as $v )
		{
			$log = new RcLog;
			$log->project = 1;
			$log->rev = $v['rev'];
			$log->author = $v['author'];
			$log->msg = $v['msg'];
			$log->timestamp = strtotime($v['date']);
			$log->save();
		}


// print_r( svn_ls('http://118.145.11.238:28763/svn/ykapp_yxt_moblie') );
		$this->render('log');
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