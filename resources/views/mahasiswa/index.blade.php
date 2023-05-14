@extends('layouts.project')

@section('konten')
    @if ($success = Session::get('success'))
        <div class="alert alert-success">{{ $success }}</div>
    @endif
    <a href="/mahasiswa/create" class="btn btn-primary">+Tambah Data Mahasiswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tempat Tgl Lahir</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Kota</th>
                <th>Agama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        @if ($item->gambar)
                            <img style="max-width: 50px; max-height: 50px" src="{{ url('gambar') . '/' . $item->gambar }}"
                                alt="{{ $item->gambar }}">
                        @endif
                    </td>
                    <td>{{ $item->nim_mhs }}</td>
                    <td>{{ $item->nama_mhs }}</td>
                    <td>{{ $item->ttl_mhs }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->telpon_mhs }}</td>
                    <td>{{ $item->email_mhs }}</td>
                    <td>{{ $item->kota_mhs }}</td>
                    <td>{{ $item->agama_mhs }}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="{{ url('/mahasiswa/' . $item->nim_mhs) }}">Detail</a>
                        <a class="btn btn-warning btn-sm"
                            href="{{ url('/mahasiswa/' . $item->nim_mhs . '/edit') }}">Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" class="d-inline"
                            action="{{ '/mahasiswa/' . $item->nim_mhs }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
@endsection
