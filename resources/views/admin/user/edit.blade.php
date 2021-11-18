@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя {{ $user->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Редактирование пользователя {{ $user->name }}</li>
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
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="w-25">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="title">Имя пользователя</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" placeholder="Имя пользователя">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                        </div>
                        <div class="form-group">
                            <label>Выберите роль</label>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select class="form-control" name="role">
                                <option value="">Выберите категорию</option>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ $id == $user->role ? 'selected' : '' }}>
                                        {{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Email пользователя</label>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Email">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Сохранить">
                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
