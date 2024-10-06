@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.partials.message')
            <a class="btn mb-2 btn-success" href="{{route('admin.booker.create')}}"><i class="icon-plus-circle2"></i> Thêm mới</a>
            @if(count($records))
            <div class="card card-table table-responsive shadow-0 mb-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên booker</th>
                            <th>Chuyên mục</th>
                            <th>Ngôn ngữ gốc</th>
                            <th>Ngôn ngữ khác</th>
                            <th>Ảnh</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                        <tr>
                            <td>
                                <input type="checkbox" name="ids[]" value="{{$record->id}}" class="form-input-styled">
                            </td>
                            <td>
                                <a href="{{route('admin.booker.edit', $record->id)}}">{{ $record->name }}</a>
                                
                            </td>
                            <td>
                                {{ $record->categories ? $record->categories->pluck('name')->join(', ') : '' }}
                            </td>
                            <td>
                                <a href="{{route('admin.booker.edit', $record->id)}}">
                                    <span class="badge bg-info">
                                        {{ $record->langs ? $record->langs->name : '' }}
                                    </span>
                                </a>
                            </td>
                            <td>
                                @php
                                    $langNames = [];
                                @endphp
                                @foreach($record->langChildren as $child)
                                    @php
                                        $langNames[] = '<a href="' . route('admin.booker.edit', $child->id) . '"><span class="badge bg-success">' . ($child->langs ? $child->langs->name : '') . '</span></a>';
                                    @endphp
                                @endforeach
                                {!! implode(' ', $langNames) !!}
                            </td>
                            <td>
                                @if($record->image)
                                <img src="{{$record->image}}" height="50">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.booker.edit', $record->id)}}">Sửa </a>
                                <a href="javascript:;" class="js-delete text-danger" data-key="{{$record->id}}" title="Xóa"><i class="icon-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{$records->links()}}
            </div>
            @else
            <div class="text-center p-5">
                <img src="/assets/img/no-data.png" alt="" srcset="">
                <p class="h4 mt-2 font-weight-semibold">Chưa có booker nào</p>
            </div>
            @endif
        </div>
    </div>
    <!-- /bordered card body table -->
<script>
    
    $('.js-delete').on('click', function() {
        let id = $(this).data('key')
        swal({
            title: 'Bạn chắc chắn muốn xóa?',
            text: "Thao tác sẽ không thể hoàn tác!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xác nhận xóa!',
            cancelButtonText: 'Hủy',
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-default',
            buttonsStyling: false
        }).then(function (res) {
            if (res.value) {
                $.ajax({
                    url: '{{route('admin.booker.destroy','idx')}}'.replace(/idx/, id),
                    method:'DELETE',data:{_token:'{{csrf_token()}}'},dataType:'json',
                    success:function(resp) {
                        toastr[resp.success ? 'success' : 'error'](resp.message)
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                })
            }
        }, function (dismiss) {});
    });
</script>
@endsection