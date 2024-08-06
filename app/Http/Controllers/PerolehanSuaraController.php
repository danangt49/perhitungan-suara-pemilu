<?php

namespace App\Http\Controllers;

use App\Models\PerolehanSuara;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PerolehanSuaraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan tampilan utama
    public function index()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            return view('perolehan_suara.show');
        }
    }

    public function input()
    {
        if (Gate::allows('isSaksi')) {
            return view('perolehan_suara.input');
        }
    }

    // Mengambil data untuk DataTables
    public function json(Request $request)
    {
        if (Gate::allows('isAdmin')|| Gate::allows('isOwner')) {
            $query = PerolehanSuara::with('tps')->orderBy('created_at', 'DESC');

            if ($request->has('filter_kode_tps') && $request->filter_kode_tps) {
                $query->where('kode_tps', $request->filter_kode_tps);
            }

            if ($request->has('filter_kelurahan') && $request->filter_kelurahan) {
                $query->whereHas('tps', function ($q) use ($request) {
                    $q->where('kelurahan', $request->filter_kelurahan);
                });
            }

            if ($request->has('filter_kecamatan') && $request->filter_kecamatan) {
                $query->whereHas('tps', function ($q) use ($request) {
                    $q->where('kecamatan', $request->filter_kecamatan);
                });
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('alamat_tps', function ($row) {
                    return $row->tps ? $row->tps->alamat_tps : 'Tidak Diketahui';
                })
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
        if (Gate::allows('isAdmin') || Gate::allows('isSaksi')) {
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
                return redirect('perolehan-suara')->with('error', 'Kode TPS sudah digunakan dengan caleg yang sama.');
            }

            PerolehanSuara::create($request->all());

            if ($request->ajax()) {
                return response()->json(['success' => 'Data Sukses Ditambahkan.']);
            }
            return redirect('perolehan-suara')->with('success', 'Data Sukses Ditambahkan');
        }
    }

    // Menampilkan data untuk edit
    public function edit($id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isSaksi') || Gate::allows('isOwner')) {
            $data = PerolehanSuara::findOrFail($id);
            return response()->json($data);
        }
    }

    public function show($id)
    {
        if (Gate::allows('isSaksi')) {
            $data = PerolehanSuara::findOrFail($id);
            return response()->json($data);
        }
    }

    // Memperbarui data yang sudah ada
    public function update(Request $request, $id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isSaksi') || Gate::allows('isOwner')) {
            $request->validate([
                'id_user' => 'required|integer',
                'jumlah_suara' => 'required|integer',
                'catatan' => 'nullable|string',
            ]);

            $perolehanSuara = PerolehanSuara::findOrFail($id);

            $existing = PerolehanSuara::where('kode_tps', $request->kode_tps)
                ->where('id_user', $request->id_user)
                ->where('id', '!=', $id)
                ->exists();

            if ($existing) {
                if ($request->ajax()) {
                    return response()->json(['error' => 'Kode TPS sudah digunakan dengan caleg yang sama.'], 400);
                }
                return redirect('perolehan-suara')->with('error', 'Kode TPS sudah digunakan dengan caleg yang sama.');
            }

            $data = $request->only(['id_user', 'jumlah_suara', 'catatan']);

            $perolehanSuara->update($data);

            if ($request->ajax()) {
                return response()->json(['success' => 'Data Sukses Diperbarui.']);
            }
            return redirect('perolehan-suara')->with('success', 'Data Sukses Diperbarui');
        }
    }

    // Menghapus data
    public function destroy($id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $data = PerolehanSuara::findOrFail($id);
            $data->delete();
            return response()->json(['success' => 'Data Berhasil Dihapus']);
        }
    }

    // print pdf
    public function print(Request $request)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner') || Gate::allows('isOwner')) {
            $kodeTps = $request->input('kode_tps');
            $kecamatan = $request->input('kecamatan');
            $kelurahan = $request->input('kelurahan');

            $query = PerolehanSuara::query();

            if ($kodeTps) {
                $query->where('kode_tps', $kodeTps);
            }

            if ($kelurahan) {
                $query->whereHas('tps', function ($q) use ($kelurahan) {
                    $q->where('kelurahan', $kelurahan);
                });
            }

            if ($kecamatan) {
                $query->whereHas('tps', function ($q) use ($kecamatan) {
                    $q->where('kecamatan', $kecamatan);
                });
            }

            if ($kodeTps) {
                $title = 'TPS';
            } elseif ($kelurahan) {
                $title = 'KELURAHAN';
            } elseif ($kecamatan) {
                $title = 'KECAMATAN';
            } else {
                $title = 'DAPIL 6';
            }

            $user = User::where('role', 'owner')->first();
            $caleg = $user->nama;
            $partai = $user->partai;
            $dapil = $user->dapil;
            $wilayah = $user->wilayah;

            $data = $query->get();

            $pdf = Pdf::loadView('perolehan_suara.print', [
                'title' => $title,
                'caleg' => $caleg,
                'partai' => $partai,
                'dapil' => $dapil,
                'wilayah' => $wilayah,
                'kodeTps' => $kodeTps ?: 'Keseluruhan',
                'kelurahan' => $kelurahan ?: 'Keseluruhan',
                'kecamatan' => $kecamatan ?: 'Keseluruhan',
                'data' => $data,
            ]);

            return $pdf->download('Data_Perolehan_Suara.pdf');
        }
    }

    public function checkDataExists(Request $request)
    {
        if (Gate::allows('isSaksi')) {
            $data = PerolehanSuara::where('kode_tps', $request->kode_tps)->first();

            return response()->json([
                'exists' => !is_null($data),
                'data' => $data,
            ]);
        }
    }
}
