@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Edit Code</h3>
            <form action="{{ route('admin.code.update', $code->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $code->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $code->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content', $code->content) }}</textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $code->url) }}">
                    @error('url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="booker_id">Booker</label>
                    <select class="form-control" id="booker_id" name="booker_id" required>
                        <option value="">Select Booker</option>
                        @foreach($bookers as $booker)
                            <option value="{{ $booker->id }}" {{ old('booker_id', $code->booker_id) == $booker->id ? 'selected' : '' }}>{{ $booker->name }}</option>
                        @endforeach
                    </select>
                    @error('booker_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
