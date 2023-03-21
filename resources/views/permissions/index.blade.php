@section('title', 'Roles ')
@extends('layouts.mainlayout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ALL permissions </h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Permissions as $Permission)
                                        <tr>
                                            <td>{{ $Permission->id }}</td>
                                            <td>{{ $Permission->name }}</td>
                                            <td>
                                                <a href="">
                                                    <span class="badge bg-success">{{ $Permission->guard_name }}</span>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{ route('permissions.edit', $Permission->id) }} "
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                                {{-- <form action="" method="post" class="btn btn-primary">
                                                    @csrf
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"
                                                            style="color: white"></i></button>
                                                </form> --}}
                                                <a href="#" onclick="confirmDestroy({{ $Permission->id }} ,this)"
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
        axios.delete('/cms/admin/permissions/' + id)
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
            // position: 'top-end',
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
