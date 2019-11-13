<?php

/*
|-------------------------
| Backend
|-------------------------
*/
Route::group(['namespace' => 'Back', 'middleware' => 'auth:admin'], function(){	
	/*
	|-------------------------
	| Dashboard
	|-------------------------
	*/
	Route::group(['middleware' => ['permission:manage dashboard']], function(){	
		Route::get('/admin/dashboard', [
			'uses' => 'AdminController@dashboard',
			'as' => 'admin.dashboard'
		]);
	});		
	/*
	|-------------------------
	| Services Routes
	|-------------------------
	*/
	Route::group(['namespace' => 'Services', 'middleware' => ['permission:manage services']], function(){
		/*
		|-------------------------
		| Services
		|-------------------------
		*/
		Route::get('/admin/s/services', [
			'uses' => 'ServicesController@index',
			'as' => 'admin.services.index'
		]);

		Route::get('/api/admin/s/services', [
			'uses' => 'ServicesController@indexAPI',
			'as' => 'admin.services.index.api'
		]);

		Route::get('/admin/s/services/new', [
			'uses' => 'ServicesController@create',
			'as' => 'admin.services.new'
		]);
		Route::post('/admin/s/services/new', [
			'uses' => 'ServicesController@store',
			'as' => 'admin.services.store'
		]);

		Route::post('/admin/s/services/remove', [
			'uses' => 'ServicesController@destroy',
			'as' => 'admin.services.remove'
		]);

		Route::get('/admin/s/services/{service}', [
			'uses' => 'ServicesController@show',
			'as' => 'admin.services.show'
		]);

		Route::post('/admin/s/services/{service}', [
			'uses' => 'ServicesController@update',
			'as' => 'admin.services.update'
		]);

		Route::post('/admin/s/services/{service}/replicate', [
			'uses' => 'ServicesController@replicate',
			'as' => 'admin.services.replicate'
		]);
		
		/*
		|-------------------------
		| Workers
		|-------------------------
		*/
		Route::group(['middleware' => ['permission:manage workers']], function(){
			Route::get('/admin/s/workers', [
				'uses' => 'WorkersController@index',
				'as' => 'admin.workers.index'
			]);

			Route::get('/api/admin/s/workers', [
				'uses' => 'WorkersController@indexAPI',
				'as' => 'admin.workers.index.api'
			]);

			Route::get('/admin/s/workers/new', [
				'uses' => 'WorkersController@create',
				'as' => 'admin.workers.new'
			]);
			Route::post('/admin/s/workers/new', [
				'uses' => 'WorkersController@store',
				'as' => 'admin.workers.store'
			]);

			Route::post('/admin/s/workers/remove', [
				'uses' => 'WorkersController@destroy',
				'as' => 'admin.workers.remove'
			]);

			Route::get('/admin/s/workers/{worker}', [
				'uses' => 'WorkersController@show',
				'as' => 'admin.workers.show'
			]);

			Route::post('/admin/s/workers/{worker}', [
				'uses' => 'WorkersController@update',
				'as' => 'admin.workers.update'
			]);
		});

		/*
		|-------------------------
		| Categories
		|-------------------------
		*/
		Route::get('/admin/s/categories', [
			'uses' => 'CategoriesController@index',
			'as' => 'admin.categories.index'
		]);

		Route::get('/api/admin/s/categories', [
			'uses' => 'CategoriesController@indexAPI',
			'as' => 'admin.categories.index.api'
		]);

		Route::get('/admin/s/categories/hierarchy', [
			'uses' => 'CategoriesController@hierarchy',
			'as' => 'admin.categories.hierarchy'
		]);

		Route::post('/admin/s/categories/hierarchy', [
			'uses' => 'CategoriesController@sort',
			'as' => 'admin.categories.hierarchy.update'
		]);

		Route::get('/admin/s/categories/new', [
			'uses' => 'CategoriesController@create',
			'as' => 'admin.categories.new'
		]);
		Route::post('/admin/s/categories/new', [
			'uses' => 'CategoriesController@store',
			'as' => 'admin.categories.store'
		]);

		Route::post('/admin/s/categories/remove', [
			'uses' => 'CategoriesController@destroy',
			'as' => 'admin.categories.remove'
		]);

		Route::get('/admin/s/categories/{category}', [
			'uses' => 'CategoriesController@show',
			'as' => 'admin.categories.show'
		]);

		Route::post('/admin/s/categories/{category}', [
			'uses' => 'CategoriesController@update',
			'as' => 'admin.categories.update'
		]);

		Route::post('/admin/s/categories/{category}/replicate', [
			'uses' => 'CategoriesController@replicate',
			'as' => 'admin.category.replicate'
		]);
	});
	/*
	|-------------------------
	| Sales Routes
	|-------------------------
	*/
	Route::group(['namespace' => 'Sales'], function(){
		/*
		|-------------------------
		| Customer Routes
		|-------------------------
		*/
		Route::group(['middleware' => ['permission:manage customers']], function(){
			Route::get('/admin/customers', [
				'uses' => 'CustomersController@index',
				'as' => 'admin.customers.index'
			]);
			Route::get('/api/admin/customers', [
				'uses' => 'CustomersController@indexAPI',
				'as' => 'admin.customers.index.api'
			]);

			Route::get('/admin/customers/new', [
				'uses' => 'CustomersController@create',
				'as' => 'admin.customers.new'
			]);
			Route::post('/admin/customers/new', [
				'uses' => 'CustomersController@store',
				'as' => 'admin.customers.store'
			]);

			Route::post('/admin/customers/remove', [
				'uses' => 'CustomersController@destroy',
				'as' => 'admin.customers.remove'
			]);

			Route::get('/admin/customers/{customer}', [
				'uses' => 'CustomersController@show',
				'as' => 'admin.customers.show'
			]);

			Route::post('/admin/customers/{customer}', [
				'uses' => 'CustomersController@update',
				'as' => 'admin.customers.update'
			]);
		});
		/*
		|-------------------------
		| Job Routes
		|-------------------------
		*/
		Route::group(['middleware' => ['permission:manage jobs']], function(){
			Route::get('/admin/jobs', [
				'uses' => 'JobsController@index',
				'as' => 'admin.jobs.index'
			]);

			Route::get('/api/admin/jobs', [
				'uses' => 'JobsController@indexAPI',
				'as' => 'admin.jobs.index.api'
			]);

			Route::get('/admin/jobs/new', [
			'uses' => 'JobsController@create',
			'as' => 'admin.jobs.new'
			]);

			Route::post('/admin/jobs/new', [
				'uses' => 'JobsController@store',
				'as' => 'admin.jobs.store'
			]);

			Route::get('/admin/jobs/{job}', [
				'uses' => 'JobsController@show',
				'as' => 'admin.jobs.show'
			]);

			Route::post('/admin/jobs/{job}/update-worker', [
				'uses' => 'JobsController@updateWorker',
				'as' => 'admin.jobs.update.worker'
			]);

			Route::post('/admin/jobs/{job}/update-status', [
				'uses' => 'JobsController@updateStatus',
				'as' => 'admin.jobs.update.status'
			]);

			Route::post('/admin/jobs/{job}/update-payment', [
				'uses' => 'JobsController@updatePayment',
				'as' => 'admin.jobs.update.payment'
			]);
		});
	});	
	/*
	|-------------------------
	| Settings Routes
	|-------------------------
	*/
	Route::group(['namespace' => 'Settings', 'middleware' => ['permission:manage settings']], function(){
		/*
		|-------------------------
		| Overview
		|-------------------------
		*/
		Route::get('/admin/settings', [
			'uses' => 'SettingsController@index',
			'as' => 'admin.settings.index'
		]);
		/*
		|-------------------------
		| General Settings
		|-------------------------
		*/
		Route::get('/admin/settings/general', [
			'uses' => 'SettingsController@general',
			'as' => 'admin.settings.general'
		]);
		Route::post('/admin/settings/general', [
			'uses' => 'SettingsController@updateGeneral',
			'as' => 'admin.settings.general.update'
		]);
		/*
		|-------------------------
		| Account Settings
		|-------------------------
		*/
		Route::get('/admin/settings/account', [
			'uses' => 'SettingsController@account',
			'as' => 'admin.settings.account'
		]);
		/*
		|-------------------------
		| Staff Routes
		|-------------------------
		*/
		Route::group(['middleware' => ['permission:manage staff']], function(){
			Route::get('/admin/settings/staff', [
				'uses' => 'StaffController@index',
				'as' => 'admin.staff.index'
			]);
			Route::get('/api/admin/settings/staff', [
				'uses' => 'StaffController@indexAPI',
				'as' => 'admin.staff.index.api'
			]);

			Route::get('/admin/settings/staff/new', [
				'uses' => 'StaffController@create',
				'as' => 'admin.staff.new'
			]);
			Route::post('/admin/settings/staff/new', [
				'uses' => 'StaffController@store',
				'as' => 'admin.staff.store'
			]);

			Route::post('/admin/settings/staff/remove', [
				'uses' => 'StaffController@destroy',
				'as' => 'admin.staff.remove'
			]);

			Route::get('/admin/settings/staff/{user}', [
				'uses' => 'StaffController@show',
				'as' => 'admin.staff.show'
			]);

			Route::post('/admin/settings/staff/{user}', [
				'uses' => 'StaffController@update',
				'as' => 'admin.staff.update'
			]);
		});
	});
});

