<select required name="lang_id" data-placeholder="Chọn ngôn ngữ" class="form-control select"
    data-allow-clear="true">
    <option value="">Chọn ngôn ngữ</option>
    @if (isset($formLangs))
        @foreach ($formLangs as $key => $lang)
            <option value="{{ $lang?->id }}"
                {{ (isset($record['lang_id']) && $record['lang_id'] == $lang?->id) || 
                   (old('lang_id') == $lang?->id) || 
                   ($key === 0 && !isset($record['lang_id']) && !old('lang_id')) ? 'selected' : '' }}>
                {{ $lang?->name }}
            </option>
        @endforeach
    @endif
</select>
<p class="pt-1">Không tìm thấy ngôn ngữ bạn cần? Có thể một bài viết với ngôn ngữ đó đã và đang tồn tại! Hoặc xóa ngôn ngữ phụ và tải lại trang</p>