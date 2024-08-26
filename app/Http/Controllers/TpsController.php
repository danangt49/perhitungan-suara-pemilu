<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class TpsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan tampilan utama
    public function index()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            return view('tps.show');
        }
    }

    // Mengambil data untuk DataTables
    public function json()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $data = Tps::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '<button type="button" class="btn btn-sm btn-warning edit" data-id="' . $row->id . '" data-toggle="tooltip" title="Edit Data"><i class="fas fa-tools"></i></button>';
                    $deleteButton = '<button type="button" class="btn btn-sm btn-danger delete" data-id="' . $row->id . '" data-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash-restore"></i></button>';
                    return $editButton . ' ' . $deleteButton;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $request->validate([
                'kode_tps' => 'required|string|max:255',
                'no_tps' => 'required|string|max:255',
                'alamat_tps' => 'required|string|max:255',
                'kelurahan' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
            ]);

            $existing = Tps::where('kode_tps', $request->kode_tps)->exists();

            if ($existing) {
                if ($request->ajax()) {
                    return response()->json(['error' => 'Kode Tps sudah ada.'], 400);
                }
                return redirect('tps')->with('error', 'Kode Tps ada.');
            }

            Tps::create($request->all());

            if ($request->ajax()) {
                return response()->json(['success' => 'Data Sukses Ditambahkan.']);
            }
            return redirect('tps')->with('success', 'Data Sukses Ditambahkan');
        }
    }

    // Menampilkan data untuk diedit
    public function edit($id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $tps = Tps::findOrFail($id);
            return response()->json($tps);
        }
    }

    // Memperbarui data yang sudah ada
    public function update(Request $request, $id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $request->validate([
                'kode_tps' => 'required|string|max:255',
                'no_tps' => 'required|string|max:255',
                'alamat_tps' => 'required|string|max:255',
                'kelurahan' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
            ]);

            $tps = Tps::findOrFail($id);
            $tps->update($request->all());

            if ($request->ajax()) {
                return response()->json(['success' => 'Data Sukses Diperbarui.']);
            }
            return redirect('tps')->with('success', 'Data Sukses Diperbarui');
        }
    }

    // Menghapus data
    public function destroy($id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $tps = Tps::findOrFail($id);
            $tps->delete();
            return response()->json(['success' => 'Data Berhasil Dihapus']);
        }
    }

    // Mencetak semua data ke PDF
    public function print()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $all = Tps::all();
            $pdf = Pdf::loadView('tps.print', ['data' => $all]);
            return $pdf->download('Data_tps.pdf');
        }
    }

    // Ambil data tps
    public function tpsOptions($currentKodeTps = null)
    {
        $tpsOptions = Tps::leftJoin('users', 'users.kode_tps', '=', 'tps.kode_tps')
            ->when($currentKodeTps, function ($query) use ($currentKodeTps) {
                $query->where(function ($q) use ($currentKodeTps) {
                    $q->whereNull('users.kode_tps')
                      ->orWhere('users.kode_tps', $currentKodeTps);
                });
            }, function ($query) {
                $query->whereNull('users.kode_tps');
            })
            ->select('tps.kode_tps')
            ->distinct()
            ->get();
    
        return response()->json($tpsOptions);
    }
    

    public function tpsOptionsSuara($currentKodeTps = null)
    {
        $tpsOptions = Tps::leftJoin('perolehan_suaras', 'perolehan_suaras.kode_tps', '=', 'tps.kode_tps')
            ->join('users', 'users.kode_tps', '=', 'tps.kode_tps')
            ->when($currentKodeTps, function ($query) use ($currentKodeTps) {
                $query->where(function ($q) use ($currentKodeTps) {
                    $q->whereNull('perolehan_suaras.kode_tps')
                    ->orWhere('perolehan_suaras.kode_tps', $currentKodeTps);
                });
            }, function ($query) {
                $query->whereNull('perolehan_suaras.kode_tps');
            })
            ->select('tps.kode_tps')
            ->distinct()
            ->get();

        return response()->json($tpsOptions);
    }

    public function getKecamatanOptions()
    {
        $kecamatan = Tps::select('kecamatan')->distinct()->get();
        return response()->json($kecamatan);
    }

    public function getKelurahanOptions(Request $request)
    {
        $kecamatan = $request->input('kecamatan');
        $kelurahan = Tps::where('kecamatan', $kecamatan)->select('kelurahan')->distinct()->get();
        return response()->json($kelurahan);
    }

    public function getTpsOptions(Request $request)
    {
        $kelurahan = $request->input('kelurahan');
        $tps = Tps::where('kelurahan', $kelurahan)->get();
        return response()->json($tps);
    }
}
