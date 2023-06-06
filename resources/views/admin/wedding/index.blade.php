@extends('admin.template.base')

@section('content')
    @include('admin.wedding.form-modal')

    <div class="main">
        <div class="page-header flex justify-content-between">
            <h4 class="page-title">Tabel Data Pernikahan Bulan {{ $month }} {{ $year }}</h4>
            <form action="{{ url('weddings') }}">
                <div class="btn-group">
                    <select name="month" class="form-control form-control-sm">
                        <option value="January" {{ $month == 'Januari' ? 'selected' : null }}>Januari</option>
                        <option value="February" {{ $month == 'Februari' ? 'selected' : null }}>Februari</option>
                        <option value="March" {{ $month == 'Maret' ? 'selected' : null }}>Maret</option>
                        <option value="April" {{ $month == 'April' ? 'selected' : null }}>April</option>
                        <option value="May" {{ $month == 'Mei' ? 'selected' : null }}>Mei</option>
                        <option value="June" {{ $month == 'Juni' ? 'selected' : null }}>Juni</option>
                        <option value="July" {{ $month == 'Juli' ? 'selected' : null }}>Juli</option>
                        <option value="August" {{ $month == 'Agustus' ? 'selected' : null }}>Agustus</option>
                        <option value="September" {{ $month == 'September' ? 'selected' : null }}>September</option>
                        <option value="October" {{ $month == 'Oktober' ? 'selected' : null }}>Oktober</option>
                        <option value="November" {{ $month == 'November' ? 'selected' : null }}>November</option>
                        <option value="December" {{ $month == 'Desember' ? 'selected' : null }}>Desember</option>
                    </select>
                    <select name="year" class="form-control form-control-sm">
                        <option value="2021" {{ $year == '2021' ? 'selected' : null }}>2021</option>
                        <option value="2022" {{ $year == '2022' ? 'selected' : null }}>2022</option>
                        <option value="2023" {{ $year == '2023' ? 'selected' : null }}>2023</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-dark"><i class="feather icon-search"></i></button>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ url('weddings/report') }}">
                    <input type="hidden" name="month" value="{{ $month_eng }}">
                    <input type="hidden" name="year" value="{{ $year }}">
                    <button type="submit" class="btn btn-sm btn-dark float-end">
                        <i class="feather icon-file"></i> Laporan Pernikahan
                    </button>
                </form>
                <p>Tabel ini menampilkan data-data pernikahan</p>
                <div class="mt-4">
                    <table id="table" class="table data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pernikahan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Pernikahan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
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
    <script type="text/javascript" src="{{ asset('js/wedding-crud.js') }}"></script>
@endpush
