<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWikiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiki', function (Blueprint $table) {
            $table->increments('id');
            $table->text('con');
            $table->integer('pid')->comment('父级标题id')->default(0);
            $table->integer('prev')->comment('前一篇文章id')->default(0);
            $table->integer('next')->comment('后一篇文章id')->default(0);
            $table->string('title', 128)->default('');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('wiki');
    }
}
