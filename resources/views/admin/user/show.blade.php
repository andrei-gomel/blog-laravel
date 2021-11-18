@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if(isset($data_success))
                <div class="row col-12 mb-3">
                    <div class="col-8 col-md-8">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ $data_success }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь {{ $user->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Пользователь {{ $user->name }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row col-8">
                <div class="col-sm-3 mb-3">
                    <a href="{{ route('admin.user.index', $user->id) }}" class="btn btn-block btn-success">Список</a>
                </div>
                <div class="col-sm-3 mb-3">
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-block btn-primary">Редактировать</a>
                </div>
                <div class="col-sm-3 mb-3">
                    <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-block btn-danger">Удалить</a>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td><b>ID</b></td>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td><b>Имя пользователя</b></td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Роль</b></td>
                                    <td>{{ $roles[$user->role] }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email пользователя</b></td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Дата создания</b></td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><b>Дата редактирования</b></td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
