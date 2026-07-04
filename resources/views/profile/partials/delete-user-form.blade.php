<p class="text-tiny">
    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
</p>

<button type="button" class="tf-button special w-full" style="background:#e74c3c;border-color:#e74c3c;"
    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
    {{ __('Delete Account') }}
</button>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title body-title" style="margin-bottom: 0; !important">{{ __('Delete Account') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="{{ route('admin.profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p class="text-tiny">
                        {{ __('Please enter your password to confirm permanently deleting your account.') }}
                    </p>
                    <x-form.input label="{{ __('Password') }}" type="password" name="password" />
                    @error('password', 'userDeletion')
                        <div class="text-tiny mt-5" style="color:#e74c3c;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="tf-button" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="tf-button special" style="background:#e74c3c;border-color:#e74c3c;">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
