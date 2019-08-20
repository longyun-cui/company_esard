<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
    return view('frontend/entrance/root');
});


Route::get('/metinfo', function () {
    return view('frontend.metinfo');
});


Route::get('/tencent6314595504021742833.txt', function () {
//    echo "6440956689662761523";
//    return "6440956689662761523";
    return "9701534387748392561";
});


/*
 * Common 通用
 */
Route::group(['prefix' => 'common'], function () {

    $controller = "CommonController";

    // 验证码
    Route::match(['get','post'], 'change_captcha', $controller.'@change_captcha');

    //
    Route::get('dataTableI18n', function () {
        return trans('pagination.i18n');
    });
});


/*
 * Common 通用
 */
Route::group(['prefix' => 'test'], function () {

    //
    Route::get('cookie', function () {

        $cookie = cookie('language', 'xxx');
        $s = cookie()->get('language', 'default');
        var_dump($s);
        echo '<br><br>';

        Cookie::make('language', 'enx');
        $cookie = Cookie::get('language');
        var_dump($cookie);
        echo '<br><br>';

        $cookies = request()->cookie();
        var_dump($cookies);
        echo '<br><br>';
    });

});





/*
 * 前台
 */
Route::group(['namespace' => 'Front', 'middleware' => ['info','language']], function () {

    $controller = "IndexController";

    Route::get('/', $controller.'@view_root');

    Route::get('about_us', $controller.'@view_about_us');
    Route::get('about/{id?}', $controller.'@view_about');

    Route::get('advantages/{id?}', $controller.'@view_advantages');
    Route::get('advantage/{id?}', $controller.'@view_advantage');

    Route::get('services/{id?}', $controller.'@view_services');
    Route::get('service/{id?}', $controller.'@view_service');

    Route::get('faqs', $controller.'@view_faqs');
    Route::get('faq/{id?}', $controller.'@view_faq');

    Route::get('coverages', $controller.'@view_coverages');
    Route::get('coverage/{id?}', $controller.'@view_coverage');

    Route::get('activity/{id?}', $controller.'@view_activity');

    Route::get('customers', $controller.'@view_customers');


    Route::get('/contact', $controller.'@view_contact');
    Route::get('/quote', $controller.'@view_quote');

    Route::post('message/contact', $controller.'@message_contact');
    Route::post('message/quote', $controller.'@message_quote');


    Route::get('temp/activity/keron-milestown', $controller.'@view_temp_activity_with_milestown');


});




/*
 * 后台
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    // 注册登录
    Route::group(['namespace' => 'Auth'], function () {

        $controller = "AuthController";

        Route::match(['get','post'], 'login', $controller.'@login');
        Route::match(['get','post'], 'logout', $controller.'@logout');

    });


    // 后台管理，需要登录
    Route::group(['middleware' => 'admin'], function () {

        $controller = "AdminController";

        Route::get('/', $controller.'@index');

        // 管理员模块
        Route::group(['prefix' => 'administrator'], function () {
            $controller = "AdministratorController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'edit', $controller.'@editAction');

            Route::match(['get','post'], 'password/reset', $controller.'@password_reset');

            Route::match(['get','post'], 'list', $controller.'@viewList');
        });

        // 管理员模块
        Route::group(['prefix' => 'info'], function () {
            $controller = "InfoController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
        });

        // 样式模块
        Route::group(['prefix' => 'module'], function () {
            $controller = "ModuleController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'list', $controller.'@viewList');
            Route::get('create', $controller.'@createAction');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
            Route::match(['get','post'], 'sort', $controller.'@sortAction');
            Route::post('delete', $controller.'@deleteAction');
            Route::post('enable', $controller.'@enableAction');
            Route::post('disable', $controller.'@disableAction');

            Route::post('delete_multiple_option', $controller.'@deleteMultipleOption');
        });

        // 目录模块
        Route::group(['prefix' => 'menu'], function () {
            $controller = "MenuController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'list', $controller.'@viewList');
            Route::match(['get','post'], 'items', $controller.'@viewItemsList');
            Route::get('create', $controller.'@createAction');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
            Route::match(['get','post'], 'sort', $controller.'@sortAction');
            Route::post('delete', $controller.'@deleteAction');
            Route::post('enable', $controller.'@enableAction');
            Route::post('disable', $controller.'@disableAction');
        });

        // 内容模块
        Route::group(['prefix' => 'item'], function () {
            $controller = "ItemController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'list', $controller.'@viewList');
            Route::get('create', $controller.'@createAction');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
            Route::post('delete', $controller.'@deleteAction');
            Route::post('enable', $controller.'@enableAction');
            Route::post('disable', $controller.'@disableAction');

            Route::get('select2_menus', $controller.'@select2_menus');
        });

        //留言模块
        Route::group(['prefix' => 'message'], function () {
            $controller = "MessageController";

            Route::get('/', $controller.'@index');
            Route::get('index', $controller.'@index');
            Route::match(['get','post'], 'list', $controller.'@viewList');
            Route::get('create', $controller.'@createAction');
            Route::match(['get','post'], 'edit', $controller.'@editAction');
            Route::post('delete', $controller.'@deleteAction');
            Route::post('enable', $controller.'@enableAction');
            Route::post('disable', $controller.'@disableAction');

            Route::get('select2_menus', $controller.'@select2_menus');
        });

    });


});


