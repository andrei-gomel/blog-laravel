@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр поста #{{ $post->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                        <li class="breadcrumb-item active">Просмотр поста #{{ $post->id }}</li>
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
                    <a href="{{ route('admin.post.index', $post->id) }}" class="btn btn-block btn-success">Список</a>
                </div>
                <div class="col-sm-3 mb-3">
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-block btn-primary">Редактировать</a>
                </div>
                    <div class="col-sm-3 mb-3">
                    <a href="{{ route('admin.post.delete', $post->id) }}" class="btn btn-block btn-danger">Удалить</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
@php
    $strTag = null;
    foreach ($tags as $tag)
    {
      in_array($tag->id, $post->tags->pluck('id')->toArray()) ? $strTag .= $tag->title . ',' : '';

    }

@endphp

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td><b>ID</b></td>
                                    <td>{{ $post->id }}</td>
                                </tr>
                                <tr>
                                    <td><b>Название</b></td>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <td><b>Категория</b></td>
                                    <td>
                                        @foreach($categories as $item)
                                        {{ $item->id == $post->category_id ? $item->title : '' }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Теги</b></td>
                                    <td>{{ rtrim($strTag, ',') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Содержание</b></td>
                                    <td>{{ strip_tags($post->content) }}</td>
                                </tr>
                                <tr>
                                    <td><b>Дата создания</b></td>
                                    <td>{{ $post->created_at }}</td>
                                </tr>
                                <tr>
                                    <td><b>Дата редактирования</b></td>
                                    <td>{{ $post->updated_at }}</td>
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
