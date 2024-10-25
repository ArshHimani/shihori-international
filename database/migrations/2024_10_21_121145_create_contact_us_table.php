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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->text('paragraph');
            $table->string('phoneNo');
            $table->string('email');
            $table->string('address');
            $table->string('opening_hours');
            $table->string('whatsapp');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedIn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
