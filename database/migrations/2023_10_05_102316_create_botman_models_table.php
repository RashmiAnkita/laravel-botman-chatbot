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
        Schema::create('botman_models', function (Blueprint $table) {
            $table->id();
            $table->text('name')->comment("Full Name");
            $table->integer('age');
            $table->text('gender')->comment("A=>Male, B=Female, C=>Others");
            $table->text('country');
            $table->text('region');
            $table->text('state');
            $table->text('place');
            $table->text('education');
            $table->text('occupation');
            $table->text('work');
            $table->text('marital');
            $table->text('children');
            $table->text('members');
            $table->text('experience');
            $table->text('job');
            $table->text('income');
            $table->text('monthly_income');
            $table->text('source_of_income');
            $table->text('household');
            $table->text('save_income');
            $table->text('total_income');
            $table->text('savings');
            $table->text('spending_total_income');
            $table->text('bills');
            $table->text('expenditure');
            $table->text('financial');
            $table->text('institution');
            $table->text('repay');
            $table->text('employment');
            $table->text('emergency');
            $table->text('insurance');
            $table->text('budget');
            $table->text('finances');
            $table->text('goal');
            $table->text('ability');
            $table->text('instrument');
            $table->text('asset');
            $table->text('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('botman_models');
    }
};
