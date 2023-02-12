<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->index();
            $table->string('lang',2)->index();
            $table->string('name')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('h1')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('h2')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('title')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('description')->collation('utf8mb4_unicode_ci')->nullable();
            $table->longText('text')->collation('utf8mb4_unicode_ci')->nullable();
            $table->timestamps();

            $table->unique(['page_id', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_contents');
    }
}
