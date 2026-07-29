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
            Schema::table('pest_control_records', function (Blueprint $table) {
                $table->string('usage_count')->nullable();
                $table->string('usage_period')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pest_control_records', function (Blueprint $table) {
            $table->dropColumn([
                'usage_count',
                'usage_period'
            ]);
        });
    }
};
