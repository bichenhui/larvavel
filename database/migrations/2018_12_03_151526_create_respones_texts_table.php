<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponesTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respones_texts', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->text ('content')->comment ('回复文本内容');
            $table->unsignedInteger  ('rule_id')->index ()->default (0)->comment ('规则id');
			$table->foreign('rule_id')
				->references('id')->on('rules')
				->onDelete('cascade');
            $table->timestamps();
        },'基本文本回复');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respones_texts');
    }
}
