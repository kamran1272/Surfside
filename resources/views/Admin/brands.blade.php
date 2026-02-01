<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

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
                                    <h3>Brands</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{ route('admin.brands') }}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Brands</div>
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
                                        <a class="tf-button style-1 w208" href="{{ url('/add-brand') }}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Slug</th>
                                                        <th>Products</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($brands) && $brands->count() > 0)
                                                        @foreach ($brands as $index => $brand)
                                                            <tr>
                                                                <td>{{ ($brands->currentPage() - 1) * $brands->perPage() + $index + 1 }}
                                                                </td>
                                                                <td class="pname">
                                                                    <div class="image">
                                                                        @if ($brand->image)
                                                                            <img src="{{ asset('storage/' . $brand->image) }}"
                                                                                alt="{{ $brand->name }}"
                                                                                class="image"
                                                                                style="width: 50px; height: 50px; object-fit: cover;">
                                                                        @else
                                                                            <div
                                                                                style="width: 50px; height: 50px; background: #eee; display: flex; align-items: center; justify-content: center;">
                                                                                <i class="icon-image"></i>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="name">
                                                                        <a href="#"
                                                                            class="body-title-2">{{ $brand->name }}</a>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $brand->slug }}</td>
                                                                <td><a href="#"
                                                                        target="_blank">{{ $brand->products_count ?? 0 }}</a>
                                                                </td>
                                                                <td>
                                                                    <div class="list-icon-function">
                                                                        <!-- FIXED: Changed from brands.edit to admin.brands.edit -->
                                                                        <a
                                                                            href="{{ route('admin.brands.edit', $brand->id) }}">
                                                                            <div class="item edit">
                                                                                <i class="icon-edit-3"></i>
                                                                            </div>
                                                                        </a>
                                                                        <!-- FIXED: Changed from brands.destroy to admin.brands.destroy -->
                                                                        <form
                                                                            action="{{ route('admin.brands.destroy', $brand->id) }}"
                                                                            method="POST" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="item text-danger delete"
                                                                                onclick="return confirm('Are you sure you want to delete this brand?')">
                                                                                <i class="icon-trash-2"></i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="5" class="text-center">No brands found.
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="divider"></div>
                                        @if (isset($brands) && $brands->count() > 0)
                                            <div
                                                class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                                                {{ $brands->links() }}
                                            </div>
                                        @endif
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
