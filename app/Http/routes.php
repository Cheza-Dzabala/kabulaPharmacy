<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();

Route::group(['middleware' => 'authCheck'], function(){


    Route::get('/',
        [
            'as' => 'dashboard',
            'uses' => 'landingController@index',
        ]
    );


    /**
     * Configuration Routes
     */
        Route::get('/configuration',
            [
                'as' => 'configuration',
                'uses' => 'configController@index'
            ]
        );

    /*
     * Stock Configuration Routes
     */
        Route::get('/configuration/stock/department',
            [
                'as' => 'stock-dpt-config',
                'uses' => 'configController@stockDepartmentIndex',
            ]
        );

        Route::post('/configuration/stock/department',
            [
                'as' => 'save-stock-department-config',
                'uses' => 'configController@saveStockDepartment'
            ]
        );


        Route::get('/configuration/stock/tax',
            [
                'as' => 'stock-tax-config',
                'uses' => 'configController@stockTaxIndex',
            ]
        );


        Route::post('/configuration/stock/tax',
            [
                'as' => 'save-tax-profile',
                'uses' => 'configController@saveTaxProfile'
            ]
        );


        Route::get('/configuration/stock/generic-names',
            [
                'as' => 'stock-generic-names',
                'uses' => 'configController@genericNamesIndex'
            ]);

        Route::post('/configuration/stock/generic-names',
            [
                'as' => 'save-generic-names',
                'uses' => 'configController@saveGenericName'
            ]);

        Route::get('/configuration/stock/types',
            [
                'as' => 'stock-types',
                'uses' => 'configController@stockTypesIndex'
            ]
        );

        Route::post('/configuration/stock/types',
            [
                'as' => 'save-stock-types',
                'uses' => 'configController@saveStockTypes'
            ]
        );

    /*
     * End Stock Configuration Routes
     */
        /*
         * Start Roles COnfiguration Routes
         */

        Route::get('/configuration/roles/',
            [
                'as' => 'config-roles',
                'uses' => 'configController@rolesIndex'
            ]);

        Route::get('/configuration/roles/{roleName}/attach-permissions',
            [
                'as' => 'config-roles.attach',
                'uses' => 'configController@rolesAttachPermissions'
            ]);

        Route::post('/configuration/roles/{roleName}/attach-permissions',
            [
                'as' => 'config-roles.attach.save',
                'uses' => 'configController@rolesSaveAttachment'
            ]);


        /*
         * End Roles COnfiguration Routes
         */
    /**
     * End Configuration Routes
     */


    /*
     * Stock Routes
     */

    Route::get('/stock',
        [
            'as' => 'stock',
            'uses' => 'stockController@index'
        ]
    );

    Route::get('/new-stock',
        [
            'as' => 'newStock',
            'uses' => 'stockController@new_stock'
        ]
    );

    Route::post('/new-stock',
        [
            'as' => 'saveStock',
            'uses' => 'stockController@save_stock'
        ]
    );


    Route::get('/stock/update/{id}',
        [
            'as' => 'addStock',
            'uses' => 'stockController@add_stock'
        ]
    );

    Route::post('stock/update/{id}',
        [
            'as' => 'updateStock',
            'uses' => 'stockController@update_stock'
        ]
    );




    /*
     * End Stock Routes
     */

    //Supplier Routes
    Route::get('/suppliers',
        [
            'as' => 'supplier',
            'uses' => 'supplierController@index'
        ]
    );

    Route::get('/suppliers-new',
        [
            'as' => 'new-supplier',
            'uses' => 'supplierController@new_supplier'
        ]
    );

    Route::post('/suppliers-new',
        [
            'as' => 'save-supplier',
            'uses' => 'supplierController@save_supplier'
        ]
    );
    //End Supplier Routes


    //Order Routes
    Route::get('/orders',
        [
            'as' => 'orders',
            'uses' => 'orderController@index'
        ]
    );

    Route::get('/orders/activate/{id}',
        [
            'as' => 'orders.activate',
            'uses' => 'orderController@activate'
        ]
    );


    Route::get('/order_details/{id}',
        [
            'as' => 'order.details',
            'uses' => 'orderController@allDetails'
        ]
    );
    Route::get('/order_details/add/stock/{id}',
        [
            'as' => 'order.add.stock',
            'uses' => 'orderController@stockAdd'
        ]);

    Route::get('/order_details/add/product/{id}',
        [
            'as' => 'order.add.product',
            'uses' => 'orderController@productAdd'
        ]);

    Route::post('/order_details/add/product',
        [
            'as' => 'order.save.product',
            'uses' => 'orderController@productAddSave'
        ]);

    Route::get('order_details/generate_order/{id}',
        [
           'as' => 'order.generate',
            'uses' => 'orderController@generateOrder'
        ]);

    Route::get('order_details/place_order/{id}',
        [
           'as' => 'order.place',
            'uses' => 'orderController@placeOrder'
        ]);


    Route::post('/order_details/add/stock',
        [
            'as' => 'order.save.stock',
            'uses' => 'orderController@stockAddSave'
        ]);

    Route::post('/orders',
        [
            'as' => 'save_orders',
            'uses' => 'orderController@save_order'
        ]
    );

    //End Order Routes

    //Sales Routes
    Route::get('/pos',
        [
            'as' => 'pos',
            'uses' => 'posController@index'
        ]
    );

    Route::post('pos',
        [
            'as' => 'posSubmit',
            'uses' => 'posController@processTransaction'
        ]
    );



    //Start Report Routes

    Route::get('reports',
        [
            'as' => 'reports',
            'uses' => 'reportController@index'
        ]
    );

    Route::get('sales_reports',
        [
            'as' => 'sales.reports',
            'uses' => 'reportController@salesReport'
        ]);


    //End Report Routes


    //Start Product Database Route

    Route::get('products',
        [
           'as' => 'products',
            'uses' => 'productController@index'
        ]);

    Route::post('save_product',
        [
            'as' => 'products.save',
            'uses' => 'productController@save'
        ]);


    Route::get('users',
        [
            'as' => 'users',
            'uses' => 'usersController@index'
        ]);

    Route::get('users/new',
        [
            'as' => 'users.new',
            'uses' => 'usersController@newUser'
        ]);

    Route::get('users/manage',
        [
            'as' => 'users.manage',
            'uses' => 'usersController@manage'
        ]);

    Route::get('users/edit/{id}',
        [
            'as' => 'users.edit',
            'uses' => 'usersController@editUser'
        ]);
});



