@props(['preview' => '', 'label' => '', 'name' => '', 'multiple' => false])

@php
    $titleClass = $attributes->get('class');

    $idName = str_replace('[]', '', $name);
@endphp

<fieldset>
    <div class="body-title mb-10 {{ $titleClass }}">{{ $label }}
        <span class="tf-color-1">*</span>
    </div>

    <div class="upload-image flex-grow">

        <!-- Preview Card -->
        <div class="preview-card" id="imgpreview-{{ $idName }}" style="display:none">

            <div class="preview-image-wrapper">
                <img id="previewImg-{{ $idName }}" src="{{ $preview }}" alt="">
            </div>

            <div class="preview-info">
                <div class="file-name" id="file-name-{{ $idName }}">No file selected</div>

                <button type="button" class="remove-btn" onclick="removeImage('{{ $idName }}')">
                    Remove
                </button>
            </div>

        </div>

        <!-- Upload -->
        <div id="upload-file" class="item up-load @error($idName) is-invalid @enderror">
            <label class="uploadfile" for="{{ $idName }}">

                <span class="icon">
                    <i class="icon-upload-cloud"></i>
                </span>

                <span class="body-text">
                    Drop your image or <span class="tf-color">browse</span>
                </span>

                <input type="file" id="{{ $idName }}" name="{{ $name }}" accept="image/*"
                    onchange="previewImage(event, '{{ $idName }}')" {{ $multiple ? 'multiple' : '' }}>

            </label>
        </div>


    </div>


    @error($idName)
        <div class="form-error-wrapper">
            <p class="form-error">{{ $message }}</p>
        </div>
    @enderror
</fieldset>
