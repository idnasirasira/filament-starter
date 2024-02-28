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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->collation('utf8mb4_unicode_ci')->notNullable();
            $table->foreignId('country_id')->nullable()->constrained()->cascadeOnDelete();
            $table->char('country_code', 2)->collation('utf8mb4_unicode_ci')->notNullable();
            $table->string('fips_code', 255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('iso2', 255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('type', 191)->collation('utf8mb4_unicode_ci')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
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
        Schema::dropIfExists('states');
    }
};
