<?php

namespace App\Http\Controllers;

use App\Models\Dewan;
use App\Models\Partai;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DewanController extends Controller
{
    public $parent_title = "Dewan";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dewans = Dewan::whereNull("dewans.deleted_at")
            ->join('partais', 'dewans.partai_id', '=', 'partais.id')
            ->join('periods', 'dewans.period_id', '=', 'periods.id')
            ->select('dewans.*', 'partais.name as partai', 'periods.name as period')
            ->get();
        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Semua Dewan",
            ],
            "data" => [
                "dewans" => $dewans,
            ],
        ];

        return view("dewan/index", $pass);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partais = Partai::whereNull("deleted_at")->get();
        $periods = Period::whereNull("deleted_at")->get();
        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Tambah Data",
            ],
            "data" => [
                "partais" => $partais,
                "periods" => $periods,
            ],
        ];

        return view("dewan/new", $pass);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'nik' => 'required|min:16|unique:dewans,nik',
            'dob' => 'date_format:d-m-Y',
        ]);

        if ($validator->fails()) {
            return redirect('dewan/new')
                ->withErrors($validator)
                ->withInput();
        }

        $dewan = new Dewan;
        $dewan->name = $request->name;
        $dewan->address = $request->address;
        $dewan->nik = $request->nik;
        $dewan->npwp = $request->npwp;
        $dewan->pob = $request->pob;
        $dewan->dob = date("Y-m-d", strtotime(str_replace('/', '-', $request->dob)));
        $dewan->bank = $request->bank;
        $dewan->nomer_rekening = $request->nomer_rekening;
        $dewan->spouses = $request->spouses;
        $dewan->children = $request->children;
        $dewan->partai_id = $request->partai;
        $dewan->period_id = $request->period;

        try {
            $dewan->save();
        } catch (\Exception $e) {
            return redirect('dewan/new')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        return redirect()->route('dewan.detail', $dewan->id);
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $dewan = Dewan::whereNull("dewans.deleted_at")
            ->where("dewans.id", $id)
            ->join('partais', 'dewans.partai_id', '=', 'partais.id')
            ->join('periods', 'dewans.period_id', '=', 'periods.id')
            ->select('dewans.*', 'partais.name as partai', 'periods.name as period')
            ->first();

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Detail",
            ],
            "data" => [
                "dewan" => $dewan,
            ],
        ];

        if (!$dewan) {
            return view('dewan/404', $pass);
        }

        return view("dewan/detail", $pass);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dewan = Dewan::find($id);

        $partais = Partai::whereNull("deleted_at")->get();
        $periods = Period::whereNull("deleted_at")->get();
        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Edit Data",
            ],
            "data" => [
                "partais" => $partais,
                "periods" => $periods,
                "dewan" => $dewan,
            ],
        ];

        if (!$dewan) {
            return view('dewan/404', $pass);
        }

        return view("dewan/edit", $pass);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dewan = Dewan::find($id);
        $now = date('Y-m-d H:i:s');
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'nik' => 'required|min:16|unique:dewans,nik,' . $dewan->id,
            'dob' => 'date_format:d-m-Y',
        ]);

        if ($validator->fails()) {
            return redirect('dewan/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        $dewan->name = $request->name;
        $dewan->address = $request->address;
        $dewan->nik = $request->nik;
        $dewan->npwp = $request->npwp;
        $dewan->pob = $request->pob;
        $dewan->dob = date("Y-m-d", strtotime(str_replace('/', '-', $request->dob)));
        $dewan->bank = $request->bank;
        $dewan->nomer_rekening = $request->nomer_rekening;
        $dewan->spouses = $request->spouses;
        $dewan->children = $request->children;
        $dewan->partai_id = $request->partai;
        $dewan->period_id = $request->period;
        $dewan->updated_at = $now;

        try {
            $dewan->save();
        } catch (\Exception $e) {
            return redirect()->route('dewan.edit', $dewan->id)
                ->withErrors($e->getMessage())
                ->withInput();
        }

        return redirect()->route('dewan.detail', $dewan->id);
    }

    public function upload_doc($id)
    {
        $dewan = Dewan::find($id);
        if (!$dewan) {
            return view('dewan/404');
        }

        $pass = [
            "page" => [
                "parent_title" => $this->parent_title,
                "title" => "Upload Dokumen",
            ],
            "data" => [
                "dewan" => $dewan,
            ],
        ];

        return view("dewan/upload_doc", $pass);
    }

    public function upload_doc_process(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'file|mimes:jpg,png', // Sesuaikan dengan jenis file yang diizinkan.
            'ktp' => 'file|mimes:jpg,png', // Sesuaikan dengan jenis file yang diizinkan.
            'npwp' => 'file|mimes:jpg,png', // Sesuaikan dengan jenis file yang diizinkan.
            'kk' => 'file|mimes:jpg,png', // Sesuaikan dengan jenis file yang diizinkan.
            'buku_tabungan' => 'file|mimes:jpg,png', // Sesuaikan dengan jenis file yang diizinkan.
            'keterangan_kuliah' => 'file|mimes:jpg,png', // Sesuaikan dengan jenis file yang diizinkan.
            'doc_lain' => 'file|mimes:jpg,png', // Sesuaikan dengan jenis file yang diizinkan.
        ]);

        DB::beginTransaction();

        $dewan = Dewan::find($id);
        if (!$dewan) {
            return view('dewan/404');
        }

        if ($validator->fails()) {
            return redirect()->route('dewan.upload-form', $dewan->id)
                ->withErrors($validator)
                ->withInput();
        }

        $foto_name = ($request->file('foto')) ? $dewan->nik . '_FOTO.' . $request->file('foto')->extension() : null;
        $ktp_name = ($request->file('ktp')) ? $dewan->nik . '_KTP.' . $request->file('ktp')->extension() : null;
        $npwp_name = ($request->file('npwp')) ? $dewan->nik . '_NPWP.' . $request->file('npwp')->extension() : null;
        $kk_name = ($request->file('kk')) ? $dewan->nik . '_KK.' . $request->file('kk')->extension() : null;
        $buku_tabungan_name = ($request->file('buku_tabungan')) ? $dewan->nik . '_BUKU_TAB.' . $request->file('buku_tabungan')->extension() : null;
        $keterangan_kuliah_name = ($request->file('keterangan_kuliah')) ? $dewan->nik . '_KETERANGAN_KULIAH.' . $request->file('keterangan_kuliah')->extension() : null;
        $doc_lain_name = ($request->file('doc_lain')) ? $dewan->nik . '_DOC_LAIN.' . $request->file('doc_lain')->extension() : null;

        $dewan->doc_foto = $foto_name;
        $dewan->doc_ktp = $ktp_name;
        $dewan->doc_kk = $kk_name;
        $dewan->doc_npwp = $npwp_name;
        $dewan->doc_buku_tabungan = $buku_tabungan_name;
        $dewan->doc_keterangan_kuliah = $keterangan_kuliah_name;
        $dewan->doc_lain = $doc_lain_name;

        try {
            $dewan->save();
        } catch (\Exception $e) {
            return redirect()->route('dewan.upload-form', $dewan->id)
                ->withErrors($e->getMessage())
                ->withInput();
        }

        try {
            if ($foto_name) {
                $request->foto->move(storage_path('app/public/foto_dewan'), $foto_name);
            }
            if ($ktp_name) {
                $request->ktp->move(storage_path('app/public/ktp_dewan'), $ktp_name);
            }
            if ($npwp_name) {
                $request->npwp->move(storage_path('app/public/npwp_dewan'), $npwp_name);
            }
            if ($kk_name) {
                $request->kk->move(storage_path('app/public/kk_dewan'), $kk_name);
            }
            if ($buku_tabungan_name) {
                $request->buku_tabungan->move(storage_path('app/public/buku_tabungan_dewan'), $buku_tabungan_name);
            }
            if ($keterangan_kuliah_name) {
                $request->keterangan_kuliah->move(storage_path('app/public/keterangan_kuliah_dewan'), $keterangan_kuliah_name);
            }
            if ($doc_lain_name) {
                $request->doc_lain->move(storage_path('app/public/doc_lain_dewan'), $doc_lain_name);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('dewan.upload-form', $dewan->id)
                ->withErrors($e->getMessage())
                ->withInput();
        }

        DB::commit();

        return redirect()->route('dewan.detail', $dewan->id);
    }

}
