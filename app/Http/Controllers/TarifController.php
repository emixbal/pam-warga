<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarifController extends Controller
{
    public $parent_title = "Tarif";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tarif::get();

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Tarif",
            ],
            "data" => $data,
        ];

        return view("tarif/index", $pass);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!is_numeric($id)) {
            return response()->json([
                "status" => "nok",
                "message" => "Invalid id type",
                "data" => null,
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'abonemen' => 'required|integer',
            'per_meter' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "nok",
                "message" => $validator->messages(),
                "data" => null,
            ], 400);
        }

        $tarif = Tarif::where("id", $id)->first();
        if (!$tarif) {
            return response()->json([
                "status" => "nok",
                "message" => "not found",
                "data" => null,
            ], 400);
        }

        $now = date('Y-m-d H:i:s');
        $tarif->abonemen = $request->abonemen;
        $tarif->per_meter = $request->per_meter;
        $tarif->updated_at = $now;

        try {
            $tarif->save();
        } catch (\Exception $e) {
            return response()->json([
                "status" => "nok",
                "message" => $e,
                "data" => null,
            ], 500);
        }

        return response()->json([
            "status" => "ok",
            "message" => "sukses",
            "data" => $tarif,
        ], 200);
    }
}
