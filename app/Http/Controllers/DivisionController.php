<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Team;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
         $divisions = Division::with('teams')->get();

        return view('index', compact('divisions'));
    }

    public function divisionAGen()
    {

        return redirect()->action([DivisionController::class, 'index']);
    }
    public function divisionBGen()
    {

        return redirect()->action([DivisionController::class, 'index']);
    }
    public function playoffGen()
    {

        return redirect()->action([DivisionController::class, 'index']);
    }
}
