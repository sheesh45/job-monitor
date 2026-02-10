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
        Schema::create('job_monitors', function (Blueprint $table) {
            $table->id();
            $table->string('job_id')->nullable();
            $table->string('job_name');
            $table->string('queue')->nullable();
            $table->string('connection')->nullable();
            $table->enum('status', ['running', 'success', 'failed']);
            $table->unsignedInteger('attempts')->default(0);
            $table->float('duration')->nullable();
            $table->longText('payload')->nullable();
            $table->longText('exception')->nullable();
            $table->timestamps();

            $table->index(['status']);
            $table->index(['job_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_monitors');
    }
};
