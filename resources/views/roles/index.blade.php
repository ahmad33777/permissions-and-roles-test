@section('title', 'Roles ')
@extends('layouts.mainlayout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <br>

            @if (session()->has('status'))
                @if (session('status') == true)
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        Success alert preview. This alert is dismissable.
                    </div>
                @endif
            @endif
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ALL ROLES </h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th>Number of Permissions</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a href="">
                                                    <span class="badge bg-success">{{ $role->guard_name }}</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('role.permissions.index', $role->id) }}">
                                                    <span class="badge bg-info"> {{ $role->permissions_count }}
                                                        permission/s</span>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary"><i
                                                        class="fas fa-edit"></i></a>

                                                {{-- <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                                                    class="btn btn-primary">
                                                    @csrf
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"
                                                            style="color: white"></i></button>
                                                </form> --}}
                                                <a href="#" onclick="confirmDestroy({{ $role->id }}, this)"
                                                    class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function confirmDestroy(id, td) {
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لا يمكن التراجع عن عملية الحذف",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم',
            cancelButtonText: 'إلغاء',
        }).then((result) => {
            if (result.isConfirmed) {
                destroy(id, td);
            }
        });
    }

    function destroy(id, td) {
        axios.delete('/cms/admin/roles/' + id)
            .then(function(response) {
                // handle success 2xx 3xx
                console.log(response.data);
                td.closest('tr').remove();
                showMessage(response.data);
            })
            .catch(function(error) {
                // handle error 4xx 5xx
                console.log(error.response);
                showMessage(error.response.data);
            })
            .then(function() {
                // always executed
            });
    }

    function showMessage(data) {
        Swal.fire({
            position: 'top-end',
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
