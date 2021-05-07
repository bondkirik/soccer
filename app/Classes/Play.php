<?php


namespace App\Classes;


use App\Models\Division;
use App\Models\Game;

class Play
{
     static public function playGames($divisionId = null){

         $divisions = Division::with('teams')->findOrFail($divisionId);

         $last_team = $divisions->teams->last()->id;

         foreach ($divisions->teams as $team){
             $away = $team->id;
             for ($home = $team->id; $home <= $last_team; $home++){
                 if ($home != $away){
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

                 }
             }
         }
     }
}
