<?php
//if ( $_SERVER['HTTP_HOST'] == 'localhost' ){
	class DATABASE_CONFIG {
			public $default = array(
				'datasource' => 'Database/Mysql',
				'persistent' => false,
				'host' => 'localhost',
				'login' => 'root',
				'password' => '',
				'database' => 'cakephp_pittsburgh_black_business_directory',
				'prefix' => 'bs_'
			);

	}
// }else{
// 	class DATABASE_CONFIG {
// 			public $default = array(
// 			'datasource' => 'Database/Mysql',
// 			'persistent' => false,
// 			'host' => 'localhost',
// 			'login' => 'comshopy_webg',
// 			'password' => 'S3curity#67',
// 			'database' => 'comshopy_competeshop',
// 			'prefix' => 'bs'
// 		);
// 	}
// }
