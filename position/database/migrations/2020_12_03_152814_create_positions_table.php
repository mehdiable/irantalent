<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->unsignedInteger('id', true);
            $table->string('title', 128);
            $table->unsignedInteger('category_id');
            $table->tinyInteger('min_age')->nullable();
            $table->tinyInteger('max_age')->nullable();
            $table->unsignedInteger('education_id');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->unsignedInteger('salary')->nullable();
            $table->unsignedInteger('location_id')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('lived_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
    
            $table->foreign('category_id', 'fk_categories_category_id')
                ->references('id')
                ->on('categories');
    
            $table->foreign('education_id', 'fk_educations_education_id')
                ->references('id')
                ->on('educations');
    
            $table->foreign('location_id', 'fk_locations_location_id')
                ->references('id')
                ->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
