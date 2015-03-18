<?php
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

Route::get('/user/{username}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));

/*
| Authenticated group change
*/

Route::group(array('before' => 'auth'), function() {

	/*
	| CSRF protection group
	*/
	Route::group(array('before' => 'csrf'), function(){

		/*
		| Change Password (POST) 
		*/

		Route::post('/account/change-password', array(
			'as' 	=> 'account-change-password-post',
			'uses' 	=> 'AccountController@postChangePassword'
		));

		/*
		| Edit Module
		*/

		Route::post('/module-change', array(
			'as' 	=> 'module-change-post',
			'uses' 	=> 'ModuleController@postModuleChange'
		));

		/*
		|	Add Module
		*/
		Route::post('/module-new', array(
			'as' 	=> 'module-new-post',
			'uses' 	=> 'ModuleController@postModuleNew'
		));

	});
	
	/*
	| Register to elective.
	*/
	
	Route::post('/account/register-elective', array(
		'as' => 'register-elective',
		'uses' => 'ElectiveController@postRegisterElective'
	));

	/*
	| Unregister to elective.
	*/
	
	Route::post('/account/unregister-elective', array(
		'as' => 'unregister-elective',
		'uses' => 'ElectiveController@postUnregisterElective'
	));

	/*
	| Load Class.
	*/
	
	Route::post('/account/load-class', array(
		'as' => 'load-class',
		'uses' => 'ElectiveController@loadClass'
	));

	/*
	| Update Class.
	*/
	
	Route::post('/account/update-class', array(
		'as' => 'update-class',
		'uses' => 'ElectiveController@updateClass'
	));

	/*
	| Remove Student from Class.
	*/
	
	Route::post('/account/remove-student', array(
		'as' => 'remove-student',
		'uses' => 'ElectiveController@removeStudent'
	));

	/*
	| Create Lecturer.
	*/
	
	Route::post('/account/create-lecturer', array(
		'as' => 'create-lecturer',
		'uses' => 'AccountController@createLecturer'
	));

	/*
	| Remove Lecturer.
	*/
	
	Route::post('/account/remove-lecturer', array(
		'as' => 'remove-lecturer',
		'uses' => 'AccountController@removeLecturer'
	));

	/*
	| Get Modules
	*/
	Route::any('/modules', array(
		'as'	=> 'modules',
		'uses'	=> 'ModuleController@getModules'
	));

	/*
	| Get Electives
	*/
	Route::any('/electives', array(
		'as'	=> 'electives',
		'uses'	=> 'ElectiveController@getElectives'
	));

	/*
	| Get Images
	*/
	Route::get('img/{modName}', array(
		'as'	=>	'getImg',
		'uses'	=>	'ModuleController@getImage'
	));

	/*
	| Get Class List
	*/
	Route::get('list/{elecName}', array(
		'as'	=>	'getList',
		'uses'	=>	'ElectiveController@printClassList'
	));
	
	/*
	| Change Password (GET)
	*/

	Route::get('/account/change-password', array(
		'as' 	=> 'account-change-password',
		'uses'	=> 'AccountController@getChangePassword'
	));

	/*
	| Sign out (GET)
	*/

	Route::get('/account/sign-out', array(
		'as' 	=> 'account-sign-out',
		'uses' 	=> 'AccountController@getSignOut'
	));



});

/*
| Unauthenticated group
*/

Route::group(array('before' => 'guest'), function() {

	/*
	| CSRF protection group
	*/
	Route::group(array('before' => 'csrf'), function(){
		/*
		| Create account (POST)
		*/

		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		/*
		| Sign in (POST)
		*/

		Route::post('/account/signin', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		/*
		| Forgot Password (POST)
		*/

		Route::post('/account/forgot', array(
				'as' => 'account-forgot-password-post',
				'uses' => 'AccountController@postForgotPassword'
		));
	});

	/*
	| Forgot Password (GET)
	*/

	Route::get('/account/forgot', array(
			'as' => 'account-forgot-password',
			'uses' => 'AccountController@getForgotPassword'
	));

	Route::get('/account/recover/{code}', array(
			'as' => 'account-recover',
			'uses' => 'AccountController@getRecover'
	));


	/*
	| Sign in (GET)
	*/

	Route::get('/account/signin', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));

	/*
	| Create account (GET)
	*/

	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	/*
	| Activation (GET)
	*/
	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));
});
