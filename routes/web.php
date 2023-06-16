<?php

use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Agent\AgentDataConroller;
use App\Http\Controllers\Agent\AgentLoginController;
use App\Http\Controllers\Auth\LoginController;
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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

    //Login Route 
    Route::get('login', [LoginController::class, 'sign_in'])->name('login');
    Route::post('adminLogin', [LoginController::class, 'adminLogin'])->middleware('web');

    // Logout Admin Route
    Route::get('logout', function () {
        session()->forget('user_name');
        return redirect()->route('login');
    });

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// ==========Category Route ==========

Route::controller(CategoryController::class)->group(function () {
    Route::get('admin/category', 'index');
    Route::get('admin/add-category', 'addCategoryFrom');
    Route::post('saveCategory', 'saveCategory');
    Route::get('admin/edit-category/{id}', 'editcategoryFrom');
    Route::post('admin/editCategory', 'editCategory');
    Route::get('admin/delCategory/{cid}', 'deleteCategory');
});

// =======User Route ========
Route::controller(userController::class)->group(function () {
    Route::get('user', 'index');
    Route::get('user', 'userData');
    Route::get('admin/userview/{id}', 'userView')->name('user.view');
    Route::get('admin/userDelete/{uid}', 'userdelete');
});

// ===== Agent Route =====
Route::controller(AgentController::class)->group(function () {
    Route::get('admin/agent', 'index')->name('basic.agent');
    Route::get('admin/add-agent', 'agentFrom');
    Route::post('save-agent', 'insertAgent');
    Route::get('admin/edit-agent/{id}', 'agenteditForm');
    Route::post('admin/editAgent', 'editAgent');
    Route::get('admin/delete-agent/{aid}', 'agentdelete');
    Route::get('agent-block/{id}', 'agentBlock');
    Route::get('agent-active/{id}', 'agentActive');
    Route::get('admin/agent/assignedLead', 'assigendLead');

    // Multiple Lead Assign Route
    Route::post('admin/lead-assign','leadAssign')->name('lead.assign');

    // Filter Loan Status
    Route::get('admin/filterStatus','filterStatus')->name('filter.status');
});


Route::get('agent/login', [AgentLoginController::class, 'index'])->name('agent.login');
Route::post('agent/login', [AgentLoginController::class, 'agentLogin'])->middleware('web');

// Logout Agent Route
Route::get('agent-logout', function () {
    session()->forget('agent');
    session()->forget('agent_id');
    return redirect()->route('agent.login');
});

// Route::get('agent/dashboard', function () {
//     return view('agent.dashboard');
// })->name('agent.dashboard');

Route::controller(AgentDataConroller::class)->group(function () {
    Route::get('agent/dashboard', 'agentDashboard')->name('agent.dashboard');
    Route::get('Agent/users', 'index')->name('users');
    Route::get('Agent/viewUser/{id}', 'viewUser');

    Route::post('agent/status_update','statusUpdate')->name('status.update');
    
});
