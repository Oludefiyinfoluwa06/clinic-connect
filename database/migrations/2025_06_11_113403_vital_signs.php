<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->string('temperature');
            $table->string('blood_pressure');
            $table->string('pulse');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
