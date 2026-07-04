@extends('admin.layout')

@section('title', __('Profile'))

@section('css')
    <style>
        .wg-box {
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .06);
        }

        .profile-card img {
            border-radius: 50%;
            object-fit: cover;
        }

        .tf-button.special:hover {
            background: none !important;
            color: #e74c3c !important;
        }

        #profile-preview {
            border: 1px dashed #ccc;
            padding: 5px;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            cursor: pointer;
        }

        #profile-preview:hover {
            opacity: .8;
        }
    </style>
@endsection

@section('content')
    <div class="main-content-wrap">

        {{-- Header --}}
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ __('Profile') }}</h3>

            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">{{ __('Dashboard') }}</div>
                    </a>
                </li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <div class="text-tiny">{{ __('Profile') }}</div>
                </li>
            </ul>
        </div>

        <div class="row">
            {{-- Profile Card --}}
            <div class="col-lg-4 order-1 order-lg-2 mb-20">
                <div class="wg-box text-center profile-card py-5">

                    <div class="mb-20 position-relative d-inline-block">
                        <img id="profile-preview"
                            src="{{ Auth::user()->image?->path ? asset('storage/' . Auth::user()->image->path) : '/avatar?name=' . urlencode(Auth::user()->trans_name) . '&size=110' }}"
                            title="{{ __('Click to change photo') }}"
                            style="width:150px; height:150px; object-fit:cover; object-position: top; border-radius:50%; cursor:pointer; border:1px dashed #ccc; padding:5px;"
                            onclick="document.getElementById('image-input').click()">
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <form action="{{ route('admin.profile.image') }}" method="POST" enctype="multipart/form-data"
                            id="image-form">
                            @csrf
                            <input type="file" name="image" id="image-input" accept="image/*" class="d-none"
                                onchange="previewImage(this)">
                            <button type="submit" class="btn btn-primary btn-sm" id="save-btn" style="display:none;">
                                <i class="icon-check me-1"></i> {{ __('Save Photo') }}
                            </button>
                            <button type="button" class="btn btn-secondary btn-sm" id="change-btn"
                                onclick="document.getElementById('image-input').click()">
                                <i class="icon-upload me-1"></i> {{ __('Change Photo') }}
                            </button>
                        </form>

                        @if (Auth::user()->image?->path)
                            <form action="{{ route('admin.profile.image.remove') }}" method="POST" id="remove-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" id="remove-btn">
                                    <i class="icon-trash-2 me-1"></i> {{ __('Remove Photo') }}
                                </button>
                            </form>
                        @else
                            <button type="button" class="btn btn-danger btn-sm" disabled id="remove-btn">
                                <i class="icon-trash-2 me-1"></i> {{ __('Remove Photo') }}
                            </button>
                        @endif
                    </div>

                    {{-- <h4 class="mb-10" id="preview-name">{{ Auth::user()->name }}</h4> --}}
                    {{-- <div class="text-secondary mb-5">{{ ucfirst(Auth::user()->type) }}</div>
                    <div class="text-tiny">{{ Auth::user()->email }}</div> --}}

                </div>
            </div>

            {{-- Sections --}}
            <div class="col-lg-8 order-2 order-lg-1">

                <div class="wg-box mb-20">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="wg-box mb-20">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="wg-box border-danger gap20 mb-20">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>

        </div>

    </div>
@endsection

@section('js')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    document.getElementById('profile-preview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);

                document.getElementById('save-btn').style.display = 'inline-block';
                document.getElementById('change-btn').style.display = 'none';
            }
        }
    </script>
@endsection
