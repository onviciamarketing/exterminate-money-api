<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Creature;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    	Schema::create('creatures', function (Blueprint $table) {
    		$table->id();
    		$table->string('creature_name');
    		$table->string('creature_img');
            $table->unsignedInteger('creature_px')->nullable();
            $table->unsignedInteger('creature_py')->nullable();
    		// $table->string('pensum_kwtwo');
    		// $table->string('pensum_kwthree');
    		// $table->string('pensum_url');
    		// $table->string('pensum_video');      
    		// $table->unsignedInteger('course_id');    	             
    		$table->timestamps();
    	});

    	
    	$reply = new Creature;
    	$reply->creature_name = 'Pikachu';
    	$reply->creature_img = 'images/pikachu.jpeg';       	
    	$reply->save();

        $reply = new Creature;
        $reply->creature_name = 'Bulbasaur';
        $reply->creature_img = 'images/bulbasaur.jpeg';         
        $reply->save();

        $reply = new Creature;
        $reply->creature_name = 'Squirtle';
        $reply->creature_img = 'images/squirtle.jpeg';         
        $reply->save();

        $reply = new Creature;
        $reply->creature_name = 'Charmander';
        $reply->creature_img = 'images/charmander.jpeg';         
        $reply->save();

        
    	
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    	Schema::dropIfExists('creatures');
    }
};
