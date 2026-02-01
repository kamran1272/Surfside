<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
@php
    use Illuminate\Support\Str;
@endphp


<head>
    <title>SurfsideMedia</title>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/admin/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/custom.css') }}">
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
    <div class="preloading">
        <span></span>
    </div>
</div> -->

                <x-admin-menu-left />

                <div class="section-content-right">

                    <x-header-dashboard />

                    <div class="main-content">

                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>All Products</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{ url('/index') }}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">All Products</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class=""
                                                        name="name" tabindex="2" value=""
                                                        aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i
                                                            class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{ url('/add-product') }}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>SalePrice</th>
                                                    <th>SKU</th>
                                                    <th>Category</th>
                                                    <th>Brand</th>
                                                    <th>Featured</th>
                                                    <th>Stock</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($products))
                                                    @foreach ($products as $product)
                                                        <tr>
                                                            <td>{{ $product->id }}</td>
                                                            <td class="pname">
                                                                <div class="image">
                                                                    <img src="{{ asset('storage/', $product->image) }}"
                                                                        alt="" class="{{ $product->name }}"
                                                                        class="image">
                                                                </div>
                                                                <div class="name">
                                                                    <a href="#"
                                                                        class="body-title-2">{{ $product->name }}</a>
                                                                    <div class="text-tiny mt-3">
                                                                        {{ str::Limit($product->short_description, 50) }}
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>${{ number_format($product->regular_price, 2) }}</td>
                                                            <td>${{ number_format($product->sale_price, 2) }}</td>
                                                            <td>{{ $product->SKU }}</td>
                                                            <td>{{ $product->category->name }}</td>
                                                            <td>{{ $product->brand->name }}</td>
                                                            <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                                                            <td>{{ $product->stock_status }}</td>
                                                            <td>{{ $product->quantity }}</td>
                                                            <td>
                                                                <div class="list-icon-function">
                                                                    <a href="#" target="_blank">
                                                                        <div class="item eye">
                                                                            <i class="icon-eye"></i>
                                                                        </div>
                                                                    </a>
                                                                    <a
                                                                        href="{{ route('admin.products.edit', $product->id) }}">
                                                                        <div class="item edit">
                                                                            <i class="icon-edit-3"></i>
                                                                        </div>
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('admin.products.destroy', $product->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="item text-danger delete"
                                                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                                                            <i class="icon-trash-2"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <p>No products found.</p>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">


                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2025 SurfsideMedia</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
</body>

</html>
