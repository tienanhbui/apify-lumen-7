<?php
$prefix = env('APIFY_PREFIX_URL', 'api');
if (method_exists($this->app, 'group')) {
    $this->app->group(['prefix' => $prefix], function ($router) {
        $router->post('upload', [
            'uses' => 'Megaads\Apify\Controllers\APIController@upload',
        ]);
        $router->get('{entity}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@get',
        ]);
        $router->get('{entity}/{id:[0-9]+}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@show',
        ]);
        $router->post('{entity}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@store',
        ]);
        $router->put('{entity}/{id:[0-9]+}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@update',
        ]);
        $router->patch('{entity}/{id:[0-9]+}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@patch',
        ]);
        $router->delete('{entity}/{id:[0-9]+}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@destroy',
        ]);
        $router->delete('{entity}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@destroyBulk',
        ]);
    });
} else {
    Route::group(['prefix' => $prefix], function () {
        Route::post('upload', [
            'uses' => 'Megaads\Apify\Controllers\APIController@upload',
        ]);
        Route::get('{entity}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@get',
        ]);
        Route::get('{entity}/{id}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@show',
        ])->where(['id' => '[0-9]+']);
        Route::post('{entity}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@store',
        ]);
        Route::put('{entity}/{id}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@update',
        ])->where(['id' => '[0-9]+']);
        Route::patch('{entity}/{id}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@patch',
        ])->where(['id' => '[0-9]+']);
        Route::delete('{entity}/{id}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@destroy',
        ])->where(['id' => '[0-9]+']);
        Route::delete('{entity}', [
            'uses' => 'Megaads\Apify\Controllers\APIController@destroyBulk',
        ]);
    });
}
