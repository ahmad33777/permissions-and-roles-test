@extends('layouts.mainlayout')
@section('content')
    <section class="content">
        <br>
        <br>
        @if (session()->has('status'))
            @if (session('status') == true)
                <div class="alert alert-success" role="alert">
                    تمت ألتعديل بنجاح
                </div>
            @endif
        @endif
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit New Role </h3>
                        </div>
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}



                            <div class="card-body">
                                <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="-1"
                                    aria-hidden="false" name="gaurd">
                                    <option value="web" @if ($role->guard_name == 'web') selected @endif>Admin</option>

                                </select>
                                <div class="form-group">
                                    <label for="name">Role Name </label>
                                    <input type="test" class="form-control" placeholder="Enter name" name="role_name"
                                        value="{{ $role->name }}">
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Add New Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
