<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('first_name');
            $table->string('other_name')->nullable();
            $table->string('hospital_number');
            $table->string('place_of_origin');
            $table->string('state');
            $table->string('local_government_area');
            $table->string('phone_number');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
