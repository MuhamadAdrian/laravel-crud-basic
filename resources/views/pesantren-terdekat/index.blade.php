@extends('layouts.main')
@section('title', 'Data Pesantren Terdekat')
@section('page-title', 'Data Pesantren Terdekat')

@section('content')
    @if ($session = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $session }}
        </div>
    @endIf
    {{-- {{ dd($data) }} --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/pesantren-terdekat/create" class="btn btn-primary btn-icon-split mb-2">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label>Show
                                    <select name="dataTable_length" aria-controls="dataTable"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="3">3</option>
                                        <option value="5" selected>5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                    </select> entries
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="dataTable"></label></div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" role="grid"
                                aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th>No</th>
                                        <th>No Statistik</th>
                                        <th>Nama Lembaga</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>No Statistik</th>
                                        <th>Nama Lembaga</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr class="odd">
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $item->no_statistik }}</td>
                                            <td>{{ $item->nama_lembaga }}</td>
                                            <td>{{ $item->no_telepon }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>
                                                <a href="/pesantren-terdekat/{{ $item->id }}" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="/pesantren-terdekat/{{ $item->id }}/edit"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" href="#" data-toggle="modal"
                                                    data-target="#{{ 'deleteModal-' . $item->id }}" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form method="post"
                                                            action="{{ route('pesantren-terdekat.destroy', $item->id) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModal">Yakin ingin
                                                                        menghapus data ini ? ( {{ $item->nama_lembaga }} )
                                                                    </h5>
                                                                    <button class="close" type="button"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">Pastikan data yang akan Anda hapus
                                                                    telah benar</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing
                                {{ $data->firstItem() }}
                                to {{ $data->lastItem() }} of {{ $data->total() }} entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            {{ $data->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
