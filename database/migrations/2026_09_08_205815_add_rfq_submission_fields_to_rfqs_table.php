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
        Schema::table('rfqs', function (Blueprint $table) {
            $table->string('vessel_name')->nullable()->after('name');
            $table->string('imo_number')->nullable()->after('vessel_name');
            $table->string('port')->nullable()->after('imo_number');
            $table->dateTime('eta')->nullable()->after('port');
            $table->string('contact')->nullable()->after('eta');
            $table->string('company')->nullable()->after('contact');
            $table->text('requirement')->nullable()->after('description');
            $table->string('attachment_path')->nullable()->after('requirement');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rfqs', function (Blueprint $table) {
            $table->dropColumn([
                'vessel_name', 'imo_number', 'port', 'eta', 'contact', 'company',
                'requirement', 'attachment_path',
            ]);
        });
    }
};
