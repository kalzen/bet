@extends('layouts.admin')
@section('content')
@if (isset($record))
<form method="POST" action="{{route('admin.code.update',$record->id)}}">
    @method('PUT')
@else
<form method="POST" action="{{route('admin.code.store')}}">
@endif
    @csrf
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="w-100 overflow-auto order-2 order-md-1">
				<div class="card">
					<div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-semibold">Code <span class="required"></span></label>
                            <input type="text" class="form-control" required id="name" name="name" value="{{ old('name') ?: ($record->name ?? '') }}">
                            @error('name')
                            <label id="name-error" class="validation-invalid-label" for="name">{{$message}}</label>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-semibold">Mô tả</label>
                            @if(old('description'))
                            <input type="text" class="form-control tokenfield" value="{{old('description')}}" name="description" data-fouc>
                            @elseif(isset($record) && $record->description)
                            <input type="text" class="form-control tokenfield" value="{{$record->description}}" name="description" data-fouc>
                            @else
                            <input type="text" class="form-control tokenfield" value="" name="description" data-fouc>
                            @endif
                        </div>
                        <div class="form-group">
                    <label for="booker_id">Booker</label>
                    <select class="form-control" id="booker_id" name="booker_id" required>
                        <option value="">Chọn Booker</option>
                        @foreach($bookers as $booker)
                            @if(old('booker_id'))
                            <option value="{{ $booker->id }}" {{ old('booker_id') == $booker->id ? 'selected' : '' }}>{{ $booker->name }}</option>
                            @elseif(isset($record))
                            <option value="{{ $booker->id }}" {{ $record->booker->first()->id == $booker->id ? 'selected' : '' }}>{{ $booker->name }}</option>
                            
                            @else 
                            <option value="{{ $booker->id }}" >{{ $booker->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('booker_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                        <div class="form-group">
                                <label class="font-weight-semibold">Link</label>
                                @if(old('url'))
                                <input type="text" class="form-control" value="{{old('url')}}" name="url">
                                @elseif(isset($record) && $record->url)
                                <input type="text" class="form-control" value="{{$record->url}}" name="url">
                                @else
                                <input type="text" class="form-control" value="" name="url">
                                @endif
                            </div>
                            <div class="form-group">
                            <label class="font-weight-semibold">Nội dung bài viết </label>
                            <textarea class="ckeditor form-control" id="content" name="content" >{{ old('content') ?: ($record->content ?? '') }}</textarea>
                            @error('content')
                            <label id="content-error" class="validation-invalid-label" for="content">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Lưu <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</form>
@endsection
