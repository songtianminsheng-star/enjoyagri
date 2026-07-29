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
        Schema::table('pest_control_records', function (Blueprint $table) {
            $table->renameColumn('work_date', 'treatment_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pest_control_records', function (Blueprint $table) {
            $table->renameColumn('treatment_date', 'work_date');
        });
    }
};
