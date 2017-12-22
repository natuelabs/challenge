<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('projeto')->unsigned();
            $table->text('descricao');
            $table->integer('estimativa');
            $table->time('horas');
            $table->integer('finalizado');//1 = Sim, 0 = Não
            $table->integer('prioridade');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('projeto')
                ->references('id')->on('projetos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
