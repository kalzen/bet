<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<select id="languageSelect" name="locale" class="selectpicker">
    <option value="">-- Tìm kiếm và chọn ngôn ngữ --</option>
    @foreach ($locales as $locale => $name)
        <option {{ isset($originalKey) && $originalKey == $locale ? 'selected' : '' }} value="{{ $locale }}">{{ $name }}</option>
    @endforeach
</select>
@error('locale')
    <span class="text-danger">{{ $message }}</span>
@enderror

{{-- <div class="form-group">
    <label for="languageDataList" class="form-label">Chọn ngôn ngữ</label>
    <input class="form-control" list="languageOptions" id="languageDataList" name="lang_id" placeholder="Nhập để tìm kiếm..."
        required>
    <datalist id="languageOptions">
        @foreach ($locales as $lang => $name)
            <option value="{{ $lang }}">{{ }}</option>
        @endforeach
    </datalist>
</div> --}}


<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    const element = document.querySelector('.selectpicker');
    const choices = new Choices(element);
</script>
