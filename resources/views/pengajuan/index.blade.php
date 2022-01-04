@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Pengajuan Saya
                </span>
                <span>
                    <a href="{{ route('pengajuan.create') }}" class="btn btn-primary">+</a>
                </span>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pengaju</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Tanggal Magang</th>
                            <th scope="col">Perusahaan Ditempatkan</th>
                            <th scope="col">Tanggal Pengajuan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengajuans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    {{$item->user->nim}}
                                </td>
                                <td>
                                    {{$item->program_studi}}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->tanggal_magang)->format('d M Y') }}
                                </td>
                                <td>
                                    {{$item->perusahaan}}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('pengajuan.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('pengajuan.show', $item->id) }}" class="btn btn-success ms-2">Lihat</a>
                                    <form action="{{ route('pengajuan.destroy', $item->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger ms-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Belum Ada Data...</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection