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
        Schema::create('user_loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('tenure');
            $table->integer('amount');
            $table->tinyInteger('payment_mode')->comment('1=online,0=offline')->nullable();
            $table->tinyInteger('loan_status')->default(0)->comment('0=Submission,1=Process2=Bank,3=Approved,4=Rejected,5=Pending');
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
        Schema::dropIfExists('user_loans');
    }
};
