<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('competition_id')->constrained();
            $table->timestamps();
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('field_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained();
            $table->foreignId('group_id')->constrained();
            $table->foreignId('competition_id')->constrained();
            $table->timestamps();
        });

        Schema::create('age_ranges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('competition_id')->constrained();
            $table->timestamps();
        });

        // somewhat of an age_range_field pivot table
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained();
            $table->foreignId('age_id')->constrained('age_ranges');
            $table->timestamps();
        });

        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('competition_id')->constrained();
            $table->foreignId('field_id')->constrained();
            $table->foreignId('challenge_id')->constrained();
            $table->timestamps();
        });

        Schema::create('examiners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained();
            $table->timestamps();
        });
    }
};
