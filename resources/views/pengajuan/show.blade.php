@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Detail
                </span>
                <span>
                    <a href="{{ route('pengajuan.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <table style="width: 100%">
                    <tr>
                        <th>Pengaju</th>
                        <th>:</th>
                        <th>{{ $pengajuan->user->name }}</th>
                    </tr>
                    <tr>
                        <th>Pengaju</th>
                        <th>:</th>
                        <th>{{ $pengajuan->user->nim }}</th>
                    </tr>
                    <tr>
                        <th>Tanggal Pengajuan</th>
                        <th>:</th>
                        <th> {{ Carbon\Carbon::parse($pengajuan->created_at)->format('d M Y') }}</th>
                    </tr>
                    <tr>
                        <th>Tanggal Magang</th>
                        <th>:</th>
                        <th> {{ Carbon\Carbon::parse($pengajuan->tanggal_magang)->format('d M Y') }}}</th>
                    </tr>
                    <tr>
                        <th>Perusahaan</th>
                        <th>:</th>
                        <th>{{ $pengajuan->perusahaan }}</th>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <th>:</th>
                        <th>{{ $pengajuan->program_studi }}</th>
                    </tr>
                    <tr>
                        <th>Nilai Magang</th>
                        <th>:</th>
                        <th>
                            <form action="{{ route('pengajuan.download', $pengajuan->id) }}" method="get">
                                <input type="hidden" name="jenis" value="nilai_magang">
                                <button class="btn btn-success">Unduh</button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th>Sertifikat Magang</th>
                        <th>:</th>
                        <th>
                            <form action="{{ route('pengajuan.download', $pengajuan->id) }}" method="get">
                                <input type="hidden" name="jenis" value="sertifikat_magang">
                                <button class="btn btn-success">Unduh</button>
                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th>Laporan Magang</th>
                        <th>:</th>
                        <th>
                            <form action="{{ route('pengajuan.download', $pengajuan->id) }}" method="get">
                                <input type="hidden" name="jenis" value="laporan_magang">
                                <button class="btn btn-success">Unduh</button>
                            </form>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection