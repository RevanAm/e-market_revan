<div class="modal fade" id="formPenjualanModal">
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
                            <label for="no_faktur">No Faktur</label>
                            <input type="text" class="form-control" id="no_faktur" name="no_faktur"
                                placeholder="No Faktur">
                        </div>
                        <div class="form-group">
                            <label for="tgl_faktur">Tanggal Faktur</label>
                            <input type="date" class="form-control" id="tgl_faktur" name="tgl_faktur" placeholder="Tanggal Faktur">
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total</label>
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Total">
                        </div>
                        <div class="form-group">
                            <label for="pelanggan_id">ID Pelanggan</label>
                            <input type="text" class="form-control" id="pelanggan_id" name="pelanggan_id"
                                placeholder="ID Pemasok">
                        </div>
                        <div class="form-group">
                            <label for="user_id">ID Pemasok</label>
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
