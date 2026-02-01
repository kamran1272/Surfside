<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <title>SurfsideMedia - Edit Product</title>
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

                <x-admin-menu-left />

                <div class="section-content-right">

                    <x-header-dashboard />

                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Edit Product</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{ url('/index') }}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li><i class="icon-chevron-right"></i></li>
                                        <li>
                                            <a href="{{ route('admin.products.index') }}">
                                                <div class="text-tiny">Products</div>
                                            </a>
                                        </li>
                                        <li><i class="icon-chevron-right"></i></li>
                                        <li>
                                            <div class="text-tiny">Edit Product</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        {{-- Product Name --}}
                                        <fieldset class="name">
                                            <div class="body-title">Product Name <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Product name"
                                                name="name" value="{{ old('name', $product->name) }}" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        {{-- Current Image + Upload --}}
                                        <fieldset>
                                            <div class="body-title">Current Image</div>
                                            @if ($product->image)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                        alt="{{ $product->name }}" style="max-width: 200px;">
                                                </div>
                                            @endif

                                            <div class="body-title">Upload New Image</div>
                                            <div class="upload-image flex-grow">
                                                <div class="item" id="imgpreview" style="display:none">
                                                    <img src="" class="effect8" alt="Preview"
                                                        id="previewImage">
                                                </div>
                                                <div id="upload-file" class="item up-load">
                                                    <label class="uploadfile" for="myFile">
                                                        <span class="icon"><i class="icon-upload-cloud"></i></span>
                                                        <span class="body-text">Drop your images here or select
                                                            <span class="tf-color">click to browse</span></span>
                                                        <input type="file" id="myFile" name="image"
                                                            accept="image/*">
                                                    </label>
                                                </div>
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </fieldset>

                                        {{-- Description --}}
                                        <fieldset>
                                            <div class="body-title">Description</div>
                                            <textarea class="flex-grow" name="description" rows="3" placeholder="Product description">{{ old('description', $product->description) }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        {{-- Price --}}
                                        <fieldset>
                                            <div class="body-title">Regular Price <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="number" step="0.01"
                                                name="regular_price"
                                                value="{{ old('regular_price', $product->regular_price) }}" required>
                                            @error('regular_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        {{-- Sale Price --}}
                                        <fieldset>
                                            <div class="body-title">Sale Price</div>
                                            <input class="flex-grow" type="number" step="0.01" name="sale_price"
                                                value="{{ old('sale_price', $product->sale_price) }}">
                                            @error('sale_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        {{-- SKU --}}
                                        <fieldset>
                                            <div class="body-title">SKU</div>
                                            <input class="flex-grow" type="text" name="SKU"
                                                value="{{ old('SKU', $product->SKU) }}">
                                            @error('SKU')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        {{-- Category --}}
                                        <fieldset>
                                            <div class="body-title">Category <span class="tf-color-1">*</span></div>
                                            <div class="select">
                                                <select name="category_id" required>
                                                    <option value="">Choose category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        {{-- Brand --}}
                                        <fieldset>
                                            <div class="body-title">Brand <span class="tf-color-1">*</span></div>
                                            <div class="select">
                                                <select name="brand_id" required>
                                                    <option value="">Choose brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('brand_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        {{-- Quantity --}}
                                        <fieldset>
                                            <div class="body-title">Quantity</div>
                                            <input class="flex-grow" type="number" name="quantity"
                                                value="{{ old('quantity', $product->quantity) }}">
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        {{-- Stock Status --}}
                                        <fieldset>
                                            <div class="body-title">Stock Status</div>
                                            <div class="select">
                                                <select name="stock_status">
                                                    <option value="instock"
                                                        {{ old('stock_status', $product->stock_status) == 'instock' ? 'selected' : '' }}>
                                                        In Stock</option>
                                                    <option value="outofstock"
                                                        {{ old('stock_status', $product->stock_status) == 'outofstock' ? 'selected' : '' }}>
                                                        Out of Stock</option>
                                                </select>
                                            </div>
                                        </fieldset>

                                        {{-- Featured --}}
                                        <fieldset>
                                            <div class="body-title">Featured</div>
                                            <div class="select">
                                                <select name="featured">
                                                    <option value="0"
                                                        {{ $product->featured == 0 ? 'selected' : '' }}>No</option>
                                                    <option value="1"
                                                        {{ $product->featured == 1 ? 'selected' : '' }}>Yes</option>
                                                </select>
                                            </div>
                                        </fieldset>

                                        {{-- Buttons --}}
                                        <div class="bot">
                                            <a href="{{ route('admin.products.index') }}"
                                                class="tf-button w208">Cancel</a>
                                            <button class="tf-button w208" type="submit">Update</button>
                                        </div>
                                    </form>
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
    <script>
        document.getElementById('myFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                    document.getElementById('imgpreview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
