<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CaptchaServiceController;

use App\Http\Controllers\LecturerComplaints;
use App\Http\Controllers\StudentComplaint;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLecturerComplaints;
use App\Http\Controllers\UserStudentComplaints;
use App\Models\Lecturer;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware'=>'admin'], function(){
Route::resource('admin/student', StudentComplaint::class);
Route::resource('admin/lecturer', LecturerComplaints::class);
Route::resource('admin/user', UserController::class);
});

Route::get('admin')->uses([AdminController::class, 'index'])->name('admin.home')->middleware('admin');
//Route::resource('admin/student', ([StudentComplaint::class, 'index']));
Route::group(['middleware'=>'auth'], function(){
Route::resource('UserLecturer', UserLecturerComplaints::class);
Route::resource('UserStudent', UserStudentComplaints::class);
});
Route::get('/logout', function (){
    if(Auth::check()){
        Auth::logout();
        return redirect('/login');
    }else{
        return redirect('/login');
    }
});
//Route::get('admin/student')->uses([StudentComplaint::class, 'index'])->name('student.home');
//Route::get('admin/lecturer')->uses([LecturerComplaints::class, 'index'])->name('lecturer.home');
//Route::get('student')->uses([StudentComplaint::class, 'create'])->name('student.create');
//Route::get('lecturer')->uses([LecturerComplaints::class, 'create'])->name('lecturer.create');
//Route::post('student/store')->uses([StudentComplaint::class, 'store'])->name('student.store');
//Route::post('lecturer/store')->uses([LecturerComplaints::class, 'store'])->name('lecturer.store');

Route::get('/', function () {
    if(Auth::check()){
        $user = Auth::user();
        $students = $user->results;
        $lecturers = $user->lecturers;
        return view('index', compact('students', 'lecturers'));
    }
    return view('auth.register');
})->name('register');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/adminRegister', function () {
    return view ('auth.adminRegister');
})->name('admin.register');
Route::get('/lecturerRegister', function () {
    return view ('auth.lecturerRegister');
})->name('lecturer.register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'captchaFormValidate']);
Route::get('/reload-captcha', [RegisterController::class, 'reloadCaptcha']);