/*
|-------------------------
| Authentication
|-------------------------
*/
Auth::routes();

Route::group(['namespace' => 'Auth'], function(){
	/*
	|-------------------------
	| Admin Auth
	|-------------------------
	*/
	Route::get('/admin/login', [
	    'uses' => 'AdminLoginController@showLoginForm',
	    'as' => 'admin.login'
	]);
	Route::post('/admin/login', [
	    'uses' => 'AdminLoginController@login',
	    'as' => 'admin.login.submit'
	]);
    /*
    |-------------------------
    | Customer Auth
    |-------------------------
    */
    Route::get('/register', [
    	'uses' => 'RegisterController@showRegisterationForm',
        'as' => 'user.register'
    ]);
    Route::post('/register', [
        'uses' => 'RegisterController@register',
        'as' => 'user.register.submit'
    ]);
    Route::get('/login', [
        'uses' => 'LoginController@showLoginForm',
        'as' => 'user.login'
    ]);
    Route::post('/login', [
        'uses' => 'LoginController@login',
        'as' => 'user.login.submit'
    ]);
});

/*
|-------------------------
| OAuth
|-------------------------
*/
Route::get('/social-auth/{provider}', 'Auth\SocialController@redirectToProvider')->name('auth.social');

Route::get('/social-auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback')->name('auth.social.callback');