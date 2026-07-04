@extends('admin.layout')
@section('title')
    Categories
@endsection
@section('content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ __('Categories') }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10 mb-10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">{{ __('Dashboard') }}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{ __('Categories') }}</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap mb-20">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="{{ __('Search here...') }}" class="" name="name"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.categories.create') }}"><i class="icon-plus"></i>
                    {{ __('Add new') }}</a>
            </div>
            <div class="wg-table table-all-user">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Parent') }}</th>
                            <th>{{ __('Products') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="name">
                                        <a href="#" class="body-title-2">
                                            {{ $category->trans_name }}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="image">
                                        <img src="{{ $category->imagePath }}" alt="{{ $category->name }}">
                                    </div>
                                </td>
                                <td><a href="" target="_blank">{{ $category->parent->name ?? '-' }}</a></td>
                                <td><a href="" target="_blank">{{ $category->products->count() }}</a></td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" style="background: none; border: none;" class="p-0"
                                                onclick="deleteCategory(event,this)">
                                                <div class="item text-danger delete">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">{{ __('No categories') }}</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
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
    </script>
@endsection
