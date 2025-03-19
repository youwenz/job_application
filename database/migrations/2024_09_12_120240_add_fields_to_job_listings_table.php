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
        // Check if the table exists before truncating
        if (Schema::hasTable('job_listings')) {
            // Clear table data
            DB::table('job_listings')->truncate();
        }

        Schema::table('job_listings', function (Blueprint $table) {

            $table->integer('salary');
            $table->string('tags')->nullable();
            $table->enum('job_type', ['Full-Time', 'Part-Time', 'Contract', 'Temporary', 'Internship', 'Volunteer', 'On-Call'])->default('Full-Time');
            $table->boolean('remote')->default(false);
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();

            // Add user_id and company_id columns
            $table->unsignedBigInteger('user_id'); // Add this line
            $table->unsignedBigInteger('company_id')->nullable();

            // Add foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['company_id']);

            $table->dropColumn([
                'user_id', 'company_id', 'salary', 'tags', 'job_type',
                'remote', 'requirements', 'benefits'
            ]);
        });
    }
};
