<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrinkController extends Controller
{
    public function getDrinks() {
        $drinks = DB::table("drinks")->get();

        return $drinks;
    }

    public function getDrinkNames() {

        $drinksName = DB::table("drinks")
                        ->select("drink as Ital")
                        ->get();

        return $drinksName;
    }

    public function getDrink() {
        // $drink = DB::table("drinks")
        //                 ->where("id", 6)
        //                 ->firstOrFail();

        $drink = DB::table("drinks")->find(2);

        return response()->json(["drink" => $drink]);
    }

    public function getLessHundred() {
        $drinks = DB::table("drinks")
                        ->where("amount", "<", 100)
                        ->get();

        return response()->json(["szukseges" => $drinks]);
    }

    public function getCannedDrinks() {
        $drinks = DB::table("drinks")
                        ->select("amount")
                        ->where("package_id", 2)
                        // ->groupBy("amount")
                        ->get();

        return response()->json(["drinks" => $drinks]);
    }

    public function getAllDrinks() {
        $drinks = DB::table("drinks")
                        ->join("packages", "drinks.package_id", "packages.id")
                        ->join("types", "drinks.type_id", "types.id")
                        ->get();

        return response()->json(["alldrinks" => $drinks]);
    }

    public function updateDrink( int $id) {
        $success = DB::table("drinks")
                        ->where("id", $id)
                        ->update([
                            "amount" => 79,
                        ]);
        return $success. " Sikeres módosítás";
    }

    public function deleteDrink( int $id) {
        $success =DB::table("drinks")
                    ->where("id", $id)
                    ->delete();
        return response()->json([
            "success" => $success,
            "message" => "Sikeres törlés"
        ]);
    }
}
