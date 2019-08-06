<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('tipo'); //1 = Hora Aberta, 2 = Hora Fechada
            $table->integer('cliente')->unsigned();
            $table->decimal('valor_hora', 10, 2);
            $table->text('comentarios');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cliente')
                ->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
