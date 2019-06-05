<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
    return view('home');

});
Route::get('home',function(){
	return view('Test');
});
Route::get('/review', function () {
   return view('review'); 
});
Route::get('/login', function () {
   return view('login'); 
});
Route::get('/signup', function () {
   return view('signup'); 
});

Route::group(['middleware'=>'Admin'],function(){
	Route::get('Admin',function(){
    return view('Admin/Layout/index');
});
Route::group(['prefix'=>'Admin'],function(){

Route::group(['prefix'=>'Film'],function(){
Route::get('DanhSach','FilmController@DanhSach');
Route::get('Them','FilmController@GetThem');
Route::post('Them','FilmController@PostThem');
Route::get('Sua/{id}','FilmController@GetSua');
Route::post('Sua/{id}','FilmController@PostSua');
Route::get('Xoa/{id}','FilmController@Xoa');
});

Route::group(['prefix'=>'Category'],function(){
Route::get('DanhSach','CategoryController@DanhSach');
Route::get('Them','CategoryController@GetThem');
Route::post('Them','CategoryController@PostThem');
Route::get('Sua/{id}','CategoryController@GetSua');
Route::post('Sua/{id}','CategoryController@PostSua');
Route::get('Xoa/{id}','CategoryController@Xoa');
});

Route::group(['prefix'=>'User'],function(){
Route::get('DanhSach','UserController@DanhSach');
Route::get('Xoa/{id}','UserController@Xoa');
});

Route::group(['prefix'=>'Admin'],function(){
Route::get('DanhSach','AdminController@DanhSach');
Route::get('Them','AdminController@GetThem');
Route::post('Them','AdminController@PostThem');
Route::get('Sua/{id}','AdminController@GetSua');
Route::post('Sua/{id}','AdminController@PostSua');
Route::get('Xoa/{id}','AdminController@Xoa');
});

Route::group(['prefix'=>'Comment'],function(){
Route::get('DanhSach','CommentController@DanhSach');

Route::get('Xoa/{id}','CommentController@Xoa');
});

Route::group(['prefix'=>'FilmAndCategory'],function(){
Route::get('DanhSach','FilmAndCategoryController@DanhSach');
Route::get('Them','FilmAndCategoryController@GetThem');
Route::post('Them','FilmAndCategoryController@PostThem');
Route::get('Sua/{idFilm}/{idCategory}','FilmAndCategoryController@GetSua');
Route::post('Sua/{idFilm}/{idCategory}','FilmAndCategoryController@PostSua');
Route::get('Xoa/{idFilm}/{idCategory}','FilmAndCategoryController@Xoa');
});
Route::post('TimKiem','FilmAndCategoryController@TimKiem');
});
});

//Like and DisLike Film
Route::get('/Ajax/Like/{idUser}/{idFilm}','AjaxController@GetLike');
Route::get('/Ajax/Dislike/{idUser}/{idFilm}','AjaxController@GetDislike');
Route::get('/Ajax/DestroyLike/{idUser}/{idFilm}','AjaxController@DestroyLike');
//Like and DisLike Comment
Route::get('/Ajax/DestroyLikeComment/{idUser}/{idComment}','AjaxController@DestroyLikeComment');
Route::get('/Ajax/LikeComment/{idUser}/{idComment}','AjaxController@LikeComment');
Route::get('/Ajax/DislikeComment/{idUser}/{idComment}','AjaxController@DislikeComment');
Route::get('Comment/Xoa/{id}','CommentController@XoaComment');

Route::get('Comment','CommentController@Comment');


//kiểm tra tên name Admin đã tồn tại chưa
Route::get('CheckUserAdmin/{user}','AdminController@CheckUserAdmin');
//kiểm tra tên name User đã tồn tại chưa
Route::get('CheckUser/{name}','UserController@CheckUser');
Route::get("CommentTest","CommentController@CommentTest");

Route::get("SearchFilm/{TextSearch}","FilmController@SearchFilm");


Route::post("login","UserController@postLogin");
Route::get("/LogOut","UserController@LogOut");
Route::post("signup","UserController@Signup");


Route::group(['middleware'=>['web']],function(){
 Route::get("Session",function(){
 	Session::put('Test','Laravel');
 	echo "đã chạy session";
 });
 Route::get('Comment/Insert/{idFilm}/{idUser}/{content}','CommentController@Insert');
});

Route::get('WatchFilm/{id}','FilmController@WatchFilm');


//Xóa Comment
Route::get("DeleteComment/{id}","CommentController@DeleteComment");
//Editcoment
Route::get("EditComment/{idComment}","CommentController@EditComment");
Route::get("SaveEditComment/{content}/{idComment}","CommentController@SaveEditComment");
//Tìm kiếm tên phim bằng auth 
Route::get("RightFilm/{id}","FilmController@RightFilm");
//Sửa UserName
Route::get('EditUser','UserController@GetEditUser');
Route::post('EditUser','UserController@PostEditUser');
//Xem Thêm Comment
Route::get('XemThemComment/{Trang}/{idFilm}','CommentController@XemThemComment');
Route::get('XemThemFilmHome/{TrangFilm}','FilmController@XemThemFilmHome');
//Xem Thêm Film
Route::get('XemThemFilm/{TrangFilm}/{TextSearch}','FilmController@XemThemFilm');
Route::get('XemThemFilmAjax/{TrangFilm}/{idFilm}','FilmController@XemThemFilmAjax');


//Đăng nhập Admin
Route::get('LoginAdmin',function(){
	return view('LoginAdmin');
});
Route::post('LoginAdmin','AdminController@Login');
//Tìm kiếm bằng tác giả
Route::get('Author/{author}','FilmController@author');
//Route::get('XemThemMovie/{Trang}/{$nameAuthor}','FilmController@XemThemMovie');
//Vương minh anh
//tim kiem bang nsx
Route::get('NSX/{NSX}','FilmController@NSX');
// Route::get('XemThemMovie/{Trang}/{$nameNSX}','FilmController@XemThemMovie');
// Route::get('/check','FilmController@check');
//tim kiem bang category
Route::get('Category/{category}','FilmController@category');
// Route::get('XemThemMovie/{Trang}/{$nameCategory}','FilmController@XemThemMovie');
//Edit User to Admin
Route::get('EditAdminUser/{idUser}/{admin}','UserController@EditAdminUser');
//Đếm lượt view;
Route::get('ViewFilm/{idFilm}','FilmController@ViewFilm');
Route::get("SearchFilmUrl/{TextSearch}","FilmController@SearchFilmUrl");