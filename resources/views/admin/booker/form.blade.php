@extends('layouts.admin')
@section('content')
@if (isset($record))
<form method="POST" action="{{route('admin.booker.update',$record->id)}}">
    @method('PUT')
@else
<form method="POST" action="{{route('admin.booker.store')}}">
@endif
    @csrf
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="w-100 overflow-auto order-2 order-md-1">
				<div class="card">
					<div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-semibold">Tên <span class="required"></span></label>
                            <input type="text" class="form-control" required id="name" name="name" value="{{ old('name') ?: ($record->name ?? '') }}">
                            @error('name')
                            <label id="name-error" class="validation-invalid-label" for="name">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Ảnh </label>
                            <input type="file" class="form-control-file" data-key="image" data-fouc>
                            @if(old('image'))
                            <input type="hidden" name="image" value="{{old('image')}}" id="image">
                            <img class="mt-2" id="image_preview" height="100" src="{{old('image')}}"/>
                            @elseif (isset($record) && $record->image)
                            <input type="hidden" name="image" value="{{$record->image}}" id="image">
                            <img class="mt-2" id="image_preview" height="100" src="{{$record->image}}"/>
                            @else
                            <input type="hidden" name="image" value="" id="image">
                            <img class="mt-2" id="image_preview" style="display:none;" height="100"/>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Sale text</label>
                            @if(old('sale_text'))
                            <input type="text" class="form-control tokenfield" value="{{old('sale_text')}}" name="sale_text" data-fouc>
                            @elseif(isset($record) && $record->sale_text)
                            <input type="text" class="form-control tokenfield" value="{{$record->sale_text}}" name="sale_text" data-fouc>
                            @else
                            <input type="text" class="form-control tokenfield" value="" name="sale_text" data-fouc>
                            @endif
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
                            <label class="font-weight-semibold">Nội dung bài viết <span class="required"></span></label>
                            <textarea class="ckeditor form-control" id="content" name="content" required>{{ old('content') ?: ($record->content ?? '') }}</textarea>
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
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
                <div class="sidebar-content">
                    <div class="card">
                        <div class="card-body text-center">
                        <div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-input-styled" name="is_hot" {{isset($record) && $record->is_hot == 1 ? 'checked' : ''}}  data-fouc>
												Nổi bật?
											</label>
										</div>
                                        <div class="form-group">
                            <label class="font-weight-semibold">Thứ tự sắp xếp </label>
                            <input type="number" class="form-control" required id="ordering" name="ordering" value="{{ old('ordering') ?: ($record->ordering ?? '') }}">
                            @error('ordering')
                            <label id="ordering-error" class="validation-invalid-label" for="ordering">{{$message}}</label>
                            @enderror
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
