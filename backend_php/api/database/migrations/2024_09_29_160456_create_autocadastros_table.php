<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutocadastrosTable extends Migration
{
    public function up()
    {
        Schema::create('autocadastros', function (Blueprint $table) {
            $table->id(); // Campo id, auto-incremento
            $table->string('email')->unique(); // Campo email, deve ser único
            $table->string('password'); // Campo password
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('autocadastros');
    }
}

