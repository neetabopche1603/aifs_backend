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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar')->nullable();
            $table->tinyInteger('gender')->comment('0=male, 1=female');
            $table->date('dob');
            $table->string('aadhar_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('mobile_number')->unique();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('account_number')->nullable();
            $table->integer('login_otp')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active,0=block');
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
};
