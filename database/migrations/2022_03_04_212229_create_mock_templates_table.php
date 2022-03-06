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
        Schema::create('mock_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'mock_id' );
            $table->foreign( 'mock_id' )->references( 'id' )->on( 'mocks' );
            $table->text( 'body' );
            $table->boolean( 'is_approved' )->default( false );
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
        Schema::dropIfExists('mock_templates');
    }
};
