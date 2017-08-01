<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('district', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->float('continuity',8,2);
      $table->float('consumption',8,2);
      $table->string('micromedition');
      $table->float('facturation',8,2);
      $table->rememberToken();
      $table->timestamps();

        //
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district');
    }
}
