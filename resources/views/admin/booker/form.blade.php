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
                    <div class="card">
                        <div class="card-body" id="select_category">
                            @include('admin.shared.select-category',['selected' => (isset($record) ? $record->categories->pluck('id')->all() : null)])
                            @error('category_id')
                            <label id="category_id-error" class="validation-invalid-label" for="category_id">{{$message}}</label>
                            @enderror
                            <button class="add-category btn btn-sm mt-2 btn-success" type="button">
                                <i class="icon-plus-circle2"></i>
                                Tạo chuyên mục
                            </button>
                        </div>
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
<script>
    $('#modal_add_category form').on('submit', function(e) {
        e.preventDefault()
        let selected = $('[name^=category_id]:checked').map(function(){return this.value;}).get()
        $.ajax({
            url:'{{route('admin.booker.category')}}',
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
</script>
@endsection
