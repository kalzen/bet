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
                        @if (isset($record))
                            <div class="alert alert-info">
                                Sửa tên ngôn ngữ sẽ không làm thay đổi nội dung bài viết hiện tại.
                            </div>
                        @endif
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
