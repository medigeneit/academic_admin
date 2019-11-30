<?php

use Yajra\Datatables\Datatables;

Route::get('/serverSide', [
    'as'   => 'serverSide',
    'uses' => function () {
        $users = App\Data::all();
        return Datatables::of($users)->make();
    }
]);




Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


Route::resource('users', 'UsersController');
Route::get('profile/{id}', 'UsersController@show');
Route::get('profile-edit/{id}', 'UsersController@profile_edit');
Route::post('profile-update', 'UsersController@profile_update');


Route::resource('roles', 'RolesController');
Route::resource('permissions', 'PermissionsController');

Route::get('password/change/{id}', 'UsersController@password_change');
Route::post('password/change', 'UsersController@password_update');

Route::resource('employees', 'EmployeesController');
Route::get("more-info/{id}","UsersController@users_more_info");
Route::post("more-info","UsersController@users_more_info_update");


Route::resource('institution', 'InstitutionController');
Route::resource('classes', 'ClassesController');
Route::resource('institution-type', 'InstitutionTypeController');
Route::resource('subjects', 'SubjectsController');
Route::resource('institution-category', 'InstitutionCategoryController');
Route::resource('departments', 'DepartmentsController');
Route::resource('level-year', 'LevelYearController');
Route::resource('writers', 'WritersController');
Route::resource('content-type', 'ContentTypeController');
Route::resource('skill-development-category', 'SkillDevelopmentCategoryController');

Route::resource('standarized-tests', 'StandarizedTestsController');
Route::resource('locations', 'LocationsController');
Route::resource('job-exam-subject', 'JobExamSubjectController');
Route::resource('job-exam', 'JobExamController');



Route::resource('university', 'UniversityController');



Route::resource('contents', 'ContentsController');
Route::resource('school-college', 'SchoolCollegeController');
Route::resource('madrasha', 'MadrashaController');
Route::resource('english-medium', 'EnglishMediumController');
Route::resource('english-version', 'EnglishVersionController');
Route::resource('qawmi', 'QawmiController');
Route::resource('technical-vocational', 'TechnicalVocationalController');
Route::resource('admission-test', 'AdmissionTestController');
Route::resource('under-graduate', 'UnderGraduateController');
Route::resource('post-graduate', 'PostGraduateController');

Route::resource('country', 'CountryController');
Route::resource('state', 'StateController');
Route::resource('city', 'CityController');
Route::resource('higher-study', 'HigherStudyController');

Route::resource('job', 'JobController');
Route::resource('skill-development', 'SkillDevelopmentController');

Route::resource('approve', 'ApproveController');


Route::resource('pages', 'PagesController');
Route::resource('blogs', 'BlogsController');
Route::resource('useful-higher-education', 'UsefulHigherEducationController');
Route::resource('job-circular', 'JobCircularController');
Route::resource('feedback', 'FeedbackController');








Route::get('system-settings', 'SettingsController@system_settings');
Route::post('system-settings', 'SettingsController@system_settings_update');





/*message*/

Route::get('message-show/{id}',"MessageController@message_show");
Route::post("message-assign","MessageController@message_assign");

/*ajax*/

Route::post('class-subject', 'AjaxController@class_subject');
Route::post('institute-type-class', 'AjaxController@institute_type_class');
Route::post('institute-category-institute', 'AjaxController@institute_category_institute');
Route::post('institute-category-institute-subject', 'AjaxController@institute_category_institute_subject');
Route::post('institute-department-level', 'AjaxController@institute_department_level');

Route::post('institute-subject', 'AjaxController@institute_subject');
Route::post('job-exam-subject', 'AjaxController@job_exam_subject');

Route::post('content-type-content', 'AjaxController@content_type_content');

Route::post('country-state', 'AjaxController@country_state');
Route::post('state-city', 'AjaxController@state_city');












// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


