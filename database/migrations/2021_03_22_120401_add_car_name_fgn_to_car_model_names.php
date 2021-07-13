<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCarNameFgnToCarModelNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_model_names', function (Blueprint $table) {
            $table->integer('car_name_fgn_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_model_names', function (Blueprint $table) {
           $table->dropColumn('car_name_fgn_id');
        });
    }
}
