<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id()->unsignedBigInteger();
            $table->string('nombre');
            $table->string('marca');
            $table->string('modelo')->nullable();
            $table->integer('anio')->nullable();
            $table->string('codigo_producto')->unique();
            $table->string('descripcion');
            $table->float('precio');
            $table->integer('existencias');
            $table->string('imagen')->nullable();
            $table->string('categoria');
            $table->string('subcategoria');
            $table->text('aplicaciones')->nullable();
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
        Schema::dropIfExists('productos');
    }
};
