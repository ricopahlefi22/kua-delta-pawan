@extends('admin.template.base')

@section('content')
    <div class="main">
        <div class="page-header flex justify-content-between">
            <h4 class="page-title">Detail Data Pernikahan</h4>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary float-end mx-2"><i class="feather icon-chevron-left"></i> Kembali</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <h6>Pihak {{ $wedding->user->gender }}</h6>
                        <div class="nav-profile-header">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-circle avatar-image">
                                    @if (empty($wedding->user->photo))
                                        <img src="{{ asset('photo.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset($wedding->user->photo) }}" alt="">
                                    @endif
                                </div>
                                <div class="d-flex flex-column ms-1">
                                    <span class="fw-bold text-dark">{{ $wedding->user->name }}</span>
                                    <span class="font-size-sm">{{ $wedding->user->phone_number }}</span>
                                </div>
                                <button type="button" class="btn btn-sm btn-dark ms-2" data-bs-toggle="modal"
                                    data-bs-target="#userDetailModal">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 my-auto text-center">
                        <i class="feather icon-heart-on"></i>
                    </div>
                    <div class="col-5">
                        <h6 class="text-end">Pihak {{ $wedding->partner->gender }}</h6>
                        <div class="float-end">
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#partnerDetailModal">Detail</button>
                                <div class="d-flex flex-column ms-2">
                                    <span class="fw-bold text-dark">{{ $wedding->partner->name }}</span>
                                    <span class="font-size-sm">{{ $wedding->partner->phone_number }}</span>
                                </div>
                                <div class="avatar avatar-circle avatar-image ms-1">
                                    @if (empty($wedding->partner->photo))
                                        <img src="{{ asset('photo.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset($wedding->partner->photo) }}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mt-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="n1" class="form-label">
                                    Surat Pengantar Perkawinan (Model N1)
                                    {!! empty($wedding->requirement->n1)
                                        ? nl2br('<i class="feather icon-x text-danger"></i>')
                                        : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <br>
                                @if (empty($wedding->requirement->n1))
                                    -
                                @else
                                    <a href="{{ asset($wedding->requirement->n1) }}" class="btn btn-sm btn-dark"
                                        target="_blank">
                                        <i class="la la-eye"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="hidden_n2"
                                    value="{{ empty($wedding->requirement->n2) ? null : $wedding->requirement->n2 }}">
                                <label for="n2" class="form-label">
                                    Formulir Permohonan Kehendak Perkawinan (Model N2)
                                    {!! empty($wedding->requirement->n2)
                                        ? nl2br('<i class="feather icon-x text-danger"></i>')
                                        : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <br>
                                @if (empty($wedding->requirement->n2))
                                    -
                                @else
                                    <a href="{{ asset($wedding->requirement->n2) }}" class="btn btn-sm btn-dark"
                                        target="_blank">
                                        <i class="la la-eye"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>
                            @if ($wedding->married_on_office == false)
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_bukti_pembayaran"
                                        value="{{ empty($wedding->requirement->bukti_pembayaran) ? null : $wedding->requirement->bukti_pembayaran }}">
                                    <label for="bukti_pembayaran" class="form-label">
                                        Bukti Pembayaran (BANK / Kantor Pos Indonesia)
                                        {!! empty($wedding->requirement->bukti_pembayaran)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->bukti_pembayaran))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->bukti_pembayaran) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <input type="hidden" name="hidden_n3"
                                    value="{{ empty($wedding->requirement->n3) ? null : $wedding->requirement->n3 }}">
                                <label for="n3" class="form-label">
                                    Surat Persetujuan Mempelai (Model N3)
                                    {!! empty($wedding->requirement->n3)
                                        ? nl2br('<i class="feather icon-x text-danger"></i>')
                                        : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <br>
                                @if (empty($wedding->requirement->n3))
                                    -
                                @else
                                    <a href="{{ asset($wedding->requirement->n3) }}" class="btn btn-sm btn-dark"
                                        target="_blank">
                                        <i class="la la-eye"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="hidden_n4"
                                    value="{{ empty($wedding->requirement->n4) ? null : $wedding->requirement->n4 }}">
                                <label for="n4" class="form-label">
                                    Surat Izin Orang Tua (Model N4)
                                    {!! empty($wedding->requirement->n4)
                                        ? nl2br('<i class="feather icon-x text-danger"></i>')
                                        : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <br>
                                @if (empty($wedding->requirement->n4))
                                    -
                                @else
                                    <a href="{{ asset($wedding->requirement->n4) }}" class="btn btn-sm btn-dark"
                                        target="_blank">
                                        <i class="la la-eye"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>

                            @php
                                $start = Carbon\Carbon::now();
                                $end = Carbon\Carbon::parse($wedding->date);

                                $days = $start->diffInDays($end);
                            @endphp

                            @if ($days <= 10)
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_surat_despensasi"
                                        value="{{ empty($wedding->requirement->surat_despensasi) ? null : $wedding->requirement->surat_despensasi }}">
                                    <label for="suratDespensasi" class="form-label">
                                        Surat Despensasi Nikah
                                        {!! empty($wedding->requirement->surat_despensasi)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->surat_despensasi))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->surat_despensasi) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Berkas Mempelai {{ $wedding->user->gender == 'Laki-Laki' ? 'Pria' : 'Wanita' }}
                            ({{ $wedding->user->name }})
                        </h6>

                        <div class="mt-4">
                            <div class="mb-2">
                                <input type="hidden" name="hidden_u_kk"
                                    value="{{ empty($wedding->requirement->u_kk) ? null : $wedding->requirement->u_kk }}">
                                <label for="uKK" class="form-label">
                                    Kartu Keluarga (KK)
                                    {!! empty($wedding->requirement->u_kk)
                                        ? nl2br('<i class="feather icon-x text-danger"></i>')
                                        : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <br>
                                @if (empty($wedding->requirement->u_kk))
                                    -
                                @else
                                    <a href="{{ asset($wedding->requirement->u_kk) }}" class="btn btn-sm btn-dark"
                                        target="_blank">
                                        <i class="la la-eye"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="hidden_u_surat_kesehatan"
                                    value="{{ empty($wedding->requirement->u_surat_kesehatan) ? null : $wedding->requirement->u_surat_kesehatan }}">
                                <label for="uSuratKesehatan" class="form-label">
                                    Surat Kesehatan dari Puskesmas dan Tetanus Toxoid
                                    {!! empty($wedding->requirement->u_surat_kesehatan)
                                        ? nl2br('<i class="feather icon-x text-danger"></i>')
                                        : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <br>
                                @if (empty($wedding->requirement->u_surat_kesehatan))
                                    -
                                @else
                                    <a href="{{ asset($wedding->requirement->u_surat_kesehatan) }}"
                                        class="btn btn-sm btn-dark" target="_blank">
                                        <i class="la la-eye"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>
                            @if ($wedding->user->employment == 'TNI/Polri')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_u_surat_izin_komandan"
                                        value="{{ empty($wedding->requirement->u_surat_izin_komandan) ? null : $wedding->requirement->u_surat_izin_komandan }}">
                                    <label for="uSuratIzinKomandan" class="form-label">
                                        Surat Izin Komandan TNI / Polri
                                        {!! empty($wedding->requirement->u_surat_izin_komandan)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->u_surat_izin_komandan))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->u_surat_izin_komandan) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            @endif
                            @if ($wedding->user->status == 'Pernah Menikah')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_u_akta_cerai_kematian"
                                        value="{{ empty($wedding->requirement->u_akta_cerai_kematian) ? null : $wedding->requirement->u_akta_cerai_kematian }}">
                                    <label for="uAktaCeraiKematian" class="form-label">
                                        Akta Cerai / Akta Kematian
                                        {!! empty($wedding->requirement->u_akta_cerai_kematian)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->u_akta_cerai_kematian))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->u_akta_cerai_kematian) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            @endif
                            @if ($wedding->user->citizenship == 'WNA')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_u_surat_izin_kedutaan"
                                        value="{{ empty($wedding->requirement->u_surat_izin_kedutaan) ? null : $wedding->requirement->u_surat_izin_kedutaan }}">
                                    <label for="uSuratIzinKedutaan" class="form-label">
                                        Surat Izin Kedutaan Besar {{ $wedding->user->country }}
                                        {!! empty($wedding->requirement->u_surat_izin_kedutaan)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->u_surat_izin_kedutaan))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->u_surat_izin_kedutaan) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_u_paspor"
                                        value="{{ empty($wedding->requirement->u_paspor) ? null : $wedding->requirement->u_paspor }}">
                                    <label for="uPaspor" class="form-label">
                                        Paspor
                                        {!! empty($wedding->requirement->u_paspor)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->u_paspor))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->u_paspor) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Berkas Mempelai {{ $wedding->partner->gender == 'Laki-Laki' ? 'Pria' : 'Wanita' }}
                            ({{ $wedding->partner->name }})
                        </h6>

                        <div class="mt-4">
                            <div class="mb-2">
                                <input type="hidden" name="hidden_p_kk"
                                    value="{{ empty($wedding->requirement->p_kk) ? null : $wedding->requirement->p_kk }}">
                                <label for="pKK" class="form-label">
                                    Kartu Keluarga (KK)
                                    {!! empty($wedding->requirement->p_kk)
                                        ? nl2br('<i class="feather icon-x text-danger"></i>')
                                        : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <br>
                                @if (empty($wedding->requirement->p_kk))
                                    -
                                @else
                                    <a href="{{ asset($wedding->requirement->p_kk) }}" class="btn btn-sm btn-dark"
                                        target="_blank">
                                        <i class="la la-eye"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="hidden_p_surat_kesehatan"
                                    value="{{ empty($wedding->requirement->p_surat_kesehatan) ? null : $wedding->requirement->p_surat_kesehatan }}">
                                <label for="pSuratKesehatan" class="form-label">
                                    Surat Kesehatan dari Puskesmas dan Tetanus Toxoid
                                    {!! empty($wedding->requirement->p_surat_kesehatan)
                                        ? nl2br('<i class="feather icon-x text-danger"></i>')
                                        : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <br>
                                @if (empty($wedding->requirement->p_surat_kesehatan))
                                    -
                                @else
                                    <a href="{{ asset($wedding->requirement->p_surat_kesehatan) }}"
                                        class="btn btn-sm btn-dark" target="_blank">
                                        <i class="la la-eye"></i> Lihat Dokumen
                                    </a>
                                @endif
                            </div>
                            @if ($wedding->partner->employment == 'TNI/Polri')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_p_surat_izin_komandan"
                                        value="{{ empty($wedding->requirement->p_surat_izin_komandan) ? null : $wedding->requirement->p_surat_izin_komandan }}">
                                    <label for="pSuratIzinKomandan" class="form-label">
                                        Surat Izin Komandan TNI / Polri
                                        {!! empty($wedding->requirement->p_surat_izin_komandan)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->p_surat_izin_komandan))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->p_surat_izin_komandan) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            @endif
                            @if ($wedding->partner->status == 'Pernah Menikah')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_p_akta_cerai_kematian"
                                        value="{{ empty($wedding->requirement->p_akta_cerai_kematian) ? null : $wedding->requirement->p_akta_cerai_kematian }}">
                                    <label for="pAktaCeraiKematian" class="form-label">
                                        Akta Cerai / Akta Kematian
                                        {!! empty($wedding->requirement->p_akta_cerai_kematian)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->p_akta_cerai_kematian))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->p_akta_cerai_kematian) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            @endif
                            @if ($wedding->partner->citizenship == 'WNA')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_p_surat_izin_kedutaan"
                                        value="{{ empty($wedding->requirement->p_surat_izin_kedutaan) ? null : $wedding->requirement->p_surat_izin_kedutaan }}">
                                    <label for="pSuratIzinKedutaan" class="form-label">
                                        Surat Izin Kedutaan Besar {{ $wedding->partner->country }}
                                        {!! empty($wedding->requirement->p_surat_izin_kedutaan)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->p_surat_izin_kedutaan))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->p_surat_izin_kedutaan) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_p_paspor"
                                        value="{{ empty($wedding->requirement->p_paspor) ? null : $wedding->requirement->p_paspor }}">
                                    <label for="pPaspor" class="form-label">
                                        Paspor
                                        {!! empty($wedding->requirement->p_paspor)
                                            ? nl2br('<i class="feather icon-x text-danger"></i>')
                                            : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <br>
                                    @if (empty($wedding->requirement->p_paspor))
                                        -
                                    @else
                                        <a href="{{ asset($wedding->requirement->p_paspor) }}"
                                            class="btn btn-sm btn-dark" target="_blank">
                                            <i class="la la-eye"></i> Lihat Dokumen
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHeader" class="modal-header">
                    <h5 class="modal-title">Detail Pihak {{ $wedding->user->gender }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset($wedding->user->photo) }}" class="img-fluid">
                        </div>
                        <div class="col-7">
                            <p><strong>Nama: </strong>{{ $wedding->user->name }}</p>
                            <p><strong>NIK: </strong>{{ $wedding->user->id_number }}</p>
                            <p><strong>Email: </strong>{{ $wedding->user->email }}</p>
                            <p><strong>No. Handphone: </strong>{{ $wedding->user->phone_number }}</p>
                            <p><strong title="Tempat, Tanggal Lahir">TTL: </strong>{{ $wedding->user->birthplace }},
                                {{ $wedding->user->birthday }}</p>
                            <p><strong>Kawin: </strong>{{ $wedding->user->status }}</p>
                            <p><strong>Kewarganegaraan:
                                </strong>{{ $wedding->user->citizenship == 'WNI' ? $wedding->user->citizenship : $wedding->user->citizenship . ' (' . $wedding->user->country . ')' }}
                            </p>
                            <p><strong>Pekerjaan: </strong>{{ $wedding->user->employment }}</p>
                            <p><strong>Alamat: </strong>{{ $wedding->user->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="{{ url($wedding->user->ktp) }}" target="_blank" class="btn btn-sm btn-dark"><i
                            class="feather icon-image"></i> Lihat KTP</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="partnerDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHeader" class="modal-header">
                    <h5 class="modal-title">Detail Pihak {{ $wedding->partner->gender }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset($wedding->partner->photo) }}" class="img-fluid">
                        </div>
                        <div class="col-7">
                            <p><strong>Nama: </strong>{{ $wedding->partner->name }}</p>
                            <p><strong>NIK: </strong>{{ $wedding->partner->id_number }}</p>
                            <p><strong>No. Handphone: </strong>{{ $wedding->partner->phone_number }}</p>
                            <p><strong title="Tempat, Tanggal Lahir">TTL: </strong>{{ $wedding->partner->birthplace }},
                                {{ $wedding->partner->birthday }}</p>
                            <p><strong>Kawin: </strong>{{ $wedding->partner->status }}</p>
                            <p><strong>Kewarganegaraan:
                                </strong>{{ $wedding->partner->citizenship == 'WNI' ? $wedding->partner->citizenship : $wedding->partner->citizenship . ' (' . $wedding->partner->country . ')' }}
                            </p>
                            <p><strong>Pekerjaan: </strong>{{ $wedding->partner->employment }}</p>
                            <p><strong>Alamat: </strong>{{ $wedding->partner->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="{{ url($wedding->partner->ktp) }}" target="_blank" class="btn btn-sm btn-dark"><i
                            class="feather icon-image"></i> Lihat KTP</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

