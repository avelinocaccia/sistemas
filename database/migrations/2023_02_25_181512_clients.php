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
        //
        Schema::create('clientes', function (Blueprint $table) {
            $table->id()->unsignedBigInteger();
            $table->string('Nombre');
            $table->string('Telefono');
            $table->string('CorreoElectronico')->unique();
            $table->string('Direccion');
            $table->string('Ciudad');
            $table->string('EstadoProvincia');
            $table->string('Pais');
            $table->string('CodigoPostal');
            $table->dateTime('FechaRegistro');
            $table->dateTime('FechaUltimaCompra')->nullable();
            $table->decimal('TotalGastado', 10, 2)->default(0);
            $table->text('Notas')->nullable();
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
        //
        Schema::dropIfExists('clientes');
    }
};
