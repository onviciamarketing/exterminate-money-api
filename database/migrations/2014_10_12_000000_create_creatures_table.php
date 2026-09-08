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
            $table->unsignedInteger('maincreature_id')->default(1);   
    		// $table->string('pensum_kwtwo');
    		// $table->string('pensum_kwthree');
    		// $table->string('pensum_url');
    		// $table->string('pensum_video');      
    		// $table->unsignedInteger('course_id');    	             
            $table->timestamps();
        });

    	
    	$reply = new Creature;
    	$reply->creature_name = 'Dollar';
    	$reply->creature_img = 'images/dollar.png';       	
    	$reply->save();

        $reply = new Creature;
        $reply->creature_name = 'Euros';
        $reply->creature_img = 'images/euros.png';         
        $reply->save();

        $reply = new Creature;
        $reply->creature_name = 'Bolivares';
        $reply->creature_img = 'images/bolivares.png';         
        $reply->save();

        $reply = new Creature;
        $reply->creature_name = 'Libras Esterlinas';
        $reply->creature_img = 'images/libras_esterlinas.png';         
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
