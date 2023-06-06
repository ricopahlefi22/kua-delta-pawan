@extends('admin.template.base')

@section('content')
    <div class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Bulan {{ $month }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-muted mb-2">Data Pendaftar Nikah</div>
                                <h3>{{ $progress_wedding_count }}</h3>
                            </div>
                            <div class="col-4">
                                <div class="text-muted mb-2">Data Pernikahan Terverifikasi</div>
                                <h3>{{ $complete_wedding_count }}</h3>
                            </div>
                            <div class="col-4">
                                <div class="text-muted mb-2">Total Data</div>
                                <h3>{{ $wedding_count }}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-4">
                            <div class="text-muted d-flex justify-content-between mb-2">
                                <span>Data pendaftar nikah yang sudah diverifikasi</span>
                                <span>{{ $percent }}%</span>
                            </div>
                            <div class="progress-sm progress">
                                <div class="progress-bar bg-info" style="width: {{ $percent }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
@endpush
