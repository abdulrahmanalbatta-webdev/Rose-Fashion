@props(['label' => '', 'oldValue' => '', 'name' => '', 'options' => []])
<fieldset style="flex-direction: column;" class="mb-20 {{ $className ?? '' }}">
    <div class="body-title mb-10">{{ $label }}
        @isset($required)
            <span class="tf-color-1">*</span>
        @endisset
    </div>
    <div class="select" style="width: 100%;">
        <select class="@error($name) is-invalid @enderror" name="{{ $name }}">
            <option value="" disabled selected>{{ __('Choose category') }} {{ $className ?? '' }}</option>
            @forelse ($options as $option)
                <option value="{{ $option->id }}" @selected($oldValue == $option->id)>{{ $option->trans_name }}</option>
            @empty
                <option value="">No Category</option>
            @endforelse
        </select>
        @error($name)
            <div class="form-error-wrapper">
                <p class="form-error">{{ $message }}</p>
            </div>
        @enderror
    </div>
</fieldset>
