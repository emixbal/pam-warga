<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\Lingkungan;

class WargaController extends Controller
{
    public $parent_title = "Master Data";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wargas = Warga::whereNull("deleted_at")->with('lingkungan')->get();
        $lingkungans = Lingkungan::whereNull("deleted_at")->get();

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Warga",
            ],
            "data" => [
                'lingkungans' => $lingkungans,
                'wargas' => $wargas,
            ],
        ];

        return view("warga/index", $pass);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'lingkungan_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "nok",
                "message" => $validator->messages(),
                "data" => null,
            ], 400);
        }

        $warga = new Warga;
        $warga->kode = $request->kode;
        $warga->nama = $request->nama;
        $warga->lingkungan_id = $request->lingkungan_id;
        $warga->alamat = $request->alamat;

        try {
            $warga->save();
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
            "data" => $warga,
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
            'year' => 'required|integer|min:' . (date('Y') - 2) . '|max:' . (date('Y') + 10),
            'kode_rekening_id' => 'required',
            'nominal' => 'required|integer|min:4',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "nok",
                "message" => $validator->messages(),
                "data" => null,
            ], 400);
        }

        $warga = Warga::where("id", $id)->where("deleted_at", null)->first();
        if (!$warga) {
            return response()->json([
                "status" => "nok",
                "message" => "not found",
                "data" => null,
            ], 400);
        }

        $now = date('Y-m-d H:i:s');
        $warga->year = $request->year;
        $warga->kode_rekening_id = $request->kode_rekening_id;
        $warga->nominal = $request->nominal;
        $warga->description = $request->description;
        $warga->updated_at = $now;

        try {
            $warga->save();
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
            "data" => $warga,
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

        $warga = Warga::where("id", $id)->where("deleted_at", null)->first();

        if (!$warga) {
            return response()->json([
                "status" => "nok",
                "message" => "not found",
                "data" => null,
            ], 400);
        }

        $now = date('Y-m-d H:i:s');
        $warga->deleted_at = $now;

        try {
            $warga->save();
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
