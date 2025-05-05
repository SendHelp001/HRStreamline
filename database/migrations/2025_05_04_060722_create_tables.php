<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('tbl_employee', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->date('birthdate')->nullable();
            $table->string('gender', 10)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('image')->nullable();
            $table->string('employee_fname');
            $table->string('employee_lname');
            $table->string('employee_mname')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->string('contact1');
            $table->string('employee_email');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('tbl_department', function (Blueprint $table) {
            $table->increments('department_id');
            $table->string('department_name', 50);
            $table->unsignedInteger('department_head')->nullable();
        });

        Schema::create('tbl_job', function (Blueprint $table) {
            $table->increments('job_id');
            $table->string('job_title', 50);
            $table->text('job_description')->nullable();
            $table->unsignedInteger('salary_id')->nullable();
        });

        Schema::create('tbl_salary', function (Blueprint $table) {
            $table->increments('salary_id');
            $table->string('salary_grade', 20)->nullable();
            $table->decimal('salary_amount', 10, 2);
            $table->unsignedInteger('payment_frequency_id');
        });

        Schema::create('tbl_payment_frequency_type', function (Blueprint $table) {
            $table->increments('payment_frequency_id');
            $table->string('payment_name', 50);
        });

        Schema::create('tbl_employee_info', function (Blueprint $table) {
            $table->increments('info_id');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('job_id')->nullable();
            $table->unsignedInteger('performance_id')->nullable();
        });

        Schema::create('tbl_performance', function (Blueprint $table) {
            $table->increments('performance_id');
            $table->integer('total_days_present');
            $table->integer('total_days_absent');
            $table->integer('leave_days_taken');
            $table->date('review_date');
            $table->decimal('review_score', 5, 2)->nullable();
            $table->unsignedInteger('reviewer_id')->nullable();
            $table->unsignedInteger('employee_id');
        });

        Schema::create('tbl_attendance', function (Blueprint $table) {
            $table->increments('attendance_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('attendance_date');
            $table->time('time_in');
            $table->time('time_out')->nullable();
        });

        Schema::create('tbl_leaves', function (Blueprint $table) {
            $table->increments('leave_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('leave_status', 20)->nullable();
            $table->text('remarks')->nullable();
        });

        Schema::create('tbl_payroll', function (Blueprint $table) {
            $table->increments('payroll_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('payroll_status', 50);
            $table->integer('payroll_amount');
            $table->date('pay_period');
            $table->date('payment_date');
        });

        Schema::create('tbl_certificate', function (Blueprint $table) {
            $table->increments('certificate_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('certificate_name', 100)->nullable();
            $table->string('issued_by', 100)->nullable();
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
        });

        Schema::create('tbl_education', function (Blueprint $table) {
            $table->increments('education_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('degree', 50)->nullable();
            $table->string('field_of_study', 50)->nullable();
            $table->string('institution_name', 100)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });

        Schema::create('tbl_skills', function (Blueprint $table) {
            $table->increments('skill_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('skill_name', 50)->nullable();
            $table->enum('proficiency_level', ['beginner', 'intermediate', 'advanced', 'expert'])->nullable();
            $table->date('last_used_date')->nullable();
        });

        Schema::create('tbl_languages', function (Blueprint $table) {
            $table->increments('language_id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->enum('proficiency_level', ['basic', 'fluent', 'native'])->nullable();
            $table->unsignedInteger('languagesetup_id');
        });

        Schema::create('languagesetup', function (Blueprint $table) {
            $table->increments('languagesetup_id');
            $table->string('name', 50);
            $table->text('description')->nullable();
        });

        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('table_name');
            $table->unsignedInteger('row_id');
            $table->string('action')->nullable();
            $table->timestamps();
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('tbl_employee');
        Schema::dropIfExists('tbl_department');
        Schema::dropIfExists('tbl_job');
        Schema::dropIfExists('tbl_salary');
        Schema::dropIfExists('tbl_payment_frequency_type');
        Schema::dropIfExists('tbl_employee_info');
        Schema::dropIfExists('tbl_performance');
        Schema::dropIfExists('tbl_attendance');
        Schema::dropIfExists('tbl_leaves');
        Schema::dropIfExists('tbl_payroll');
        Schema::dropIfExists('tbl_certificate');
        Schema::dropIfExists('tbl_education');
        Schema::dropIfExists('tbl_skills');
        Schema::dropIfExists('tbl_languages');
        Schema::dropIfExists('languagesetup');
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('migrations');
    }
};
