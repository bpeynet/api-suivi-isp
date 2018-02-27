<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalons', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('nom');
        });
        Schema::create('avancements', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('nom');
            $table->tinyInteger('pourcentage');
        });
        Schema::create('suivis', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('type');
        });
        Schema::create('supras', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('libelle');
        });
        Schema::create('acteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('prenom');
            $table->text('nom');
            $table->boolean('est_ingenieur_secu')->default(false);
            $table->boolean('est_rsi_fab')->default(false);
            $table->boolean('est_architecte')->default(false);
        });
        Schema::create('lignes_produit', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('libelle');
            $table->unsignedInteger('id_supra');
            $table->unsignedInteger('id_inge_secu')->nullable();
						$table->foreign('id_supra')->references('id')->on('supras')->onDelete('cascade');
						$table->foreign('id_inge_secu')->references('id')->on('acteurs')->onDelete('set null');
        });
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_ligne_produit');
            $table->mediumText('programme')->nullable();
            $table->mediumText('code');
            $table->mediumText('nom');
            $table->mediumText('chef');
            $table->mediumText('accompagnateur_CGI');
            $table->text('commentaires')->nullable();
            $table->dateTime('date_creation');
            $table->dateTime('date_derniere_modif');
						$table->foreign('id_ligne_produit')->references('id')->on('lignes_produit');
        });
        Schema::create('versions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_projet');
            $table->unsignedMediumInteger('code_colibri');
            $table->unsignedInteger('id_jalon')->nullable();
            $table->unsignedInteger('id_type_de_suivi')->nullable();
            $table->boolean('CNIL')->default(false);
            $table->boolean('homologation_RGS')->default(false);
            $table->boolean('exigences_metier')->default(false);
            $table->unsignedInteger('avancement')->nullable();
            $table->text('commentaires')->nullable();
            $table->dateTime('date_creation');
            $table->dateTime('date_derniere_modif');
						$table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
						$table->foreign('id_jalon')->references('id')->on('jalons')->onDelete('set null');
						$table->foreign('id_type_de_suivi')->references('id')->on('suivis')->onDelete('set null');
						$table->foreign('avancement')->references('id')->on('avancements')->onDelete('set null');
        });
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_version');
						$table->foreign('id_version')->references('id')->on('versions')->onDelete('cascade');
						$table->text('libelle');
						$table->mediumText('type');
						$table->boolean('terminee');
						$table->text('commentaires');
						$table->date('date_creation');
        });
        Schema::create('mesures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_projet');
						$table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
						$table->text('libelle');
						$table->boolean('prise_en_compte');
						$table->text('commentaires');
						$table->text('risque');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesures');
        Schema::dropIfExists('actions');
        Schema::dropIfExists('versions');
        Schema::dropIfExists('projets');
        Schema::dropIfExists('suivis');
        Schema::dropIfExists('avancement');
        Schema::dropIfExists('jalons');
        Schema::dropIfExists('lignes_produit');
        Schema::dropIfExists('acteurs');
        Schema::dropIfExists('supras');
    }
}
