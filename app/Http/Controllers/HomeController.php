<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\GuruModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ambil data terbaru untuk dashboard
        $latestSiswa = SiswaModel::orderBy('id_siswa', 'desc')->with('kelas')->limit(5)->get(); // 5 siswa terbaru
        $latestKelas = KelasModel::orderBy('id_kelas', 'desc')->limit(5)->get(); // 5 kelas terbaru
        $latestGuru = GuruModel::orderBy('id_guru', 'desc')->limit(5)->get(); // 5 guru terbaru

        // Ambil total data
        $totalSiswa = SiswaModel::count();
        $totalKelas = KelasModel::count();
        $totalGuru = GuruModel::count();

        return view('home', compact(
            'latestSiswa', 'latestKelas', 'latestGuru',
            'totalSiswa', 'totalKelas', 'totalGuru'
        ));
    }
}