<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\PerolehanSuara;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('owner');
    }
    
    public function laporan()
    {
        return view('owner.laporan.show');
    }

    // Mengambil data untuk DataTables
    public function json(Request $request)
    {
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
            ->make(true);
    }
    
    // print pdf
    public function print(Request $request)
    {
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
    
        $pdf = Pdf::loadView('owner.laporan.print', [
            'title' => $title,
            'caleg' => $caleg,
            'partai' => $partai,
            'dapil' => $dapil,
            'wilayah' => $wilayah,
            'kodeTps' => $kodeTps ?: 'Keseluruhan',
            'kelurahan' => $kelurahan ?: 'Keseluruhan',
            'kecamatan' => $kecamatan ?: 'Keseluruhan',
            'data' => $data
        ]);
    
        return $pdf->download('Data_Perolehan_Suara.pdf');
    }
}
