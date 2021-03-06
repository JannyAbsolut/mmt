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


$domain = 'mmorate.com';
//$domain = 'mmt.test';
// Pages
Route::get('/redirect/{route}', 'UserController@redirect')->name('redirect');
Route::get('/logout', 'PagesController@logout')->name('logout');
Route::group(['domain' => $domain], function () {
    Route::get('/about', 'PagesController@about')->name('about');
    Route::get('/rules', 'PagesController@rules')->name('rules');
    Route::get('/contacts', 'PagesController@contacts')->name('contacts');
    Route::get('/support', 'PagesController@support')->name('support');
    Route::get('/request', 'PagesController@request')->name('request');
    Route::get('/faq', 'PagesController@faq')->name('faq');
    Route::get('/', 'PagesController@promo')->name('main');
//    Route::get('/', 'ServersController@main')->name('main');

    Route::middleware('auth','cors')->group(function () {
        Route::get('/profile', 'UserController@profile')->name('profile');
        Route::post('/profile/changeAvatar', 'UserController@updateAvatar')->name('updateAvatar');
        Route::post('/profile/edit', 'UserController@update')->name('profile.edit');
        Route::get('/profile/confirmation', 'UserController@confirmation')->name('confirmation');
        Route::post('/profile/sendEmailCode', 'UserController@sendEmailCode')->name('sendEmailCode');
        Route::post('/profile/verifyEmail', 'UserController@verifyEmail')->name('verifyEmail');
        Route::post('/profile/sendSmsCode', 'UserController@sendSmsCode')->name('sendSmsCode');
        Route::post('/profile/verifySms', 'UserController@verifySms')->name('verifySms');

        Route::get('/password/edit', 'UserController@changePassword')->name('changePassword');
        Route::post('/password/edit', 'UserController@changePasswordPost')->name('changePassword.post');

        Route::get('/banners', 'PagesController@banners')->name('banners');

        Route::get('/addServer', 'ServersController@add')->name('addServer');
        Route::post('/addServer', 'ServersController@addPost')->name('addServer.post');

        Route::get('/editWorld/{id}', 'ServersController@editWorld')->name('editWorld');
        Route::post('/editWorld/{id}', 'ServersController@editWorldPost')->name('editWorld.post');

        Route::get('/stopServer/{id}', 'ServersController@stopServer')->name('stopServer');
        Route::get('/startServer/{id}', 'ServersController@startServer')->name('startServer');
        Route::get('/deleteServer/{id}', 'ServersController@deleteServer')->name('deleteServer');


        Route::get('/server/{id}/addWorld', 'ServersController@addWorld')->name('addWorld');
        Route::post('/server/{id}/addWorld', 'ServersController@addWorldPost')->name('addWorld.post');


        Route::get('/server/{id}/edit', 'ServersController@edit')->name('editServer');
        Route::post('/server/{id}/edit', 'ServersController@editPost')->name('editServer.post');
        Route::get('/myServersStat', 'ServersController@myServersStat')->name('myServersStat');
        Route::get('/server/{id}/stat', 'ServersController@serverStat')->name('serverStat');

        Route::get('/myServers', 'ServersController@myServers')->name('myServers');

        Route::get('/server/{id}/vote', 'ServersController@vote')->name('voteServer');
        Route::post('/server/{id}/vote', 'ServersController@votePost')->name('voteServer.post');

        Route::get('/server/{id}/vote/vip', 'ServersController@voteVip')->name('voteServerVip');
        Route::post('/server/{id}/vote/vip', 'ServersController@voteVipPost')->name('voteServerVip.post');

        Route::get('/myVotes', 'UserController@myVotes')->name('myVotes');

        Route::get('/ads', 'PrivilegesController@ads')->name('ads');

        Route::get('/privileges', 'PrivilegesController@main')->name('privileges');
        Route::get('/privileges/bb', 'PrivilegesController@bb')->name('privileges.bb');
        Route::get('/privileges/link', 'PrivilegesController@link')->name('privileges.link');
        Route::get('/privileges/header', 'PrivilegesController@header')->name('privileges.header');
        Route::post('/privileges/buy', 'PrivilegesController@buy')->name('privileges.buy');

        Route::get('/privileges/banner', 'PrivilegesController@banner')->name('privileges.banner');
        Route::get('/privileges/banner/step-2', 'PrivilegesController@bannerStep2')->name('privileges.banner.step2');
        Route::get('/privileges/banner/step-3', 'PrivilegesController@bannerStep3')->name('privileges.banner.step3');
        Route::get('/privileges/banner/step-4', 'PrivilegesController@bannerStep4')->name('privileges.banner.step4');

    });

    Route::get('/test', 'ServersController@test');
    Route::post('/ping', 'ServersController@ping');
});

