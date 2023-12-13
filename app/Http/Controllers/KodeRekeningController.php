<?php

namespace App\Http\Controllers;

use App\Models\KodeRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KodeRekeningController extends Controller
{
    public $parent_title = "Master Data";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KodeRekening::whereNull("deleted_at")->get();

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Kode Rekening",
            ],
            "data" => $data,
        ];

        return view("kode_rekening/index", $pass);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "nok",
                "message" => $validator->messages(),
                "data" => null,
            ], 400);
        }

        $kode_rekening = new KodeRekening;
        $kode_rekening->kode = $request->kode;
        $kode_rekening->description = $request->description;

        try {
            $kode_rekening->save();
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
            "data" => $kode_rekening,
        ], 200);
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
            'kode' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "nok",
                "message" => $validator->messages(),
                "data" => null,
            ], 400);
        }

        $kode_rekening = KodeRekening::where("id", $id)->where("deleted_at", null)->first();
        if (!$kode_rekening) {
            return response()->json([
                "status" => "nok",
                "message" => "not found",
                "data" => null,
            ], 400);
        }

        $now = date('Y-m-d H:i:s');
        $kode_rekening->kode = $request->kode;
        $kode_rekening->description = $request->description;
        $kode_rekening->updated_at = $now;

        try {
            $kode_rekening->save();
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
            "data" => $kode_rekening,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        if (!is_numeric($id)) {
            return response()->json([
                "status" => "nok",
                "message" => "Invalid id type",
                "data" => null,
            ], 400);
        }

        $kode_rekening = KodeRekening::where("id", $id)->where("deleted_at", null)->first();

        if (!$kode_rekening) {
            return response()->json([
                "status" => "nok",
                "message" => "not found",
                "data" => null,
            ], 400);
        }

        $now = date('Y-m-d H:i:s');
        $kode_rekening->deleted_at = $now;

        try {
            $kode_rekening->save();
        } catch (\Exception $e) {
            return response()->json([
                "status" => "nok",
                "message" => "Something went wrong",
                "data" => null,
            ], 500);
        }

        return response()->json([
            "status" => "ok",
            "message" => "success",
            "data" => null,
        ], 200);
    }
}
