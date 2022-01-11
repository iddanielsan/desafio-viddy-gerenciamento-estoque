<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacaoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao_produtos', function (Blueprint $table) {
            $table->integer('produto_id');
            $table->date('movimentacaoProduto_data');
            $table->integer('movimentacaoProduto_quantidade', false);
            $table->string('movimentacaoProduto_descricao', 200)->nullable();

            $table->boolean('movimentacaoProduto_saida')->default(0);
            $table->boolean('movimentacaoProduto_entrada')->default(0);
            
            $table->foreign('produto_id')
            ->references('produto_id')
            ->on('produtos');
            
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
        Schema::dropIfExists('movimentacao_produtos');
    }
}
