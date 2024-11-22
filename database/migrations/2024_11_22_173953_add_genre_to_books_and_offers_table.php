<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenreToBooksAndOffersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('genre')->after('title');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->string('genre')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('genre');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('genre');
        });
    }
};
