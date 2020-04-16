<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->description('headline'); // the news 'titr'
            $table->string('kicker')->nullable(); // the news 'surtitr'
            $table->string('deck')->nullable(); // the news 'soustiter'
            $table->json('summaries')->default('[]');
            $table->string('code')->nullable();
            $table->string('mark_as')->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
