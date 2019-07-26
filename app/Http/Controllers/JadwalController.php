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

    public function detailJadwal($id)
    {
        $jadwal = jadwal::find($id);
        $sudah_diterima = \DB::table('mahasiswa')
                            ->join('mahasiswa_jadwal', 'mahasiswa.id', '=', 'mahasiswa_jadwal.mahasiswa_id')
                            ->select('mahasiswa.nrp', 'mahasiswa.nama')
                            ->where('mahasiswa_jadwal.jadwal_id', '=', $id)
                            ->get();
        dd($sudah_diterima);

        $data = array(
            'jadwal' => $jadwal,
            'mahasiswa' => $sudah_diterima
        );

        return view('akademik.jadwal.detail', compact('data'));
    }

    private function belumDapatJadwal($id)
    {
        $sudah_dapat = \DB::table('mahasiswa_jadwal')
                            ->select('mahasiswa_jadwal.mahasiswa_id')
                            ->where('mahasiswa_jadwal.jadwal_id', '=', $id)
                            ->get();
        dd($sudah_dapat);
    }
}