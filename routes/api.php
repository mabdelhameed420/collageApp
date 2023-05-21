<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//? 1==>========================Student Affairs===================
Route::group(['prefix' => 'student-affairs', 'namespace' => 'Api\Auth'], function () {

    Route::post('add', 'StudentAffairController@store');
    Route::post('update', 'StudentAffairController@update');
    Route::post('login', 'StudentAffairController@login');
    Route::get('all', 'StudentAffairController@getAllStudentAffairs');
    Route::delete('delete', 'StudentAffairController@delete');
});
//? 2==>==============================Student============================
Route::group(['prefix' => 'student', 'namespace' => 'Api\Auth'], function () {

    Route::post('add', 'StudentController@store');
    Route::post('update', 'StudentController@update');
    Route::post('delete', 'StudentController@delete');
    Route::get('get', 'StudentController@index');
    Route::post('login', 'StudentController@login');
    Route::get('getAllStudentByDepartmentId', 'StudentController@getAllStudentByDepartmentId');
});

//? 3==>==================Lecturer============================
Route::group(['prefix' => 'lecturer', 'namespace' => 'Api\Auth'], function () {

    Route::post('add', 'LecturerController@store');
    Route::post('update', 'LecturerController@update');
    Route::post('delete', 'LecturerController@delete');
    Route::get('get', 'LecturerController@index');
    Route::get('login', 'LecturerController@login');
    Route::get('getLecturersById', 'LecturerController@getLecturerById');
    Route::get('getClassroomByLecturerId', 'LecturerController@getClassroomByLecturerId');
});
//~======================================================
//? 4==>================= department ====================
//!======================================================
//^======================================================
//&======================================================
//*======================================================
Route::group(['prefix' => 'department', 'namespace' => 'Api\Department'], function () {

    Route::get('get', 'DepartmentController@index');
    Route::post('add', 'DepartmentController@store');
    Route::post('update', 'DepartmentController@update');
    Route::post('delete', 'DepartmentController@delete');
    Route::get('all', 'DepartmentController@allDepartments');
    Route::get('allCourses', 'DepartmentController@getAllCoursesByDepartmentId');
    Route::get('getClassroomIdByDepartmentId', 'DepartmentController@getClassroomIdByDepartmentId');
});

//? 5==>================= chat ====================
Route::group(['prefix' => 'chat', 'namespace' => 'Api\Chat'], function () {

    Route::post('update', 'ChatController@update');
    Route::post('delete', 'ChatController@delete');
    Route::get('get', 'ChatController@index');
    Route::post('add', 'ChatController@store');
    Route::get('getMessages', 'ChatController@getMessagesByChatId');
    Route::get('getChatsByStudentId', 'ChatController@getChatsByStudentId');
    Route::get('getChatsByLecturerId', 'ChatController@getChatsByLecturerId');
    Route::get('getChatsByStudentAffairId', 'ChatController@getChatsByStudentAffairId');
});

//? 6==>================= course ====================
Route::group(['prefix' => 'course', 'namespace' => 'Api\Course'], function () {


    Route::post('add', 'CourseController@store');
    Route::post('update', ' CourseController@update');
    Route::post('delete', 'CourseController@delete');
    Route::get('get', 'CourseController@index');
    Route::get('all', 'CourseController@getAllCourses');
    Route::get('getCoursesByDepartmentId', 'CourseController@getCoursesByDepartmentId');
});

//? 7==>================= Message ====================
Route::group(['prefix' => 'message', 'namespace' => 'Api\Message'], function () {

    Route::post('add', 'MessageController@store');
    Route::post('update', 'MessageController@update');
    Route::post('delete', 'MessageController@delete');
    Route::get('get', 'MessageController@index');
    Route::get('getMessagesByChatId', 'MessageController@getMessagesByChatId');
    Route::delete('deleteMessageById', 'MessageController@deleteMessageById');
});

