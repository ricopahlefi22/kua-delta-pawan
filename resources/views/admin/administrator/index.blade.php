@extends('admin.template.base')

@section('content')
    @include('admin.administrator.form-modal')

    <div class="main">
        <div class="page-header flex justify-content-between">
            <h4 class="page-title">Tabel Data Administrator</h4>
            <button id="create" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah</button>
        </div>
        <div class="card">
            <div class="card-body">
                <p>Tabel ini menampilkan data-data administrator</p>
                <div class="mt-4">
                    <table id="table" class="table data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('js/administrator-crud.js') }}"></script>
@endpush
