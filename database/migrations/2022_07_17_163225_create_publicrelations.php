<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicrelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicrelations', function (Blueprint $table) {
            $table->id();
            $table->string('info_title')->nullable();
            $table->string('info_factory')->nullable();
            $table->string('info_detail')->nullable();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('publicrelations');
    }
}
