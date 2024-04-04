<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\pppPostController;
use App\Http\Controllers\Api\pppCategory;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;

Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

Route::get('tasks',[TaskController::class,'index']);
Route::post('tasks/',[TaskController::class,'store']);
Route::put('tasks/update/{id}',[TaskController::class,'update']);
Route::delete('tasks/{id}',[TaskController::class,'destroy']);

//-------------------------------------
Route::get('pppposts',[pppPostController::class,'index']);
Route::get('ppppostsreverse',[pppPostController::class,'indexreverse']);
Route::delete('pppposts/{id}',[pppPostController::class,'destroy']);
Route::post('pppposts/',[pppPostController::class,'store']);
Route::put('pppposts/update/{id}',[pppPostController::class,'update']);
Route::get('ppppost/{id}', [pppPostController::class, 'getPost']);
Route::put('/pppposts/{id}/upvote', [pppPostController::class, 'upvote']);
Route::put('/pppposts/{id}/downvote', [pppPostController::class, 'downvote']);

Route::get('pppcategories',[pppCategory::class,'index']);

Route::delete('user/{id}',[UserController::class,'destroy']); 
Route::get('avatar/{id}',[UserController::class,'getAvatar']);
Route::get('id',[UserController::class,'getID']);


//-----------------------------------------


Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('users', UserController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('roles', RoleController::class);
    //Route::apiResource('exercises', ExerciseController::class);
    Route::post('exercises/', [ExerciseController::class,'store']); //Guardar
    Route::get('exercises', [ExerciseController::class,'index']); //Listar
    Route::get('exercises/{exercise}', [ExerciseController::class,'show']); //Mostrar
    Route::post('exercises/update/{id}', [ExerciseController::class,'update']); //Editar

    Route::get('role-list', [RoleController::class, 'getList']);
    Route::get('role-permissions/{id}', [PermissionController::class, 'getRolePermissions']);
    Route::put('/role-permissions', [PermissionController::class, 'updateRolePermissions']);
    Route::apiResource('permissions', PermissionController::class);
    Route::get('category-list', [CategoryController::class, 'getList']);
    Route::get('/user', [ProfileController::class, 'user']);
    Route::put('/user', [ProfileController::class, 'update']);

    Route::get('abilities', function(Request $request) {
        return $request->user()->roles()->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name')
            ->unique()
            ->values()
            ->toArray();
    });
});


Route::get('category-list', [CategoryController::class, 'getList']);
Route::get('get-posts', [PostController::class, 'getPosts']);
Route::get('get-category-posts/{id}', [PostController::class, 'getCategoryByPosts']);
Route::get('get-post/{id}', [PostController::class, 'getPost']);
