<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPerhutananCategoryIdToPerhutanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perhutanans', function (Blueprint $table) {
            $table->foreignId('perhutanan_category_id')->after('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perhutanans', function (Blueprint $table) {
            $table->dropColumn('perhutanan_category_id');
        });
    }
}
