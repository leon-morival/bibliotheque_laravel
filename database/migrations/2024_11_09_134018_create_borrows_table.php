<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id('borrow_id');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('book_id'); // Idem pour book_id
            $table->dateTime('borrow_date');
            $table->dateTime('return_date')->nullable();
    
            // Définition des clés étrangères avec des références aux colonnes appropriées
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade')->onUpdate('cascade');
    
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('borrows', function (Blueprint $table) {
            //
        });
    }
};
