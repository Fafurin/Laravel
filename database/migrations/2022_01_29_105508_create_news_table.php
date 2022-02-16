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
            $table->id();
            $table->string('title', 300)
                ->unique()
                ->nullable(false);
            $table->string('summary', 1000)
                ->nullable(true);
            $table->string('source', 200)
                ->nullable(true);
            $table->text('content')
                ->nullable(false);
            $table->foreignId('category_id')
                ->constrained('categories');
            $table->foreignId('status_id')
                ->constrained('statuses');
            $table->dateTime('publish_date')
                ->nullable(true)
                ->index();
            $table->string('image', 200)
                ->nullable(true);
            $table->softDeletes();
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
        Schema::dropIfExists('news');
    }
}
