<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use App\Models\Period;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    public $parent_title = "Pemakaian";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = Period::whereNull("deleted_at")->get();

        $query = Pemakaian::leftJoin('wargas', 'wargas.id', '=', 'pemakaians.warga_id')
            ->leftJoin('lingkungans', 'lingkungans.id', '=', 'wargas.lingkungan_id')
            ->select(
                "lingkungans.nama as lingkungan",
                "wargas.kode as warga_kode",
                "wargas.nama as warga_nama",
                "wargas.alamat as warga_alamat",
                "pemakaians.total",
                "pemakaians.nominal_bayar",
                "pemakaians.sudah_bayar",
            );

        $pemakaians = $query->get();

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Pemakaian",
            ],
            "data" => [
                'periods' => $periods,
                'pemakaians' => $pemakaians,
            ],
        ];

        return view("pemakaian/index", $pass);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Ambil Data",
            ]
        ];
        return view("pemakaian/add", $pass);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemakaian $pemakaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemakaian $pemakaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemakaian $pemakaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemakaian $pemakaian)
    {
        //
    }
}
