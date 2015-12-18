<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	'storage' => 'Session',

	'consumers' => array(

        'Facebook' => array(
            'client_id'     => '677299722359740',
            'client_secret' => 'd2e757a1a1c41bc2980472dbf90316c2',
            'scope'         => array('email', 'user_birthday', 'user_location', 'user_website'),
        ),

        'Twitter' => array(
	        'client_id'     => 'eIb1WHYyxlhId3CRQSB1ubSuE',
	        'client_secret' => 'RpyjXvnTymuSirVWeZHa3G3KFD7mSNsPqrSln4Rwv8BmKDixC2',
        ),

	)

);