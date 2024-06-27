@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.partials.message')
            <a class="btn mb-2 btn-success" href="{{route('admin.product.create')}}"><i class="icon-plus-circle2"></i> Thêm mới</a>
            @if(count($records))
            <div class="card card-table table-responsive shadow-0 mb-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ảnh</th>
                            <th>Mã sản phẩm</th>
                            <th>Giá (A)</th>
                            <th>Giá Chiết khấu (B)</th>
                            <th>Sale text</th>
                            <th>Công thức</th>
                            <th>Giá báo khách</th>
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
                                @if($record->images->count())
                                <img src="{{$record->images->first()->url}}" height="50">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.product.edit', $record->id)}}">{{$record->code}}</a>
                            </td>
                            
                            <td>
                                <span>{{number_format($record->price,0)}}</span>
                            </td>
                            <td>
                                {{number_format($record->sale_price,0)}}
                            </td>
                            <td class="text-center">
                                <ul>
                                    @if (isset($record->sale_text) && $record->sale_text != 'null')
                                @foreach (json_decode($record->sale_text) as $sale_text)
                                <li style="list-style:none">{!!$sale_text!!}</li> 
                                @endforeach
                                @endif
                                </ul>
                            </td>
                            <td class="text-center">
                                <input class="input-control" name="formula" type="text" value="{{$record->formula}}">
                                <a href="#" data-key="{{$record->id}}" class=" text-light badge bg-primary bg-opacity-10 save-formula">Lưu</a>
                            </td>
                            <td class="text-center">
                                {{$record->formulaValue($record->formula)}}
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
                {{$records->links()}}
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
                    url: '{{route('admin.product.destroy','idx')}}'.replace(/idx/, id),
                    method:'DELETE',data:{_token:'{{csrf_token()}}'},dataType:'json',
                    success:function(resp) {
                        toastr[resp.success ? 'success' : 'danger'](resp.message)
                        location.reload()
                    }
                })
            }
        }, function (dismiss) {});
    });
    $('.save-formula').on('click', function() {
        let product = $(this).data('key');
        var value = $(this).closest("td").find("input[name='formula']").val();
        //console.log(value);
        $.ajax({
                    url: '{{route('admin.product.updateFormula')}}',
                    method:'POST',data:{_token:'{{csrf_token()}}', formula:value, id:product},dataType:'json',
                    success:function(resp) {
                        //toastr[resp.success ? 'success' : 'danger'](resp.message)
                        location.reload();
                    }
                })
    });
</script>
@endsection