@extends('layouts.admin')
@section('content')
@if (isset($record))
<form method="POST" action="{{route('admin.tip.update',$record->id)}}">
    @method('PUT')
@else
<form method="POST" action="{{route('admin.tip.store')}}">
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

                            <label class="font-weight-semibold">Name Team 1 <span class="required"></span></label>
                            <input type="text" class="form-control maxlength" maxlength="255" required id="name_team_1" name="name_team_1" value="{{ old('name_team_1') ?: ($record->name_team_1 ?? '') }}">
                            @error('name_team_1')
                            <label id="name_team_1-error" class="validation-invalid-label" for="name_team_1">{{$message}}</label>
                            @enderror
                        </div>

                       
                        <div class="form-group">
                            <label class="font-weight-semibold">Logo team 1<span class="required"></span></label>
                            <input type="file" class="form-control-file" multiple data-key="logo_team_1" data-fouc>
                            @if(old('logo_team_1'))
                            <input class="form-control" type="hidden" name="logo_team_1" value="{{old('logo_team_1')}}" id="logo_team_1">
                            <img class="mt-2" id="image_preview" height="100" src="{{old('logo_team_1')}}"/>
                            @elseif (isset($record) && $record->logo_team_1)
                            <input class="form-control" type="hidden" name="logo_team_1" value="{{$record->logo_team_1}}" id="logo_team_1">
                            <img class="mt-2" id="image_preview" height="100" src="{{$record->logo_team_1}}"/>
                            @else
                            <input class="form-control" type="hidden" name="logo_team_1" value="" id="logo_team_1">
                            
                            @endif
                            @error('logo_team_1')
                            <label id="image-error" class="validation-invalid-label" for="logo_team_1">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Name Team 2 <span class="required"></span></label>
                            <input type="text" class="form-control maxlength" maxlength="255" required id="name_team_2" name="name_team_2" value="{{ old('name_team_2') ?: ($record->name_team_2 ?? '') }}">
                            @error('name_team_2')
                            <label id="name_team_2-error" class="validation-invalid-label" for="name_team_2">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Logo team 2<span class="required"></span></label>
                            <input type="file" class="form-control-file" multiple data-key="logo_team_2" data-fouc>
                            @if(old('logo_team_2'))
                            <input class="form-control" type="hidden" name="logo_team_2" value="{{old('logo_team_2')}}" id="logo_team_2">
                            <img class="mt-2" id="image_preview" height="100" src="{{old('logo_team_2')}}"/>
                            @elseif (isset($record) && $record->logo_team_2)
                            <input class="form-control" type="hidden" name="logo_team_2" value="{{$record->logo_team_2}}" id="logo_team_2">
                            <img class="mt-2" id="image_preview" height="100" src="{{$record->logo_team_2}}"/>
                            @else
                            <input class="form-control" type="hidden" name="logo_team_2" value="" id="logo_team_2">
                            @endif
                            @error('logo_team_2')
                            <label id="image-error" class="validation-invalid-label" for="logo_team_2">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Score Team 1</label>
                            <input type="number" class="form-control" name="score_team_1" value="{{ old('score_team_1') ?: ($record->score_team_1 ?? '') }}">
                            @error('score_team_1')
                            <label id="score_team_1-error" class="validation-invalid-label" for="score_team_1">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Score Team 2</label>
                            <input type="number" class="form-control" name="score_team_2" value="{{ old('score_team_2') ?: ($record->score_team_2 ?? '') }}">
                            @error('score_team_2')
                            <label id="score_team_2-error" class="validation-invalid-label" for="score_team_2">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Home Bet</label>
                            <input type="text" class="form-control" name="home_bet" value="{{ old('home_bet') ?: ($record->home_bet ?? '') }}">
                            @error('home_bet')
                            <label id="home_bet-error" class="validation-invalid-label" for="home_bet">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Home Bet Rate</label>
                            <input type="text" class="form-control" name="home_bet_rate" value="{{ old('home_bet_rate') ?: ($record->home_bet_rate ?? '') }}">
                            @error('home_bet_rate')
                            <label id="home_bet_rate-error" class="validation-invalid-label" for="home_bet_rate">{{$message}}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold">Draw Bet</label>
                            <input type="text" class="form-control" name="draw_bet" value="{{ old('draw_bet') ?: ($record->draw_bet ?? '') }}">
                            @error('draw_bet')
                            <label id="draw_bet-error" class="validation-invalid-label" for="draw_bet">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Draw Bet Rate</label>
                            <input type="text" class="form-control" name="draw_bet_rate" value="{{ old('draw_bet_rate') ?: ($record->draw_bet_rate ?? '') }}">
                            @error('draw_bet_rate')
                            <label id="draw_bet_rate-error" class="validation-invalid-label" for="draw_bet_rate">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Guest Bet</label>
                            <input type="text" class="form-control" name="guest_bet" value="{{ old('guest_bet') ?: ($record->guest_bet ?? '') }}">
                            @error('guest_bet')
                            <label id="guest_bet-error" class="validation-invalid-label" for="guest_bet">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Guest Bet Rate</label>
                            <input type="text" class="form-control" name="guest_bet_rate" value="{{ old('guest_bet_rate') ?: ($record->guest_bet_rate ?? '') }}">
                            @error('guest_bet_rate')
                            <label id="guest_bet_rate-error" class="validation-invalid-label" for="guest_bet_rate">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Recommend</label>
                            <input type="text" class="form-control" name="recommend" value="{{ old('recommend') ?: ($record->recommend ?? '') }}">
                            @error('recommend')
                            <label id="recommend-error" class="validation-invalid-label" for="recommend">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Recommend Rate</label>
                            <input type="text" class="form-control" name="recommend_rate" value="{{ old('recommend_rate') ?: ($record->recommend_rate ?? '') }}">
                            @error('recommend_rate')
                            <label id="recommend_rate-error" class="validation-invalid-label" for="recommend_rate">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-semibold">Date</label>
                            @isset($record)
                            <input type="datetime-local" class="form-control" name="date" value="{{ old('date') ?: ($record->date ? $record->date : '') }}">
                            @else
                            <input type="datetime-local" class="form-control" name="date" value="{{ old('date') ? : '' }}">
                            @endisset
                            @error('date')
                            <label id="date-error" class="validation-invalid-label" for="date">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
				</div>
            </div>
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
                <div class="sidebar-content">
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
                                                <a href="{{ route('admin.tip.edit', $record->langParent->id) }}">{{ $record->langParent->langs->name }}</a>
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

                        <label class="font-weight-semibold">Name Team 1 <span class="required"></span></label>
                        <input type="text" class="form-control maxlength" maxlength="255" required id="name_team_1" name="name_team_1" value="{{ old('name_team_1') ?: ($record->name_team_1 ?? '') }}">
                        @error('name_team_1')
                        <label id="name_team_1-error" class="validation-invalid-label" for="name_team_1">{{$message}}</label>
                        @enderror
                    </div>

                   
                    <div class="form-group">
                        <label class="font-weight-semibold">Logo team 1<span class="required"></span></label>
                        <input type="file" class="form-control-file" multiple data-key="logo_team_1" data-fouc>
                        @if(old('logo_team_1'))
                        <input class="form-control" type="hidden" name="logo_team_1" value="{{old('logo_team_1')}}" id="logo_team_1">
                        <img class="mt-2" id="image_preview" height="100" src="{{old('logo_team_1')}}"/>
                        @elseif (isset($record) && $record->logo_team_1)
                        <input class="form-control" type="hidden" name="logo_team_1" value="{{$record->logo_team_1}}" id="logo_team_1">
                        <img class="mt-2" id="image_preview" height="100" src="{{$record->logo_team_1}}"/>
                        @else
                        <input class="form-control" type="hidden" name="logo_team_1" value="" id="logo_team_1">
                        
                        @endif
                        @error('logo_team_1')
                        <label id="image-error" class="validation-invalid-label" for="logo_team_1">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold">Name Team 2 <span class="required"></span></label>
                        <input type="text" class="form-control maxlength" maxlength="255" required id="name_team_2" name="name_team_2" value="{{ old('name_team_2') ?: ($record->name_team_2 ?? '') }}">
                        @error('name_team_2')
                        <label id="name_team_2-error" class="validation-invalid-label" for="name_team_2">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold">Logo team 2<span class="required"></span></label>
                        <input type="file" class="form-control-file" multiple data-key="logo_team_2" data-fouc>
                        @if(old('logo_team_2'))
                        <input class="form-control" type="hidden" name="logo_team_2" value="{{old('logo_team_2')}}" id="logo_team_2">
                        <img class="mt-2" id="image_preview" height="100" src="{{old('logo_team_2')}}"/>
                        @elseif (isset($record) && $record->logo_team_2)
                        <input class="form-control" type="hidden" name="logo_team_2" value="{{$record->logo_team_2}}" id="logo_team_2">
                        <img class="mt-2" id="image_preview" height="100" src="{{$record->logo_team_2}}"/>
                        @else
                        <input class="form-control" type="hidden" name="logo_team_2" value="" id="logo_team_2">
                        @endif
                        @error('logo_team_2')
                        <label id="image-error" class="validation-invalid-label" for="logo_team_2">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold">Score Team 1</label>
                        <input type="number" class="form-control" name="score_team_1" value="{{ old('score_team_1') ?: ($record->score_team_1 ?? '') }}">
                        @error('score_team_1')
                        <label id="score_team_1-error" class="validation-invalid-label" for="score_team_1">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold">Score Team 2</label>
                        <input type="number" class="form-control" name="score_team_2" value="{{ old('score_team_2') ?: ($record->score_team_2 ?? '') }}">
                        @error('score_team_2')
                        <label id="score_team_2-error" class="validation-invalid-label" for="score_team_2">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold">Home Bet</label>
                        <input type="text" class="form-control" name="home_bet" value="{{ old('home_bet') ?: ($record->home_bet ?? '') }}">
                        @error('home_bet')
                        <label id="home_bet-error" class="validation-invalid-label" for="home_bet">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Home Bet Rate</label>
                        <input type="text" class="form-control" name="home_bet_rate" value="{{ old('home_bet_rate') ?: ($record->home_bet_rate ?? '') }}">
                        @error('home_bet_rate')
                        <label id="home_bet_rate-error" class="validation-invalid-label" for="home_bet_rate">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold">Draw Bet</label>
                        <input type="text" class="form-control" name="draw_bet" value="{{ old('draw_bet') ?: ($record->draw_bet ?? '') }}">
                        @error('draw_bet')
                        <label id="draw_bet-error" class="validation-invalid-label" for="draw_bet">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Draw Bet Rate</label>
                        <input type="text" class="form-control" name="draw_bet_rate" value="{{ old('draw_bet_rate') ?: ($record->draw_bet_rate ?? '') }}">
                        @error('draw_bet_rate')
                        <label id="draw_bet_rate-error" class="validation-invalid-label" for="draw_bet_rate">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Guest Bet</label>
                        <input type="text" class="form-control" name="guest_bet" value="{{ old('guest_bet') ?: ($record->guest_bet ?? '') }}">
                        @error('guest_bet')
                        <label id="guest_bet-error" class="validation-invalid-label" for="guest_bet">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Guest Bet Rate</label>
                        <input type="text" class="form-control" name="guest_bet_rate" value="{{ old('guest_bet_rate') ?: ($record->guest_bet_rate ?? '') }}">
                        @error('guest_bet_rate')
                        <label id="guest_bet_rate-error" class="validation-invalid-label" for="guest_bet_rate">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Recommend</label>
                        <input type="text" class="form-control" name="recommend" value="{{ old('recommend') ?: ($record->recommend ?? '') }}">
                        @error('recommend')
                        <label id="recommend-error" class="validation-invalid-label" for="recommend">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Recommend Rate</label>
                        <input type="text" class="form-control" name="recommend_rate" value="{{ old('recommend_rate') ?: ($record->recommend_rate ?? '') }}">
                        @error('recommend_rate')
                        <label id="recommend_rate-error" class="validation-invalid-label" for="recommend_rate">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Date</label>
                        @isset($record)
                        <input type="datetime-local" class="form-control" name="date" value="{{ old('date') ?: ($record->date ? $record->date : '') }}">
                        @else
                        <input type="datetime-local" class="form-control" name="date" value="{{ old('date') ? : '' }}">
                        @endisset
                        @error('date')
                        <label id="date-error" class="validation-invalid-label" for="date">{{$message}}</label>
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
<script>
    

    $('#modal_add_lang form').on('submit', function(e) {
            e.preventDefault()
            let selected = $('[name^=lang_id]:checked').map(function() {
                return this.value;
            }).get()
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            $.ajax({
                url: '{{ route('admin.tip.lang') }}',
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
                        url: '{{ route('admin.tip.removeBind', 'idx') }}'.replace(/idx/, id),
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
                        url: '{{ route('admin.tip.destroy', 'idx') }}'.replace(/idx/, id),
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
            window.location.href = '{{ route('admin.tip.edit', 'idx') }}'.replace(/idx/, id)
        }
        console.log('loaded all scripts');
</script>
@endsection
