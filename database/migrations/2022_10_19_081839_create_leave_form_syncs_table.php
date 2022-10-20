<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->string('form_id');
            $table->string('email')->index();
            $table->string('full_name')->index();
            $table->enum('leave_type', ['Annual Leave', 'Sick Leave', 'Maternity Leave', 'Mourning Leave','Unpaid Leave']);
            $table->string('leave_reason');
            $table->date('leave_start_date')->index();
            $table->date('leave_end_date');
            $table->boolean('leave_approved')->default(0);
            $table->text('douments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
};
