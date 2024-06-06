<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint; // Asegúrate de usar el Blueprint correcto

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::connection('mongodb')->collection('productos', function (Blueprint $collection) {
            $collection->index('nombre'); // Asegurando que el índice se crea para mejorar la búsqueda por nombre
            // Puedes agregar más índices según sea necesario
        });
    }

    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('productos');
    }
}
