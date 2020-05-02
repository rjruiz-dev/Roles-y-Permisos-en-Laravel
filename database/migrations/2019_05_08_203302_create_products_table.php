<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// 1 se crean los campos de la tabla
// 2 se crea el factory de la tabla (lo que contendra cada campo)
// 3 se asigna la cantidad q se desea crear en la carpeta seeds 
// 4 luego se asigna el orden de creacion en el archivo DatabaseSeeder
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->string('description');

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
        Schema::dropIfExists('products');
    }
}
