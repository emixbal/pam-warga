<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeriodController extends Controller
{
    public $parent_title = "Periode";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Period::whereNull("deleted_at")->get();

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Period",
            ],
            "data" => $data,
            "date" => date('Y-m-01'),
        ];

        return view("period/index", $pass);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'date' => 'required|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "nok",
                "message" => $validator->messages(),
                "data" => null,
            ], 400);
        }

        $period = new Period;
        $period->name = $request->name;
        $period->date = $request->date;
        $period->user_id = Auth::user()->id;

        try {
            $period->save();
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
            "data" => $period,
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

        $period = Period::where("id", $id)->where("deleted_at", null)->first();

        if (!$period) {
            return response()->json([
                "status" => "nok",
                "message" => "not found",
                "data" => null,
            ], 400);
        }

        $now = date('Y-m-d H:i:s');
        $period->deleted_at = $now;

        try {
            $period->save();
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
