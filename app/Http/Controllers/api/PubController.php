<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drink;

class PubController extends Controller
{
    public function getDrinks() {
        $drinks = Drink::all();

        return response()->json(["drinks" => $drinks]);
    }

    public function getDrinkId(int $id) {
        $drink = Drink::find($id);

        return response()->json(["drink" => $drink]);
    }

    public function getDrinkByName(Drink $drink) {
        // $drink = Drink::find($id);
        $name = $drink->name;
        return response()->json(["drink" => $name]);
    }
}
