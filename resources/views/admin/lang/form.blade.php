@extends('layouts.admin')
@section('content')
@if (isset($record))
<form method="POST" action="{{route('admin.lang.update',$record->id)}}">
    @method('PUT')
@else
<form method="POST" action="{{route('admin.lang.store')}}">
@endif
    @csrf
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="col-md-6 col-12 overflow-visible order-2 order-md-1">
				<div class="card">
					<div class="card-body">
                        
                        @include('admin.shared.locale-country-codes')
                        {{-- <div class="form-group">
                            <label class="font-weight-semibold">Name <span class="required"></span></label>
                            <input type="text" class="form-control" required id="name" name="name" value="{{ old('name') ?: ($record->name ?? '') }}" placeholder="VD: Tiếng Việt">
                            @error('name')
                            <label id="name-error" class="validation-invalid-label" for="name">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Locale <span class="required"></span></label>
                            <input type="text" class="form-control" required id="locale" name="locale" value="{{ old('locale') ?: ($record->locale ?? '') }}" placeholder="VD: vi_VN, en_US, zh_CN, ...">
                            @error('locale')
                            <label id="locale-error" class="validation-invalid-label" for="locale">{{$message}}</label>
                            @enderror
                        </div> --}}
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
