<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\KodeRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggaranController extends Controller
{
    public $parent_title = "Master Data";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggarans = Anggaran::whereNull("deleted_at")->with('kode_rekening')->get();
        $kode_rekenings = KodeRekening::whereNull("deleted_at")->get();

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Anggaran",
            ],
            "data" => [
                'kode_rekenings' => $kode_rekenings,
                'anggarans' => $anggarans,
            ],
        ];

        return view("anggaran/index", $pass);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        $anggaran = new Anggaran;
        $anggaran->year = $request->year;
        $anggaran->kode_rekening_id = $request->kode_rekening_id;
        $anggaran->nominal = $request->nominal;
        $anggaran->description = $request->description;

        try {
            $anggaran->save();
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
            "data" => $anggaran,
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

        $anggaran = Anggaran::where("id", $id)->where("deleted_at", null)->first();
        if (!$anggaran) {
            return response()->json([
                "status" => "nok",
                "message" => "not found",
                "data" => null,
            ], 400);
        }

        $now = date('Y-m-d H:i:s');
        $anggaran->year = $request->year;
        $anggaran->kode_rekening_id = $request->kode_rekening_id;
        $anggaran->nominal = $request->nominal;
        $anggaran->description = $request->description;
        $anggaran->updated_at = $now;

        try {
            $anggaran->save();
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
            "data" => $anggaran,
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

        $anggaran = Anggaran::where("id", $id)->where("deleted_at", null)->first();

        if (!$anggaran) {
            return response()->json([
                "status" => "nok",
                "message" => "not found",
                "data" => null,
            ], 400);
        }

        $now = date('Y-m-d H:i:s');
        $anggaran->deleted_at = $now;

        try {
            $anggaran->save();
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
