<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'项目部署',
    'language' => 'zh_cn',
	// preloading 'log' component
	'preload'=>array(
		// 'bootstrap',
		'log',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
	),

	'modules'=>array(
		'cod'=>array(),

		'user'=>array(
			'tableUsers' => 'users',
			'tableProfiles' => 'profiles',
			'tableProfileFields' => 'profiles_fields',
			# encrypting method (php hash function)
			'hash' => 'md5',

			# send activation email
			'sendActivationMail' => false,

			# allow access for non-activated users
			'loginNotActiv' => false,

			# activate user on registration (only sendActivationMail = false)
			'activeAfterRegister' => true,

			# automatically login from registration
			'autoLogin' => true,

			# registration path
			'registrationUrl' => array('/user/registration'),

			# recovery password path
			'recoveryUrl' => array('/user/recovery'),

			# login form path
			'loginUrl' => array('/user/login'),

			# page after login
			'returnUrl' => array('/user/profile'),

			# page after logout
			'returnLogoutUrl' => array('/user/login'),
		),

        //Modules Rights
		'rights'=>array(

			'superuserName'=>'Admin', // Name of the role with super user privileges.
			'authenticatedName'=>'Authenticated',  // Name of the authenticated user role.
			'userIdColumn'=>'id', // Name of the user id column in the database.
			'userNameColumn'=>'username',  // Name of the user name column in the database.
			'enableBizRule'=>true,  // Whether to enable authorization item business rules.
			'enableBizRuleData'=>true,   // Whether to enable data for business rules.
			'displayDescription'=>true,  // Whether to use item description instead of name.
			'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
			'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.

			'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
			'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights.
			'appLayout'=>'application.views.layouts.main', // Application layout.
			'cssFile'=>'rights.css', // Style sheet file to use for Rights.
			'install'=>false,  // Whether to enable installer.
			'debug'=>false,
		),

		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'dev',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
	),

	// application components
	'components'=>array(
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),

        'user'=>array(
			'class'=>'RWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/user/login'),
        ),

        'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('Authenticated', 'Guest'),
        ),

		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=codeploy',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'info, error, warning',
				),
				// uncomment the following to show log messages on web pages

				array(
					'class'=>'CWebLogRoute',
					'levels'=>'info',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);