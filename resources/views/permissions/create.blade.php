@extends('layouts.mainlayout')
@section('content')
    <section class="content">
        <br>
        <br>
        @if (session()->has('status'))
            @if (session('status') == true)
                <div class="alert alert-success" role="alert">
                    تمت الاضافة بنجاح
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
                            <h3 class="card-title">Create New Permission </h3>
                        </div>
                        <form action="{{ route('permissions.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="-1"
                                    aria-hidden="false" name="gaurd">
                                    <option class="form-control" value="web">Admin</option>
                                </select>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">permission Name </label>
                                    <input type="test" class="form-control" placeholder="Enter name" name="name">
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
