<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category_book', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('book_id');

                //Constraint
            $table-> foreign('category_id')-> references('id')->on('category');
            $table->foreign('book_id')->references('id')->on('books');
        });


        Schema::table('books', function (Blueprint $table) {
            // Adicionar publisher_id e definir como chave estrangeira (sem unique)
            $table->unsignedBigInteger('publisher_id')->nullable();  // Permitir null se necessário
            $table->foreign('publisher_id')->references('id')->on('publisher')->onDelete('set null');
    
            // Adicionar author_id e definir como chave estrangeira
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('author')->onDelete('set null');

            $table->unsignedBigInteger('book_details_id')->nullable();
            $table->foreign('book_details_id')->references('id')->on('book_details')->onDelete('set null');
            $table->unique('book_details_id');
            $table->dropColumn(['autor', 'qtd_paginas', 'editora']);
        });
        

    }

    /**
     * Reverse the migrations.
     */
    /* public function down(): void
    {
        Schema::table('author',function (Blueprint $table){
            $table->dropForeign('author_book_id_foreign');
            $table->dropColumn('book_id');

        });

    Schema::table('publisher',function (Blueprint $table){
            $table->dropForeign('publisher_book_id_foreign');
            $table->dropColumn('book_id');

        });
           
        Schema::table('category_book',function (Blueprint $table){
            $table->dropForeign('category_book_book_id_foreign');  //nome da chave [tabela]_[coluna]_foreign
            $table->dropForeign('category_book_category_id_foreign');
        });
        Schema::dropIfExists('category_book');
    }
}; */
public function down(): void
{
    Schema::table('books', function (Blueprint $table) {
        $table->dropForeign(['publisher_id']); // para dropar a foreign sem precisar colocar o nome dela,basta passar uma array com o nome da coluna que está a chave estrangeira
        $table->dropColumn('publisher_id');
        $table->dropForeign(['author_id']); 
        $table->dropColumn('author_id');
        $table->dropForeign(['book_details_id']); 
        $table->dropColumn('book_details_id');

        // colocando novamente as colunas que foi retirada
        $table ->string('autor',100);
        $table-> integer('qtd_paginas');
        $table->string('editora',100);
    });

    Schema::table('category_book', function (Blueprint $table) {
        $table->dropForeign(['category_id']); // Use array para especificar a coluna
        $table->dropForeign(['book_id']); // Use array para especificar a coluna
    });

    Schema::dropIfExists('category_book');
}
};