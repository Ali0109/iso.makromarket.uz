<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('problem_id');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('operation_response')->nullable();
            $table->text('logs')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('operator_id')->references('id')->on('users');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apllications_hot');
    }
};
