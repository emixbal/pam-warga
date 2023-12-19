<?php

namespace App\Http\Controllers;

use App\Models\Period;

class PembayaranController extends Controller
{
    public $parent_title = "Pembayaran";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = [];
        $periods = Period::whereNull("deleted_at")->get();

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "List Data",
            ],
            "data" => [
                'periods' => $periods,
                'pembayarans' => $pembayarans,
            ],
        ];

        return view("pembayaran/index", $pass);
    }

    public function recap()
    {
        $periods = Period::whereNull("deleted_at")->get();
        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Rekap Data",
            ],
            'periods' => $periods,
        ];

        return view("pembayaran/recap", $pass);
    }
}
