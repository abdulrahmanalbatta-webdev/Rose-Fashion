@extends('admin.layout')
@section('title')
    Brands
@endsection
@section('content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ __('Brands') }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">{{ __('Dashboard') }}</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{ __('Brands') }}</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap mb-20">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="{{ __('Search here...') }}." class="" name="name"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.brands.create') }}"><i
                        class="icon-plus"></i>{{ __('Add new') }}</a>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Products') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="name">
                                            <a href="#" class="body-title-2">{{ $brand->trans_name }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="image">
                                            <img src="{{ $brand->imagePath }}" alt="{{ $brand->name }}">
                                        </div>
                                    </td>
                                    <td><a href="#" target="_blank">0</a></td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('admin.brands.edit', $brand->id) }}">
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" style="background: none; border: none;"
                                                    class="p-0" onclick="deleteBrand(event,this)">
                                                    <div class="item text-danger delete">
                                                        <i class="icon-trash-2"></i>
                                                    </div>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5" class="text-center">{{ __('No brands') }}</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function deleteBrand(event, button) {

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
