<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="modalHeader" class="modal-header">
                <h5 id="modalTitle" class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="mb-2">
                                <input id="hiddenPhoto" type="hidden" name="hidden_photo">
                                <label for="photo" class="form-label">Pratinjau Foto</label>
                                <img id="photoPreview" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="mb-2">
                                <label for="name" class="form-label">
                                    Nama<span class="text-danger">*</span>
                                </label>
                                <span id="nameError" class="text-danger"></span>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nama Lengkap">
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">
                                    Email<span class="text-danger">*</span>
                                </label>
                                <span id="emailError" class="text-danger"></span>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email">
                            </div>
                            <div class="mb-2">
                                <label for="name" class="form-label">
                                    Foto
                                </label>
                                <input type="file" class="form-control" id="photo" name="photo"
                                    accept="image/png, image/gif, image/jpeg, image/jpg">
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
