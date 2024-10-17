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

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    const element = document.querySelector('.selectpicker');
    const choices = new Choices(element);
</script>
