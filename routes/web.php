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


/**
 * route   xử lý cho admin
 */
Route::group(['prefix' => '/admins','middleware' => 'admins'], function() {
    Route::get('/',['as' => 'admins.home.index','uses' => 'Admin\HomeController@index']);

    // xử lý danh mục bài viết 
     Route::group(['prefix' => '/category-post'], function () {
        Route::get('/', ['as' => 'admin.categorypost.index','uses' => 'Admin\CategorisPostController@index']);
        Route::get('/add', ['as' => 'admin.categorypost.add','uses' => 'Admin\CategorisPostController@getAdd']);
        Route::post('/add', ['uses' => 'Admin\CategorisPostController@createCategory']);
        Route::get('/{id}/edit',['as' => 'admin.categorypost.edit','uses' => 'Admin\CategorisPostController@getEdit']);
        Route::post('/{id}/edit',['uses' => 'Admin\CategorisPostController@postEdit']);
        Route::get('/{id}/delete',['as' => 'admin.categorypost.delete','uses' => 'Admin\CategorisPostController@delete']);
        Route::get('/{id}/hot',['as' => 'admin.categorypost.hot','uses' => 'Admin\CategorisPostController@hot']);
    });

    // xử lý danh mục sản phẩm  
    Route::group(['prefix' => '/category-product'], function () {
        Route::get('/', ['as' => 'admin.categoryproduct.index','uses' => 'Admin\CategorisProductController@index']);
        Route::get('/add', ['as' => 'admin.categoryproduct.add','uses' => 'Admin\CategorisProductController@getAdd']);
        Route::post('/add', ['as' => 'admin.categoryproduct.create','uses' => 'Admin\CategorisProductController@createCategory']);
        Route::get('/{id}/edit',['as' => 'admin.categoryproduct.edit','uses' => 'Admin\CategorisProductController@getEdit']);
        Route::post('/{id}/edit',['uses' => 'Admin\CategorisProductController@postEdit']);
        Route::get('/{id}/delete',['as' => 'admin.categoryproduct.delete','uses' => 'Admin\CategorisProductController@delete']);
        Route::get('/{id}/hot',['as' => 'admin.categoryproduct.hot','uses' => 'Admin\CategorisProductController@hot']);
    });
    // xử lý bài viết
    Route::group(['prefix' => '/posts'], function () {
        Route::get('/', ['as' => 'admin.posts.index','uses' => 'Admin\PostsController@index']);
        Route::get('/add', ['as' => 'admin.posts.add','uses' => 'Admin\PostsController@getAdd']);
        Route::post('/add', ['as' => 'admin.posts.create','uses' => 'Admin\PostsController@createCategory']);
        Route::get('/{id}/edit',['as' => 'admin.posts.edit','uses' => 'Admin\PostsController@getEdit']);
        Route::post('/{id}/edit',['uses' => 'Admin\PostsController@postEdit']);
        Route::get('/{id}/delete',['as' => 'admin.posts.delete','uses' => 'Admin\PostsController@delete']);
        Route::get('/{id}/hot',['as' => 'admin.posts.hot','uses' => 'Admin\PostsController@hot']);
        Route::get('/{id}/active',['as' => 'admin.posts.active','uses' => 'Admin\PostsController@active']);

        // ajax
        Route::post('/{id}/view',['as' => 'admin.posts.view','uses' => 'Admin\PostsController@view']);
    });

    /**
     * bai viet linh tinh
     */
    Route::group(['prefix' => '/post-about'], function () {
        Route::get('/', ['as' => 'admin.post.about.index','uses' => 'Admin\PostAboutController@index']);
        Route::get('/add', ['as' => 'admin.post.about.add','uses' => 'Admin\PostAboutController@getAdd']);
        Route::post('/add', ['as' => 'admin.post.about.create','uses' => 'Admin\PostAboutController@createCategory']);
        Route::get('/{id}/edit',['as' => 'admin.post.about.edit','uses' => 'Admin\PostAboutController@getEdit']);
        Route::post('/{id}/edit',['uses' => 'Admin\PostAboutController@postEdit']);
        Route::get('/{id}/delete',['as' => 'admin.post.about.delete','uses' => 'Admin\PostAboutController@delete']);
        Route::get('/{id}/hot',['as' => 'admin.post.about.hot','uses' => 'Admin\PostAboutController@hot']);
        Route::get('/{id}/active',['as' => 'admin.post.about.active','uses' => 'Admin\PostAboutController@active']);

        // ajax
//        Route::post('/{id}/view',['as' => 'admin.posts.view','uses' => 'Admin\PostsController@view']);
    });

    /**
     *  Cau hinh website 
     */
    Route::group(['prefix' => 'settings'], function() {
        Route::get('/', ['as' => 'admin.settings.index','uses' => 'Admin\SettingsController@getInfo']);
        Route::post('/', ['as' => 'admin.settings.saveinfo','uses' => 'Admin\SettingsController@saveInfo']);
    });

    /**
     * slide 
     */
    Route::group(['prefix' => 'slides'], function () {
        Route::get('/', ['as' => 'admin.slides.index','uses' => 'Admin\SlidesController@index']);
        Route::get('/add', ['as' => 'admin.slides.add','uses' => 'Admin\SlidesController@getAdd']);
        Route::post('/add', ['as' => 'admin.slides.posts','uses' => 'Admin\SlidesController@createCategory']);
        Route::get('/{id}/edit', ['as' => 'admin.slides.edit','uses' => 'Admin\SlidesController@getEdit']);
        Route::post('/{id}/edit', ['uses' => 'Admin\SlidesController@postEdit']);
        Route::get('/{id}/delete',['as' => 'admin.slides.delete','uses' => 'Admin\SlidesController@delete']);
    });

    // quan ly thành viên 
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', ['as' => 'admin.users.index','uses' => 'Admin\UsersController@index']);
        Route::get('/add', ['as' => 'admin.users.add','uses' => 'Admin\UsersController@getAdd']);
        Route::post('/add', ['uses' => 'Admin\UsersController@createUser']);
        Route::get('/{id}/edit', ['as' => 'admin.users.edit','uses' => 'Admin\UsersController@getEdit']);
        Route::post('/{id}/edit', ['uses' => 'Admin\UsersController@postEdit']);
        Route::get('/{id}/delete',['as' => 'admin.users.delete','uses' => 'Admin\UsersController@delete']);
        Route::get('/{id}/active',['as' => 'admin.users.active','uses' => 'Admin\UsersController@active']);

        Route::get('/{id}/xem-diem',['as' => 'admin.users.viewdiem','uses' => 'Admin\UsersController@xemDiem']);
    });
    // quan ly trac nghiem
    Route::group(['prefix' => 'choices'], function (){
        Route::get('/','Admin\ChoicesController@index')->name('choices.index');
        Route::get('/add','Admin\ChoicesController@getAdd')->name('choices.add');
        Route::post('/add','Admin\ChoicesController@create')->name('choices.create');
        Route::get('/{id}/delete','Admin\ChoicesController@delete')->name('choices.delete');

        // tao random cau hoi

        Route::get('/{id}/create-list-exams','Admin\ChoicesController@createListExams')->name('create.list.exams');
        Route::post('/{id}/create-list-exams','Admin\ChoicesController@saveListExams')->name('save.list.exams');
        Route::get('/{id}/list-exams','Admin\ChoicesController@listExams')->name('list.exams');

    });
    // quan ly comment
    Route::group(['prefix' => 'comments'],function (){
        Route::get('/','Admin\CommentsController@index')->name('comments.index');
        Route::get('/{id}/delete','Admin\CommentsController@delete')->name('admin.comments.delete');
    });
    /**
     * profiles admins  
     */
    Route::group(['prefix' => 'profiles'], function() {
        Route::get('/', ['as' => 'admin.profiles.index','uses' => 'Admin\ProfilesAdminController@index']);
        Route::post('/',['uses' => 'Admin\ProfilesAdminController@saveProfile']);
    });

    /**
     * gui gmail 
     */
    Route::group(['prefix' => 'gmail'], function() {
        Route::get('/', ['as' => 'admin.gmail.index','uses' => 'Admin\GmailAdminController@index']);
        Route::get('/add', ['as' => 'admin.gmail.add','uses' => 'Admin\GmailAdminController@add']);
        Route::post('/add',['uses' => 'Admin\GmailAdminController@saveEmail']);

        Route::get('/{id}/edit', ['as' => 'admin.gmail.edit','uses' => 'Admin\GmailAdminController@getEdit']);
        Route::post('/{id}/edit', ['uses' => 'Admin\GmailAdminController@postEdit']);
        Route::get('/{id}/delete',['as' => 'admin.gmail.delete','uses' => 'Admin\GmailAdminController@delete']);
        //send email
         Route::get('/sendemail', ['as' => 'admin.gmail.sendemail','uses' => 'Admin\GmailAdminController@sendemail']);
    });

    // cau hoi
    Route::group(['prefix' => 'questions'], function (){
        Route::get('/','Admin\QuestionsController@index')->name('admin.questions.index');
        Route::get('/add','Admin\QuestionsController@getAdd')->name('admin.questions.add');
        Route::post('/add','Admin\QuestionsController@create')->name('admin.questions.create');
        Route::get('/{id}/edit','Admin\QuestionsController@getEdit')->name('admin.questions.edit');
        Route::post('/{id}/edit','Admin\QuestionsController@update')->name('admin.questions.update');
        Route::get('/{id}/delete','Admin\QuestionsController@delete')->name('admin.questions.delete');

        //ajax
        Route::post('/loadPost','Admin\QuestionsController@loadPost')->name('admin.questions.loadpost');
    });
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/**
 *  auth admin 
 */
