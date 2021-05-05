<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
           ['name' => 'A'],
           ['name' => 'B'],
           ['name' => 'PO'],
        ];

        foreach ($divisions as $division){

            $division['created_at'] = Carbon::now();
            $division['updated_at'] = Carbon::now();

            DB::table('divisions')->insert($division);

        }


    }
}
