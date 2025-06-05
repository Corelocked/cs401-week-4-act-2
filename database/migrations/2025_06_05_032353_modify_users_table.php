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
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->max(30)->comment('Alphanumeric name of the user, max 30 characters')->change();
        });
        Schema::table('roles', function (Blueprint $table) {
           $table->string('role_name')->comment('Admin, Contributor, Subscriber')->max(1)->change();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->text('content')->comment('Content of the post')->change();
            $table->string('status')->comment('(D - Draft, P - Published, I - Inactive)')->max(1)->change();
            $table->text('featured_image_url')->comment('URL of the featured image')->change();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->string('category_name')->comment('Name of the category')->max(30)->change();
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->string('tag_name')->comment('Name of the tag')->max(45)->change();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->text('comment_content')->comment('Content of the comment')->change();
            $table->string('reviewer_name')->comment('Name of the reviewer')->nullable()->change();
            $table->string('reviewer_email')->comment('Email of the reviewer')->nullable()->change();
        });
        Schema::table('media', function (Blueprint $table) {
            $table->string('file_type')->comment('Type of the media file (e.g., image, video, audio)')->max(10)->change();
            $table->integer('file_size')->comment('Size of the media file in bytes')->default(0)->change();
            $table->string('description')->comment('Description of the media file')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->change();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->string('role_name')->comment('Admin, Contributor, Subscriber')->change();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->text('content')->comment('Content of the post')->change();
            $table->string('status')->comment('(D - Draft, P - Published, I - Inactive)')->change();
            $table->string('featured_image_url')->comment('URL of the featured image')->change();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->string('category_name')->comment('Name of the category')->change();
        }); 
        Schema::table('tags', function (Blueprint $table) {
            $table->string('tag_name')->comment('Name of the tag')->tags;
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->text('comment_content')->comment('Content of the comment')->change();
            $table->string('reviewer_name')->comment('Name of the reviewer')->change();
            $table->string('reviewer_email')->comment('Email of the reviewer')->change();
        });
        Schema::table('media', function (Blueprint $table) {
            $table->string('file_type')->comment('Type of the media file (e.g., image, video, audio)')->change();
            $table->integer('file_size')->comment('Size of the media file in bytes')->change();
            $table->string('description')->comment('Description of the media file')->change();
        });
    }
};
