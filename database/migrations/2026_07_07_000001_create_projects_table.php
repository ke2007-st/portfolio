<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->json('technologies')->nullable();
            $table->string('image')->nullable();
            $table->string('category')->default('Web Application');
            $table->string('link_live')->nullable();
            $table->string('link_github')->nullable();
            $table->enum('status', ['live', 'complete', 'in_progress'])->default('complete');
            $table->date('project_date')->nullable();
            $table->integer('order_index')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
