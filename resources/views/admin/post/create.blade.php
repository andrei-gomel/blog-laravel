@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание нового поста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                        <li class="breadcrumb-item active">Создание нового поста</li>
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
                    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-25">
                            <label for="title">Название поста</label>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="title" id="title" class="form-control" placeholder="Название поста" value="{{ old('title') }}">
                        </div>
                        <div class="form-group w-25">
                            <label>Выберите категорию</label>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                <select class="form-control" name="category_id">
                                    <option value="">Выберите категорию</option>
                                    @foreach($categories as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == old('category_id') ? 'selected' : '' }}>
                                        {{ $item->title }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group w-25">
                            <label>Теги</label>
                            @error('tag_ids')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                @foreach($tags as $tag)
                                <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">
                                    {{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-75">
                            <label for="summernote">Содержание поста</label>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <textarea name="content" id="summernote">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group w-50">
                            <label for="preview_image">Добавить превью</label>
                            @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="preview_image" name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group w-50">
                            <label for="main_image">Добавить главное изобр.</label>
                            @error('main_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="main_image" name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Создать">
                        </div>
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
