<fieldset class="{{ $className }}">
    <div class="body-title mb-10">{{ $label }}
        @isset($required)
            <span class="tf-color-1">*</span>
        @endisset
    </div>
    <textarea class="mb-10 @error($name) is-invalid @enderror" name="{{ $name }}" placeholder="{{ $placeholder }}"
        tabindex="0" aria-required="true">{{ $value ?? '' }}</textarea>
    <div class="text-tiny">Do not exceed 100 characters when entering the
        product name.</div>
    @error($name)
        <div class="form-error-wrapper">
            <p class="form-error">{{ $message }}</p>
        </div>
    @enderror
</fieldset>
