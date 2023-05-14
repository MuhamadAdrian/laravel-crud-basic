@extends('layouts.project')

@section('konten')
    <div>
        <a href="/mahasiswa" class="btn btn-secondary block">>>Kembali</a>

        <h1>{{ $data->nim_mhs }}</h1>
        <p>
            <b>Nama</b> {{ $data->nama_mhs }}
        </p>
        <p>
            <b>TTL</b> {{ $data->ttl_mhs }}
        </p>
        <p>
            <b>Agama</b> {{ $data->agama_mhs }}
        </p>
        <p><b>Image</b></p>
        @if ($data->gambar)
            <img style="max-width: 200px; max-height: 200px" src="{{ url('gambar') . '/' . $data->gambar }}"
                alt="{{ $data->gambar }}">
        @endif
    </div>
@endsection
