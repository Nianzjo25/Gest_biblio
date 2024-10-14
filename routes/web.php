<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\BookManageController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StudentManageController;

// Routes de l'application
Route::get('/', function () {
    return view('student.student_sign_in');
})->name('home');

// Routes étudiant
Route::prefix('student')->group(function () {
    Route::get('signup', [StudentAuthController::class, 'sign_up_show'])->name('student.signup');
    Route::post('sign-up/process', [StudentAuthController::class, 'sign_up_process'])->name('student.sign_up.process');
    Route::get('verify-email/{id}', [StudentAuthController::class, 'verify_email'])->name('student.verify_email');
    Route::post('verify-email/process', [StudentAuthController::class, 'confirm_email'])->name('student.verify_email.process');
    Route::get('forget-password', [StudentAuthController::class, 'forget_password'])->name('student.forget_password');
    Route::post('forget-password/process', [StudentAuthController::class, 'forget_password_process'])->name('student.forget_password.process');

    Route::get('recover-password/{link_number}', [StudentAuthController::class, 'recover_password'])->name('student.recover_password');
    Route::post('recover-password/process', [StudentAuthController::class, 'recover_password_process'])->name('student.recover_password.process');

    Route::post('sign-in/process', [StudentAuthController::class, 'sign_in_process'])->name('student.sign_in.process');
    Route::get('dashboard', [StudentAuthController::class, 'dashboard'])->name('student.dashboard');

    Route::get('book-list/programming', [BookManageController::class, 'programming_book_student'])->name('student.book_list.programming');
    Route::get('book-list/networking', [BookManageController::class, 'networking_book_student'])->name('student.book_list.networking');
    Route::get('book-list/database', [BookManageController::class, 'database_book_student'])->name('student.book_list.database');
    Route::get('book-list/electronics', [BookManageController::class, 'electronics_book_student'])->name('student.book_list.electronics');
    Route::get('book-list/software-development', [BookManageController::class, 'software_book_student'])->name('student.book_list.software_development');

    Route::get('shelf-list', [BookManageController::class, 'shelf_list_student'])->name('student.shelf_list');
    Route::get('shelf/details/{id}', [BookManageController::class, 'shelf_details_student'])->name('student.shelf.details');
    Route::get('log-out', [StudentAuthController::class, 'log_out'])->name('student.log_out');
    Route::get('my-collection', [StudentManageController::class, 'my_collection'])->name('student.my_collection');
    Route::get('my-submission', [StudentManageController::class, 'my_submission'])->name('student.my_submission');

    Route::get('change-password', [StudentAuthController::class, 'change_password'])->name('student.change_password');
    Route::get('edit-info', [StudentAuthController::class, 'edit_info'])->name('student.edit_info');
    Route::post('change-auth-password/process', [StudentAuthController::class, 'change_password_process'])->name('student.change_auth_password.process');
    Route::post('edit-info/process/{id}', [StudentAuthController::class, 'edit_info_process'])->name('student.edit_info.process');

    Route::get('notification', [BookManageController::class, 'student_notification'])->name('student.notification');
    Route::get('notify/count', [BookManageController::class, 'student_notify_count'])->name('student.notify.count');
});

