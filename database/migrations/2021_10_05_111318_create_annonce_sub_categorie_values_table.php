<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceSubCategorieValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_sub_categorie_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("annonce_id")->index();
            $table->bigInteger("sub_category_id")->index();
            $table->string("value")->index();
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
        Schema::dropIfExists('annonce_sub_categorie_values');
    }
}