Route::group(['prefix' =>'authenticate'], function() {
    Route::get('/login',['as' => 'admin.login','uses' => 'AuthAdmin\LoginController@getLogin']);
    Route::post('/login',['as' => 'admin.postlogin','uses' =>  'AuthAdmin\LoginController@postLogin']);
    Route::get('/register','AuthAdmin\AuthController@getRegister');
    Route::post('/register','AuthAdmin\AuthController@postRegister');
    Route::get('/logout-admin',['as' => 'logout.admins','uses' => 'AuthAdmin\AuthController@logoutAdmin']);
});

/**
 * login frontend
 */

Route::get('/','Frontend\HomeController@index')->name('home');

Route::get('/dang-nhap','Auth\LoginController@getLogin')->name('get.dangky.user');
Route::post('/dang-nhap','Auth\LoginController@postLogin')->name('post_login');
Route::get('/logout','Auth\LoginController@logout')->name('logout_user');


Route::get('/dang-ky','Auth\RegisterController@getRegister')->name('dangky.user');
Route::post('/dang-ky','Auth\RegisterController@postRegister')->name('postRegister');

Route::group(['prefix' => 'danh-muc'],function(){

    Route::get('/gioi-thieu/{slug}/{id}','Frontend\CategorysController@showCategoryCap2')->name('show-category-cap2');

    //Frontend
    Route::get('/{slug}/{id}','Frontend\CategorysController@showCategory')->name('show-category');
    Route::get('/{slug}/{id}/{slug-post}/{id-post}','Frontend\PostsDetailController@detailPost')->name('show-detail-posts');
});

