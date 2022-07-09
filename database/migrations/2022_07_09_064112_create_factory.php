<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factory', function (Blueprint $table) {
            $table->id();
            $table->string('fac_name')->nullable();
            $table->string('fac_no')->nullable();
            $table->string('fac_category')->nullable();
            $table->string('fac_address')->nullable();
            $table->string('fac_utm1')->nullable();
            $table->string('fac_utm2')->nullable();
            $table->string('fac_lat')->nullable();
            $table->string('fac_lon')->nullable();
            $table->string('fac_tel')->nullable();
            $table->string('fac_fax')->nullable();
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
        Schema::dropIfExists('factory');

    }
}
