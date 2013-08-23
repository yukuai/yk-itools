<?php

class CodModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'cod.models.*',
			'cod.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}

function cr_svn_auth()
{
    svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME,             'luotao');
    svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD,             'Oq1Faeu7JIQpFqKT8e');
// svn_auth_set_parameter(PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS, true); // <--- Important for certificate issues!
    svn_auth_set_parameter(SVN_AUTH_PARAM_NON_INTERACTIVE,              true);
    svn_auth_set_parameter(SVN_AUTH_PARAM_NO_AUTH_CACHE,                true);
}

function cr_svn_get_head($url)
{
    cr_svn_auth();

    $logs = svn_log($url, SVN_REVISION_HEAD);

    return $logs[0]['rev'];
}

function cr_deploy($repos, $ver, $server)
{
	$cli = "./cod {$model->project} {$model->version} {$model->server}";
	$bin = Yii::getPathOfAlias('webroot').'/bin/';
	chdir($bin);
	exec($cli, $output, $ret);
	echo $cli;
	echo '<pre>';
	echo implode('<br />',$output);
	echo '</pre>';

	echo $ret;
}