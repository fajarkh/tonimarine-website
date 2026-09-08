<?php

namespace Modules\Rfq\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Rfq\Models\Rfq;

class RfqDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * Rfqs Seed
         * ------------------
         */

        // DB::table('rfqs')->truncate();
        // echo "Truncate: rfqs \n";

        Rfq::factory()->count(20)->create();
        $rows = Rfq::all();
        echo " Insert: rfqs \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
