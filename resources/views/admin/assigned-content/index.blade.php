@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.partials.message')
            <a class="btn mb-2 btn-success" href="{{route('admin.assigned-content.create')}}"><i class="icon-plus-circle2"></i> Gắn bài viết mới</a>
            @if(count($records))
            <div class="card card-table table-responsive shadow-0 mb-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th>#</th> --}}
                            <th>Trang được gắn ND xuống cuối</th>
                            <th>Ngôn ngữ gốc</th>
                            <th>Ngôn ngữ khác</th>
                            {{-- <th>Nội dung (Xem trước)</th> --}}
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                        <tr>
                            {{-- <td>
                                <input type="checkbox" name="ids[]" value="{{$record->id}}" class="form-input-styled">
                            </td> --}}
                            <td>
                                <a href="{{route('admin.assigned-content.edit', $record->id)}}">{{$routeList[$record->route_name]['name']}}</a>
                            </td>
                            <td>
                                <a href="{{route('admin.assigned-content.edit', $record->id)}}">
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
                                        $langNames[] = '<a href="' . route('admin.assigned-content.edit', $child->id) . '"><span class="badge bg-success">' . ($child->langs ? $child->langs->name : '') . '</span></a>';
                                    @endphp
                                @endforeach
                                {!! implode(' ', $langNames) !!}
                            </td>
                            {{-- <td>
                                <a href="{{route('admin.assigned-content.edit', $record->id)}}">{!! $record->content !!}</a>
                            </td> --}}
                            <td class="text-center">
                                {{date('d/m/Y',strtotime($record->created_at))}}
                                @if($record->updated_at)
                                <br>({{date('d/m/Y',strtotime($record->updated_at))}})
                                @endif
                            </td>
                            <td class="text-center">
                                @if($record->status)
                                <span class="badge bg-success">Đăng</span>
                                @else
                                <span class="badge bg-secondary">Ẩn</span>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:;" class="js-delete text-danger" data-key="{{$record->id}}" title="Xóa"><i class="icon-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{ $records->links('pagination::simple-bootstrap-4') }}
            </div>
            @else
            <div class="text-center p-5">
                <img src="/assets/img/no-data.png" alt="" srcset="">
                <p class="h4 mt-2 font-weight-semibold">Chưa có bài viết nào</p>
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
                    url: '{{route('admin.assigned-content.destroy','idx')}}'.replace(/idx/, id),
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