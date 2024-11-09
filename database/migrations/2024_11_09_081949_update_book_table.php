<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBookTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('author')->after('title');
            $table->string('condition')->after('author');
            $table->dropColumn('description');
            $table->dropColumn('whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->text('description')->after('title');
            $table->string('whatsapp')->after('description');
            $table->dropColumn('author');
            $table->dropColumn('condition');
        });
    }
}
