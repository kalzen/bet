<select required name="lang_id" data-placeholder="Chọn ngôn ngữ" class="form-control select"
    data-allow-clear="true">
    <option value="">Chọn ngôn ngữ</option>
    @foreach ($langs as $lang)
        <option value="{{ $lang->id }}"
            {{ isset($record['lang_id']) && $record['lang_id'] == $lang->id ? 'selected' : '' }}>{{ $lang->name }}</option>
    @endforeach
</select>