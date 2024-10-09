@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.partials.message')
            <a class="btn mb-2 btn-success" href="{{ route('admin.lang.create') }}"><i class="icon-plus-circle2"></i> Thêm
                mới</a>
            @if (count($records))
                <div class="card card-table table-responsive shadow-0 mb-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Tên ngôn ngữ</th>
                                <th>Mã locale</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    {{-- <td>
                                <input type="checkbox" name="ids[]" value="{{$record->id}}" class="form-input-styled">
                            </td> --}}
                                    <td>
                                        <a href="{{ route('admin.lang.edit', $record->id) }}">{{ $record->name }}</a>
                                    </td>
                                    <td>
                                        {{ $record->locale }}
                                    </td>
                                    <td>
                                        @if ($record->deleted_at == null)
                                            <span class="badge bg-success">Hoạt động</span>
                                        @else
                                            <span class="badge bg-secondary">Ẩn</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($record->deleted_at == null)
                                            <a href="javascript:;" class="js-delete text-danger"
                                                data-key="{{ $record->id }}" title="Vô hiệu hóa"><i
                                                    class="icon-blocked"></i></a>
                                        @else
                                            <a href="javascript:;" class="js-restore text-success"
                                                data-key="{{ $record->id }}" title="Khôi phục"><i
                                                    class="icon-reply"></i></a>
                                        @endif
                                        <a href="javascript:;" class="js-forceDelete text-danger"
                                                data-key="{{ $record->id }}" title="Xóa"><i class="icon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    {{ $records->links() }}
                </div>
            @else
                <div class="text-center p-5">
                    <img src="/assets/img/no-data.png" alt="" srcset="">
                    <p class="h4 mt-2 font-weight-semibold">Chưa có ngôn ngữ nào</p>
                </div>
            @endif
        </div>
    </div>
    <!-- /bordered card body table -->
    <script>
        $('.js-delete').on('click', function() {
            let id = $(this).data('key')
            swal({
                title: 'Bạn chắc chắn muốn tắt ngôn ngữ?',
                text: "Thao tác này sẽ làm cho ngôn ngữ và bài viết liên quan biến mất tạm thời khỏi trang web, bạn sẽ có thể khôi phục sau",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận tắt!',
                cancelButtonText: 'Hủy',
                confirmButtonClass: 'btn btn-warning',
                cancelButtonClass: 'btn btn-default',
                buttonsStyling: false
            }).then(function(res) {
                if (res.value) {
                    $.ajax({
                        url: '{{ route('admin.lang.destroy', 'idx') }}'.replace(/idx/, id),
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(resp) {
                            toastr[resp.success ? 'success' : 'error'](resp.message)
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        }
                    })
                }
            }, function(dismiss) {});
        });

        $('.js-forceDelete').on('click', function() {
            let id = $(this).data('key')
            swal({
                title: 'Bạn có chắc chắn muốn xóa không?',
                text: "Bạn sẽ phải sửa lại mục ngôn ngữ cho các bài viết từng chọn ngôn ngữ này (khi tạo bài mới). Nếu chỉ muốn tắt tạm thời, bạn có thể sử dụng nút vô hiệu hóa (tắt) thay vì xóa vĩnh viễn!",
                type: 'error',
                showCancelButton: true,
                confirmButtonText: 'Xóa vĩnh viễn!',
                cancelButtonText: 'Hủy',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-default',
                buttonsStyling: false
            }).then(function(res) {
                if (res.value) {
                    $.ajax({
                        url: '{{ route('admin.lang.forceDelete') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        dataType: 'json',
                        success: function(resp) {
                            toastr[resp.success ? 'success' : 'error'](resp.message)
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        }
                    })
                }
            }, function(dismiss) {});
        });

        $('.js-restore').on('click', function() {
            let id = $(this).data('key')
            swal({
                title: 'Bạn có muốn khôi phục?',
                text: "Hành động này sẽ khôi phục ngôn ngữ và các bài viết liên quan sẽ được hiển thị",
                type: 'info',
                showCancelButton: true,
                confirmButtonText: 'Khôi phục!',
                cancelButtonText: 'Hủy',
                confirmButtonClass: 'btn btn-info',
                cancelButtonClass: 'btn btn-default',
                buttonsStyling: false
            }).then(function(res) {
                if (res.value) {
                    $.ajax({
                        url: '{{ route('admin.lang.restore') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        dataType: 'json',
                        success: function(resp) {
                            toastr[resp.success ? 'success' : 'error'](resp.message)
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        }
                    })
                }
            }, function(dismiss) {});
        });
    </script>
@endsection
