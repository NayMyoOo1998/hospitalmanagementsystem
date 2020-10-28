<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PatientController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin 
Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/add-type', [AdminController::class, 'addTypeCreate']);
    Route::post('/add-type', [AdminController::class, 'addTypeStore']);
    Route::get('/type-list', [AdminController::class, 'showTypeList']);
    Route::get('/typeDataTypeModal', [AdminController::class, 'typeDataTypeModal']);
    Route::post('/typeDataTypeModal', [AdminController::class, 'typeUpdate']);
    Route::get("/typeDelete/{id}", [AdminController::class, 'typeDelete']);


    Route::get('/add-group', [AdminController::class, 'addGroupCreate']);
    Route::post('/add-group', [AdminController::class, 'addGroupStore']);
    Route::get('/group-list', [AdminController::class, 'showGroupList']);
    Route::get('/groupTakeModal', [AdminController::class, 'groupTakeModal']);
    Route::post('/groupTakeModal', [AdminController::class, 'groupUpdate']);
    Route::get('/groupDelete/{id}', [AdminController::class, 'groupDelete']);

    Route::get('/add-blood-type', [AdminController::class, 'addBloodType']);
    Route::post('/add-blood-type', [AdminController::class, 'bloodTypeStore']);
    Route::get('/blood-list', [AdminController::class, 'showBloodList']);
    Route::get('/blood-edit', [AdminController::class, 'bloodTakeModal']);
    Route::post('/blood-edit', [AdminController::class, 'bloodUpdate']);
    Route::get('/blood-delete/{id}', [AdminController::class, 'bloodDelete']);

    Route::get('/education', [AdminController::class, 'education']);
    Route::post('/education', [AdminController::class, 'addEducation']);
    Route::get('/designation',[AdminController::class, 'designation']);
    Route::post('/designation',[AdminController::class, 'addDesignation']);
    Route::get('/speciality', [AdminController::class, 'speciality']);
    Route::post('/speciality', [AdminController::class, 'addSpeciality']);
    Route::get('/specialityEdit', [AdminController::class, 'specialityEdit']);
    Route::post('/specialityEdit', [AdminController::class, 'specialityUpdate']);
    Route::get('/specialityDelete/{id}', [AdminController::class, 'specialityDelete']);
});

Route::get('/', [PageController::class, 'index']);

Route::get('profile/{profile}', [PageController::class, 'show'])->middleware('auth');
Route::post('/profileEdit', [PageController::class, 'profileEdit'])->middleware('auth');
Route::post('/changeUserPassword', [PageController::class, 'changeUserPassword'])->middleware('auth');

Route::post('/userAddEducation', [PageController::class, 'userAddEducation'])->middleware('auth');
Route::get('/userEducationDelete/{user_id}/{education_id}', [PageController::class, 'userEducationDelete'])->middleware('auth');

Route::post('/userAddDesignation',[PageController::class, 'userAddDesignation'])->middleware('auth');
Route::get('/userDesignationDelete/{user_id}/{designation_id}', [PageController::class, 'userDesignationDelete'])->middleware('auth');

Route::post('/userAddSpeciality', [PageController::class, 'userAddSpeciality'])->middleware('auth');
Route::get('/userSpecialityDelete/{user_id}/{speciality_id}', [PageController::class, 'userSpecialityDelete'])->middleware('auth');

Route::get('/doctor-list', [PageController::class, 'showDoctor'])->middleware('auth');
Route::get('/lab-list', [PageController::class, 'showLab'])->middleware('auth');

// Patients 
Route::get('/add-patient', [PatientController::class, 'create'])->middleware('isDoctor');
Route::post('/add-patient', [PatientController::class, 'store'])->middleware('isDoctor');
Route::get('/patient-list', [PatientController::class, 'index']);
Route::get('/patientDataTakeModal', [PatientController::class, 'edit'])->middleware('isDoctor');
Route::post('/patientDataTakeModal', [PatientController::class, 'update'])->middleware('isDoctor');
Route::get('/patient-delete/{patient_id}', [PatientController::class, 'destroy']);
Route::get('/deleted-patient-list', [PatientController::class, 'showDeletedPatient']);
