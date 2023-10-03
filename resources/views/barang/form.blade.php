<div class="modal fade" id="formBarangModal">
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
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                placeholder="Kode Barang">
                        </div>
                        <div class="form-group">
                            <label for="produk_id">ID Produk</label>
                            <input type="number" class="form-control" id="produk_id" name="produk_id" placeholder="ID Produk">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok"
                                placeholder="Stok">
                        </div>
                        <div class="form-group">
                            <label for="ditarik">Ditarik</label>
                            <input type="number" class="form-control" id="ditarik" name="ditarik" placeholder="Ditarik">
                        </div>
                        <div class="form-group">
                            <label for="user_id">ID User</label>
                            <input type="number" class="form-control" id="user_id" name="user_id"
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
