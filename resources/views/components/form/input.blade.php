@props([
    'isReadonly' => false,
    'name' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
    'label' => null,
    'tiny' => null,
    'required' => false,
    'errorBag' => 'default',
])

@php
    $titleClass = $attributes->get('class');
@endphp

<fieldset class="name mb-20">
    @isset($label)
        <div class="body-title mb-10 {{ $titleClass ?? '' }}">
            {{ $label }}
            @if ($required)
                <span class="tf-color-1">*</span>
            @endif
        </div>
    @endisset
    <input class="flex-grow {{ $errors->getBag($errorBag)->has($name) ? 'is-invalid' : '' }} {{ $titleClass ?? '' }}"
        type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{ $name }}" tabindex="0"
        value="{{ $value }}" @readonly($isReadonly)>

    @isset($tiny)
        <div class="text-tiny">{{ __('Do not exceed 100 characters when entering the product name.') }}</div>
    @endisset
    @if ($errors->getBag($errorBag)->has($name))
        <div class="form-error-wrapper">
            <p class="form-error">
                {{ $errors->getBag($errorBag)->first($name) }}
            </p>
        </div>
    @endif
</fieldset>
