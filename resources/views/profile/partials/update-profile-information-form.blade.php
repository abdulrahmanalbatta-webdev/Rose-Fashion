<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('admin.profile.update') }}">
    @csrf
    @method('patch')

    <div class="row">
        <div class="col-md-6">
            <x-form.input label="{{ __('English name') }}" className="mb-10" type="text" name="name_en"
                value="{{ old('name_en', $user->name_en) }}" required />
        </div>
        <div class="col-md-6">
            <x-form.input label="{{ __('Arabic name') }}" className="mb-10" type="text" name="name_ar"
                value="{{ old('name_ar', $user->name_ar) }}" required />
        </div>
    </div>
    <x-form.input label="{{ __('Email') }}" className="mb-10" type="email" name="email"
        value="{{ old('email', $user->email) }}" required :is-readonly="true" />

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
        <div class="mb-10">
            <p class="text-tiny" style="color:#e74c3c;">
                {{ __('Your email address is unverified.') }}
                <button form="send-verification"
                    style="background:none;border:none;padding:0;color:var(--primary);text-decoration:underline;cursor:pointer;">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>
            @if (session('status') === 'verification-link-sent')
                <p class="text-tiny mt-5" style="color:#078407;">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
            @endif
        </div>
    @endif

    <div class="cols gap10">
        <button type="submit" class="tf-button w-full">{{ __('Save') }}</button>
    </div>
</form>
