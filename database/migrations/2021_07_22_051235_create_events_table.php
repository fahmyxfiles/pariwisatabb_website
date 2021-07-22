<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->text('description');
            $table->string('image_filename')->nullable();
            $table->string('documents_name')->nullable();
            $table->datetime('start_registration')->nullable();
            $table->datetime('end_registration')->nullable();
            $table->datetime('start_event')->nullable();
            $table->datetime('end_event')->nullable();
            $table->enum('registrar_type', ['internal', 'internal_gforms', 'external_contact', 'external_url']);
            $table->text('registrar_data');
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
        Schema::dropIfExists('events');
    }
}
