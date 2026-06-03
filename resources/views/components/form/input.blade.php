@php
    $titleClass = $attributes->get('class');
@endphp

<fieldset class="name">
    @isset($label)
        <div class="body-title mb-10 {{ $titleClass ?? '' }}">{{ $label }} <span class="tf-color-1">*</span></div>
    @endisset
    <input class="flex-grow @error($name) is-invalid @enderror {{ $titleClass ?? '' }}" type="{{ $type ?? '' }}"
        placeholder="{{ $placeholder ?? '' }}" name="{{ $name }}" tabindex="0" value="{{ $value ?? '' }}">
    @isset($tiny)
        <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
    @endisset
    @error($name)
        <div class="form-error-wrapper">
            <p class="form-error">{{ $message }}</p>
        </div>
    @enderror
</fieldset>
