@extends('layouts.project')

@section('konten')
    <form method="post" action="{{ '/mahasiswa/' . $data->nim_mhs }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h1>NIM Mahasiswa: {{ $data->nim_mhs }}</h1>
        </div>
        {{-- <div class="mb-3">
            <label for="nim_mhs" class="form-label">NIM Mahasiswa</label>
            <input type="text" value="{{ $data->nim_mhs }}" class="form-control" disabled readonly name="nim_mhs"
                id="nim_mhs">
        </div> --}}
        <div class="mb-3">
            <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
            <input type="text" value="{{ $data->nama_mhs }}" class="form-control" name="nama_mhs" id="nama_mhs">
        </div>
        <div class="mb-3">
            <label for="ttl_mhs" class="form-label">Tempat Tanggal Lahir</label>
            <input type="text" value="{{ $data->ttl_mhs }}" class="form-control" name="ttl_mhs" id="ttl_mhs">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat">{{ $data->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="telpon_mhs" class="form-label">No Telepon</label>
            <input type="text" value="{{ $data->telpon_mhs }}" class="form-control" name="telpon_mhs" id="telpon_mhs">
        </div>
        <div class="mb-3">
            <label for="email_mhs" class="form-label">Email</label>
            <input type="email" value="{{ $data->email_mhs }}" class="form-control" name="email_mhs" id="email_mhs">
        </div>
        <div class="mb-3">
            <label for="kota_mhs" class="form-label">Asal Kota</label>
            <input type="text" value="{{ $data->kota_mhs }}" class="form-control" name="kota_mhs" id="kota_mhs">
        </div>
        <div class="mb-3">
            <label for="agama_mhs" class="form-label">Agama</label>
            <input type="text" value="{{ $data->agama_mhs }}" class="form-control" name="agama_mhs" id="agama_mhs">
        </div>

        @if ($data->gambar)
            <img style="max-width: 50px; max-height: 50px" src="{{ url('gambar') . '/' . $data->gambar }}"
                alt="{{ $data->gambar }}">
        @endif
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
