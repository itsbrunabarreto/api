<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
     public function up(): void
     {
         Schema::create('editora_livro_autor', function (Blueprint $table) {
             $table->increments('id');
 
             $table->unsignedInteger('autor_id');
             $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade');
 
             $table->unsignedInteger('editora_id');
             $table->foreign('editora_id')->references('id')->on('editoras')->onDelete('cascade');
 
             $table->unsignedInteger('livro_id');
             $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
 
             $table->timestamps();
         });
     }
 
     public function down(): void
     {
         Schema::dropIfExists('editora_livro_autor');
     }
};