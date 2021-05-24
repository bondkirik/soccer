<?php


namespace App\Classes;


use App\Models\Division;
use App\Models\Game;
use App\Models\Team;

class Play
{
     static public function setDivisionGame($divisionId = null){

         $divisions = Division::with('teams')->findOrFail($divisionId);

         $last_team = $divisions->teams->last()->id;

         foreach ($divisions->teams as $team){
             $away = $team->id;
             for ($home = $away; $home <= $last_team; $home++){
                 if ($home != $away){
                     Play::storeGames($divisionId,$home,$away);
                 }
             }

         }
     }


    static public function setPlayoffGame($divisionId,$teams)
    {
        if (count($teams) == 2) {
            $matches['division_id'] = $divisionId;
            for ($i = 0; $i < count($teams[0]); $i++) {
                Play::storeGames($divisionId,$teams[0][$i],$teams[1]->reverse()->values()[$i]);
            }
        }
    }

    static private function storeGames($divisionId,$home,$away)
    {
        $golsAway = rand(0,4);
        $golsHome = rand(0,4);
        if ($golsHome == $golsAway){
            $golsHome++;
        }
        $matches = [
            'division_id' => $divisionId,
            'home_id' => $home,
            'away_id' => $away,
            'score' => $golsHome.':'. $golsAway,

        ];
        if ($golsHome > $golsAway){
            $matches['win_id'] = $home;
        }else{
            $matches['win_id'] = $away;
        }

        Game::create($matches);

        $scores = Division::findOrFail($divisionId)->games->where('win_id',  $matches['win_id'])->count();
        Team::findOrFail($matches['win_id'])->divisions()->update(['result' => $scores]);

    }

    static public function playOffGen($divisionID)
    {
        $teams = Division::findOrFail($divisionID)->teams()->orderByDesc('result')->limit(4)->get();

        foreach ($teams as $team) {
            $divisions = Division::find(3);
            $divisions->teams()->attach($team->id, ['result' => 0]);
        }
    }
}
