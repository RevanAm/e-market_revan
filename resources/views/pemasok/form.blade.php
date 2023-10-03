<div class="modal fade" id="formPemasokModal">
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
                <form method="post" action="pemasok">
                    @csrf
                    <div id="method"></div>
                    <div class="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_pemasok">Nama Pemasok</label>
                            <input type="text" class="form-control" id="nama_pemasok" name="nama_pemasok"
                                placeholder="Nama Pemasok">
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
