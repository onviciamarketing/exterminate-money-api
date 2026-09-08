<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Character;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    	Schema::create('characters', function (Blueprint $table) {
    		$table->id();
    		$table->string('character_name');
    		$table->string('character_img');
    		// $table->string('pensum_kwtwo');
    		// $table->string('pensum_kwthree');
    		// $table->string('pensum_url');
    		// $table->string('pensum_video');      
    		// $table->unsignedInteger('course_id');    	             
    		$table->timestamps();
    	});

    	$reply = new Character;
    	$reply->character_name = 'Pikachu';
    	$reply->character_img = 'images/bulbasaur.jpeg';       	
    	$reply->save();

    	$reply = new Character;
    	$reply->character_name = 'Bulbasaur';
    	$reply->character_img = 'images/pikachu.jpeg';       	
    	$reply->save();

    	
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    	Schema::dropIfExists('characters');
    }
};
