@extends('layouts.main')
@section('title', 'Edit Data Pesantren Terdekat')
@section('page-title', 'Edit Data Pesantren Terdekat')

@section('content')
    <div class="card">
        <div class="card-header py-3">
            <a href="{{ url()->previous() }}" class="btn btn-success btn-icon-split mb-2">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('pesantren-terdekat.update', $data->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="no_statistik">No Statistik</label>
                    <input type="text" value="{{ old('no_statistik') ?? $data->no_statistik }}" name="no_statistik"
                        class="form-control @error('no_statistik') is-invalid @enderror" id="no_statistik"
                        placeholder="No Statistik">
                    @error('no_statistik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_lembaga">Nama Lembaga</label>
                    <input type="text" value="{{ old('nama_lembaga') ?? $data->nama_lembaga }}"
                        class="form-control @error('nama_lembaga') is-invalid @enderror" id="nama_lembaga"
                        placeholder="Nama Lembaga" name="nama_lembaga">
                    @error('nama_lembaga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_telepon">No Telepon</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="noTelepon">+62</span>
                        </div>
                        <input type="text" value="{{ old('no_telepon') ?? $data->no_telepon }}"
                            class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon"
                            placeholder="No Telepon" aria-label="Username" aria-describedby="no_telepon">
                    </div>
                    @error('no_telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') ?? $data->alamat }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop
