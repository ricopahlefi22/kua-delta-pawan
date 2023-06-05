<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div id="modalHeader" class="modal-header">
                <h5 id="modalTitle" class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label">Pas Foto (Latar Belakang Biru)</label>
                                <input id="hiddenPhoto" type="hidden" name="hidden_photo"
                                    value="{{ empty($personal_data->photo) ? null : $personal_data->photo }}">
                                @if (empty($personal_data->photo))
                                    <div class="text-center">
                                        <img id="photoPreview" class="img-fluid mb-3">
                                    </div>
                                    <div class="upload upload-text w-100">
                                        <div>
                                            <label id="photoButton" for="photo" class="btn btn-primary w-100">
                                                Unggah Pas Foto
                                            </label>
                                        </div>
                                        <input id="photo" type="file" name="photo" class="upload-input"
                                            accept="image/png, image/jpeg">
                                    </div>
                                @else
                                    <div class="text-center">
                                        <img id="photoPreview" src="{{ asset($personal_data->photo) }}"
                                            class="img-fluid mb-3">
                                    </div>
                                    <div class="upload upload-text w-100">
                                        <div>
                                            <label id="photoButton" for="photo" class="btn btn-primary w-100">
                                                Ganti Pas Foto
                                            </label>
                                        </div>
                                        <input id="photo" type="file" name="photo" class="upload-input"
                                            accept="image/png, image/jpeg">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Foto KTP</label>
                                <input id="hiddenKTP" type="hidden" name="hidden_ktp"
                                    value="{{ empty($personal_data->ktp) ? null : $personal_data->ktp }}">
                                @if (empty($personal_data->ktp))
                                    <div class="text-center">
                                        <img id="ktpPreview" class="img-fluid mb-3">
                                    </div>
                                    <div class="upload upload-text w-100">
                                        <div>
                                            <label id="ktpButton" for="ktp" class="btn btn-primary w-100">
                                                Unggah Foto KTP
                                            </label>
                                        </div>
                                        <input id="ktp" type="file" name="ktp" class="upload-input"
                                            accept="image/png, image/jpeg">
                                    </div>
                                @else
                                    <div class="text-center">
                                        <img id="ktpPreview" src="{{ asset($personal_data->ktp) }}"
                                            class="img-fluid mb-3">
                                    </div>
                                    <div class="upload upload-text w-100">
                                        <div>
                                            <label id="ktpButton" for="ktp" class="btn btn-primary w-100">
                                                Ganti Foto KTP
                                            </label>
                                        </div>
                                        <input id="ktp" type="file" name="ktp" class="upload-input"
                                            accept="image/png, image/jpeg">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label for="name" class="form-label">Nama Lengkap<span class="text-danger"
                                        title="Wajib Diisi">*</span></label>
                                <input id="name" type="text" class="form-control" name="name">
                                <span id="nameError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="phoneNumber" class="form-label">Nomor Handphone / Whatsapp</label>
                                <input id="phoneNumber" type="tel" class="form-control" name="phone_number">
                                <span id="phoneNumberError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="birthplace" class="form-label">Tempat Lahir</label>
                                <input id="birthplace" type="text" class="form-control" name="birthplace">
                                <span id="birthplaceError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="employment" class="form-label">Pekerjaan</label>
                                <select id="employment" name="employment" class="form-control">
                                    <option value="" disabled hidden selected>*Pilih Pekerjaan</option>
                                    <option value="Belum Bekerja">
                                        Belum Bekerja
                                    </option>
                                    <option value="Wirausaha">
                                        Wirausaha
                                    </option>
                                    <option value="Nelayan">
                                        Nelayan
                                    </option>
                                    <option value="Petani">
                                        Petani
                                    </option>
                                    <option value="TNI/Polri">
                                        TNI/Polri
                                    </option>
                                    <option value="Pegawai Swasta">
                                        Pegawai Swasta
                                    </option>
                                    <option value="Pegawai Negeri Sipil">
                                        Pegawai Negeri Sipil
                                    </option>
                                </select>
                                <span id="employmentError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Jenis Kelamin<span id="genderError"
                                        class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="male" value="Laki-Laki"
                                                @if (!empty($personal_data)) {{ $personal_data->gender == 'Laki-Laki' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="male">
                                                Laki-Laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="female" value="Perempuan"
                                                @if (!empty($personal_data)) {{ $personal_data->gender == 'Perempuan' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="female">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Kewarganegaraan <span id="citizenshipError"
                                        class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="citizenship"
                                                id="wni" value="WNI"
                                                @if (!empty($personal_data)) {{ $personal_data->citizenship == 'WNI' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="wni">WNI</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="citizenship"
                                                id="wna" value="WNA"
                                                @if (!empty($personal_data)) {{ $personal_data->citizenship == 'WNA' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="wna">WNA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label for="email" class="form-label">Email<span
                                        class="text-danger" title="Wajib Diisi">*</span></label>
                                <input id="email" class="form-control" name="email">
                                <span id="emailError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="idNumber" class="form-label">Nomor Induk Kependudukan</label>
                                <input id="idNumber" class="form-control" name="id_number"
                                    data-inputmask='"mask": "9999 9999 9999 9999"' data-mask>
                                <span id="idNumberError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="address" class="form-label">Alamat</label>
                                <input id="address" type="text" class="form-control" name="address">
                                <span id="addressError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label for="birthday" class="form-label">Tanggal Lahir</label>
                                <input id="birthday" type="date" class="form-control" name="birthday">
                                <span id="birthdayError" class="invalid-feedback"></span>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Status Perkawinan <span id="statusError"
                                        class="text-danger"></span></label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="virgin" value="Belum Menikah"
                                                @if (!empty($personal_data)) {{ $personal_data->status == 'Belum Menikah' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="virgin">Belum Menikah</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="divorce" value="Pernah Menikah"
                                                @if (!empty($personal_data)) {{ $personal_data->status == 'Pernah Menikah' ? 'checked' : null }} @endif>
                                            <label class="form-check-label ms-2" for="divorce">Pernah Menikah</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="countryWrapper" class="mb-2 d-none">
                                <label for="country" class="form-label">Asal Negara</label>
                                <input id="country" type="text" class="form-control" name="country">
                                <span id="countryError" class="invalid-feedback"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button id="button" type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
