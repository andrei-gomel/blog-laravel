@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание нового пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Создание нового пользователя</li>
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
                    <form action="{{ route('admin.user.store') }}" method="post" class="w-25">
                        @csrf
                        <div class="form-group">
                            <label for="title">Имя пользователя</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" id="title" class="form-control" placeholder="Имя пользователя" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Выберите роль</label>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select class="form-control" name="role">
                                <option value="">Роль не выбрана</option>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ $id == old('role') ? 'selected' : '' }}>
                                        {{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Email пользователя</label>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Пароль</label>
                            @error('password')
                            <div class="text-danger">Это поле обязательно для заполнения</div>
                            @enderror
                            <input type="text" name="password" id="password" class="form-control" placeholder="Пароль" value="{{ old('password') }}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Добавить">
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
