<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SwitchFieldsToNullabeInHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('histories', function (Blueprint $table) {
            //
            $table->string('metier_recherche')->nullable()->change();
            $table->string('annees_experience')->nullable()->change();
            $table->string('ville_domiciliation')->nullable()->change();
            $table->string('niveau_etudes')->nullable()->change();
            $table->string('pretentions_salariales')->nullable()->change();
            $table->json('valeurs')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nullabe_in_histories', function (Blueprint $table) {
            //
        });
    }
}
