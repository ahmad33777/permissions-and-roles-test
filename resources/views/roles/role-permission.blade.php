@section('title', 'Role permissions ')
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
                            <h3 class="card-title">ALL Role permissions </h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th>Assigned</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <a href="#">
                                                    <span class="badge bg-success">{{ $permission->guard_name }}</span>
                                                </a>
                                            </td>

                                            <td>
                                                <div class="col-sm-6">
                                                    <!-- checkbox -->
                                                    <div class="form-group clearfix">
                                                        <div class="icheck-primary d-inline">
                                                            <input type="checkbox" id="permission_{{ $permission->id }}"
                                                                onchange="priformstore({{ $role_id }}, {{ $permission->id }})"
                                                                @if ($permission->assigned) checked @endif>
                                                            <label for="permission_{{ $permission->id }}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
    function priformstore(roleId, permissionId) {
        // console.log("Role:");
        let data = {
            permission_id: permissionId,
        };
        store('/cms/admin/role/' + roleId + '/permissions/', data);
    }

    function store(url, data) {
        axios.post(url, data)
            .then(function(response) {
                console.log(response);
                if (document.getElementById('create_form') != undefined)
                    document.getElementById('create_form').reset();
                showMessage();
                // showToaster(response.data.message, true);
            })
            .catch(function(error) {
                console.log("ERROR RESPONSE");
                console.log(error.response);

                function showMessage() {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Permissions updated failed',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                // showToaster(error.response.data.message, false);
            });
    }


    function showMessage() {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Permissions updated success',
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
