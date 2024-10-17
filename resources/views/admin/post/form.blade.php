@extends('layouts.admin')
@section('content')
@if (isset($record))
<form method="POST" action="{{route('admin.post.update',$record->id)}}">
    @method('PUT')
@else
<form method="POST" action="{{route('admin.post.store')}}">
@endif
    @csrf
    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <div class="w-100 overflow-auto order-2 order-md-1">
				<div class="card">
					<div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-semibold">Ngôn ngữ hiện tại <span class="required"></span></label>

                            <div class="form-group" id="all-langs">
                                @include('admin.shared.all-langs')
                            </div>

                            <label class="font-weight-semibold">Tiêu đề <span class="required"></span></label>
                            <input type="text" class="form-control maxlength" maxlength="255" required id="title" name="title" value="{{ old('title') ?: ($record->title ?? '') }}">
                            <span class="text-muted">Most optimal 10 - 70 characters.</span>
                            @error('title')
                            <label id="title-error" class="validation-invalid-label" for="title">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Mô tả</label>
                            <textarea class="form-control maxlength" maxlength="1500" name="description">{{ old('description') ?: ($record->description ?? '') }}</textarea>
                            <span class="text-muted">Most optimal 160 - 300 characters.</span>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Ảnh bài viết </label>
                            <input type="file" class="form-control-file" data-key="image" data-fouc>
                            @if(old('image'))
                            <input type="hidden" name="image" value="{{old('image')}}" id="image">
                            <img class="mt-2" id="image_preview" height="100" src="{{old('image')}}"/>
                            @elseif (isset($record) && $record->images)
                            <input type="hidden" name="image" value="{{$record->images->first()->url??''}}" id="image">
                            <img class="mt-2" id="image_preview" height="100" src="{{$record->images->first()->url??''}}"/>
                            @else
                            <input type="hidden" name="image" value="" id="image">
                            <img class="mt-2" id="image_preview" style="display:none;" height="100"/>
                            @endif
                            @error('image')
                            <label id="image-error" class="validation-invalid-label" for="image">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Từ khoá chính <span class="required"></span></label>
                            <input type="text" class="form-control maxlength" maxlength="255" required id="keyword" name="keyword" value="{{ old('keyword') ?: ($record->keyword ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Thẻ</label>
                            @if(old('tags'))
                            <input type="text" class="form-control tokenfield" value="{{old('tags')}}" name="tags" data-fouc>
                            @elseif(isset($record) && $record->tags)
                            <input type="text" class="form-control tokenfield" value="{{$record->tags->pluck('name')->join(', ')}}" name="tags" data-fouc>
                            @else
                            <input type="text" class="form-control tokenfield" value="" name="tags" data-fouc>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Nội dung bài viết <span class="required"></span></label>
                            <textarea class="ckeditor form-control" id="content" name="content" required>{{ old('content') ?: ($record->content ?? '') }}</textarea>
                            @error('content')
                            <label id="content-error" class="validation-invalid-label" for="content">{{$message}}</label>
                            @enderror
                        </div>
                            <div id="SEO"> <b>PHÂN TÍCH SEO:</b>
                    <div id="issue_seo"> Các vấn đề cần khác phục:
                    <ul>
                        <li class="issue_title"><b>Tiêu đề chứa từ khoá:</b> Cần sửa tiêu đề có chứa từ khoá</li>
                        <li class="issue_description"><b>Mô tả chứa từ khoá:</b> Cần sửa mô tả ngắn có chứa từ khoá</li>
                        {!! $issue ?? '' !!}
                      <!--  <li class="issue_internallinks"><b>Các đường dẫn nội bộ:</b> Cần thêm link nội bộ tới chính trang của bạn!</li>
                        <li class="issue_outlinks"><b>Các đường dẫn ra ngoài trang:</b> Cần thêm link dẫn tới trang ngoài!</li>
                        <li class="issue_images"><b>Thuộc tính alt của các ảnh:</b> Ảnh chưa có thuộc tính alt!</li>
                        <li class="issue_words"><b>Độ dài của văn bản:</b> </li>
                        <li class="issue_heading"><b>Độ rộng của tiêu đề SEO:</b> </li> -->
                    </ul>
                    </div>
                    <div id="success_seo">
                    Kết quả tốt:
                        <li class="success_title"><b>Tiêu đề chứa từ khoá:</b> Rất tốt!</li>
                        <li class="success_description"><b>Mô tả chứa từ khoá:</b> Rất tốt!</li>
                        <li class=""><b>Độ dài mô tả meta:</b> Rất tốt!</li>
                        {!! $success ?? '' !!}
                      <!--  <li class="success_internallinks"><b>Các đường dẫn nội bộ:</b> Bạn đã có đủ các đường dẫn nội bộ. Rất tốt!</li>
                        <li class="success_outlinks"><b>Các đường dẫn ra ngoài trang:</b> Rất tốt!</li>
                        <li class="success_images"><b>Thuộc tính alt của các ảnh:</b> Rất tốt!</li>
                        <li class="success_words"><b>Độ dài của văn bản:</b> </li>
                        <li class="success_heading"><b>Độ rộng của tiêu đề SEO:</b> Rất tốt</li> -->
                    </div>
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
                            <div class="form-check form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-input-styled" {{isset($record) && $record->status == 1 ? 'checked' : ''}} name="status" value="1" checked data-fouc>
                                    Đăng
                                </label>
                            </div>

                            <div class="form-check form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-input-styled" {{isset($record) && $record->status == 0 ? 'checked' : ''}} name="status" value="0" data-fouc>
                                    Ẩn
                                </label>
                            </div>	
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="form-check form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-input-styled" {{isset($record) && $record->is_promotion == 1 ? 'checked' : ''}} name="is_promotion" value="1" checked data-fouc>
                                    Tin khuyến mại
                                </label>
                            </div>

                            <div class="form-check form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" class="form-input-styled" {{isset($record) && $record->is_promotion == 0 ? 'checked' : ''}} name="is_promotion" value="0" data-fouc>
                                    Tin tức
                                </label>
                            </div>	
                        </div>
                    </div>
                    <div class="card">
                        @if(isset($record) && $record->langChildren->count() > 0 || !isset($record))
                            <div class="card-body" id="select_category">
                                @include('admin.shared.select-category', [
                                    'selected' => old('category_id') ?? (isset($record) ? $record->categories?->pluck('id')->all() : null)
                                ])
                                @error('category_id')
                                <label id="category_id-error" class="validation-invalid-label" for="category_id">{{$message}}</label>
                                @enderror
                                <button class="add-category btn btn-sm mt-2 btn-success" type="button">
                                    <i class="icon-plus-circle2"></i>
                                    Tạo chuyên mục
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card">
                        @if (isset($record))
                        <div class="card-body">

                            <label class="font-weight-semibold">Ngôn ngữ khác của bài viết này</label> <br>
                            <div class="form-group">
                                @if (isset($record) && !$record->langParent)
                                    <ul class="list-group">
                                        @if ($record->langChildren->count())
                                        <span id="select_lang">
                                            @include('admin.shared.select-lang')
                                        </span>
                                        @else
                                            <li class="list-group-item">Hiện không có ngôn ngữ bổ sung nào</li>
                                        @endif
                                    @else
                                        <li class="list-group-item">Đây là một bài viết phụ của bài viết: <br>
                                            @if(isset($record) && $record->langParent && $record->langParent->langs)
                                                <a href="{{ route('admin.post.edit', $record->langParent->id) }}">{{ $record->langParent->langs->name }}</a>
                                            @else
                                                <span class="px-1">Ngôn ngữ gốc đã bị xóa</span>
                                            @endif
                                        </li>
                                @endif
                                </ul>
                            </div>
                            @error('lang_id')
                                <label id="lang_id-error" class="validation-invalid-label"
                                    for="lang_id">{{ $message }}</label>
                            @enderror
                            @if (isset($record) && !$record->langParent)
                                <button class="add-lang btn btn-sm mt-2 btn-success" type="button">
                                    <i class="icon-plus-circle2"></i>
                                    Thêm ngôn ngữ
                                </button>
                            @else
                            @if(isset($record))
                                <button class="remove-bind btn btn-sm btn-warning" type="button" data-key="{{ $record->id }}">
                            @endif
                                    <i class="icon-minus-circle2"></i>
                                    Chuyển thành bài viết độc lập
                                </button>
                            @endif
                            {{-- @foreach ($record->langChildren as $child)
                            {{ $child->langs ? $child->langs->name : '' }}
                            @endforeach --}}

                            {{-- @foreach ($record->langChildren as $child) --}}
                            {{-- <label class="form-check-label">
                                <input type="radio" name="lang_id" class="form-input-styled" value="{{$lang->id}}" 
                                {{ isset($selected) && in_array($lang->id, $selected) ? 'checked' : '' }} data-fouc>
                                {{$lang->name}}
                            </label> --}}

                            {{-- @endforeach --}}


                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div id="modal_add_category" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="form_add_category">
                @csrf
                <div class="modal-body">
                    <h3>Tạo mới chuyên mục</h3>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Tiêu đề" class="form-control" required maxlength="255">
                    </div>

                    <div class="form-group">
                        @if(count($categories))
                        <select name="parent_id" data-placeholder="Chuyên mục cha" class="form-control select" data-allow-clear="true">
                            <option value="">Chuyên mục cha</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn bg-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_add_lang" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="form_add_lang">
                @csrf
                @if(isset($record))
                    <input type="hidden" name="lang_parent_id" value="{{ $record->id }}">
                @endif
                <div class="modal-body">
                    <h3>Thêm ngôn ngữ khác cho bài viết hiện tại</h3>
                    <div class="form-group">
                        @if (count($modalLangs))
                            <select required name="lang_id" data-placeholder="Chọn ngôn ngữ"
                                class="form-control select" data-allow-clear="true">
                                <option value="">Chọn ngôn ngữ</option>
                                @foreach ($modalLangs as $lang)
                                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <p class="pt-1">Không tìm thấy ngôn ngữ bạn cần? Có thể một bài viết với ngôn ngữ đó đã và đang tồn tại!</p>
                    </div>


                    <h4 class="mt-5 text-muted">Nội dung tương ứng với ngôn ngữ đã chọn</h4>
                    <div class="form-group">
                        <label class="font-weight-semibold">Tiêu đề <span class="required"></span></label>
                        <input type="text" class="form-control maxlength" maxlength="255" required id="title" name="title" value="{{ old('title') ?: ($record->title ?? '') }}">
                        <span class="text-muted">Most optimal 10 - 70 characters.</span>
                        @error('title')
                        <label id="title-error" class="validation-invalid-label" for="title">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Mô tả</label>
                        <textarea class="form-control maxlength" maxlength="1500" name="description">{{ old('description') ?: ($record->description ?? '') }}</textarea>
                        <span class="text-muted">Most optimal 160 - 300 characters.</span>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Ảnh bài viết </label>
                        <input type="file" class="form-control-file" data-key="image" data-fouc>
                        @if(old('image'))
                        <input type="hidden" name="image" value="{{old('image')}}" id="image">
                        <img class="mt-2" id="image_preview" height="100" src="{{old('image')}}"/>
                        @elseif (isset($record) && $record->images)
                        <input type="hidden" name="image" value="{{$record->images->first()->url??''}}" id="image">
                        <img class="mt-2" id="image_preview" height="100" src="{{$record->images->first()->url??''}}"/>
                        @else
                        <input type="hidden" name="image" value="" id="image">
                        <img class="mt-2" id="image_preview" style="display:none;" height="100"/>
                        @endif
                        @error('image')
                        <label id="image-error" class="validation-invalid-label" for="image">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold">Từ khoá chính <span class="required"></span></label>
                        <input type="text" class="form-control maxlength" maxlength="255" required id="keyword" name="keyword" value="{{ old('keyword') ?: ($record->keyword ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Thẻ</label>
                        @if(old('tags'))
                        <input type="text" class="form-control tokenfield" value="{{old('tags')}}" name="tags" data-fouc>
                        @elseif(isset($record) && $record->tags)
                        <input type="text" class="form-control tokenfield" value="{{$record->tags->pluck('name')->join(', ')}}" name="tags" data-fouc>
                        @else
                        <input type="text" class="form-control tokenfield" value="" name="tags" data-fouc>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Nội dung bài viết <span class="required"></span></label>
                        <textarea class="ckeditor form-control" id="content" name="content" required>{{ old('content') ?: ($record->content ?? '') }}</textarea>
                        @error('content')
                        <label id="content-error" class="validation-invalid-label" for="content">{{$message}}</label>
                        @enderror
                    </div>
                    <small class="float-right">Lưu ý: Tất cả thay đổi có thể được chỉnh sửa sau!</small>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn bg-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
