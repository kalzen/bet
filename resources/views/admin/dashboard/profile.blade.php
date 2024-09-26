@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.partials.message')
            <form action="{{route('admin.profile')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-weight-semibold">Tên <span class="required"></span></label>
                    <input type="text" class="form-control" required id="name" name="name" value="{{ old('name') ?: auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Mô tả</label>
                    <textarea class="form-control maxlength" maxlength="1500" name="description">{{ old('description') ?: (auth()->user()->description ?? '') }}</textarea>
                    <span class="text-muted">Most optimal 160 - 300 characters.</span>
                </div>
                <div class="form-group">
                    <label class="font-weight-semibold">Nội dung bài viết <span class="required"></span></label>
                    <textarea class="ckeditor form-control" id="content" name="content" required>{{ old('content') ?: (auth()->user()->content ?? '') }}</textarea>
                    @error('content')
                    <label id="content-error" class="validation-invalid-label" for="content">{{$message}}</label>
                    @enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Lưu <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
    <script>
    </script>
@endsection