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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('NIP' , 18);
            $table->string('nama' ,30);
            $table->string('alamat' );
            $table->string('nohp' ,13); 
            $table->enum('JK', ['L','P']);  
            $table->string('username' , 30);
            $table->string('password' , 100);
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
  
          
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