Route::get('/server/{id}', 'ServersController@server')->name('serverPage');
Route::get('/server/{id}/url', 'ServersController@redirectServer')->name('redirectServer');
Route::get('/server/{servId}/worlds/{id}', 'ServersController@world')->name('worldPage');
Route::post('/server/{id}/addComment', 'ServersController@addComment')->name('serverAddComment');

Route::get('/server/{id}/statistic', 'ServersController@serverStat')->name('serverStat');

Route::get('/news', 'PagesController@news')->name('news.main');
Route::get('/blog', 'PagesController@blog')->name('blog.main');

Route::group(['domain' => 'aion.' . $domain], function () {
    Route::get('/', 'ServersController@aion')->name('aion');
});

Route::group(['domain' => 'mu.' . $domain], function () {
    Route::get('/', 'ServersController@mu')->name('mu');
});

Route::group(['domain' => 'rf.' . $domain], function () {
    Route::get('/', 'ServersController@rf')->name('rf');
});

Route::group(['domain' => 'wow.' . $domain], function () {
    Route::get('/', 'ServersController@wow')->name('wow');
});

Route::group(['domain' => 'pw.' . $domain], function () {
    Route::get('/', 'ServersController@perfect')->name('perfect');
});

Route::group(['domain' => 'jd.' . $domain], function () {
    Route::get('/', 'ServersController@jade')->name('jade');
});

Route::group(['domain' => 'l2.' . $domain], function () {
    Route::get('/', 'ServersController@lineage')->name('lineage');
});

Route::group(['domain' => 'online.' . $domain], function () {
    Route::get('/', 'ServersController@other')->name('other');
});

