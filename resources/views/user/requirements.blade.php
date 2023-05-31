@extends('user.template.base')

@section('content')
    <div class="page-header justify-content-between">
        <h4 class="page-title">Lengkapi Berkas Berikut Sebelum</h4>
        @include('user.template.sections.countdown')
    </div>
    <form id="form" action="requirements/store" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ empty($req_data->id) ? null : $req_data->id }}">
        <div class="card">
            <div class="card-body">
                <p>Berkas - berkas berikut bertujuan untuk keperluan pendaftaran nikah, berkas yang diunggah harus dalam format pdf.</p>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <input type="hidden" name="hidden_n1" value="{{ empty($req_data->n1) ? null : $req_data->n1 }}">
                                <label for="n1" class="form-label">
                                    Surat Pengantar Perkawinan (Model N1)
                                    {!! empty($req_data->n1) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <div class="row">
                                    @if (empty($req_data->n1))
                                        <div class="col-12">
                                            <input id="n1" type="file" class="form-control" name="n1" accept="application/pdf">
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a id="n1Button" href="{{ asset($req_data->n1) }}" class="btn btn-dark" target="_blank">
                                                <i class="la la-eye"></i> Lihat Dokumen
                                            </a>
                                            <div class="upload upload-text">
                                                <label for="n1" class="btn btn-secondary w-100">Ganti File</label>
                                                <input id="n1" type="file" name="n1" class="upload-input" accept="application/pdf">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="hidden_n2" value="{{ empty($req_data->n2) ? null : $req_data->n2 }}">
                                <label for="n2" class="form-label">
                                    Formulir Permohonan Kehendak Perkawinan (Model N2)
                                    {!! empty($req_data->n2) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <div class="row">
                                    @if (empty($req_data->n2))
                                        <div class="col-12">
                                            <input id="n2" type="file" class="form-control" name="n2" accept="application/pdf">
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a id="n2Button" href="{{ asset($req_data->n2) }}" class="btn btn-dark" target="_blank">
                                                <i class="la la-eye"></i> Lihat Dokumen
                                            </a>
                                            <div class="upload upload-text">
                                                <label for="n2" class="btn btn-secondary">Ganti File</label>
                                                <input id="n2" type="file" name="n2" class="upload-input" accept="application/pdf">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if ($wedding->married_on_office == false)
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_bukti_pembayaran" value="{{ empty($req_data->bukti_pembayaran) ? null : $req_data->bukti_pembayaran }}">
                                    <label for="bukti_pembayaran" class="form-label">
                                        Bukti Pembayaran (BANK / Kantor Pos Indonesia)
                                        {!! empty($req_data->bukti_pembayaran) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->bukti_pembayaran))
                                            <div class="col-12">
                                                <input id="buktiPembayaran" type="file" class="form-control" name="bukti_pembayaran" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="buktiPembayaranButton" href="{{ asset($req_data->bukti_pembayaran) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="buktiPembayaran" class="btn btn-secondary">Ganti File </label>
                                                    <input id="buktiPembayaran" type="file" name="bukti_pembayaran" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <input type="hidden" name="hidden_n3" value="{{ empty($req_data->n3) ? null : $req_data->n3 }}">
                                <label for="n3" class="form-label">
                                    Surat Persetujuan Mempelai (Model N3)
                                    {!! empty($req_data->n3) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <div class="row">
                                    @if (empty($req_data->n3))
                                        <div class="col-12">
                                            <input id="n3" type="file" class="form-control" name="n3" accept="application/pdf">
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a id="n3Button" href="{{ asset($req_data->n3) }}" class="btn btn-dark" target="_blank">
                                                <i class="la la-eye"></i> Lihat Dokumen
                                            </a>
                                            <div class="upload upload-text">
                                                <label for="n3" class="btn btn-secondary">Ganti File</label>
                                                <input id="n3" type="file" name="n3" class="upload-input" accept="application/pdf">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="hidden_n4" value="{{ empty($req_data->n4) ? null : $req_data->n4 }}">
                                <label for="n4" class="form-label">
                                    Surat Izin Orang Tua (Model N4)
                                    {!! empty($req_data->n4) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <div class="row">
                                    @if (empty($req_data->n4))
                                        <div class="col-12">
                                            <input id="n4" type="file" class="form-control" name="n4" accept="application/pdf">
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a id="n4Button" href="{{ asset($req_data->n4) }}" class="btn btn-dark" target="_blank">
                                                <i class="la la-eye"></i> Lihat Dokumen
                                            </a>
                                            <div class="upload upload-text">
                                                <label for="n4" class="btn btn-secondary">Ganti File</label>
                                                <input id="n4" type="file" name="n4" class="upload-input" accept="application/pdf">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @php
                                $start = Carbon\Carbon::now();
                                $end = Carbon\Carbon::parse($wedding->date);

                                $days = $start->diffInDays($end);
                            @endphp

                            @if ($days <= 10)
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_surat_despensasi" value="{{ empty($req_data->surat_despensasi) ? null : $req_data->surat_despensasi }}">
                                    <label for="suratDespensasi" class="form-label">
                                        Surat Despensasi Nikah
                                        {!! empty($req_data->surat_despensasi) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->surat_despensasi))
                                            <div class="col-12">
                                                <input id="suratDespensasi" type="file" class="form-control" name="surat_despensasi" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="suratDespensasiButton" href="{{ asset($req_data->surat_despensasi) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="suratDespensasi" class="btn btn-secondary">Ganti File</label>
                                                    <input id="suratDespensasi" type="file" name="surat_despensasi" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
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
                        <h6>Berkas Mempelai {{ $user->gender == 'Laki-Laki' ? 'Pria' : 'Wanita' }} ({{ $user->name }})
                        </h6>

                        <div class="mt-4">
                            <div class="mb-2">
                                <input type="hidden" name="hidden_u_kk" value="{{ empty($req_data->u_kk) ? null : $req_data->u_kk }}">
                                <label for="uKK" class="form-label">
                                    Kartu Keluarga (KK)
                                    {!! empty($req_data->u_kk) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <div class="row">
                                    @if (empty($req_data->u_kk))
                                        <div class="col-12">
                                            <input id="uKK" type="file" class="form-control" name="u_kk" accept="application/pdf">
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a id="uKKButton" href="{{ asset($req_data->u_kk) }}" class="btn btn-dark" target="_blank">
                                                <i class="la la-eye"></i> Lihat Dokumen
                                            </a>
                                            <div class="upload upload-text">
                                                <label for="uKK" class="btn btn-secondary">Ganti File</label>
                                                <input id="uKK" type="file" name="u_kk" class="upload-input" accept="application/pdf">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="hidden_u_surat_kesehatan" value="{{ empty($req_data->u_surat_kesehatan) ? null : $req_data->u_surat_kesehatan }}">
                                <label for="uSuratKesehatan" class="form-label">
                                    Surat Kesehatan dari Puskesmas dan Tetanus Toxoid
                                    {!! empty($req_data->u_surat_kesehatan) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <div class="row">
                                    @if (empty($req_data->u_surat_kesehatan))
                                        <div class="col-12">
                                            <input id="uSuratKesehatan" type="file" class="form-control" name="u_surat_kesehatan" accept="application/pdf">
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a id="uSuratKesehatanButton" href="{{ asset($req_data->u_surat_kesehatan) }}" class="btn btn-dark" target="_blank">
                                                <i class="la la-eye"></i> Lihat Dokumen
                                            </a>
                                            <div class="upload upload-text">
                                                <label for="uSuratKesehatan" class="btn btn-secondary">Ganti File</label>
                                                <input id="uSuratKesehatan" type="file" name="u_surat_kesehatan" class="upload-input" accept="application/pdf">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if ($user->employment == 'TNI/Polri')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_u_surat_izin_komandan" value="{{ empty($req_data->u_surat_izin_komandan) ? null : $req_data->u_surat_izin_komandan }}">
                                    <label for="uSuratIzinKomandan" class="form-label">
                                        Surat Izin Komandan TNI / Polri
                                        {!! empty($req_data->u_surat_izin_komandan) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->u_surat_izin_komandan))
                                            <div class="col-12">
                                                <input id="uSuratIzinKomandan" type="file" class="form-control" name="u_surat_izin_komandan" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="uSuratIzinKomandanButton" href="{{ asset($req_data->u_surat_izin_komandan) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="uSuratIzinKomandan" class="btn btn-secondary">Ganti File</label>
                                                    <input id="uSuratIzinKomandan" type="file" name="u_surat_izin_komandan" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($user->status == 'Pernah Menikah')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_u_akta_cerai_kematian" value="{{ empty($req_data->u_akta_cerai_kematian) ? null : $req_data->u_akta_cerai_kematian }}">
                                    <label for="uAktaCeraiKematian" class="form-label">
                                        Akta Cerai / Akta Kematian
                                        {!! empty($req_data->u_akta_cerai_kematian) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->u_akta_cerai_kematian))
                                            <div class="col-12">
                                                <input id="uAktaCeraiKematian" type="file" class="form-control" name="u_akta_cerai_kematian" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="uAktaCeraiKematianButton" href="{{ asset($req_data->u_akta_cerai_kematian) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="uAktaCeraiKematian" class="btn btn-secondary">Ganti File</label>
                                                    <input id="uAktaCeraiKematian" type="file" name="u_akta_cerai_kematian" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($user->citizenship == 'WNA')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_u_surat_izin_kedutaan" value="{{ empty($req_data->u_surat_izin_kedutaan) ? null : $req_data->u_surat_izin_kedutaan }}">
                                    <label for="uSuratIzinKedutaan" class="form-label">
                                        Surat Izin Kedutaan Besar {{ $user->country }}
                                        {!! empty($req_data->u_surat_izin_kedutaan) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->u_surat_izin_kedutaan))
                                            <div class="col-12">
                                                <input id="uSuratIzinKedutaan" type="file" class="form-control" name="u_surat_izin_kedutaan" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="uSuratIzinKedutaanButton" href="{{ asset($req_data->u_surat_izin_kedutaan) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="uSuratIzinKedutaan" class="btn btn-secondary">Ganti File</label>
                                                    <input id="uSuratIzinKedutaan" type="file" name="u_surat_izin_kedutaan" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_u_paspor" value="{{ empty($req_data->u_paspor) ? null : $req_data->u_paspor }}">
                                    <label for="uPaspor" class="form-label">
                                        Paspor
                                        {!! empty($req_data->u_paspor) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->u_paspor))
                                            <div class="col-12">
                                                <input id="uPaspor" type="file" class="form-control" name="u_paspor" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="uPasporButton" href="{{ asset($req_data->u_paspor) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="uPaspor" class="btn btn-secondary">Ganti File</label>
                                                    <input id="uPaspor" type="file" name="u_paspor" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Berkas Mempelai {{ $partner->gender == 'Laki-Laki' ? 'Pria' : 'Wanita' }}
                            ({{ $partner->name }})
                        </h6>

                        <div class="mt-4">
                            <div class="mb-2">
                                <input type="hidden" name="hidden_p_kk" value="{{ empty($req_data->p_kk) ? null : $req_data->p_kk }}">
                                <label for="pKK" class="form-label">
                                    Kartu Keluarga (KK)
                                    {!! empty($req_data->p_kk) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <div class="row">
                                    @if (empty($req_data->p_kk))
                                        <div class="col-12">
                                            <input id="pKK" type="file" class="form-control" name="p_kk" accept="application/pdf">
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a id="pKKButton" href="{{ asset($req_data->p_kk) }}" class="btn btn-dark" target="_blank">
                                                <i class="la la-eye"></i> Lihat Dokumen
                                            </a>
                                            <div class="upload upload-text">
                                                <label for="pKK" class="btn btn-secondary">Ganti File</label>
                                                <input id="pKK" type="file" name="p_kk" class="upload-input" accept="application/pdf">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="hidden_p_surat_kesehatan" value="{{ empty($req_data->p_surat_kesehatan) ? null : $req_data->p_surat_kesehatan }}">
                                <label for="pSuratKesehatan" class="form-label">
                                    Surat Kesehatan dari Puskesmas dan Tetanus Toxoid
                                    {!! empty($req_data->p_surat_kesehatan) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                </label>
                                <div class="row">
                                    @if (empty($req_data->p_surat_kesehatan))
                                        <div class="col-12">
                                            <input id="pSuratKesehatan" type="file" class="form-control" name="p_surat_kesehatan" accept="application/pdf">
                                        </div>
                                    @else
                                        <div class="btn-group">
                                            <a id="pSuratKesehatanButton" href="{{ asset($req_data->p_surat_kesehatan) }}" class="btn btn-dark" target="_blank">
                                                <i class="la la-eye"></i> Lihat Dokumen
                                            </a>
                                            <div class="upload upload-text">
                                                <label for="pSuratKesehatan" class="btn btn-secondary">Ganti File</label>
                                                <input id="pSuratKesehatan" type="file" name="p_surat_kesehatan" class="upload-input" accept="application/pdf">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if ($user->employment == 'TNI/Polri')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_p_surat_izin_komandan" value="{{ empty($req_data->p_surat_izin_komandan) ? null : $req_data->p_surat_izin_komandan }}">
                                    <label for="pSuratIzinKomandan" class="form-label">
                                        Surat Izin Komandan TNI / Polri
                                        {!! empty($req_data->p_surat_izin_komandan) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->p_surat_izin_komandan))
                                            <div class="col-12">
                                                <input id="pSuratIzinKomandan" type="file" class="form-control" name="p_surat_izin_komandan" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="pSuratIzinKomandanButton" href="{{ asset($req_data->p_surat_izin_komandan) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="pSuratIzinKomandan" class="btn btn-secondary">Ganti File</label>
                                                    <input id="pSuratIzinKomandan" type="file" name="p_surat_izin_komandan" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($user->status == 'Pernah Menikah')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_p_akta_cerai_kematian" value="{{ empty($req_data->p_akta_cerai_kematian) ? null : $req_data->p_akta_cerai_kematian }}">
                                    <label for="pAktaCeraiKematian" class="form-label">
                                        Akta Cerai / Akta Kematian
                                        {!! empty($req_data->p_akta_cerai_kematian) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->p_akta_cerai_kematian))
                                            <div class="col-12">
                                                <input id="pAktaCeraiKematian" type="file" class="form-control" name="p_akta_cerai_kematian" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="pAktaCeraiKematianButton" href="{{ asset($req_data->p_akta_cerai_kematian) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="pAktaCeraiKematian" class="btn btn-secondary">Ganti File</label>
                                                    <input id="pAktaCeraiKematian" type="file" name="p_akta_cerai_kematian" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($user->citizenship == 'WNA')
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_p_surat_izin_kedutaan" value="{{ empty($req_data->p_surat_izin_kedutaan) ? null : $req_data->p_surat_izin_kedutaan }}">
                                    <label for="pSuratIzinKedutaan" class="form-label">
                                        Surat Izin Kedutaan Besar {{ $user->country }}
                                        {!! empty($req_data->p_surat_izin_kedutaan) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->p_surat_izin_kedutaan))
                                            <div class="col-12">
                                                <input id="pSuratIzinKedutaan" type="file" class="form-control" name="p_surat_izin_kedutaan" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="pSuratIzinKedutaanButton" href="{{ asset($req_data->p_surat_izin_kedutaan) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="pSuratIzinKedutaan" class="btn btn-secondary">Ganti File</label>
                                                    <input id="pSuratIzinKedutaan" type="file" name="p_surat_izin_kedutaan" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <input type="hidden" name="hidden_p_paspor" value="{{ empty($req_data->p_paspor) ? null : $req_data->p_paspor }}">
                                    <label for="pPaspor" class="form-label">
                                        Paspor
                                        {!! empty($req_data->p_paspor) ? null : nl2br('<i class="la la-check text-success"></i>') !!}
                                    </label>
                                    <div class="row">
                                        @if (empty($req_data->p_paspor))
                                            <div class="col-12">
                                                <input id="pPaspor" type="file" class="form-control" name="p_paspor" accept="application/pdf">
                                            </div>
                                        @else
                                            <div class="btn-group">
                                                <a id="pPasporButton" href="{{ asset($req_data->p_paspor) }}" class="btn btn-dark" target="_blank">
                                                    <i class="la la-eye"></i> Lihat Dokumen
                                                </a>
                                                <div class="upload upload-text">
                                                    <label for="pPaspor" class="btn btn-secondary">Ganti File</label>
                                                    <input id="pPaspor" type="file" name="p_paspor" class="upload-input" accept="application/pdf">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('user.template.sections.page')
        <button id="submit" class="btn btn-success float-end" disabled>Simpan</button>
        <a href="partner" class="btn btn-outline-secondary float-end mx-2">Kembali</a>
    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $("#n1").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#n1Button").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#n2").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#n2Button").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#n3").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#n3Button").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#n4").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#n4Button").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#n5").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#n5PreviewButton").html(filename).removeClass('btn-dark').addClass(
                    'btn-secondary disabled');
            });

            $("#n7").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#n7PreviewButton").html(filename).removeClass('btn-dark').addClass(
                    'btn-secondary disabled');
            });

            $("#buktiPembayaran").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#buktiPembayaranButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#suratDespensasi").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#suratDespensasiButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#uKK").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#uKKButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#uSuratKesehatan").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#uSuratKesehatanButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#uSuratIzinKomandan").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#uSuratIzinKomandanButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#uAktaCeraiKematian").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#uAktaCeraiKematianButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#uSuratIzinKedutaan").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#uSuratIzinKedutaanButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#uPaspor").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#uPasporButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#pKK").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#pKKButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#pSuratKesehatan").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#pSuratKesehatanButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#pSuratIzinKomandan").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#pSuratIzinKomandanButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#pAktaCeraiKematian").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#pAktaCeraiKematianButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#pSuratIzinKedutaan").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#pSuratIzinKedutaanButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("#pPaspor").on('change', function() {
                var filename = $(this).val().split('\\').pop();
                $("#pPasporButton").html(filename).removeClass('btn-dark').addClass('btn-secondary disabled');
            });

            $("input[type='file']").on('change', function() {
                $("#submit").prop('disabled', false);
            });

            $("#form").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        // $("#marriedDateError").html('');
                        // $("#marriedTimeError").html('');
                        // $("#marriedLocationOptionError").html('');
                        // $("#date").removeClass("is-invalid");
                        // $("#time").removeClass("is-invalid");

                        $("#submit").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                        );
                    },
                    success: function(response) {
                        console.log(response);

                        location.reload();

                        $("#submit").html("Lanjut");
                    },
                    error: function(error) {
                        console.error(error);
                        if (error.status == 422) {
                            var rspError = error["responseJSON"]["errors"];
                            $("#marriedDateError").html(rspError["married_date"]);
                            $("#marriedTimeError").html(rspError["married_time"]);
                            $("#marriedLocationOptionError").html(
                                rspError["married_location_option"]);
                            $("#locationError").html(rspError["location"]);

                            if (rspError["married_date"]) {
                                $("#date").addClass("is-invalid");
                            }

                            if (rspError["married_time"]) {
                                $("#time").addClass("is-invalid");
                            }

                            if (rspError["location"]) {
                                $("#location").addClass("is-invalid");
                            }
                        }

                        $("#submit").html("Lanjut");
                    }
                });
            });
        });
    </script>
@endpush
