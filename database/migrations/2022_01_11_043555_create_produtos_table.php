<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->integer('produto_id')->autoIncrement();
            $table->string('produto_descricao', 200)->nullable();
            $table->integer('produto_quantideEstoque', false);
            $table->decimal('produto_valorUnitario', 10, 2);
            $table->integer('fornecedor_id');

            $table->foreign('fornecedor_id')
            ->references('fornecedor_id')
            ->on('fornecedores');
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
        Schema::dropIfExists('produtos');
    }
}