//? 8==>================= Admin ====================
Route::group(['prefix' => 'admin', 'namespace' => 'Api\Auth'], function () {

    Route::post('update', 'AdminController@update');
    Route::post('delete', 'AdminController@delete');
    Route::get('get', 'AdminController@index');
    Route::post('login', 'AdminController@login');
});

//? 9==>================= classroom ====================
Route::group(['prefix' => 'classroom', 'namespace' => 'Api\Classroom'], function () {

    Route::post('add', 'ClassroomController@store');
    Route::post('update', 'ClassroomController@update');
    Route::post('delete', 'ClassroomController@delete');
    Route::get('get', 'ClassroomController@index');
    Route::get('getClassroomsByDepartmentId', 'ClassroomController@getClassroomsByDepartmentId');
    Route::get('getCourseNameByClassroomId', 'ClassroomController@getCourseNameByClassroomId');
    Route::get('getClassroomByLecturerId', 'ClassroomController@getClassroomByLecturerId');
});
//? 10==>================= post ====================
Route::group(['prefix' => 'post', 'namespace' => 'Api\Post'], function () {

    Route::post('add', 'PostController@store');
    Route::post('update', 'PostController@update');
    Route::get('getAll', 'PostController@getAllPosts');
    Route::get('student', 'PostController@getPostsByStudentId');
    Route::get('lecturer', 'PostController@getPostsByLecturerId');
    Route::get('student-affairs', 'PostController@getPostsByStudentAffairsId');
    Route::get('getpostbyid', 'PostController@getPostsAndNameByStudentIdOrStudentAffairsIdOrLecturerId');
    Route::get('{getpost/student_affair', 'PostController@getPostsByStudentAffairsId');
    Route::delete('delete/student', 'PostController@deletePostByIdAndStudentId');
    Route::delete('deletebystudentid', 'PostController@checkStudentIsPostStudentAndDelete');
    Route::delete('deletebylecturerid', 'PostController@checkLecturerIsPostLecturerAndDelete');
    Route::delete('deletebystudentaffairsid', 'PostController@checkStudentAffairsIsPostStudentAffairsAndDelete');
});
//? 11==>================= comment ====================
Route::group(['prefix' => 'comment', 'namespace' => 'Api\Post'], function () {

Route::post('add', 'CommentController@store');
Route::post('update', 'CommentController@update');
Route::post('delete', 'CommentController@delete');
Route::get('get', 'CommentController@index');
Route::get('getCommentsByPostId/{post_id}', 'CommentController@getCommentsByPostId');
});
//? 12==>================= reply comment ====================
Route::group(['prefix' => 'reply-comment', 'namespace' => 'Api\Post'], function () {

Route::post('add', 'ReplyCommentController@store');
Route::post('update', 'ReplyCommentController@update');
Route::post('delete', 'ReplyCommentController@delete');
Route::get('get', 'ReplyCommentController@index');
});
//? 13==>================= quiz ====================
Route::group(['prefix' => 'quiz', 'namespace' => 'Api\Quiz'], function () {

Route::post('add', 'QuizController@store');
Route::post('update', 'QuizController@update');
Route::post('delete', 'QuizController@delete');
Route::get('get', 'QuizController@index');
});
//? 14==>================= question ====================
Route::group(['prefix' => 'question', 'namespace' => 'Api\Quiz'], function () {

    Route::post('add', 'QuestionController@store');
    Route::post('update', 'QuestionController@update');
    Route::post('delete', 'QuestionController@delete');
    Route::get('get', 'QuestionController@index');
    Route::get('getQuestionsByQuizId', 'QuestionController@getQuestionsByQuizId');
    Route::get('getQuestionsByQuizIdAndLecturerId', 'QuestionController@getQuestionsByQuizIdAndLecturerId');
});

//? 15==>================= rating ======================
Route::post('/rating/add', 'RatingController@store')->namespace('Api\Quiz');
