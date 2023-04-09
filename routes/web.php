<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeGroupController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MetaController;

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
    return view('welcome');
});
Route::post('/chang-password',[EmployeeController::class,'resetPassword'])->name('changePassword');

Route::get('/DocumentSystem/{EmpId}/ChoseGroup',[EmployeeController::class,'show_groups'])->name('ChoseGroup');

Route::post('custom-login', [EmployeeController::class, 'Login'])->name('login.custom');

Route::middleware(['GroupMiddleware','EmployeeMiddleware'])->group(function () {

Route::get('/DocumentSystem/{EmpId}/{group}/profile',[EmployeeController::class,'index'])->name('EmployeeProfile');
Route::get('/DocumentSystem/{EmpId}/{group}/AddDocumentType',function(){
    return view('employee.Documents.AddDocumentType');
})->name('AddDocumentType');
Route::get('/DocumentSystem/{EmpId}/{group}/{type}/AddDocument',[DocumentController::class,'index_adding_documents'])->name('AddDocument');
Route::post('adddocument',[DocumentController::class,'store'])->name('Add-Document');
Route::get('/DocumentSystem/{EmpId}/{group}/Documents/{type}',[DocumentController::class,'index'])->name('Documents');
Route::get('/DocumentSystem/{EmpId}/{group}/Documents/{type}/{documentgroup}',[DocumentController::class,'index_group'])->name('DocumentsGroup');
Route::get('/DocumentSystem/{EmpId}/{group}/Documents/{type}/{documentgroup}/{DocumentId}',[DocumentController::class,'show'])->name('DocumentShow');
Route::get('/DocumentSystem/{EmpId}/{group}/Documents/{type}/{DocumentId}/redirect',[DocumentController::class,'showRedirect'])->name('redirectPage');
});
//employee admin routes

Route::middleware(['EmployeeAdminMiddleware'])->group(function (){
    #to add employees with in the department
    Route::get('/DocumentSystem/{EmpId}/{group}/AddEmployees',[EmployeeAdminController::class,'showEmployeeForm'])->name('AddEmployee-EA');

});

Route::post('addemployee-ea',[EmployeeAdminController::class,'storeEmployees'])->name('Add-Employee-EA');
Route::get('/DocumentSystem/{EmpId}/{group}/Employees',[EmployeeAdminController::class,'showEmployees'])->name('Employees-EA');

//routes for Employee pages
Route::middleware('EmployeeMiddleware')->group(function(){
//Employee Routes

//Route::get('/profile',[EmployeeController::class,'index'])->name('EmployeeProfile');

//documets

//Route::get('/AddDocument',[DocumentController::class,'index_adding_documents'])->name('AddDocument');
Route::post('adddocument',[DocumentController::class,'store'])->name('Add-Document');
//Route::get('/Documents/{type}',[DocumentController::class,'index'])->name('Documents');
// Route::get('/Documents/{type}/{meta}',[DocumentController::class,'index_meta'])->name('DocumentsMeta');
// Route::get('/Document/{type}/{meta}/{id}',[DocumentController::class,'show'])->name('DocumentShow');

//Archiveng routes
Route::get('/AddArchiveType/{group}/{EmpId}',[ArchiveController::class,'index_type'])->name('AddArchiveType');
Route::get('/AddArchive/{type}',[ArchiveController::class,'show_form'])->name('AddArchiveForm');
Route::post('ArchiveDocument',[ArchiveController::class,'store'])->name('Add-Archive');
Route::get('/ArchivedDocuments/{type}',[ArchiveController::class,'index'])->name('ArchivedDocuments');
Route::get('/ArchivedDocuments/{type}/{meta}',[ArchiveController::class,'index_meta'])->name('ArchivedDocumentsMeta');

//metadata routes
Route::get('/Document/Meta/{id}',[MetaController::class,'show'])->name('MetaForm');
Route::post('documentmeta',[MetaController::class,'store_meta'])->name('Add-Document-Meta');

});

//routes for admin only pages
Route::middleware('AdminMiddleware')->group(function(){
Route::get('/admin',function(){ return view('admin.home');})->name('AdminPanel');

//the employee routes for showing and adding and editing

Route::get('/Employees',[EmployeeController::class,'index_admin'])->name('Employee');
Route::get('/AddEmployee',[AdminController::class,'showEmployeeForm'])->name('AddEmployee');
Route::post('addEmployees',[AdminController::class,'storeEmployees'])->name('Add-Employees');
Route::post('addemployee',[EmployeeController::class,'store'])->name('Add-Employee');
Route::get('/Employee/edit/{id}',[EmployeeController::class,'edit'])->name('EditEmployee');
Route::put('/editemployee/{id}',[EmployeeController::class,'update'])->name('Edit-Employee');

//the metadata routes

Route::get('/Meta',[MetaController::class,'index'])->name('Meta');
Route::get('/AddMeta',function(){return view('admin.AddMeta');})->name('AddMeta');
Route::post('addmeta',[MetaController::class,'store'])->name('Add-Meta');
Route::get('/Meta/edit/{id}',[MetaController::class,'edit'])->name('EditMeta');
Route::put('/editmeta/{id}',[MetaController::class,'update'])->name('Edit-Meta');

//the group routes
Route::get('/groups',[GroupController::class,'index'])->name('Group');
Route::get('/AddGroup',function(){return view('admin.AddGroup');})->name('AddGroup');
Route::post('addgroup',[GroupController::class,'store'])->name('Add-Group');
Route::get('/groups/edit/{id}', [GroupController::class, 'edit'])->name('EditGroup');
Route::put('/editgroup/{id}',[GroupController::class,'update'])->name('Edit-Group');

//the employee group routes

Route::get('/AddEmployeeGroup',[EmployeeGroupController::class,'index'])->name('AddEmployeeGroup');
Route::post('addemployeegorup',[EmployeeGroupController::class,'store'])->name('Add-EmployeeGroup');
});

Route::get('/login', function () {
    return view('AUTH.login');
});

