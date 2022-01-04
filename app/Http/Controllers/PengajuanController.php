<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuans = Pengajuan::where('user_id', Auth::user()->id)->get();

        return view('pengajuan.index', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('nilai_magang')) {
            $data['nilai_magang'] = $request->file('nilai_magang')->store('nilai_magang', 'public');
        }
        if ($request->file('laporan_magang')) {
            $data['laporan_magang'] = $request->file('laporan_magang')->store('laporan_magang', 'public');
        }
        if ($request->file('sertifikat_magang')) {
            $data['sertifikat_magang'] = $request->file('sertifikat_magang')->store('sertifikat_magang', 'public');
        }
        Pengajuan::create($data);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengajuan = Pengajuan::find($id);

        return view('pengajuan.show', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengajuan = Pengajuan::find($id);

        return view('pengajuan.edit', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('nilai_magang')) {
            $data['nilai_magang'] = $request->file('nilai_magang')->store('nilai_magang', 'public');
        }
        if ($request->file('laporan_magang')) {
            $data['laporan_magang'] = $request->file('laporan_magang')->store('laporan_magang', 'public');
        }
        if ($request->file('sertifikat_magang')) {
            $data['sertifikat_magang'] = $request->file('sertifikat_magang')->store('sertifikat_magang', 'public');
        }
        Pengajuan::find($id)->update($data);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengajuan::find($id)->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan Berhasil');
    }

    public function download(Request $request,$id)
    {
        if ($request->get('jenis') == 'nilai_magang') {
            $file = Pengajuan::find($id)->nilai_magang;

            return response()->download(storage_path('app/public/'. $file));
        }else if($request->get('jenis') == 'sertifikat_magang'){
            $file = Pengajuan::find($id)->sertifikat_magang;

            return response()->download(storage_path('app/public/'. $file));
        }else{
            $file = Pengajuan::find($id)->laporan_magang;

            return response()->download(storage_path('app/public/'. $file));
        }
    }
}
