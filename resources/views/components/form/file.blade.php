@props(['label' => '', 'name' => '', 'multiple' => false, 'required' => false, 'image' => null, 'images' => []])

@php
    $idName = str_replace('[]', '', $name);
@endphp

<fieldset class="mb-20">
    <div class="body-title mb-10 @if ($required) required @endif">
        {{ $label }}
        @if ($required)
            <span class="tf-color-1">*</span>
        @endif
    </div>

    <div class="upload-image flex-grow">

        @if (!$multiple)
            {{-- ============================= SINGLE ============================= --}}
            <div class="sui-wrap @error($idName) is-invalid @enderror" id="sui-{{ $idName }}"
                onclick="document.getElementById('inp-{{ $idName }}').click()">

                {{-- Placeholder --}}
                <div class="sui-placeholder" id="sui-ph-{{ $idName }}" style="{{ $image ? 'display:none' : '' }}">
                    <span class="icon">
                        <i class="icon-upload-cloud"></i>
                    </span>
                    <span class="body-text">
                        {{ __('Drop your image or') }} <span class="tf-color">{{ __('browse') }}</span>
                    </span>
                    <span class="sui-hint">PNG, JPG, WEBP · Max 5MB</span>
                </div>

                {{-- Preview --}}
                <div class="sui-preview" id="sui-pv-{{ $idName }}" style="{{ $image ? 'display:flex' : '' }}">
                    <div class="sui-img-wrap">
                        <img id="sui-img-{{ $idName }}" src="{{ $image ?? '' }}" alt="">
                        <span class="sui-badge">IMG</span>
                    </div>
                    <div class="sui-bar">
                        <div class="sui-meta">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z" />
                                <polyline points="13,2 13,9 20,9" />
                            </svg>
                            <span class="sui-fname"
                                id="sui-fname-{{ $idName }}">{{ $image ? basename($image) : '—' }}</span>
                            <span class="sui-fsize" id="sui-fsize-{{ $idName }}"></span>
                        </div>
                        <button type="button" class="sui-rm-btn" onclick="suiRemove(event,'{{ $idName }}')"
                            title="Remove">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L13 13M13 1L1 13" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                </div>

                <input type="file" id="inp-{{ $idName }}" name="{{ $name }}" accept="image/*"
                    style="display:none" onchange="suiHandle(event,'{{ $idName }}')">

                @if ($image)
                    <input type="hidden" name="remove_{{ $idName }}" id="remove-{{ $idName }}"
                        value="0">
                @endif
            </div>
        @else
            {{-- ============================= GALLERY ============================= --}}
            <div class="gui-wrap @error($idName) is-invalid @enderror" id="gui-{{ $idName }}">

                <div class="gui-dropzone" id="gui-dz-{{ $idName }}"
                    onclick="document.getElementById('inp-{{ $idName }}').click()"
                    style="{{ count($images) ? 'display:none' : '' }}">
                    <span class="icon"><i class="icon-upload-cloud"></i></span>
                    <span class="body-text">
                        {{ __('Drop your image or') }} <span class="tf-color">{{ __('browse') }}</span>
                    </span>
                    <span class="sui-hint">{{ __('You can choose more than one image') }}</span>
                </div>

                <div class="gui-grid" id="gui-grid-{{ $idName }}"
                    style="{{ count($images) ? '' : 'display:none' }}">
                    @foreach ($images as $img)
                        <div class="gui-item" data-old-id="{{ $img['id'] }}">
                            <img src="{{ $img['url'] }}" alt="">
                            <button type="button" class="gui-rm"
                                onclick="guiRemoveOld(this,'{{ $idName }}',{{ $img['id'] }})" title="Remove">
                                <svg width="10" height="10" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L13 13M13 1L1 13" stroke="#ffffff" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>

                {{-- تتبع الصور القديمة المتبقية (مش المحذوفة) --}}
                <input type="hidden" name="kept_{{ $idName }}" id="kept-{{ $idName }}"
                    value="{{ collect($images)->pluck('id')->implode(',') }}">

                <input type="file" id="inp-{{ $idName }}" name="{{ $name }}" accept="image/*"
                    multiple style="display:none" onchange="guiHandle(event,'{{ $idName }}')">
            </div>
        @endif

    </div>

    @error($idName)
        <div class="form-error-wrapper">
            <p class="form-error">{{ $message }}</p>
        </div>
    @enderror
</fieldset>
