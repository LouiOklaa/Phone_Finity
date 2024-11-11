<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('handys', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('name', 100);
            $table->unsignedBigInteger( 'section_id' )->unsigned();
            $table->foreign('section_id')->references('id')->on('abschnittes')->onDelete('cascade');
            $table->string('section_name', 50);
            $table->string('status', 50);
            $table->decimal('preis',14,2);
            $table->integer('amount');
            $table->text('note')->nullable();
            $table->string('image');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handys');
    }
};
