<?php
use App\Http\Controllers\activitylogController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\payrollController;
use App\Http\Controllers\employee_info_viewController;
use App\Http\Controllers\employee_infoController;
use App\Http\Controllers\employeedetailController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\employee_user_viewController;
use App\Http\Controllers\leavesController;
use App\Http\Controllers\paymentFrequencyController;
use App\Http\Controllers\qualificationsController;
use App\Http\Controllers\languagesController;
use App\Http\Controllers\languagesSetupController;
use App\Http\Controllers\certificatesController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\skillsController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\performanceController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\payrolluserController;
use App\Http\Controllers\leavesuserController;
use App\Http\Controllers\departmentuserController;



use Illuminate\Support\Facades\Route;


Route::get('/test-middleware', function () {
    return 'Middleware is working!';
})->middleware('check.user.role');
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::view('/inactive', 'inactive')->name('inactive');
require __DIR__ . '/auth.php';

//PUBLIC
Route::middleware('auth')->group(function () {

    //dashboard route

    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    //leave route
    Route::get('/leaves/create', [leavesController::class, 'create'])->name('leaves.create');


    //ATTENDANCE ROUTES
    Route::get('/attendance', [attendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/login', [attendanceController::class, 'login'])->name('attendance.login');
    Route::post('/attendance/logout', [attendanceController::class, 'logout'])->name('attendance.logout');
    Route::get('/attendance/history', [attendanceController::class, 'showAttendance'])->name('attendance.history');


    //DEPARTMENT ROUTES
    Route::get('/department/{id}/view', [departmentController::class, 'view'])->name('department.view');


    //PROFILE ROUTE
    Route::get('/profile', [employee_user_viewController::class, 'index'])->name('profile-information');
    //EMPLOYEE EXTENSION
    Route::get('/employees/create', [employeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', action: [employeeController::class, 'store'])->name('employees.store');

});


//ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {

    //EMPLOYEEE ROUTES
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employee', [employeeController::class, 'index'])->name('employees');
    Route::get('/employees/{id}/edit', [employeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}', [employeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}', [employeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::post('/employees/{id}/activate', [EmployeeController::class, 'activate'])->name('employees.activate');
    Route::post('/employees/{id}/deactivate', [EmployeeController::class, 'deactivate'])->name('employees.deactivate');
    Route::post('/employees/{id}/toggle-status', [EmployeeController::class, 'toggleStatus'])->name('employees.toggleStatus');


    //employee view button from index
    Route::get('/employeedetails/{id}', [employeedetailController::class, 'index'])->name('employees.details');

    //payroll
    Route::get('/payroll', [payrollController::class, 'index'])->name('payroll.index');
    Route::get('/payroll/create', [payrollController::class, 'create'])->name('payroll.create');
    Route::post('/payroll/store', [payrollController::class, 'store'])->name('payroll.store');
    Route::get('/payroll/{id}/edit', [payrollController::class, 'edit'])->name('payroll.edit');
    Route::put('/payroll/{id}', [payrollController::class, 'update'])->name('payroll.update');
    Route::delete('/payroll/{id}', [payrollController::class, 'delete'])->name('payroll.delete');

    //LEAVES ROUTES
    Route::get('/leaves', [leavesController::class, 'index'])->name('leaves.index');
    Route::post('/leaves', [leavesController::class, 'store'])->name('leaves.store');
    Route::get('/leaves/{leave}/edit', [leavesController::class, 'edit'])->name('leaves.edit');
    Route::put('/leaves/{leave}', [leavesController::class, 'update'])->name('leaves.update');
    Route::delete('/leaves/{leave}', [leavesController::class, 'destroy'])->name('leaves.destroy');
    Route::get('/leaves/{leave}', [leavesController::class, 'show'])->name('leaves.show');

    //DEPARTMENT ROUTES
    Route::get('/department', [departmentController::class, 'index'])->name('department.index');
    Route::get('/department/create', [departmentController::class, 'create'])->name('department.create');
    Route::post('/department', [departmentController::class, 'store'])->name('department.store');
    Route::get('/department/{id}/edit', [departmentController::class, 'edit'])->name('department.edit');
    Route::put('/department/{id}', [departmentController::class, 'update'])->name('department.update');
    Route::delete('/department/{id}', [departmentController::class, 'destroy'])->name('department.destroy');
    Route::get('/department/{id}/delete', [departmentController::class, 'showDeleteConfirmation'])->name('department.delete_confirmation');

    //SALARIES ROUTES
    Route::get('/salaries', [salaryController::class, 'index'])->name('salary');
    Route::post('/salaries', [salaryController::class, 'store'])->name('salaries.store');
    Route::get('/payment-frequencies', [paymentFrequencyController::class, 'index']);
    Route::get('/salary/{salary_id}', [SalaryController::class, 'show'])->name('salary.view');
    Route::get('/salary/{salary_id}/edit', [SalaryController::class, 'edit'])->name('salary.edit');
    Route::put('/salary/{salary_id}', [SalaryController::class, 'update'])->name('salary.update');
    Route::delete('/salaries/{salary_id}', [salaryController::class, 'destroy'])->name('salary.destroy');

    // Certificates Routes
    Route::get('/certificates', [certificatesController::class, 'index'])->name('certificates.index');
    Route::get('certificates/create', [certificatesController::class, 'create'])->name('certificates.create');
    Route::post('certificates', [certificatesController::class, 'store'])->name('certificates.store');
    Route::get('certificates/{certificate}', [certificatesController::class, 'show'])->name('certificates.show');
    Route::get('certificates/{certificate}/edit', [certificatesController::class, 'edit'])->name('certificates.edit');
    Route::put('certificates/{certificate}', [certificatesController::class, 'update'])->name('certificates.update');
    Route::delete('certificates/{certificate}', [certificatesController::class, 'destroy'])->name('certificates.destroy');

    // Education Routes
    Route::get('/education', [educationController::class, 'index'])->name('education.index');
    Route::get('/education/create', [educationController::class, 'create'])->name('education.create');
    Route::post('/education', [educationController::class, 'store'])->name('education.store');
    Route::get('/education/{education_id}', [educationController::class, 'show'])->name('education.show');
    Route::get('/education/{education_id}/edit', [educationController::class, 'edit'])->name('education.edit');
    Route::put('/education/{education_id}', [educationController::class, 'update'])->name('education.update');
    Route::delete('/education/{education_id}', [educationController::class, 'destroy'])->name('education.destroy');

    // Skills Routes
    Route::get('/skills', [skillsController::class, 'index'])->name('skills.index');
    Route::get('/skills/create', [skillsController::class, 'create'])->name('skills.create');
    Route::post('/skills', [skillsController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill_id}/edit', [skillsController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skill_id}', [skillsController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill_id}', [skillsController::class, 'destroy'])->name('skills.destroy');

    // Languages Routes
    Route::get('/languages', [languagesController::class, 'index'])->name('languages.index');
    Route::post('/languages', [languagesController::class, 'store'])->name('languages.store');
    Route::delete('/languages/{language_id}', [languagesController::class, 'destroy'])->name('languages.destroy');
    Route::get('/languages/{language_id}/edit', [languagesController::class, 'edit'])->name('languages.edit');
    Route::put('/languages/{language_id}', [languagesController::class, 'update'])->name('languages.update');

    // Language Setup Routes
    Route::get('/language_setup', [languagesSetupController::class, 'index'])->name('languageSetup.index');
    Route::get('/language_setup/create', [languagesSetupController::class, 'create'])->name('languageSetup.create'); // Fixed typo here
    Route::post('/language-setup', [languagesSetupController::class, 'store'])->name('languageSetup.store'); // Corrected route
    Route::get('/language-setup/{languagesetup_id}/edit', [languagesSetupController::class, 'edit'])->name('languageSetup.edit');
    Route::put('/language-setup/{languagesetup_id}', [languagesSetupController::class, 'update'])->name('languageSetup.update');
    Route::delete('/language-setup/{languagesetup_id}', [languagesSetupController::class, 'destroy'])->name('languageSetup.destroy');

    //PERFORMANCE ROUTES
    Route::post('performance/store', [performanceController::class, 'store'])->name('performance.store');
    Route::get('performance', [performanceController::class, 'index'])->name('performance.index');
    Route::get('/performance/create', [performanceController::class, 'create'])->name('performance.create');
    Route::get('performance/{id}/edit', [performanceController::class, 'edit'])->name('performance.edit'); // Show form to edit a rating
    Route::put('performance/{id}', [performanceController::class, 'update'])->name('performance.update'); // Update an existing rating
    Route::delete('performance/{id}', [performanceController::class, 'destroy'])->name('performance.destroy');


    // PAYMENT FREQUENCY ROUTES
  //  the resource route, which handles the full CRUD operations
Route::resource('payment-frequency', PaymentFrequencyController::class)->middleware('auth');
  

//JOB ROUTES
    Route::get('/jobs', [jobController::class, 'index'])->name('job.index');
    Route::get('/jobs/create', [jobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [jobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [jobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [jobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [jobController::class, 'destroy'])->name('jobs.destroy');
    Route::get('/jobs/{job}', [jobController::class, 'show'])->name('jobs.show');

    //ASSIGN ROUTES
    Route::get('/employee-info', [employee_infoController::class, 'index'])->name('employee_info.index');
    Route::get('/employee-info/create', [employee_infoController::class, 'create'])->name('employee_info.create');
    Route::post('/employee-info', [employee_infoController::class, 'store'])->name('employee_info.store');
    Route::get('/employee-info/{id}/edit', [employee_infoController::class, 'edit'])->name('employee_info.edit');
    Route::put('/employee-info/{id}', [employee_infoController::class, 'update'])->name('employee_info.update');
    Route::delete('/employee-info/{id}', [employee_infoController::class, 'destroy'])->name('employee_info.destroy');

    //REPORTS
    Route::get('/reports', [employee_info_viewController::class, 'index'])->name('report');//
    Route::get('/reports/attendance', [employee_info_viewController::class, 'attendance'])->name('rattendance');//
    Route::get('/reports/leaves', [employee_info_viewController::class, 'leaves'])->name('rleaves');
    Route::get('/reports/employee-directory', [employee_info_viewController::class, 'employeeDirectory'])->name('remployee.directory');
    Route::get('/reports/performance', [employee_info_viewController::class, 'performance'])->name('rperformance');
    Route::get('/reports/salary-reports', [employee_info_viewController::class, 'salaryReports'])->name('rsalary.reports');
    Route::get('/reports/department-analysis', [employee_info_viewController::class, 'departmentAnalysis'])->name('rdepartment.analysis');
    Route::get('/payroll/reports', [employee_info_viewController::class, 'payrollReports'])->name('payroll.reports');


    // QUALIFICATIONS ROUTES
    Route::get('/qualifications', [qualificationsController::class, 'index'])->name('qualifications.index');

    //LOG
    Route::get('/logs', [activitylogController::class, 'index'])->name('activitylog.index');
});









//USER
Route::middleware(['role:user'])->group(function () {

    //USER PAYROLL
    Route::get('/payroll/user', [payrolluserController::class, 'index'])->name('payrolluser.index');

    //USER LEAVES
    Route::get('/leave/user', [leavesuserController::class, 'index'])->name('leaveuser.index');
    Route::get('/leave/user/{id}/{employee_id}/edit', [leavesuserController::class, 'edit'])->name('leaveuser.edit');
    Route::put('/leave/user/{id}/update', [leavesuserController::class, 'update'])->name('leaveuser.update');
    Route::post('/leave/user', [leavesuserController::class, 'store'])->name('leaveuser.store');
    Route::delete('/leaveuser/{id}/{employee_id}', [leavesuserController::class, 'destroy'])->name('leaveuser.destroy');

    //USER DEPARTMENT
    Route::get('/department/user', [departmentuserController::class, 'index'])->name('departmentuser.index');
});




