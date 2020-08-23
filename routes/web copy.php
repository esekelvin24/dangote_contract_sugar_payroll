<?php

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
    return view('auth.login');
    //return view('welcome');
    //return view('index.index');
});

Auth::routes();

Route::group(['middleware'=>['auth']], function(){

   // Route::get('/d', 'Index\Index@index')->name('00~/index');
   Route::get('/change-password/{user_id}', 'Dashboard\UserListController@change_password')->name('7~/change-password');//menu_id~menu_name
   Route::post('/save_reset_credentials/{user_id}', 'Dashboard\UserListController@save_reset_credentials')->name('7~/save_user_credentials');
   Route::get('/get-designation-salary/{designation_id}/{category_id}', 'Staff\DepartmentController@get_desig_salary')->name('8~/get-designation-salary/');
   Route::get('/get-lga-list/{state_id}', 'Staff\StaffController@get_lga_list')->name('8~get-lga-list/');
   Route::get('/department-designation-list/{category_id}/{department_id}', 'Staff\DepartmentController@department_designation_list')->name('14~/department_designation_list');
   
   Route::get('/get-dashboard-content', 'Dashboard\DashboardController@get_dashboard_barchart')->name('14~/get-dashboard-content');
   
   Route::group(['middleware'=>['admin']], function(){

       

        Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('7~/dashboard');//menu_id~menu_name
        Route::get('/menu-list', 'Dashboard\MenuListController@index')->name('1~/menu-list');//menu_id~menu_name
        Route::get('/menu-list/delete/{id}','Dashboard\MenuListController@deleteAllPermanently')->name('1~/menu-list-delelte');
        Route::get('/user-list', 'Dashboard\UserListController@index')->name('1~/user-list');//menu_id~menu_name
        Route::get('/user-list-info/{id}', 'Dashboard\UserListController@userlist_info')->name('1~/user-list-info');//menu_id~menu_name
        Route::get('/user-list/delete/{id}', 'Dashboard\UserListController@deleteAllPermanently')->name('1~/user-list-delete');//menu_id~menu_name
        Route::get('user-list/new-user', 'Dashboard\UserListController@new_user')->name('1~/new-user');//menu_id~menu_name

        
        
        Route::get('/profile-update', 'Dashboard\UserListController@profile_update')->name('1~/profile-update');


        Route::get('/profile', 'Dashboard\UserListController@profile')->name('1~/profile');//menu_id~menu_name

        Route::post('/profile/edit/save', 'Dashboard\UserListController@profile_edit_save')->name('1~/profile/edit/save');//menu_id~menu_name
        
        Route::post('/user-list/new-user/save', 'Dashboard\UserListController@store')->name('1~/new-user-store');//menu_id~menu_name
        Route::get('/role-list', 'Dashboard\RoleListController@index')->name('1~/role-list');//menu_id~menu_name
        Route::get('/role-list/delete/{id}', 'Dashboard\RoleListController@index')->name('1~/role-list-delete');//menu_id~menu_name

        Route::post('/edit-staff/save/{staff_id}', 'Staff\StaffController@store_edit')->name('11~/edit-staff/save');//menu_id~menu_name
        Route::post('/new-staff/save', 'Staff\StaffController@new_staff_save')->name('11~/new-staff/save');//menu_id~menu_name
        Route::get('/staff-list/new-staff', 'Staff\StaffController@new_staff')->name('11~/staff-list/new-staff');//menu_id~menu_name

        Route::get('/edit-staff/{staff_id}', 'Staff\StaffController@edit_staff')->name('11~/edit-staff');//menu_id~menu_name
        
        
        Route::get('/department-list/{op}/{id}', 'Staff\DepartmentController@create_new')->name('14~/department-list/update');//menu_id~menu_name
        Route::get('/department-list-delete/{id}','Staff\DepartmentController@deleteAllPermanently')->name('14~/department-list-delete');
        Route::post('/department-list/save', 'Staff\DepartmentController@save')->name('14~/department-list/create-new');//menu_id~menu_name

        Route::get('/department-list', 'Staff\DepartmentController@index')->name('14~/department-list');//menu_id~menu_name
        Route::get('/section-list/{department_id}', 'Staff\DepartmentController@section_list')->name('15~/section_list');
        Route::get('/department-salary-designation-list/{department_id}', 'Staff\DepartmentController@department_salary_designation_list')->name('14~/department_salary_designation_list');
        

        
        Route::get('/designation-list/{op}/{id}', 'Staff\DesignationController@create_new')->name('14~/designation-list/update');//menu_id~menu_name
        Route::get('/designation-list', 'Staff\DesignationController@index')->name('14~/designation-list');//menu_id~menu_name
        Route::get('/designation-list-delete/{id}','Staff\DesignationController@deleteAllPermanently')->name('14~/designation-list-delete');
        Route::post('/designation-list/save', 'Staff\DesignationController@save')->name('14~/designation-list/create-new');//menu_id~menu_name
        
        Route::get('/designation-salary-list', 'Staff\DesignationSalaryController@index')->name('14~/designation-salary-list');//menu_id~menu_name
        Route::get('/designation-salary-list/{op}/{id}', 'Staff\DesignationSalaryController@designation_salary_create')->name('14~/designation-salary-list/add-new');//menu_id~menu_name
        Route::get('/designation-salary-list-delete/{id}','Staff\DesignationSalaryController@deleteAllPermanently')->name('14~/designation-salary-list-delete');
        Route::post('/designation-salary/save', 'Staff\DesignationSalaryController@save')->name('14~/designation-salary-list/create-new');//menu_id~menu_name
        

        Route::get('/category-list/{op}/{id}', 'Staff\CategoryController@create_new')->name('14~/category-list/update');//menu_id~menu_name
        Route::post('/category-list/save', 'Staff\CategoryController@save')->name('14~/category-list/create-new');//menu_id~menu_name
        Route::get('/category-list', 'Staff\CategoryController@index')->name('14~/category-list');//menu_id~menu_name
        Route::get('/category-list-delete/{id}','Staff\CategoryController@deleteAllPermanently')->name('14~/category-list-delete');
        Route::get('/category-list/create-new', 'Staff\CategoryController@create_new')->name('14~/category-list/create-new');//menu_id~menu_name
        
        
        Route::get('/approve-staff/{staff_id}', 'Staff\StaffController@approve_staff')->name('11~/staff_id');//menu_id~menu_name
        Route::get('/approve-staff-list', 'Staff\StaffController@approve_staff_list')->name('11~/staff-list');//menu_id~menu_name
        Route::get('/staff-list', 'Staff\StaffController@index')->name('11~/staff-list');//menu_id~menu_name
        Route::get('/staff-list-info/{staff_id}', 'Staff\StaffController@staff_list_info')->name('11~/staff-list-info');//menu_id~menu_name
        Route::get('/staff-list/change-status/{staff_id}', 'Staff\StaffController@change_staff_status')->name('11~/change-status/');
        
       
        Route::post('/time-sheet/print', 'Staff\StaffTimeSheetController@time_sheet_print')->name('15~/time-sheet/print');//menu_id~menu_name
        Route::get('/print-time-sheet', 'Staff\StaffTimeSheetController@time_sheet_create')->name('15~/print-time-sheet');//menu_id~menu_name
        Route::get('/capture-time-sheet-list/create/{op}', 'Staff\StaffTimeSheetController@time_sheet_create_new')->name('15~/time-sheet-list/capture');//menu_id~menu_name
        
        Route::post('/time-sheet-list/save/new', 'Staff\StaffTimeSheetController@timesheet_list_save_new')->name('15~/time-sheet-list/save/new');//menu_id~menu_name
        Route::get('/time-sheet-staff-list/{sheet_id}', 'Staff\StaffTimeSheetController@time_sheet_staff_list')->name('15~/time-sheet-staff-list');//menu_id~menu_name
       
        Route::get('/time-sheet-list/create/{op}', 'Staff\StaffTimeSheetController@time_sheet_create')->name('15~/time-sheet-list/create');//menu_id~menu_name
        Route::get('/capture-time-sheet', 'Staff\StaffTimeSheetController@capture_time_sheet')->name('15~/capture-time-sheet');//menu_id~menu_name
        Route::get('/time-sheet-list/{shee_id}/add-timesheet-record', 'Staff\StaffTimeSheetController@add_timesheet_record')->name('15~/add-timesheet-record');
        Route::post('/time-sheet-list/{sheet_id}/save-timesheet-record', 'Staff\StaffTimeSheetController@save_timesheet_record')->name('15~/save-timesheet-record');
       
        
        Route::get('/payroll-list/{payroll_id}/update', 'Staff\PayrollController@update_payroll')->name('20~/payroll-list/update');
        Route::get('/departmental-payroll-list', 'Staff\PayrollController@departmental_payroll_list')->name('20~/departmental-payroll-list');
        Route::get('/payroll-generation/create', 'Staff\PayrollController@create')->name('20~/payroll-generation/create');//menu_id~menu_name
        Route::post('/payroll-generation/save', 'Staff\PayrollController@create_monthly_payroll')->name('20~/payroll-generation/save');//menu_id~menu_name
        Route::post('/payroll-generation/get-avail-dept', 'Staff\PayrollController@avail_dept')->name('20~/payroll-generation/avail-date');//menu_id~menu_name
        Route::post('/payroll-list/save-payroll-staff-record/{sheet_id}', 'Staff\PayrollController@save_payroll_staff_record')->name('20~/payroll-generation/save-staff-record');//menu_id~menu_name
        
       Route::get('/payroll-list/payroll-id/{payroll_id}', 'Staff\PayrollController@payroll_list_by_payroll_id')->name('20~/payroll-list-payroll_id');//menu_id~menu_name
       Route::get('/payroll-list/payroll-id/{payroll_id}/staff/{staff_payroll_cat_id}', 'Staff\PayrollController@payroll_list_by_payroll_id_staff_id')->name('20~/payroll-list-payroll_id_staff_id');//menu_id~menu_name
       

       //casual staff
       Route::get('/payroll-list-casual/payroll-id/{payroll_id}', 'Staff\PayrollController@payroll_list_casual_by_payroll_id')->name('20~/payroll-list-payroll_id');//menu_id~menu_name
      
       Route::get('/approve-monthly-payroll', 'Staff\PayrollController@approve_monthly_payroll')->name('20~/approve-monthly-payroll');
       

      


    });

    Route::get('/not-authorized', 'Dashboard\DashboardController@notauthorize')->name('/not-authorized');

    Route::get('/staff-table-migration-script', 'Dashboard\DashboardController@new_migration')->name('1~/migration');//only run this to migrate staff to a new 


});
       

