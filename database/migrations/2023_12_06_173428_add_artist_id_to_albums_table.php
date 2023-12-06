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
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('artist');

            $table->unsignedBigInteger('artist_id')->after('cover_image')->nullable();
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->string('artist')->nullable();
            $table->dropForeign(['artist_id']);
            $table->dropColumn('artist_id');
        });
    }
};
