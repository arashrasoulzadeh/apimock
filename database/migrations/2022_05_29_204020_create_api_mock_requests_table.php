<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_mock_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'template_id' );
            $table->unsignedBigInteger( 'mock_id' );
            $table->foreign( 'mock_id' )->references( 'id' )->on( 'mocks' );
            $table->foreign( 'template_id' )->references( 'id' )->on( 'mock_templates' );
            $table->text( 'params' )->nullable();
            $table->text( 'headers' )->nullable();
            $table->text( 'response' )->nullable();
            $table->string( 'method' )->nullable();
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
        Schema::dropIfExists('api_mock_requests');
    }
};
