@extends('admin.template.base')

@push('style')
    <!-- page css -->
    <link href="assets/vendors/fullcalendar/lib/main.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="main">
        <div class="page-header flex justify-content-between">
            <h4 class="page-title">Jadwal Pernikahan</h4>
            <button id="create" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah</button>
        </div>

        <div class="card">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- page js -->
    <script src="assets/vendors/fullcalendar/lib/main.min.js"></script>
    <script src="assets/js/pages/calendar.js"></script>
@endpush
