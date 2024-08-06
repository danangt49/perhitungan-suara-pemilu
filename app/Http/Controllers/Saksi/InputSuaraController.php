<?php

namespace App\Http\Controllers\Saksi;

use App\Http\Controllers\Controller;
use App\Models\PerolehanSuara;
use Illuminate\Http\Request;

class InputSuaraController extends Controller
{
    public function __construct()
    {
        $this->middleware('saksi');
    }

    public function index()
    {
        return view('saksi.input_suara.input');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'kode_tps' => 'required|string',
            'jumlah_suara' => 'required|integer',
            'catatan' => 'nullable|string',
        ]);

        $existing = PerolehanSuara::where('kode_tps', $request->kode_tps)
            ->where('id_user', $request->id_user)
            ->exists();

        if ($existing) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Kode TPS sudah digunakan dengan caleg yang sama.'], 400);
            }
            return redirect('saksi.input-suara')->with('error', 'Kode TPS sudah digunakan dengan caleg yang sama.');
        }

        PerolehanSuara::create($request->all());

        if ($request->ajax()) {
            return response()->json(['success' => 'Data Sukses Ditambahkan.']);
        }
        return redirect('saksi.input-suara')->with('success', 'Data Sukses Ditambahkan');
    }

}
