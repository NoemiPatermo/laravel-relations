<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) { //questa è la tabella pivot,
            $table->id();
            // definisci le due FK verso article e verso tag

            $table->unsignedBigInteger('article_id');//crei colonna di questo tipo e poi indichi il vincolo della FK 
            $table->foreign('article_id')->references('id')->on('articles');//a quale colonna ti riferisci [references] su quale tabella[on]

            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');


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
        Schema::dropIfExists('article_tag');
    }
}
