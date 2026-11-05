<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('review', function (Blueprint $table) {
            $table->dropColumn(['name', 'description', 'price', 'stock']);
        });

        Schema::table('review', function (Blueprint $table) {
            // Nullable columns preserve the ability to migrate existing rows.
            // The API requires these values for every newly created review.
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->unsignedBigInteger('destination_id')->nullable()->after('user_id');
            $table->unsignedTinyInteger('rating')->nullable()->after('destination_id');
            $table->text('comment')->nullable()->after('rating');
        });
    }

    public function down(): void
    {
        Schema::table('review', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'destination_id', 'rating', 'comment']);
        });

        Schema::table('review', function (Blueprint $table) {
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
        });
    }
};
