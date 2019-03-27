<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImportantDetailsToDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('occurrence_details', function (Blueprint $table) {
            $table->boolean('important')->default(false);
            $table->string('cos')->nullable();
            $table->string('entidadesNoTO')->nullable();
            $table->text('notas')->nullable();
            $table->string('GruposReforcoEnvolvidos')->nullable();
            $table->integer('NumAvioesMediosEnvolvidos')->nullable();
            $table->integer('NumAvioesOutrosEnvolvidos')->nullable();
            $table->integer('NumAvioesPesadosEnvolvidos')->nullable();
            $table->integer('NumBombeirosEnvolvidos')->nullable();
            $table->integer('NumBombeirosOperEnvolvidos')->nullable();
            $table->integer('NumEsfEnvolvidos')->nullable();
            $table->integer('NumEsfOperEnvolvidos')->nullable();
            $table->integer('NumFAAEnvolvidos')->nullable();
            $table->integer('NumFAAOperEnvolvidos')->nullable();
            $table->integer('NumFebEnvolvidos')->nullable();
            $table->integer('NumFebOperEnvolvidos')->nullable();
            $table->integer('NumGNRGipsEnvolvidos')->nullable();
            $table->integer('NumGNRGipsOperEnvolvidos')->nullable();
            $table->integer('NumGNROutrosEnvolvidos')->nullable();
            $table->integer('NumGNROutrosOperEnvolvidos')->nullable();
            $table->integer('NumPSPEnvolvidos')->nullable();
            $table->integer('NumPSPOperEnvolvidos')->nullable();
            $table->integer('NumHelicopterosLigeirosMediosEnvolvidos')->nullable();
            $table->integer('NumHelicopterosOutrosEnvolvidos')->nullable();
            $table->integer('NumHelicopterosPesadosEnvolvidos')->nullable();
            $table->integer('OutrosOperacionaisEnvolvidos')->nullable();
            $table->text('POSITDescricao')->nullable();
            $table->string('PCO')->nullable();
            $table->string('PontoSituacao')->nullable();
            $table->string('PPIAtivados')->nullable();
            $table->longText('api_response')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('occurrence_details', function (Blueprint $table) {
            $table->dropColumn('important');
            $table->dropColumn('cos');
            $table->dropColumn('entidadesNoTO');
            $table->dropColumn('notas');
            $table->dropColumn('GruposReforcoEnvolvidos');
            $table->dropColumn('NumAvioesMediosEnvolvidos');
            $table->dropColumn('NumAvioesOutrosEnvolvidos');
            $table->dropColumn('NumAvioesPesadosEnvolvidos');
            $table->dropColumn('NumBombeirosEnvolvidos');
            $table->dropColumn('NumBombeirosOperEnvolvidos');
            $table->dropColumn('NumEsfEnvolvidos');
            $table->dropColumn('NumEsfOperEnvolvidos');
            $table->dropColumn('NumFAAEnvolvidos');
            $table->dropColumn('NumFAAOperEnvolvidos');
            $table->dropColumn('NumFebEnvolvidos');
            $table->dropColumn('NumFebOperEnvolvidos');
            $table->dropColumn('NumGNRGipsEnvolvidos');
            $table->dropColumn('NumGNRGipsOperEnvolvidos');
            $table->dropColumn('NumGNROutrosEnvolvidos');
            $table->dropColumn('NumGNROutrosOperEnvolvidos');
            $table->dropColumn('NumPSPEnvolvidos');
            $table->dropColumn('NumPSPOperEnvolvidos');
            $table->dropColumn('NumHelicopterosLigeirosMediosEnvolvidos');
            $table->dropColumn('NumHelicopterosOutrosEnvolvidos');
            $table->dropColumn('NumHelicopterosPesadosEnvolvidos');
            $table->dropColumn('OutrosOperacionaisEnvolvidos');
            $table->dropColumn('POSITDescricao');
            $table->dropColumn('PCO');
            $table->dropColumn('PontoSituacao');
            $table->dropColumn('PPIAtivados');
            $table->dropColumn('api_response');
        });
    }
}
