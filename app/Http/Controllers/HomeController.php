<?php

namespace App\Http\Controllers;

use App\Models\PerolehanSuara;
use App\Models\Tps;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner') || Gate::allows('isSaksi')) {
        $caleg = User::where('role', 'owner')->first();
        $totalSaksi = User::where('role', 'saksi')->count();
        $totalTps = Tps::count();
        $inputTps = PerolehanSuara::count();
        $totalSuara = User::select('perolehan_suaras.jumlah_suara')->leftJoin('perolehan_suaras', 'users.id', '=', 'perolehan_suaras.id_user')->sum('perolehan_suaras.jumlah_suara');

        $lastDataUpdate = PerolehanSuara::max('updated_at');
        $lastDataUpdate = $lastDataUpdate ? Carbon::parse($lastDataUpdate)->format('d-m-Y H:i:s') : 'Belum diperbarui';

        return view('home', [
            'caleg' => $caleg,
            'totalSaksi' => $totalSaksi,
            'totalTps' => $totalTps,
            'inputTps' => $inputTps,
            'totalSuara' => $totalSuara,
            'lastDataUpdate' => $lastDataUpdate,
        ]);
    } else {
        return view('auth.login');
    }
    }

    public function getResultsJson()
    {
        $results = Tps::select('tps.kode_tps', 'tps.no_tps', 'perolehan_suaras.jumlah_suara as total_suara')->leftJoin('perolehan_suaras', 'tps.kode_tps', '=', 'perolehan_suaras.kode_tps')->groupBy('tps.kode_tps', 'tps.no_tps', 'perolehan_suaras.jumlah_suara')->get();

        return response()->json([
            'data' => $results,
        ]);
    }
}
