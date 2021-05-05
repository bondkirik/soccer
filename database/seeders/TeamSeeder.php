<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $alphabets = range('A', 'P');

        foreach ($alphabets as $alphabet){

            $team = ['name' => $alphabet];
            $team['created_at'] = Carbon::now();
            $team['updated_at'] = Carbon::now();

            DB::table('teams')->insert($team);

        }
    }
}
