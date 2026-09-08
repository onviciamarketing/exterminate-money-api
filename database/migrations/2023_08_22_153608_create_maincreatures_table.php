<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\MainCreature;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maincreatures', function (Blueprint $table) {
            $table->id();
            $table->string('maincreature_name');
            $table->string('maincreature_img');
            $table->unsignedInteger('maincreature_px')->nullable();
            $table->unsignedInteger('maincreature_py')->nullable();                         
            // $table->unsignedInteger('subcreature_id');   
            $table->timestamps();
        });



        $reply = new MainCreature;
        $reply->maincreature_name = 'Money';
        $reply->maincreature_img = 'images/money.png';        
        $reply->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maincreatures');
    }
};
