<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div id="modalHeader" class="modal-header">
                <h5 id="modalTitle" class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="userId" name="user_id">
                <input type="hidden" id="partnerId" name="partner_id">
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="date" class="form-label">Tanggal Pernikahan</label>
                        <input id="date" type="date" class="form-control" name="married_date">
                        <span id="marriedDateError" class="invalid-feedback"></span>
                    </div>
                    <div class="mb-2">
                        <label for="time" class="form-label">Jam</label>
                        <input id="time" type="time" class="form-control" name="married_time">
                        <span id="marriedTimeError" class="invalid-feedback"></span>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Apakah Akad Nikah akan dilakukan di kantor KUA
                            Delta Pawan? <span id="marriedLocationOptionError" class="text-danger"></span></label>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="married_location_option"
                                        id="optionTrue" value="1">
                                    <label class="form-check-label ms-2" for="optionTrue">
                                        Ya
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="married_location_option"
                                        id="optionFalse" value="0">
                                    <label class="form-check-label ms-2" for="optionFalse">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="wrapperLocation" class="mb-2 d-none">
                        <label for="location" class="form-label">Tempat Lokasi Pernikahan (Alamat)</label>
                        <input id="location" type="text" class="form-control" name="location" placeholder="Nama Jalan, Desa, Kecamatan">
                        <span id="locationError" class="invalid-feedback"></span>
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
