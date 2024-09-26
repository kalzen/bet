@extends('layouts.admin')
@section('content')
@if (isset($record))
<form method="POST" action="{{route('admin.slide.update',$record->id)}}">
    @method('PUT')
@else
<form method="POST" action="{{route('admin.slide.store')}}">
@endif
    @csrf
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="w-100 overflow-auto order-2 order-md-1">
				<div class="card">
					<div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-semibold">Slide title <span class="required"></span></label>
                            <input type="text" class="form-control" required id="name" name="name" value="{{ old('name') ?: ($record->name ?? '') }}">
                            @error('name')
                            <label id="name-error" class="validation-invalid-label" for="name">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Button 1 name <span class="required"></span></label>
                            <input type="text" class="form-control" required id="button_name_1" name="button_name_1" value="{{ old('button_name_1') ?: ($record->button_name_1 ?? '') }}">
                            @error('button_name_1')
                            <label id="button_name_1-error" class="validation-invalid-label" for="button_name_1">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Button 1 link <span class="required"></span></label>
                            <input type="text" class="form-control" required id="button_url_1" name="button_url_1" value="{{ old('button_url_1') ?: ($record->button_url_1 ?? '') }}">
                            @error('button_url_1')
                            <label id="button_url_1-error" class="validation-invalid-label" for="button_url_1">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Button 2 name <span class="required"></span></label>
                            <input type="text" class="form-control" required id="button_name_2" name="button_name_2" value="{{ old('button_name_2') ?: ($record->button_name_2 ?? '') }}">
                            @error('button_name_2')
                            <label id="button_name_2-error" class="validation-invalid-label" for="button_name_2">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Button 2 link <span class="required"></span></label>
                            <input type="text" class="form-control" required id="button_url_2" name="button_url_2" value="{{ old('button_url_2') ?: ($record->button_url_2 ?? '') }}">
                            @error('button_url_2')
                            <label id="button_url_2-error" class="validation-invalid-label" for="button_url_2">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group d-none">
                            <label class="font-weight-semibold">Link</label>
                            <input type="text" class="form-control" id="url" name="url" value="https://example.com">
                            @error('url')
                            <label id="url-error" class="validation-invalid-label" for="url">{{$message}}</label>
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
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-semibold">Thứ tự</label>
                                <input type="text" class="form-control mask-decimal" value="{{old('ordering')?:($record->ordering??'1')}}" name="ordering">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection