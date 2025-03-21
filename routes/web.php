<?php

use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\client\StudentController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/cart', [CartController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/lien-he', [BlogController::class, 'lienhe']);
Route::get('/ct/{id}', [BlogController::class, 'lay1tin']);

Route::get('/info-student', [StudentController::class, 'index']);


Route::get('/posts', function () {
    $query = DB::table('posts')
        ->select('id', 'name', 'view')
        ->orderBy('view', 'desc')
        ->limit(10);
    $data = $query->get();
    echo "<h1>Tin xem nhiều</h1>";
    foreach ($data as $post) {
        echo "<p>{$post->name}</p>";
    }
});

Route::get('/posts-new', function () {
    $query = DB::table('posts')
        ->select('id', 'name', 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(10);
    $data = $query->get();
    return view('client.blog.posts-new', ['data' => $data]);
});

Route::get('/posts-in-category/{id}', function ($id) {
    $category = DB::table('post_categories')
    ->where('id', '=', $id)
    ->first();

    $data = DB::table('posts')
        ->select('id', 'name', 'content')
        ->where('category_id', '=', $id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('client.blog.posts-in-category', [
        'data' => $data,
        'category' => $category
    ]);
});


Route::get('posts/{id}', function ($id) {
    $post = DB::table('posts')
        ->where('id', '=', $id)
        ->first();
    return view('client.blog.post-detail', ['post' => $post]);
});

//Tìm hiểu cái pluck

//Đếm số lượng sinh viên của mỗi khoa
Route::get('/departments', function () {
    $query = DB::table('departments')
        ->leftJoin('students', 'departments.id', '=', 'students.department_id')
        ->select('departments.id', 'departments.name', DB::raw('COUNT(students.id) as so_luong_sinh_vien'))
        ->groupBy('departments.id', 'departments.name')
        ->get();
    foreach ($query as $department) {
        echo "<p>{$department->name} - {$department->so_luong_sinh_vien}</p>";
    }
});

//Danh sách sinh viên cho biết sinh viên thuộc khoa nào
Route::get('/students', function () {
    $query = DB::table('students')
        ->leftJoin('departments', 'departments.id', '=', 'students.department_id')
        ->select('students.name', 'departments.name as department_name')
        ->get();
    foreach ($query as $student) {
        echo "<p>{$student->name} - {$student->department_name}</p>";
    }
});