// Routes admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminAuthController::class, 'sign_in_show'])->name('admin.sign_in');
    Route::get('forget-password', [AdminAuthController::class, 'forget_password'])->name('admin.forget_password');
    Route::post('forget-password/process', [AdminAuthController::class, 'forget_password_process'])->name('admin.forget_password.process');

    Route::get('recover-password/{link_number_admin}', [AdminAuthController::class, 'recover_password'])->name('admin.recover_password');
    Route::post('recover-password/process', [AdminAuthController::class, 'recover_password_process'])->name('admin.recover_password.process');

    Route::post('sign-in/process', [AdminAuthController::class, 'sign_in_process'])->name('admin.sign_in.process');
    Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('log-out', [AdminAuthController::class, 'log_out'])->name('admin.log_out');
    Route::get('student-request', [AdminAuthController::class, 'student_request'])->name('admin.student_request');

    Route::get('student/approve/{id}', [StudentManageController::class, 'student_approve'])->name('admin.student.approve');
    Route::get('student/reject/{id}', [StudentManageController::class, 'student_reject'])->name('admin.student.reject');

    Route::get('add-shelf', [BookManageController::class, 'add_shelf'])->name('admin.add_shelf');
    Route::post('add-shelf/process', [BookManageController::class, 'add_shelf_process'])->name('admin.add_shelf.process');
    Route::get('update-shelf', [BookManageController::class, 'update_shelf'])->name('admin.update_shelf');
    Route::get('shelf/edit/{id}', [BookManageController::class, 'edit_shelf'])->name('admin.shelf.edit');
    Route::post('edit-shelf/process/{id}', [BookManageController::class, 'edit_shelf_process'])->name('admin.edit_shelf.process');
    Route::get('remove-shelf', [BookManageController::class, 'remove_shelf'])->name('admin.remove_shelf');
    Route::get('shelf/delete/{id}', [BookManageController::class, 'remove_shelf_process'])->name('admin.shelf.delete');

    Route::get('add-book', [BookManageController::class, 'add_book'])->name('admin.add_book');
    Route::post('add-book/process', [BookManageController::class, 'add_book_process'])->name('admin.add_book.process');
    Route::get('update-book', [BookManageController::class, 'update_book'])->name('admin.update_book');
    Route::get('book/edit/{id}', [BookManageController::class, 'edit_book'])->name('admin.book.edit');
    Route::post('edit-book/process/{id}', [BookManageController::class, 'edit_book_process'])->name('admin.edit_book.process');
    Route::get('remove-book', [BookManageController::class, 'remove_book'])->name('admin.remove_book');
    Route::get('book/delete/{id}', [BookManageController::class, 'remove_book_process'])->name('admin.book.delete');

    Route::get('book-order', [BookManageController::class, 'book_order'])->name('admin.book_order');
    Route::get('add-order', [BookManageController::class, 'add_order'])->name('admin.add_order');
    Route::post('add-order/process', [BookManageController::class, 'add_order_process'])->name('admin.add_order.process');
    Route::get('book-received', [BookManageController::class, 'book_received'])->name('admin.book_received');
    Route::get('book-received/process/{id}', [BookManageController::class, 'book_received_process'])->name('admin.book_received.process');

    Route::get('remove-student', [StudentManageController::class, 'remove_student'])->name('admin.remove_student');
    Route::get('student/delete/process/{id}', [StudentManageController::class, 'remove_student_process'])->name('admin.student.delete');
    Route::get('student-info', [StudentManageController::class, 'student_info'])->name('admin.student_info');

    Route::get('change-password', [AdminAuthController::class, 'change_password'])->name('admin.change_password');
    Route::post('change-auth-password/process', [AdminAuthController::class, 'change_password_process'])->name('admin.change_auth_password.process');
    Route::get('edit-info', [AdminAuthController::class, 'edit_info'])->name('admin.edit_info');
    Route::post('update-info/process', [AdminAuthController::class, 'update_info_process'])->name('admin.update_info.process');

    Route::get('student/info/details/{id}', [StudentManageController::class, 'student_details'])->name('admin.student.details');
    Route::get('book-list/programming', [BookManageController::class, 'programming_book'])->name('admin.book_list.programming');
    Route::get('book-list/networking', [BookManageController::class, 'networking_book'])->name('admin.book_list.networking');
    Route::get('book-list/database', [BookManageController::class, 'database_book'])->name('admin.book_list.database');
    Route::get('book-list/electronics', [BookManageController::class, 'electronics_book'])->name('admin.book_list.electronics');
    Route::get('book-list/software-development', [BookManageController::class, 'software_book'])->name('admin.book_list.software_development');

    Route::get('book/details/{id}', [BookManageController::class, 'book_details'])->name('admin.book.details');
    Route::get('shelf-list', [BookManageController::class, 'shelf_list'])->name('admin.shelf_list');
    Route::get('notification', [StudentManageController::class, 'notification'])->name('admin.notification');
    Route::get('notify/count', [StudentManageController::class, 'notify_count'])->name('admin.notify.count');
    Route::get('shelf/details/{id}', [BookManageController::class, 'shelf_details'])->name('admin.shelf.details');
});
