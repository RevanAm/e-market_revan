<div class="modal fade" id="formPembelianModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <p>One fine body&hellip;</p> --}}
                <form method="post" action="barang">
                    @csrf
                    <div id="method"></div>
                    <div class="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_masuk">Kode Masuk</label>
                            <input type="text" class="form-control" id="kode_masuk" name="kode_masuk"
                                placeholder="Kode Masuk">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="Tanggal Masuk">
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" id="total" name="total" placeholder="Total">
                        </div>
                        <div class="form-group">
                            <label for="pemasok_id">ID Pemasok</label>
                            <input type="text" class="form-control" id="pemasok_id" name="pemasok_id"
                                placeholder="ID Pemasok">
                        </div>
                        <div class="form-group">
                            <label for="user_id">ID User</label>
                            <input type="text" class="form-control" id="user_id" name="user_id"
                                placeholder="ID User">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
