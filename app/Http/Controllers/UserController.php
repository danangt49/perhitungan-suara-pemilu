<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan tampilan utama
    public function index()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            return view('saksi.show');
        }
    }

    // Mengambil data untuk DataTables
    public function json()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $data = User::where('role', 'saksi')->get();
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
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'alamat_tinggal' => 'required|string|max:255',
                'no_ktp' => 'required|string|max:20|unique:users',
                'no_hp' => 'required|string|max:20',
                'password' => 'required|string|min:8',
                'kode_tps' => 'nullable|string|max:255',
                'partai' => 'nullable|string|max:255',
                'pendidikan' => 'required|string|max:255',
                'agama' => 'required|string|max:255',
                'jenis_kelamin' => 'required|string|max:10',
                'role' => 'required|string|in:saksi,caleg',
            ]);

            $existing = User::where('no_ktp', $request->no_ktp)
                ->orWhere('kode_tps', $request->kode_tps)
                ->exists();

            if ($existing) {
                if ($request->ajax()) {
                    return response()->json(['error' => 'No KTP dengan Kode Tps sudah digunakan.'], 400);
                }
                return redirect('tps')->with('error', 'No KTP dengan Kode Tps sudah digunakan.');
            }

            $request->merge(['password' => bcrypt($request->password)]);

            User::create($request->all());

            if ($request->ajax()) {
                return response()->json(['success' => 'Data Sukses Ditambahkan.']);
            }
            return redirect('saksi')->with('success', 'Data Sukses Ditambahkan');
        }
    }

    // Menampilkan data untuk diedit
    public function edit($id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $user = User::findOrFail($id);
            return response()->json($user);
        }
    }

    // Memperbarui data yang sudah ada
    public function update(Request $request, $id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'alamat_tinggal' => 'required|string|max:255',
                'no_ktp' => 'required|string|max:20|unique:users,no_ktp,' . $id,
                'no_hp' => 'required|string|max:20',
                'password' => 'nullable|string|min:8',
                'kode_tps' => 'nullable|string|max:255',
                'partai' => 'nullable|string|max:255',
                'pendidikan' => 'required|string|max:255',
                'agama' => 'required|string|max:255',
                'jenis_kelamin' => 'required|string|max:10',
                'role' => 'required|string|in:saksi,caleg',
            ]);

            $user = User::findOrFail($id);

            $data = $request->except('password');
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            if ($request->ajax()) {
                return response()->json(['success' => 'Data Sukses Diperbarui.']);
            }
            return redirect('saksi')->with('success', 'Data Sukses Diperbarui');
        }
    }

    // Menghapus data
    public function destroy($id)
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['success' => 'Data Berhasil Dihapus']);
        }
    }

    // Mencetak semua data ke PDF
    public function print()
    {
        if (Gate::allows('isAdmin') || Gate::allows('isOwner')) {
            $all = User::where('role', 'saksi')->get();
            $pdf = Pdf::loadview('saksi.print', ['data' => $all]);
            return $pdf->download('Data_Saksi.pdf');
        }
    }

    public function getCaleg()
    {
        $caleg = User::where('role', 'owner')->first(['id', 'nama', 'partai']);
        return response()->json($caleg);
    }
}
