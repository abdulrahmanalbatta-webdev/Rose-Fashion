function deleteCategory(event, button) {

    Swal.fire({
        title: '{{ __('Are you sure?') }}',
        text: '{{ __('You wont be able to revert this!') }}',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '{{ __('Yes, delete it!') }}',
        cancelButtonText: '{{ __('Cancel') }}'
    }).then((result) => {

        if (result.isConfirmed) {
            button.closest('form').submit();
        }

    });
}

