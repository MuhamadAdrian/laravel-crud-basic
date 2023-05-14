@extends('layouts.main')
@section('title', 'View - ' . $data->nama_lembaga)
@section('page-title', 'Detail - ' . $data->nama_lembaga)

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
            <div class="mb-4">
                <h5 class="mb-1 fw-bold"><strong>No Statistik</strong></h5>
                <p class="mb-1">{{ $data->no_statistik }}</p>
            </div>
            <div class="mb-4">
                <h5 class="mb-1 fw-bold"><strong>Nama Lembaga</strong></h5>
                <p class="mb-1">{{ $data->nama_lembaga }}</p>
            </div>
            <div class="mb-4">
                <h5 class="mb-1 fw-bold"><strong>No Telepon</strong></h5>
                <p class="mb-1">+62 {{ $data->no_telepon }}</p>
            </div>
            <div>
                <h5 class="mb-1 fw-bold"><strong>Alamat</strong></h5>
                <p class="mb-1">{{ $data->alamat }}</p>
            </div>
        </div>
    </div>
@endsection
