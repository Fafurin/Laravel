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
            $table->string('title', 50)
                ->unique()
                ->nullable(false);
            $table->string('summary', 100)
                ->nullable(true);
            $table->text('content')
                ->nullable(false);
            $table->foreignId('category_id')
                ->constrained('categories');
            $table->foreignId('source_id')
                ->constrained('sources');
            $table->foreignId('status_id')
                ->constrained('statuses');
            $table->dateTime('publish_date')
                ->nullable(true)
                ->index();
            $table->string('icon', 100)
                ->nullable(true);
            $table->string('image', 100)
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