#issue_seo 
{
    color: red;
}
#success_seo
{
    color: green;
}
</style>
<script>
    var intervalId = window.setInterval(function(){
        let title = $('#title').val();
        let description = $('#title').val();
        let content = $("#content").html();
        var isoutlinks = 0;
        var isinlinks = 0;
       // check title 
        if (title.includes($('#keyword').val()))
        {
            $('.success_title').show();
            $('.issue_title').hide();
        }
        else
        {
           $('.issue_title').show();
           $('.success_title').hide();
        }
        // check description 
        if (description.includes($('#keyword').val()))
        {
            $('.success_description').show();
            $('.issue_description').hide();
        }
        else
        {
           $('.issue_description').show();
           $('.success_description').hide();
        }
        //if(!$('iframe a').length > 0)
//        {
//            $('.issue_internallinks').show();
//            $('.issue_outlinks').show();
//            $('.success_outlinks').hide();
//            $('.success_internallinks').hide();
//            console.log($('iframe a').length);
//        }
//        else
//        {
//            $('iframe a').each(function(links)
//            {
//                console.log($(this).attr('href'));
//                if ($(this).attr('href').includes('hocvienielts.edu.vn'))
//                {
//                    isinlinks = 1;
//                    $('.success_internallinks').show();
//                $('.issue_internallinks').hide();
//                }
//                if (!$(this).attr('href').includes('hocvienielts.edu.vn'))
//                {
//                    isoutlinks = 1;
//                    $('.success_outlinks').show();
//                $('.issue_outlinks').hide();
//                }
//            });
 //           if (isinlinks)
//            {
//                $('.success_internallinks').show();
//                $('.issue_internallinks').hide();
//            }
//            if (isoutlinks)
//            {
//                 $('.success_outlinks').show();
//                $('.issue_outlinks').hide();
//            }
       // }
    },1000);
    $('#modal_add_category form').on('submit', function(e) {
        e.preventDefault()
        let selected = $('[name^=category_id]:checked').map(function(){return this.value;}).get()
        $.ajax({
            url:'{{route('admin.post.category')}}',
            method:'POST',data: new FormData(this),
            contentType:false,processData:false,
            success:function(resp) {
                $('#modal_add_category').modal('hide')
                $('#select_category').html(resp)
                $('#select_category [name^=category_id]').each(function(){
                    $(this).prop('checked', selected.includes(this.value))
                })
                $('#select_category .form-input-styled').uniform()
                $.uniform.update()
            }
        })
    })
    $('body').on('click','.add-category', function() {
        $('#modal_add_category').modal('show')
    });

    $('#modal_add_lang form').on('submit', function(e) {
            e.preventDefault()
            let selected = $('[name^=lang_id]:checked').map(function() {
                return this.value;
            }).get()
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            $.ajax({
                url: '{{ route('admin.post.lang') }}',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(resp) {
                    $('#modal_add_lang').modal('hide')
                    $('#select_lang').html(resp)
                    // $('#select_lang [name^=lang_id]').each(function() {
                        // $(this).prop('checked', selected.includes(this.value))
                    // })
                    $('#select_lang .form-input-styled').uniform()
                    $.uniform.update()
                    setTimeout(function() {
                                location.reload();
                    }, 1000);
                }
            })
        })
        $('body').on('click', '.add-lang', function() {
            $('#modal_add_lang').modal('show')
        });
        $('.remove-bind').on('click', function() {
            let id = $(this).data('key')
            swal({
                title: 'Loại bỏ ràng buộc với bài viết gốc?',
                text: "Bài viết này đã được đánh dấu là một bài viết có cùng nội dung (nhưng khác ngôn ngữ) so với bài viết gốc, loại bỏ ràng buộc sẽ biến bài viết này thành một bài viết mới riêng biệt, nhưng bạn sẽ có thể thêm ngôn ngữ phụ vào bài viết này trong tương lai !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Tôi xác nhận!',
                cancelButtonText: 'Hủy bỏ',
                confirmButtonClass: 'btn btn-warning',
                cancelButtonClass: 'btn btn-default',
                buttonsStyling: false
            }).then(function(res) {
                console.log('removing bind: '+id);
                console.log(res);
                
                if (res.value) {
                    $.ajax({
                        url: '{{ route('admin.post.removeBind', 'idx') }}'.replace(/idx/, id),
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
                            }, 500);

                        }
                    })
                }
            }, function(dismiss) {});
        });

        function confirmDelete(id) {
            swal({
                title: 'Xóa ngôn ngữ đó của bài viết này?',
                text: "Hành động này không thể hoàn tác!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận xóa',
                cancelButtonText: 'Không, hủy bỏ!',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-secondary',
                buttonsStyling: false
            }).then(function(res) {
                if (res.value) {
                    $.ajax({
                        url: '{{ route('admin.post.destroy', 'idx') }}'.replace(/idx/, id),
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(resp) {
                            toastr[resp.success ? 'success' : 'error'](resp.message)
                            setTimeout(function() {
                                location.reload();
                            }, 500);
                        }
                    })
                }
            }, function(dismiss) {});
        }

        function goToEdit(id) {
            window.location.href = '{{ route('admin.post.edit', 'idx') }}'.replace(/idx/, id)
        }
        console.log('loaded all scripts');
</script>
@endsection