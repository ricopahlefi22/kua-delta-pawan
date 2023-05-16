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
                        <div class="col-12 col-md-4">
                            <div class="mb-2">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    accept="image/png, image/gif, image/jpeg, image/jpg">
                            </div>
                            <div class="mb-2">
                                <input id="hiddenImage" type="hidden" name="hidden_image">
                                <label for="image" class="form-label">Pratinjau Gambar</label>
                                <img id="imagePreview" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="mb-2">
                                <label for="title" class="form-label">Judul<strong class="text-danger">*</strong>
                                    <span id="titleError" class="text-danger"></span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Judul Berita">
                            </div>
                            <div class="mb-2">
                                <label for="body" class="form-label">Isi<strong class="text-danger">*</strong>
                                    <span id="bodyError" class="text-danger"></span></label>
                                <textarea name="body" id="body" rows="10" class="form-control" placeholder="Isi Berita"></textarea>
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
