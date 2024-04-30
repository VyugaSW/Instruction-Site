<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\ComplainController;
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

Route::get('/', [AppController::class, 'home']);
Route::get('/home', [AppController::class, 'home']);

Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration/check', [UserController::class, 'registration_check']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/unlogin', [UserController::class, 'unlogin']);

Route::get('/profile', [UserController::class, 'profile']);
Route::get('/profile/getworks/ajax', [InstructionController::class, 'getWorksByApproval']);
Route::get('/profile/changeavatar/ajax', [UserController::class, 'changeAvatar']);
Route::post('/profile/changeavatar/ajax/check', [UserController::class, 'changeAvatar_check']);

Route::get('/createInstruction',[InstructionController::class, 'createInstruction']);
Route::post('/createInstruction/check',[InstructionController::class, 'createInstruction_check']);

Route::get('/instruction',[InstructionController::class, 'pageInstruction']);
Route::get('/instruction/complain',[ComplainController::class,'showComplains']);
Route::get('/instruction/complain/ajax',[ComplainController::class,'handleComplain']);
Route::get('/instruction/showimage',[InstructionController::class,'showImage']);
Route::post('/instruction/changeApproval',[InstructionController::class,'changeApproval']);
Route::get('/instruction/deleteConfirm',[InstructionController::class,'showDeleteConfimation']);
Route::post('/instruction/delete',[InstructionController::class,'deleteInstruction']);

Route::get('/search',[InstructionController::class,'showSearch']);
Route::get('/search/request',[InstructionController::class,'search']);

Route::get('/complains',[InstructionController::class,'instructionComplains']);
Route::post('/complains/clear',[ComplainController::class,'complainClear']);

Route::get('/user',[UserController::class, 'userPage']);
Route::post('/user/block',[UserController::class, 'blockUser']);
Route::post('/user/unblock',[UserController::class, 'unblockUser']);

Route::get('/approving',[InstructionController::class, 'instructionApproving']);
Route::get('/approving/get',[InstructionController::class, 'search']);
Route::get('/approving/request',[InstructionController::class, 'search']);

Route::get('/usersFind',[UserController::class, 'getUsers']);







