@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.partials.message')
            <a class="btn mb-2 btn-success" href="{{route('admin.tip.create')}}"><i class="icon-plus-circle2"></i> Thêm mới</a>
            @if(count($records))
            <div class="card card-table table-responsive shadow-0 mb-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Team 1</th>
                            <th>Team 2</th>
                            <th>Thời gian</th>
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
                                <a href="{{route('admin.tip.edit', $record->id)}}">
                                    @if($record->logo_team_1)
                                    <img src="{{$record->logo_team_1}}" height="50">
                                    {{$record->name_team_1}}
                                    @endif
                                </a>
                            </td>
                            <td>
                                @if($record->logo_team_2)
                                <img src="{{$record->logo_team_2}}" height="50">
                                {{$record->name_team_2}}
                                @endif
                            </td>
                            <td>
                                {{$record->date}}
                            </td>
                            <td>
                                <a href="{{route('admin.tip.edit', $record->id)}}">Sửa</a>
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
                <p class="h4 mt-2 font-weight-semibold">Chưa có tip nào</p>
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
                    url: '{{route('admin.tip.destroy','idx')}}'.replace(/idx/, id),
                    method:'DELETE',data:{_token:'{{csrf_token()}}'},dataType:'json',
                    success:function(resp) {
                        toastr[resp.success ? 'success' : 'danger'](resp.message)
                    }
                })
            }
        }, function (dismiss) {});
    });
</script>
@endsection