<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = range(1, 16);

        foreach ($teams as $team) {

            if ($team <= 8) {
                $divisionTeam = [
                    'division_id' => 1,
                    'team_id' => $team
                ];
            } else{
                $divisionTeam = [
                    'division_id' => 2,
                    'team_id' => $team
                ];
            }
            $divisionTeam['created_at'] = Carbon::now();
            $divisionTeam['updated_at'] = Carbon::now();
            DB::table('division_team')->insert($divisionTeam);
        }

    }
}