Route::group(['prefix' => 'bai-viet','middleware' => 'web'],function(){
    Route::get('/{idcate}/{slug}/{id}','Frontend\PostsDetailController@detailPost')->name('show-detail-posts');
    Route::post('/{idcate}/{slug}/{id}','Frontend\PostsDetailController@saveComment')->name('saveComment');

    // find  cau hoi on tap bang ajax
    Route::post('/question-ajax/{idpost}','Frontend\PostsDetailController@getQuestionAjax')->name('get-question-ajax');

    // find cau hoi on tap cua chuong
    Route::post('/question-ajax-2/{idpost}','Frontend\PostsDetailController@getQuestionAjaxPost')->name('get-question-ajax-post');
});


Route::get('/lam-bai-thi','Frontend\ExamsController@index')->name('indexbaithi');
Route::post('/lam-bai-thi','Frontend\ExamsController@createExams')->name('taodethi');

Route::get('/thong-tin/{id}-{slug}','Frontend\PostsDetailController@thongtin')->name('thongtin');
// lam bai thi
Route::group(['prefix' => 'exams','middleware' => 'checkLoginUser'],function(){
    Route::get('/vao-thi/{iduser}/{idde}','Frontend\ExamsController@startExams')->name('vaothi');
    Route::post('/vao-thi/{iduser}/{idde}','Frontend\ExamsController@saveExams')->name('saveDapan');
});

// search
Route::get('/tim-kiem','Frontend\HomeController@searchTypehead')->name('searchTypehead');

Route::get('/gioi-thieu.html','Frontend\AboutController@index');
Route::get('/gioi-thieu/{slug?}-{id?}.html','Frontend\AboutController@about_detail');





