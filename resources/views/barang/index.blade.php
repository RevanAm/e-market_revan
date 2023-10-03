@extends('templates.layout')
@push('style')
@endpush
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Barang</h1>
            <br>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                        Launch Primary Modal --}}
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formBarangModal">
                    Tambah
                </button>
                
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <table class=" table table-bordered table-hover table-stripped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>ID Produk</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Ditarik</th>
                        <th>ID User</th>
                    </tr>
                <tbody>
                    @foreach ($barang as $p)
                        <tr>
                            <td>{{ $i = isset($i) ? ++$i : 1 }}</td>
                            <td>{{ $p->kode_barang }}</td>
                            <td>{{ $p->produk_id }}</td>
                            <td>{{ $p->nama_barang }}</td>
                            <td>{{ $p->satuan }}</td>
                            <td>Rp.{{ $p->harga_jual }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>{{ $p->ditarik }}</td>
                            <td>{{ $p->user_id }}</td>
                            <td>
                                <form action="barang/{{ $p->id }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-delete" data-dismiss="modal"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>

                                <button class="btn btn-info" data-toggle="modal" data-target="#formBarangModal"
                                    data-mode="edit" data-id="{{ $p->id }}" data-kode_barang="{{ $p->kode_barang }}"
                                    data-produk_id="{{ $p->produk_id }}" data-nama_barang="{{ $p->nama_barang }}"
                                    data-stok="{{ $p->stok }}" data-ditarik="{{ $p->ditarik }}" data-user_id="{{ $p->user_id }}"
                                    data-satuan="{{ $p->satuan }}" data-harga_jual="{{ $p->harga_jual }}"><i
                                    class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            </div>
            
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        @include('barang.form')
        @endsection
        
        @push('script')
    <script>
        $('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })

        console.log('barang')
        // $('#tbl_barang').DataTable()
        // dialog hapus
        $('.btn-delete').on('click', function(e) {
            console.log('delete')
            let nama = $(this).closest('tr').find('td:eq(3)').text();
            Swal.fire({
                icon: 'error',
                title: 'hapus data',
                html: `Hapus <b>${nama}</b> engga?`,
                confirmButtonText: 'Iyah',
                denyButtonText: 'engga',
                showDenyButton: true,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed) $(e.target).closest('form').submit()
                else swal.close()
            })
        })
        $('#formBarangModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const kode_barang = btn.data('kode_barang')
            const id = btn.data('id')
            const produk_id = btn.data('produk_id')
            const nama_barang = btn.data('nama_barang')
            const satuan = btn.data('satuan')
            const harga_jual = btn.data('harga_jual')
            const stok = btn.data('stok')
            const ditarik = btn.data('ditarik')
            const user_id = btn.data('user_id')
            const modal = $(this)
            console.log(mode)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data barang')
                modal.find('#kode_barang').val(kode_barang)
                modal.find('#produk_id').val(produk_id)
                modal.find('#nama_barang').val(nama_barang)
                modal.find('#satuan').val(satuan)
                modal.find('#harga_jual').val(harga_jual)
                modal.find('#stok').val(stok)
                modal.find('#ditarik').val(ditarik)
                modal.find('#user_id').val(user_id)
                modal.find('.modal-body form').attr('action', '{{ url('barang') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data barang')
                modal.find('#kode_barang').val('')
                modal.find('#produk_id').val('')
                modal.find('#nama_barang').val('')
                modal.find('#satuan').val('')
                modal.find('#harga_jual').val('')
                modal.find('#stok').val('')
                modal.find('#ditarik').val('')
                modal.find('#user_id').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('barang') }}')
            }
        })
    </script>
@endpush
