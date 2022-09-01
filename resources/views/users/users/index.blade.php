@extends('template.template')

@push('style')
<link rel="stylesheet" href="{{ asset('plugin/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/datatables/Bootstrap/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/sweetalert/dist/sweetalert2.css') }}">
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="row">
        <div class="col mb-2">
            <a class='badge bg-primary' href="{{ route('users.create') }}" title="add users">add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-condensed table-bordered" id="members">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display: none">
</form>
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content-edit">

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugin/datatables/datatables.js') }}"></script>
<script src="{{ asset('plugin/datatables/DataTables-1.12.1/js/datatables.jqueryui.js') }}"></script>
<script src="{{ asset('plugin/sweetalert/dist/sweetalert2.js') }}"></script>

<script>
    $(document).on('click', '#members tr td a[id="edit"]', function(e) {
        e.preventDefault();
        var href = $(this).attr('data-bs-role');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-sm btn-success',
                cancelButton: 'btn btn-sm btn-danger'
            },
            buttonsStyling: false
        });

        Swal.fire({
            title: 'Are u sure?',
            text: "You will not be able to return it!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes!',
            cancelButtonText: 'No!',
        }).then((result) => {
            if (result.value) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();

                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'The data was successfully deleted from the system.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Canceled',
                    'Data secured :)',
                    'error'
                )
            }
        });

    })

    $(document).on('click', '#members tr td a[id="view"]', function(a) {
        a.preventDefault();
        const id = $(this).attr('data-bs-role');
        $.ajax({
            url: id,
            success: function(a) {
                $("#modal-content-edit").html(a);
            }
        });
    });

    $('#members').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.data') }}",
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'status'
            },
            {
                data: 'access'
            },
            {
                data: 'action'
            }
        ]
    });
</script>
@endpush