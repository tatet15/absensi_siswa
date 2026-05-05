<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        // Mengambil data menggunakan Query Builder
        $kehadiran = DB::table('attendances')->orderBy('tanggal', 'desc')->get();
        return view('layout', compact('kehadiran'));
    }
    public function redirect()
    {
        // Mengambil data menggunakan Query Builder
        $kehadiran = DB::table('attendances')->orderBy('tanggal', 'desc')->get();
        return view('absen', compact('kehadiran'));
    }

    public function create()
    {
        return view('tambah');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_siswa' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        // Memastikan keterangan tetap kosong (string kosong) jika tidak diisi
        $keterangan = $request->filled('keterangan') ? $request->keterangan : '';

        // Menyimpan data menggunakan Query Builder
        DB::table('kehadiran')->insert([
            'nama_siswa' => $request->nama_siswa,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('layout')->with('success', 'Data absensi berhasil ditambahkan.');
    }
}
