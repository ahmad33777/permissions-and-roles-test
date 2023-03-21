@extends('layouts.mainlayout')
@section('content')
    <section class="content">
        <br>
        <br>
        @if (session()->has('status'))
            @if (session('status') == true)
                <div class="alert alert-success" role="alert">
                    تمت التعديل بنجاح
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
                            <h3 class="card-title">Create User Acount </h3>
                        </div>
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="test" class="form-control" placeholder="Enter name" name="name"
                                        value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" placeholder="Enter email" name="email"
                                        value="{{ $user->email }}">
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
