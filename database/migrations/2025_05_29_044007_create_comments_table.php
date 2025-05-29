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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment_content')->comment('Content of the comment');
            $table->timestammp('comment_date')->comment('Date of the comment');
            $table->string('reviewer_name')->comment('Name of the reviewer');
            $table->string('reviewer_email')->comment('Email of the reviewer');
            $table->boolean('is_hidden')->default(false);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
