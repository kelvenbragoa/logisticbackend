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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->integer('trela_id');
            $table->string('departure');
            $table->string('destination');
            $table->integer('load_status_id');
            $table->integer('total_distance');
            $table->integer('total_diesel');
            $table->integer('canvas_expenses');
            $table->integer('feed_expenses');
            $table->integer('bridge_expenses');
            $table->integer('county_expenses');
            $table->integer('toll_expenses');
            $table->integer('carbon_tax_expenses');
            $table->integer('t_ep_expenses');
            $table->integer('processo_sem_fim_expenses');
            $table->integer('total_expenses');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
