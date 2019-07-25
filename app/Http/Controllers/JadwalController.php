<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\mahasiswa;
use App\mahasiswa_jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = jadwal::all();
        return view('akademik.jadwal.index', compact('data'));
    }

    public function create()
    {
        return view('akademik.jadwal.create');
    }

    public function store(Request $request)
    {
        $jadwal = new jadwal();
        $jadwal->kelas = $request->kelas;
        $jadwal->jam = $request->start_time.' - '.$request->end_time;
        $jadwal->mata_kuliah = $request->mata_kuliah;
        $jadwal->termin = $request->termin;
        $jadwal->save();
        return redirect()->route('jadwal');
    }

    public function edit(Request $request)
    {
        $data = jadwal::find($request->id);
        $time = explode(' - ', $data->jam);
        $data->start_time = $time[0];
        $data->end_time = $time[1];
        return view('akademik.jadwal.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $jadwal = jadwal::find($request->id);
        $jadwal->kelas = $request->kelas;
        $jadwal->jam = $request->start_time.' - '.$request->end_time;
        $jadwal->mata_kuliah = $request->mata_kuliah;
        $jadwal->termin = $request->termin;
        $jadwal->save();
        return redirect()->route('jadwal');
    }

    public function delete(Request $request)
    {
        $jadwal = jadwal::find($request->id);
        $jadwal->delete();
        return redirect()->route('jadwal');
    }

    public function indexMahasiswaJadwal()
    {
        $mahasiswa = mahasiswa::all();
        $jadwal = jadwal::all();
        $data = array(
            "mahasiswa" => $mahasiswa,
            "jadwal" => $jadwal
        );
        return view('akademik.mahasiswa_jadwal.index', compact('data'));
    }

    public function selectJadwal(Request $request)
    {
        $mhs_jadwal = new mahasiswa_jadwal();
        $mhs_jadwal->mahasiswa_id = $request->mahasiswa_id;
        $mhs_jadwal->jadwal_id = $request->jadwal_id;
        $mhs_jadwal->save();
        return redirect();
    }
}
