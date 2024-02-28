<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subregions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->collation('utf8mb4_unicode_ci')->notNullable();
            $table->text('translations')->collation('utf8mb4_unicode_ci')->nullable();
            $table->foreignId('region_id')->nullable()->constrained()->cascadeOnDelete();

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->notNullable();
            $table->tinyInteger('flag')->unsigned()->default(1)->notNullable();
            $table->string('wikiDataId', 255)->collation('utf8mb4_unicode_ci')->nullable()->comment('Rapid API GeoDB Cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subregions');
    }
};
