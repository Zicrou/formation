<?php

use App\Models\Cours;
use App\Models\Tag;
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
        Schema::create('cours_tag', function (Blueprint $table) {
            $table->uuid('tag_id');
            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');

            $table->uuid('cours_id');
            $table->foreign('cours_id')
            ->references('id')
            ->on('cours')
            ->onDelete('cascade');

            $table->primary(['tag_id', 'cours_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours_tag');
    }
};
