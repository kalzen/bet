<select required name="lang_id" data-placeholder="Chọn ngôn ngữ" class="form-control select"
    data-allow-clear="true">
    <option value="">Chọn ngôn ngữ</option>
    @foreach ($langs as $lang)
        <option value="{{ $lang->id }}"
            {{ (isset($record['lang_id']) && $record['lang_id'] == $lang->id) || (old('lang_id') == $lang->id) ? 'selected' : '' }}>{{ $lang->name }}</option>
    @endforeach
</select>
<p class="pt-1">Không tìm thấy ngôn ngữ bạn cần? <a
    href="{{ route('admin.lang.index') }}">Bấm vào đây để thêm mới</a>. Hoặc tải lại trang</p>