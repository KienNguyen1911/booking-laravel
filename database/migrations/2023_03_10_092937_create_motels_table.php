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
        Schema::create('motels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('acreage');
            $table->text('description');
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('province_id')->constrained('provinces');
            $table->foreignId('district_id')->constrained('districts');
            $table->foreignId('ward_id')->constrained('wards');
            $table->string('address');
            $table->string('attr');
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
        Schema::dropIfExists('motels');
    }
};
