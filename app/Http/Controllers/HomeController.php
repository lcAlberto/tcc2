<?php

namespace App\Http\Controllers;

use App\Enums\UserRolesEnum;
use App\Models\AnimalHeat;
use App\Models\Animal;
use App\Models\Farm;
use App\Models\Health;
use App\Models\Medicament;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function teste(AnimalHeat $animalHeat, Animal $animal)
    {
        $cios = $animalHeat->all();
        $animals = $animal->all();
        $farms = Farm::all();
        foreach ($farms as $farm_item)
            $farm_item->auth_user;
        foreach ($animals as $item_animal)
            $item_animal->farm_id;
        return view('home', compact('cios', 'item_animal', 'farm_item'));
    }

    public function index(Farm $farm,
                          User $user,
                          Animal $animal,
                          AnimalHeat $heat,
                          Health $health,
                          Medicament $medicament)
    {
        if (UserRolesEnum::ADMIN)
            $farm_users = $farm->users()->count();
        $farm_animals = $farm->animals()->count();
        $farm_heats = $farm->animals()->whereHas('AnimalHeat')->count();
//        $farm_heats = $health->farm()->count();
//        dd($farm_users);
        return view('home', compact('farm_users', 'farm_animals', 'farm_heats'));
    }
}
