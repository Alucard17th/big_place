<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCurriculumFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('curriculum', function (Blueprint $table) {
            $table->string('nom')->nullable()->change();
            $table->string('prenom')->nullable()->change();
            $table->string('ville_domiciliation')->nullable()->change();
            $table->string('metier_recherche')->nullable()->change();
            $table->string('pretentions_salariales')->nullable()->change();
            $table->integer('annees_experience')->nullable()->change();
            $table->string('niveau')->nullable()->change();
            $table->string('niveau_etudes')->nullable()->change();
            $table->json('valeurs')->nullable()->change();
            $table->string('cv')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
