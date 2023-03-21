@extends('layouts.mainlayout')
@section('content')
    <section class="content">
        <br>
        <br>


        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Role </h3>
                        </div>
                        <form action="{{ route('roles.store') }}" method="post" id="create_form">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                    @foreach ($errors->all() as $error)
                                        <ul>
                                            <li>
                                                {{ $error }}
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            @endif

                            @csrf
                            <div class="card-body">
                                <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="-1"
                                    aria-hidden="false" name="gaurd" id="gaurd_name">
                                    <option class="form-control" value="web">Admin</option>
                                </select>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Role Name </label>
                                    <input type="test" class="form-control" placeholder="Enter name" name="role_name"
                                        id="role_name">
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Add New
                                    Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
{{-- <script>
    function store() {
        axios.post('cms/admin/roles/create', {
                role_name: document.getElementById('role_name').value,
                gaurd: document.getElementById('gaurd_name').value,

            })
            .then(function(response) {
                console.log(response);
                if (document.getElementById('create_form') != undefined)
                    document.getElementById('create_form').reset();
                showMessage
                // showToaster(response.data.message, true);
            })
            .catch(function(error) {
                console.log("ERROR RESPONSE");
                console.log(error.response);
                showMessage();
                // showToaster(error.response.data.message, false);
            });
    }

    function showMessage() {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'تمت الإضافة بنجاح',
            showConfirmButton: false,
            timer: 1500
        })
    }
</script> --}}
