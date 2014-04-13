<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Kontak Usaha',
	'theme'=>'ku',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.yiimail.*',
		'application.modules.company.models.*',
		'application.modules.shop.models.*',
		'application.modules.shop.components.*',
		'application.modules.mailbox.MailboxModule',
		'application.modules.mailbox.models.*',
		'application.modules.mailbox.components.*',
		'application.modules.company.components.*',
		'application.modules.members.components.*',
		'application.modules.image.components.*',
        'application.modules.image.models.Allimage',
	),

	'defaultController'=>'site',

	// application components
	'modules'=>array('company','shop','members',
			'image'=>array(
				 'image'=>array(
						'createOnDemand'=>false, // requires apache mod_rewrite enabled
						'install'=>false, // allows you to run the installer
				),
				),
			'gii'=>array(
				'class'=>'system.gii.GiiModule',
				'password'=>'test',
				
				'generatorPaths'=>array(
					'application.gii',   // a path alias
				)
			),
			'mailbox'=>
				array(  
				'userClass' => 'User',
				'userIdColumn' => 'id',
				'usernameColumn' =>  'username',
				  ),
			 'comments'=>array(
				//you may override default config for all connecting models
				'defaultModelConfig' => array(
					//only registered users can post comments
					'registeredOnly' => false,
					'useCaptcha' => false,
					//allow comment tree
					'allowSubcommenting' => true,
					//display comments after moderation
					'premoderate' => false,
					//action for postig comment
					'postCommentAction' => 'comments/comment/postComment',
					//super user condition(display comment list in admin view and automoderate comments)
					'isSuperuser'=>'Yii::app()->user->checkAccess("moderate")',
					//order direction for comments
					'orderComments'=>'DESC',
				),
				//the models for commenting
				'commentableModels'=>array(
					//model with individual settings
					'Products'=>array(
						'registeredOnly'=>true,
						'useCaptcha'=>false,
						'allowSubcommenting'=>false,
						//config for create link to view model page(page with comments)
						'pageUrl'=>array(
							'route'=>'shop/products/view',
							'data'=>array('id'=>'product_id'),
						),
					),
					//model with default settings
					'ImpressionSet',
				),
				//config for user models, which is used in application
				'userConfig'=>array(
					'class'=>'User',
					'nameProperty'=>'username',
					//'emailProperty'=>'email',
				),
			),
				  )
	,
	'behaviors'=>array(
		'runEnd'=>array(
			'class'=>'application.components.WebApplicationEndBehavior',
		),
	),
	'components'=>array(
		 'image'=>array(
                'class'=>'ImgManager',
                'versions'=>array(
                        'small'=>array('width'=>120,'height'=>120),
                        'avatar'=>array('width'=>200,'height'=>250),
                        'logo'=>array('width'=>200,'height'=>250),
                        'medium'=>array('width'=>320,'height'=>320),
                        'large'=>array('width'=>640,'height'=>640),
                ),
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'mail' => array(
 			'class' => 'application.components.yiimail.YiiMail',
			'transportType' => 'php',
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false
		),
		'thumb'=>array(
            'class'=>'application.extensions.phpthumb.EasyPhpThumb',
        ),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=kontakusaha',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'urlManager'=>array(
        	'urlFormat'=>'path',
			 'showScriptName'=>false,
        	'rules'=>array(
        		
				/*'advisor/<action:\w+>'=>'company/default/<action>',
				'usaha/<action:\w+>'=>'company/default/<action>',
				'advisor/<action:\w+>/'=>'company/default/<action>/',*/
				'company/setting'=>'company/factory/updateMyProfile',
				'company/produk'=>'shop/products/company',
        'company/<action:\w+>'=>'company/factory/<action>',
				'company/<action:\w+>/<id:\w+>'=>'company/factory/<action>/<id:\w+>',
				
				//'advisor/<controller:\w+>/<action:\w+>'=>'company/<controller>/<action>',
				//'company/<action:\w+>/'=>'company/default/<action>/',
        'setting'=>'members/setting',
        'photo/view/<id:\w+>/<version:\w+>/<namefile>'=>'photo/view/id/<id>/version/<version>',
				'@<id:\w+>'=>'members/profile/index/user/<id>', // user
				'@<id:\w+>/produk'=>'shop/products/store/store_id/<id>', // user
				'produk'=>'shop/products', // user
				'mobile/@<id:\w+>'=>'members/mobile/index/user/<id>', // user
				'members/reviews/<id:\w+>'=>'members/default/reviews/user/<id>', // user
				'members/factories/<id:\w+>'=>'members/default/factories/user/<id>', // user
				'members/<id:\w+>'=>'members/default/index/user/<id>', // user
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        	),
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);