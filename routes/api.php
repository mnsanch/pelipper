<?php

use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\chatController;
use App\Http\Controllers\Api\commentsController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;

Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

//-------------------------------------
Route::get('posts',[PostController::class,'index']);
Route::get('postsreverse',[PostController::class,'indexreverse']);
Route::get('postsmasupvote',[PostController::class,'indexpositivo']);
Route::get('postsmasdownvote',[PostController::class,'indexnegativo']);
Route::get('postsmasodiado',[PostController::class,'indexodiado']);
Route::get('postsmasvotado',[PostController::class,'indexvotado']);
Route::delete('posts/{id}',[PostController::class,'destroy']);
Route::post('posts/',[PostController::class,'store']);
Route::post('posts/update/{id}',[PostController::class,'update']);
Route::get('post/{id}', [PostController::class, 'getPostedit']);
Route::get('postuser/{id}', [PostController::class, 'getPost']);
Route::put('/posts/{id}/upvote', [PostController::class, 'upvote']);
Route::put('/posts/{id}/downvote', [PostController::class, 'downvote']);
Route::put('/posts/{id}/quitarupvote', [PostController::class, 'quitarupvote']);
Route::put('/posts/{id}/quitardownvote', [PostController::class, 'quitardownvote']);
Route::get('posts/{id}',[PostController::class,'indexusuario']);


Route::get('categories',[CategoryController::class,'index']);
Route::post('categories/',[CategoryController::class,'store']);
Route::get('categories/{id}',[CategoryController::class,'category']);
Route::put('categories/update/{id}',[CategoryController::class,'update']);
Route::delete('categories/delete/{id}',[CategoryController::class,'destroy']);

Route::delete('deleteuser/{id}',[UserController::class,'destroy']); 
Route::get('avatar/{id}',[UserController::class,'getAvatar']);
Route::get('id',[UserController::class,'getID']);

Route::get('comments',[commentsController::class,'index']);
Route::post('comments/{id}',[commentsController::class,'store']);
Route::get('commentspost/{id}',[commentsController::class,'commentspost']);
Route::delete('comment/{id}',[commentsController::class,'destroy']);




//-----------------------------------------


Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::get('chat/{id}',[chatController::class,'getchat']);
    Route::post('chat/',[chatController::class,'store']);
    Route::get('userchat/{id}',[chatController::class,'getalluserchat']);
    

    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
    //Route::apiResource('exercises', ExerciseController::class);

    Route::get('role-list', [RoleController::class, 'getList']);
    Route::get('role-permissions/{id}', [PermissionController::class, 'getRolePermissions']);
    Route::put('/role-permissions', [PermissionController::class, 'updateRolePermissions']);
    Route::apiResource('permissions', PermissionController::class);
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


