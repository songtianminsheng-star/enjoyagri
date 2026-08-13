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
        Schema::create('pest_control_records', function (Blueprint $table) {
            $table->id();
            $table->foreignid('crop_id')->constrained('crops');
            $table->timestamp('work_date');
            $table->string('weather');
            $table->string('pesticide_name');
            $table->string('dilution_rate');
            $table->string('amount');
            $table->string('target_pest');
            $table->text('memo')->nullable();
            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pest_control_records');
    }
};
