@extends('templates.layout')
@push('style')
@endpush
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">User</h1>
            <br>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                        Launch Primary Modal --}}
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formPenggunaModal">
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Tanggal Verifikasi Email</th>
                        <th>Token</th>
                        <th>Action</th>
                    </tr>
                <tbody>
                    @foreach ($pengguna as $p)
                        <tr>
                            <td>{{ $i = isset($i) ? ++$i : 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->password }}</td>
                            <td>{{ $p->email_verified_at }}</td>
                            <td>{{ $p->remember_token }}</td>
                            <td>
                                <form action="pengguna/{{ $p->id }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-delete" data-dismiss="modal"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>

                                <button class="btn btn-info" data-toggle="modal" data-target="#formPenggunaModal"
                                    data-mode="edit" data-id="{{ $p->id }}" data-password="{{ $p->password }}" 
                                    data-nama="{{ $p->nama }}" data-token="{{ $p->token }}" data-email="{{ $p->email }}" ><i
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
        @include('pengguna.form')
        @endsection
        
        @push('script')
    <script>
        $('.alert-success').fadeTo(5000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        })

        $('.alert-danger').fadeTo(10000, 500).slideUp(500, function() {
            $('.alert-danger').slideUp(500)
        })

        console.log('pengguna')
        // $('#tbl_pengguna').DataTable()
        // dialog hapus
        $('.btn-delete').on('click', function(e) {
            console.log('delete')
            let nama = $(this).closest('tr').find('td:eq(1)').text();
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
        $('#formPenggunaModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const id = btn.data('id')
            const nama = btn.data('nama')
            const email = btn.data('email')
            const password = btn.data('password')
            const token = btn.data('token')
            const modal = $(this)
            console.log(mode)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data pengguna')
                modal.find('#nama').val(nama)
                modal.find('#email').val(email)
                modal.find('#password').val(password)
                modal.find('#token').val(token)
                modal.find('.modal-body form').attr('action', '{{ url('pengguna') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data Pengguna')
                modal.find('#nama').val('')
                modal.find('#email').val('')
                modal.find('#password').val('')
                modal.find('#token').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('pengguna') }}')
            }
        })
    </script>
@endpush
