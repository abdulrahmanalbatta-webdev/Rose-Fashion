@extends('admin.layout')
@section('title')
    Products
@endsection
@section('content')
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ __('All Products') }}</h3>
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
                    <div class="text-tiny">{{ __('All Products') }}</div>
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
                <a class="tf-button style-1 w208" href="{{ route('admin.products.create') }}"><i
                        class="icon-plus"></i>{{ __('Add new') }}</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Regular Price') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Brand') }}</th>
                            <th>{{ __('Stock') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $product->trans_name }}</a>
                                        <div class="text-tiny mt-3">{{ $product->slug }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="image-product">
                                        <img src="{{ $product->imagePath }}" alt="{{ $product->name_en }}">
                                    </div>
                                </td>

                                <td>${{ $product->regular_price }}</td>
                                <td>{{ $product->category->trans_name }}</td>
                                <td>{{ $product->brand->trans_name }}</td>
                                <td>{{ $product->in_stock ? 'In stock' : 'Out of stock' }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.products.show', $product->id) }}" target="_blank">
                                            <div class="item eye">
                                                <i class="icon-eye"></i>
                                            </div>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product) }}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" style="background: none; border: none;" class="p-0"
                                                onclick="deleteProduct(event,this)">
                                                <div class="item text-danger delete">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="9" class="text-center">{{ __('No products') }}</td>
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
        function deleteProduct(event, button) {

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
