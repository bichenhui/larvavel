<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string ('key')->default ('')->comment ('关键词');
            $table->unsignedInteger ('rule_id')->index ()->default (0)->comment ('规则id');
			$table->foreign('rule_id')
				->references('id')->on('rules')
				->onDelete('cascade');
            $table->timestamps();
        },'关键词');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keywords');
    }
}