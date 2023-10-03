@extends('templates.layout')
@push('style')
@endpush
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Penjualan</h1>
            <br>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                        Launch Primary Modal --}}
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formPenjualanModal">
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
                        <th>No Faktur</th>
                        <th>Tanggal Faktur</th>
                        <th>Total</th>
                        <th>Pelanggan</th>
                        <th>User</th>
                    </tr>
                <tbody>
                    @foreach ($penjualan as $p)
                        <tr>
                            <td>{{ $i = isset($i) ? ++$i : 1 }}</td>
                            <td>{{ $p->no_faktur }}</td>
                            <td>{{ $p->tgl_faktur }}</td>
                            <td>{{ $p->total_bayar }}</td>
                            <td>{{ $p->pelanggan_id }}</td>
                            <td>{{ $p->user_id }}</td>
                            <td>
                                <form action="penjualan/{{ $p->id }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-delete" data-dismiss="modal"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>

                                <button class="btn btn-info" data-toggle="modal" data-target="#formPenjualanModal"
                                    data-mode="edit" data-id="{{ $p->id }}" data-tgl_faktur="{{ $p->tgl_faktur }}" 
                                    data-no_faktur="{{ $p->no_faktur }}" data-total_bayar="{{ $p->total_bayar }}" data-pelanggan_id="{{ $p->pelanggan_id }}" 
                                    data-user_id="{{ $p->user_id }}" ><i
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
        @include('penjualan.form')
        @endsection
        
        @push('script')
    <script>
        $('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })

        console.log('penjualan')
        // $('#tbl_penjualan').DataTable()
        // dialog hapus
        $('.btn-delete').on('click', function(e) {
            console.log('delete')
            let kode = $(this).closest('tr').find('td:eq(1)').text();
            Swal.fire({
                icon: 'error',
                title: 'hapus data',
                html: `Hapus <b>${kode}</b> engga?`,
                confirmButtonText: 'Iyah',
                denyButtonText: 'engga',
                showDenyButton: true,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed) $(e.target).closest('form').submit()
                else swal.close()
            })
        })
        $('#formPenjualanModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const id = btn.data('id')
            const no_faktur = btn.data('no_faktur')
            const tgl_faktur = btn.data('tgl_faktur')
            const total_bayar = btn.data('total_bayar')
            const pelanggan_id = btn.data('pelanggan_id')
            const user_id = btn.data('user_id')
            const modal = $(this)
            console.log(mode)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Penjualan')
                modal.find('#no_faktur').val(no_faktur)
                modal.find('#tgl_faktur').val(tgl_faktur)
                modal.find('#total_bayar').val(total_bayar)
                modal.find('#pelanggan_id').val(pelanggan_id)
                modal.find('#user_id').val(user_id)
                modal.find('.modal-body form').attr('action', '{{ url('penjualan') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data Penjualan')
                modal.find('#no_faktur').val('')
                modal.find('#tgl_faktur').val('')
                modal.find('#total_bayar').val('')
                modal.find('#pelanggan_id').val('')
                modal.find('#user_id').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('penjualan') }}')
            }
        })
    </script>
@endpush
