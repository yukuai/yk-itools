<?php

function cr_svn_auth() {
    svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME,             'luotao');
    svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD,             'Oq1Faeu7JIQpFqKT8e');
// svn_auth_set_parameter(PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS, true); // <--- Important for certificate issues!
    svn_auth_set_parameter(SVN_AUTH_PARAM_NON_INTERACTIVE,              true);
    svn_auth_set_parameter(SVN_AUTH_PARAM_NO_AUTH_CACHE,                true);
}

function cr_svn_get_head() {
    cr_svn_auth();

    $logs = svn_log('http://118.145.11.238:28763/svn/ykapp_yxt_moblie', SVN_REVISION_HEAD);

    print_r($logs[0]['rev']);
}

function cr_svn_get_ykapp_name() {
    cr_svn_auth();

    $logs = svn_ls('http://118.145.11.238:28763/svn/ykapp_analysis/trunk/src/app');

    print_r($logs);
}

//cr_svn_get_head();
cr_svn_get_ykapp_name();
die();
/* foreach( $logs as $v ) */
/* { */
/*     print_r($v['rev']); */
/*     print_r($v['author']); */
/*     print_r($v['msg']); */
/*     print_r($v['date']); */
/*     echo strtotime($v['date']); */
/* } */


// print_r( svn_ls('http://118.145.11.238:28763/svn/ykapp_yxt_moblie') );

function afterSave()
{
    parent::afterSave();

    $basepath = Yii::app()->getBasePath();
    // echo Yii::getPathOfAlias('webroot');
    $filepath = realpath($basepath.'/../bin/');
    $ini = $filepath."/project/{$this->name}.ini";
    $config = <<<EOD
    PROJECT_TYPE={$this->type}

    PROJECT_RC={$this->rc_type}
    PROJECT_RC_URL={$this->rc_url}

EOD;
    file_put_contents($ini, $config);
}
