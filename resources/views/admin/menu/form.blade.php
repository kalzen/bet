@extends('layouts.admin')
@section('content')
    @if (isset($record))
        <form method="POST" action="{{ route('admin.menu.update', $record->id) }}">
            @method('PUT')
        @else
            <form method="POST" action="{{ route('admin.menu.store') }}">
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
                            <label class="font-weight-semibold">Text <span class="required"></span></label>
                            <input type="text" class="form-control" required id="name" name="name"
                                value="{{ old('name') ?: $record->name ?? '' }}">
                            @error('name')
                                <label id="name-error" class="validation-invalid-label"
                                    for="name">{{ $message }}</label>
                            @enderror
                        </div>
                        <div
                            class="form-group
                            @if (isset($record) && $record->children->count() > 0) d-none @endif
                        ">
                            <label class="font-weight-semibold">Link</label>
                            <input type="text" class="form-control" id="url" name="url"
                                value="{{ old('url') ?: $record->url ?? '' }}">
                            @error('url')
                                <label id="url-error" class="validation-invalid-label"
                                    for="url">{{ $message }}</label>
                            @enderror
                        </div>
                        @if (isset($record) && $record->children->count() > 0)
                            {{-- @dd($record->children); --}}
                            <label id="url-error" class="validation-invalid-label" for="url">Đây là menu lớn và sẽ
                                không cần đường link</label>
                        @endif
                        {{-- <div class="form-group">
                            <label class="font-weight-semibold">Ảnh </label>
                            <input type="file" class="form-control-file" data-key="image" data-fouc>
                            @if (old('image'))
                            <input type="hidden" name="image" value="{{old('image')}}" id="image">
                            <img class="mt-2" id="image_preview" height="100" src="{{old('image')}}"/>
                            @elseif (isset($record) && $record->image)
                            <input type="hidden" name="image" value="{{$record->image??''}}" id="image">
                            <img class="mt-2" id="image_preview" height="100" src="{{$record->image??''}}"/>
                            @else
                            <input type="hidden" name="image" value="" id="image">
                            <img class="mt-2" id="image_preview" style="display:none;" height="100"/>
                            @endif
                        </div> --}}

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Lưu <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
                @if(isset($record) && !$record->langParent)
                    @if (isset($record) && $record->children->count() == 0)
                        <div class="sidebar-content">
                            <div class="card">
                                <div class="card-body">
                                    <label>1. MENU lớn</label>
                                    @include('admin.shared.select-parent-category', [
                                        'selected' => isset($record) ? $record->parent_id : null,
                                    ])
                                </div>
                            </div>
                        </div>
                    @elseif (!isset($record))
                        <div class="sidebar-content">
                            <div class="card">
                                <div class="card-body">
                                    <label>2. MENU lớn</label>
                                    @include('admin.shared.select-parent-category', [
                                        'selected' => isset($record) ? $record->parent_id : null,
                                    ])
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                <div class="sidebar-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-semibold">Thứ tự</label>
                                <input required type="text" class="form-control mask-decimal"
                                    value="{{ old('ordering') ?: $record->ordering ?? '' }}" name="ordering">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    @if (isset($record))
                        <div class="card-body">

                            <label class="font-weight-semibold">Ngôn ngữ khác của MENU này</label> <br>
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
                                        <li class="list-group-item">Đây là ngôn ngữ phụ của MENU: <br>
                                            @if (isset($record) && $record->langParent && $record->langParent->langs)
                                                <a
                                                    href="{{ route('admin.menu.edit', $record->langParent->id) }}">{{ $record->langParent->langs->name }}</a>
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
                                {{-- @if (isset($record))
                                    <button class="remove-bind btn btn-sm btn-warning" type="button"
                                        data-key="{{ $record->id }}">
                                @endif
                                <i class="icon-minus-circle2"></i>
                                Chuyển thành bài viết độc lập
                                </button> --}}
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
    </form>
    <div id="modal_add_lang" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="form_add_lang">
                    @csrf
                    @if (isset($record))
                        <input type="hidden" name="lang_parent_id" value="{{ $record->id }}">
                    @endif
                    <div class="modal-body">
                        <h3>Thêm ngôn ngữ khác cho menu</h3>
                        <div class="form-group">
                            @if (count($modalLangs))
                                <select required name="lang_id" data-placeholder="Chọn ngôn ngữ" class="form-control select"
                                    data-allow-clear="true">
                                    <option value="">Chọn ngôn ngữ</option>
                                    @foreach ($modalLangs as $lang)
                                        <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <span class="text-danger">Hiện đã sử dụng hết ngôn ngữ có sẵn.</span>
                            @endif
                            <p class="pt-1">Không tìm thấy ngôn ngữ bạn cần? Có thể một bài viết với ngôn ngữ đó đã và đang tồn tại!</p>
                        </div>


                        <h4 class="mt-5 text-muted">Nội dung menu tương ứng với ngôn ngữ đã chọn</h4>
                        <div class="form-group">
                            <label class="font-weight-semibold">Text <span class="required"></span></label>
                            <input type="text" class="form-control" required id="name" name="name"
                                value="{{ old('name') ?: $record->name ?? '' }}">
                            @error('name')
                                <label id="name-error" class="validation-invalid-label"
                                    for="name">{{ $message }}</label>
                            @enderror
                        </div>
                        <div
                            class="form-group
                            @if (isset($record) && $record->children->count() > 0) d-none @endif
                        ">
                            <label class="font-weight-semibold">Link</label>
                            <input type="text" class="form-control" id="url" name="url"
                                value="{{ old('url') ?: $record->url ?? '' }}">
                            @error('url')
                                <label id="url-error" class="validation-invalid-label"
                                    for="url">{{ $message }}</label>
                            @enderror
                        </div>
                        @if (isset($record) && $record->children->count() > 0)
                            {{-- @dd($record->children); --}}
                            <label id="url-error" class="validation-invalid-label" for="url">Đây là menu lớn và sẽ
                                không cần đường link</label>
                        @endif
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

    <script>
        $('#modal_add_lang form').on('submit', function(e) {
            e.preventDefault()
            let selected = $('[name^=lang_id]:checked').map(function() {
                return this.value;
            }).get()
            $.ajax({
                url: '{{ route('admin.menu.lang') }}',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(resp) {
                    $('#modal_add_lang').modal('hide')
                    $('#select_lang').html(resp)
                    toastr['success']('Đã thêm ngôn ngữ phụ thành công!')
                    // $('#select_lang [name^=lang_id]').each(function() {
                    // $(this).prop('checked', selected.includes(this.value))
                    // })
                    // $('#select_lang .form-input-styled').uniform()
                    $.uniform.update()
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                }
            })
        })
        $('body').on('click', '.add-lang', function() {
            $('#modal_add_lang').modal('show')
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
                        url: '{{ route('admin.menu.destroy', 'idx') }}'.replace(/idx/, id),
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
            window.location.href = '{{ route('admin.menu.edit', 'idx') }}'.replace(/idx/, id)
        }
        console.log('loaded all scripts');
    </script>
@endsection
