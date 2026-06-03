<fieldset style="flex-direction: column;" class="{{ $className }}">
    <div class="body-title mb-10">{{ $label }}
        @isset($required)
            <span class="tf-color-1">*</span>
        @endisset
    </div>
    <div class="select" style="width: 100%;">
        <select class="@error($name) is-invalid @enderror" name="{{ $name }}">
            <option value="" disabled selected>Choose {{ $className }}</option>
            @forelse ($options as $key=>$option)
                <option value="{{ $key }}">{{ $option }}</option>
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
