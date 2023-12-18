<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOffresFieldsInOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offres', function (Blueprint $table) {
            // Add a new VARCHAR column
            $table->string('education_level')->nullable()->change();
            $table->string('experience_level')->nullable()->change();
            $table->string('weekly_hours')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offres', function (Blueprint $table) {
            // Reverse the changes if needed
            $table->dropColumn('education_level');
            $table->dropColumn('experience_level');
            $table->dropColumn('weekly_hours');
        });
    }
}
