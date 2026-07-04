<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <x-form.input label="{{ __('Current Password') }}" className="mb-10" type="password" name="current_password"
        errorBag="updatePassword" />

    <x-form.input label="{{ __('New Password') }}" className="mb-10" type="password" name="password"
        errorBag="updatePassword" />

    <x-form.input label="{{ __('Confirm Password') }}" className="mb-10" type="password" name="password_confirmation"
        errorBag="updatePassword" />

    <div class="cols gap10">
        <button type="submit" class="tf-button w-full">{{ __('Save') }}</button>
    </div>
</form>
