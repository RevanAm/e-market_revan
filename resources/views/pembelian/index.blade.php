@extends('templates.layout')
@push('style')
@endpush
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Pembelian</h1>
            <br>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                        Launch Primary Modal --}}
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formPembelianModal">
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
                        <th>Kode Masuk</th>
                        <th>Tanggal Masuk</th>
                        <th>Total</th>
                        <th>Pemasok</th>
                        <th>User</th>
                    </tr>
                <tbody>
                    @foreach ($pembelian as $p)
                        <tr>
                            <td>{{ $i = isset($i) ? ++$i : 1 }}</td>
                            <td>{{ $p->kode_masuk }}</td>
                            <td>{{ $p->tanggal_masuk }}</td>
                            <td>{{ $p->total }}</td>
                            <td>{{ $p->pemasok_id }}</td>
                            <td>{{ $p->user_id }}</td>
                            <td>
                                <form action="pembelian/{{ $p->id }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-delete" data-dismiss="modal"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>

                                <button class="btn btn-info" data-toggle="modal" data-target="#formPembelianModal"
                                    data-mode="edit" data-id="{{ $p->id }}" data-tanggal_masuk="{{ $p->tanggal_masuk }}" 
                                    data-kode_masuk="{{ $p->kode_masuk }}" data-total="{{ $p->total }}" data-pemasok_id="{{ $p->pemasok_id }}" 
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
        @include('pembelian.form')
        @endsection
        
        @push('script')
    <script>
        $('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })

        console.log('pembelian')
        // $('#tbl_pembelian').DataTable()
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
        $('#formPembelianModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const id = btn.data('id')
            const kode_masuk = btn.data('kode_masuk')
            const tanggal_masuk = btn.data('tanggal_masuk')
            const total = btn.data('total')
            const pemasok_id = btn.data('pemasok_id')
            const user_id = btn.data('user_id')
            const modal = $(this)
            console.log(mode)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Pembelian')
                modal.find('#kode_masuk').val(kode_masuk)
                modal.find('#tanggal_masuk').val(tanggal_masuk)
                modal.find('#total').val(total)
                modal.find('#pemasok_id').val(pemasok_id)
                modal.find('#user_id').val(user_id)
                modal.find('.modal-body form').attr('action', '{{ url('pembelian') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data Pembelian')
                modal.find('#kode_masuk').val('')
                modal.find('#tanggal_masuk').val('')
                modal.find('#total').val('')
                modal.find('#pemasok_id').val('')
                modal.find('#user_id').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('pembelian') }}')
            }
        })
    </script>
@endpush
