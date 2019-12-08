<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;

class PaketController extends Controller
{
    public function all()
    {
        $paket = Paket::all();

        return response()->json([
            "paket" => $paket
        ], 200);
    }
    public function get($id)
    {
        $paket = Paket::where($id);
        return response()->json([
            "paket" => $paket
        ], 200);
    }
    public function new(Request $request)
    {
        $paket = Paket::create($request->only(["id", "nmpaket", "pagurmp", "progres_fisik"]));
        return response()->json([
            "paket" => $paket
        ], 200);
    }
}
