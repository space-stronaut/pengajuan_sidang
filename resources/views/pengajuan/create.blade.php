@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Buat Pengajuan
                </span>
                <span>
                    <a href="{{ route('pengajuan.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('pengajuan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="">Program Studi</label>
                        <input type="text" name="program_studi" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Magang</label>
                        <input type="date" name="tanggal_magang" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Perusahaan Ditempatkan</label>
                        <input type="text" name="perusahaan" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Magang</label>
                        <input type="file" name="nilai_magang" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Laporan Magang</label>
                        <input type="file" name="laporan_magang" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sertifikat Magang</label>
                        <input type="file" name="sertifikat_magang" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mt-2">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection