<?php

use App\Http\Controllers\ProfileController;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StripeController;






use App\Models\Teacher;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/student-management', [StudentManagementController::class, 'index'])->name('student.management');
    Route::resource('students', StudentController::class);
    // Route::post('/students', [StudentController::class]);
  
    route::resource('/teachers', TeacherController::class);    
    route::resource('/courses', CourseController::class);    
    route::resource('/batches', BatchController::class);    
    route::resource('/enrollments', EnrollmentController::class); 

    route::resource('/payments', PaymentController::class,);    
   
    Route::get('report/report1/{pid}', [ReportController::class, 'report1']);
    // Route::get('test-stripe', function () {
    //     return 'Stripe Test';
    // });

    // Route::get('test-route', function () {
    //     return 'This is a test route';
    // });
    Route::controller(StripeController::class)->group(function(){
        Route::get('stripe', 'stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
    });
    
    Route::get('/stripe/payment', [StripeController::class, 'showPaymentForm'])->name('stripe.payment');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');



});

require __DIR__.'/auth.php';