// Admin
Route::group(['middleware' => 'admin', 'domain' => 'admin.' . $domain], function () {
//    Route::get('/', 'AdminController@main')->name('admin.main');
    Route::get('/', function () {
        return redirect('/dashboard/v2');
    });
    Route::get('/servers', 'AdminController@servers')->name('admin.servers');
    // Games
    Route::get('/servers/aion', 'AdminController@aion')->name('admin.servers.aion');
    Route::get('/servers/jade', 'AdminController@jade')->name('admin.servers.jade');
    Route::get('/servers/lineage', 'AdminController@lineage')->name('admin.servers.lineage');
    Route::get('/servers/mu', 'AdminController@mu')->name('admin.servers.mu');
    Route::get('/servers/perfect', 'AdminController@perfect')->name('admin.servers.perfect');
    Route::get('/servers/rf', 'AdminController@rf')->name('admin.servers.rf');
    Route::get('/servers/wow', 'AdminController@wow')->name('admin.servers.wow');
    // Editors
    Route::get('/server/{id}/edit', 'AdminController@editServer')->name('admin.server.edit');
    Route::post('/server/{id}/edit', 'AdminController@editServerPost')->name('admin.server.edit.post');
    Route::get('/server/{id}/approve', 'AdminController@approveServer')->name('admin.server.approve');
    Route::get('/server/{id}/delete', 'AdminController@deleteServer')->name('admin.server.delete');

    Route::get('/dashboard/v1', function () {
        return view('admin/dashboard-v1');
    });
    Route::get('/dashboard/v2', function () {
        return view('admin/dashboard-v2');
    });
    Route::get('/email/inbox', function () {
        return view('admin/email-inbox');
    });
    Route::get('/email/compose', function () {
        return view('admin/email-compose');
    });
    Route::get('/email/detail', function () {
        return view('admin/email-detail');
    });
    Route::get('/widget', function () {
        return view('admin/widget');
    });
    Route::get('/ui/general', function () {
        return view('admin/ui-general');
    });
    Route::get('/ui/typography', function () {
        return view('admin/ui-typography');
    });
    Route::get('/ui/tabs-accordions', function () {
        return view('admin/ui-tabs-accordions');
    });
    Route::get('/ui/unlimited-nav-tabs', function () {
        return view('admin/ui-unlimited-nav-tabs');
    });
    Route::get('/ui/modal-notification', function () {
        return view('admin/ui-modal-notification');
    });
    Route::get('/ui/widget-boxes', function () {
        return view('admin/ui-widget-boxes');
    });
    Route::get('/ui/media-object', function () {
        return view('admin/ui-media-object');
    });
    Route::get('/ui/buttons', function () {
        return view('admin/ui-buttons');
    });
    Route::get('/ui/icons', function () {
        return view('admin/ui-icons');
    });
    Route::get('/ui/simple-line-icons', function () {
        return view('admin/ui-simple-line-icons');
    });
    Route::get('/ui/ionicons', function () {
        return view('admin/ui-ionicons');
    });
    Route::get('/ui/tree-view', function () {
        return view('admin/ui-tree-view');
    });
    Route::get('/ui/language-bar-icon', function () {
        return view('admin/ui-language-bar-icon');
    });
    Route::get('/ui/social-buttons', function () {
        return view('admin/ui-social-buttons');
    });
    Route::get('/ui/intro-js', function () {
        return view('admin/ui-intro-js');
    });
    Route::get('/bootstrap-4', function () {
        return view('admin/bootstrap-4');
    });
    Route::get('/form/elements', function () {
        return view('admin/form-elements');
    });
    Route::get('/form/plugins', function () {
        return view('admin/form-plugins');
    });
    Route::get('/form/slider-switcher', function () {
        return view('admin/form-slider-switcher');
    });
    Route::get('/form/validation', function () {
        return view('admin/form-validation');
    });
    Route::get('/form/wizards', function () {
        return view('admin/form-wizards');
    });
    Route::get('/form/wizards-validation', function () {
        return view('admin/form-wizards-validation');
    });
    Route::get('/form/wysiwyg', function () {
        return view('admin/form-wysiwyg');
    });
    Route::get('/form/x-editable', function () {
        return view('admin/form-x-editable');
    });
    Route::get('/form/multiple-file-upload', function () {
        return view('admin/form-multiple-file-upload');
    });
    Route::get('/form/summernote', function () {
        return view('admin/form-summernote');
    });
    Route::get('/form/dropzone', function () {
        return view('admin/form-dropzone');
    });
    Route::get('/table/basic', function () {
        return view('admin/table-basic');
    });
    Route::get('/table/manage/default', function () {
        return view('admin/table-manage-default');
    });
    Route::get('/table/manage/autofill', function () {
        return view('admin/table-manage-autofill');
    });
    Route::get('/table/manage/buttons', function () {
        return view('admin/table-manage-buttons');
    });
    Route::get('/table/manage/colreorder', function () {
        return view('admin/table-manage-colreorder');
    });
    Route::get('/table/manage/fixed-column', function () {
        return view('admin/table-manage-fixed-column');
    });
    Route::get('/table/manage/fixed-header', function () {
        return view('admin/table-manage-fixed-header');
    });
    Route::get('/table/manage/keytable', function () {
        return view('admin/table-manage-keytable');
    });
    Route::get('/table/manage/responsive', function () {
        return view('admin/table-manage-responsive');
    });
    Route::get('/table/manage/rowreorder', function () {
        return view('admin/table-manage-rowreorder');
    });
    Route::get('/table/manage/scroller', function () {
        return view('admin/table-manage-scroller');
    });
    Route::get('/table/manage/select', function () {
        return view('admin/table-manage-select');
    });
    Route::get('/table/manage/combine', function () {
        return view('admin/table-manage-combine');
    });
    Route::get('/email-template/system', function () {
        return view('admin/email-template-system');
    });
    Route::get('/email-template/newsletter', function () {
        return view('admin/email-template-newsletter');
    });
    Route::get('/chart/flot', function () {
        return view('admin/chart-flot');
    });
    Route::get('/chart/morris', function () {
        return view('admin/chart-morris');
    });
    Route::get('/chart/js', function () {
        return view('admin/chart-js');
    });
    Route::get('/chart/d3', function () {
        return view('admin/chart-d3');
    });
    Route::get('/calendar', function () {
        return view('admin/calendar');
    });
    Route::get('/map/vector', function () {
        return view('admin/map-vector');
    });
    Route::get('/map/google', function () {
        return view('admin/map-google');
    });
    Route::get('/gallery/v1', function () {
        return view('admin/gallery-v1');
    });
    Route::get('/gallery/v2', function () {
        return view('admin/gallery-v2');
    });
    Route::get('/page-option/page-blank', function () {
        return view('admin/page-blank');
    });
    Route::get('/page-option/page-with-footer', function () {
        return view('admin/page-with-footer');
    });
    Route::get('/page-option/page-without-sidebar', function () {
        return view('admin/page-without-sidebar');
    });
    Route::get('/page-option/page-with-right-sidebar', function () {
        return view('admin/page-with-right-sidebar');
    });
    Route::get('/page-option/page-with-minified-sidebar', function () {
        return view('admin/page-with-minified-sidebar');
    });
    Route::get('/page-option/page-with-two-sidebar', function () {
        return view('admin/page-with-two-sidebar');
    });
    Route::get('/page-option/page-full-height', function () {
        return view('admin/page-full-height');
    });
    Route::get('/page-option/page-with-wide-sidebar', function () {
        return view('admin/page-with-wide-sidebar');
    });
    Route::get('/page-option/page-with-light-sidebar', function () {
        return view('admin/page-with-light-sidebar');
    });
    Route::get('/page-option/page-with-mega-menu', function () {
        return view('admin/page-with-mega-menu');
    });
    Route::get('/page-option/page-with-top-menu', function () {
        return view('admin/page-with-top-menu');
    });
    Route::get('/page-option/page-with-boxed-layout', function () {
        return view('admin/page-with-boxed-layout');
    });
    Route::get('/page-option/page-with-mixed-menu', function () {
        return view('admin/page-with-mixed-menu');
    });
    Route::get('/page-option/boxed-layout-with-mixed-menu', function () {
        return view('admin/page-boxed-layout-with-mixed-menu');
    });
    Route::get('/page-option/page-with-transparent-sidebar', function () {
        return view('admin/page-with-transparent-sidebar');
    });
    Route::get('/extra/timeline', function () {
        return view('admin/extra-timeline');
    });
    Route::get('/extra/coming-soon', function () {
        return view('admin/extra-coming-soon');
    });
    Route::get('/extra/search-result', function () {
        return view('admin/extra-search-result');
    });
    Route::get('/extra/invoice', function () {
        return view('admin/extra-invoice');
    });
    Route::get('/extra/error-page', function () {
        return view('admin/extra-error-page');
    });
    Route::get('/extra/profile', function () {
        return view('admin/extra-profile');
    });
    Route::get('/login/v1', function () {
        return view('admin/login-v1');
    });
    Route::get('/login/v2', function () {
        return view('admin/login-v2');
    });
    Route::get('/login/v3', function () {
        return view('admin/login-v3');
    });
    Route::get('/register/v3', function () {
        return view('admin/register-v3');
    });
    Route::get('/helper/css', function () {
        return view('admin/helper-css');
    });
});

// Games
// Route::get('/aion',  'ServersController@aion')->name('aion');
// Route::get('/mu', 'ServersController@mu')->name('mu');
// Route::get('/rf', 'ServersController@rf')->name('rf');
// Route::get('/wow', 'ServersController@wow')->name('wow');
// Route::get('/perfect', 'ServersController@perfect')->name('perfect');
// Route::get('/jade', 'ServersController@jade')->name('jade');
// Route::get('/lineage', 'ServersController@lineage')->name('lineage');
// Route::get('/other', 'ServersController@other')->name('other');

// 404
Route::get('404', 'ErrorHandlerController@errorCode404')->name('404');

Auth::routes();
//Route::get('/', 'ServersController@main')->name('main');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'ErrorHandlerController@errorCode404')->name('main');
