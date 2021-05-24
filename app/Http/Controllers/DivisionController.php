<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Classes\Play;
use App\Models\Game;




class DivisionController extends Controller
{
    public function index()
    {
         $divisions = Division::with('teams')->get();

        $results = array();
        if (Game::where('division_id', 3)->exists()) {
            $results = Division::findOrFail(3)->teams()->orderByDesc('result')->get();
        }

        return view('index', compact('divisions','results'));
    }

    public function divisionGeneration($id)
    {
        if (!Game::where('division_id', $id)->exists()) {
            Play::setDivisionGame($id);
            Play::playOffGen($id);
        }

        return redirect()->action([DivisionController::class, 'index']);
    }

    public function playoffGeneration($id)
    {
        if (!Game::where('division_id', $id)->exists()) {
            $preSemiFinal = Division::findOrFail($id)->teams()->pluck('id')->chunk(4);
            Play::setPlayoffGame($id, $preSemiFinal);
            $semiFinal = Division::findOrFail($id)->teams()->wherePivot('result', 1)->pluck('id')->chunk(2);
            Play::setPlayoffGame($id, $semiFinal);
            $final = Division::findOrFail($id)->teams()->wherePivot('result', 2)->pluck('id')->chunk(1);
            Play::setPlayoffGame($id, $final);
        }

        return redirect()->action([DivisionController::class, 'index']);
    }


}
