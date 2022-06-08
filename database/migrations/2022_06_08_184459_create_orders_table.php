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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderer_name');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('approver1_id');
            $table->unsignedBigInteger('approver2_id');
            $table->boolean('is_approved1')->default(false);
            $table->boolean('is_approved2')->default(false);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('approver1_id')->references('id')->on('users');
            $table->foreign('approver2_id')->references('id')->on('users');
            $table->index('vehicle_id');
            $table->index('approver1_id');
            $table->index('approver2_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
