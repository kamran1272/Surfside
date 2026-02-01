<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <title>SurfsideMedia - Add Product</title>
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
                                    <h3>Add Product</h3>
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
                                            <a href="{{ route('admin.products.index') }}">
                                                <div class="text-tiny">Products</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Add product</div>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Error Messages -->
                                @if ($errors->any())
                                    <div class="alert alert-danger mb-20">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Success Message -->
                                @if (session('success'))
                                    <div class="alert alert-success mb-20">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
                                    action="{{ route('admin.products.store') }}">
                                    @csrf

                                    <div class="wg-box">
                                        <fieldset class="name">
                                            <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="mb-10" type="text" placeholder="Enter product name"
                                                name="name" tabindex="0" value="{{ old('name') }}"
                                                aria-required="true" required>
                                            @error('name')
                                                <div class="text-danger text-tiny">{{ $message }}</div>
                                            @enderror
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product name.</div>
                                        </fieldset>

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter product slug"
                                                name="slug" tabindex="0" value="{{ old('slug') }}"
                                                aria-required="true" required>
                                            @error('slug')
                                                <div class="text-danger text-tiny">{{ $message }}</div>
                                            @enderror
                                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                                product slug.</div>
                                        </fieldset>

                                        <div class="gap22 cols">
                                            <fieldset class="category">
                                                <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                                                </div>
                                                <div class="select">
                                                    <select class="" name="category_id" required>
                                                        <option value="">Choose category</option>
                                                        @if (!empty($categories) && $categories->count() > 0)
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                            <option value="">No categories available</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                @error('category_id')
                                                    <div class="text-danger text-tiny">{{ $message }}</div>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="brand">
                                                <div class="body-title mb-10">Brand <span class="tf-color-1">*</span>
                                                </div>
                                                <div class="select">
                                                    <select class="" name="brand_id" required>
                                                        <option value="">Choose Brand</option>
                                                        @if (!empty($brands) && $brands->count() > 0)
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                                    {{ $brand->name }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                            <option value="">No brands available</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                @error('brand_id')
                                                    <div class="text-danger text-tiny">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <fieldset class="shortdescription">
                                            <div class="body-title mb-10">Short Description <span
                                                    class="tf-color-1">*</span></div>
                                            <textarea class="mb-10 ht-150" name="short_description" placeholder="Short Description" tabindex="0"
                                                aria-required="true" required>{{ old('short_description') }}</textarea>
                                            @error('short_description')
                                                <div class="text-danger text-tiny">{{ $message }}</div>
                                            @enderror
                                            <div class="text-tiny">Brief description of the product (max 255
                                                characters).</div>
                                        </fieldset>

                                        <fieldset class="description">
                                            <div class="body-title mb-10">Description <span
                                                    class="tf-color-1">*</span></div>
                                            <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true" required>{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="text-danger text-tiny">{{ $message }}</div>
                                            @enderror
                                            <div class="text-tiny">Detailed description of the product.</div>
                                        </fieldset>
                                    </div>

                                    <div class="wg-box">
                                        <fieldset>
                                            <div class="body-title">Upload Main Image <span
                                                    class="tf-color-1">*</span></div>
                                            <div class="upload-image flex-grow">
                                                <div class="item" id="imgpreview"
                                                    style="{{ old('image') ? 'display:block' : 'display:none' }}">
                                                    <img src="{{ old('image_preview') ? old('image_preview') : asset('assets/admin/images/upload/upload-1.png') }}"
                                                        class="effect8" alt="Preview" id="previewImage">
                                                </div>
                                                <div id="upload-file" class="item up-load">
                                                    <label class="uploadfile" for="mainImage">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="body-text">Drop your image here or select <span
                                                                class="tf-color">click to browse</span></span>
                                                        <input type="file" id="mainImage" name="image"
                                                            accept="image/*" onchange="previewMainImage(this)">
                                                    </label>
                                                </div>
                                            </div>
                                            @error('image')
                                                <div class="text-danger text-tiny">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        <fieldset>
                                            <div class="body-title mb-10">Upload Gallery Images</div>
                                            <div class="upload-image mb-16">
                                                <div id="galleryPreview" class="flex flex-wrap gap-10 mb-10">
                                                    <!-- Gallery preview will appear here -->
                                                </div>
                                                <div id="galUpload" class="item up-load">
                                                    <label class="uploadfile" for="galleryImages">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="text-tiny">Drop your images here or select <span
                                                                class="tf-color">click to browse</span></span>
                                                        <input type="file" id="galleryImages" name="images[]"
                                                            accept="image/*" multiple
                                                            onchange="previewGalleryImages(this)">
                                                    </label>
                                                </div>
                                            </div>
                                            @error('images.*')
                                                <div class="text-danger text-tiny">{{ $message }}</div>
                                            @enderror
                                        </fieldset>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Regular Price <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="number" step="0.01"
                                                    placeholder="Enter regular price" name="regular_price"
                                                    tabindex="0" value="{{ old('regular_price') }}"
                                                    aria-required="true" required>
                                                @error('regular_price')
                                                    <div class="text-danger text-tiny">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Sale Price</div>
                                                <input class="mb-10" type="number" step="0.01"
                                                    placeholder="Enter sale price" name="sale_price" tabindex="0"
                                                    value="{{ old('sale_price') }}">
                                                @error('sale_price')
                                                    <div class="text-danger text-tiny">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                                                </div>
                                                <input class="mb-10" type="text" placeholder="Enter SKU"
                                                    name="SKU" tabindex="0" value="{{ old('SKU') }}"
                                                    aria-required="true" required>
                                                @error('SKU')
                                                    <div class="text-danger text-tiny">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Quantity <span
                                                        class="tf-color-1">*</span></div>
                                                <input class="mb-10" type="number" placeholder="Enter quantity"
                                                    name="quantity" tabindex="0" value="{{ old('quantity', 0) }}"
                                                    aria-required="true" required>
                                                @error('quantity')
                                                    <div class="text-danger text-tiny">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <div class="cols gap22">
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Stock Status</div>
                                                <div class="select mb-10">
                                                    <select class="" name="stock_status">
                                                        <option value="instock"
                                                            {{ old('stock_status', 'instock') == 'instock' ? 'selected' : '' }}>
                                                            InStock</option>
                                                        <option value="outofstock"
                                                            {{ old('stock_status') == 'outofstock' ? 'selected' : '' }}>
                                                            Out of Stock</option>
                                                    </select>
                                                </div>
                                                @error('stock_status')
                                                    <div class="text-danger text-tiny">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="name">
                                                <div class="body-title mb-10">Featured</div>
                                                <div class="select mb-10">
                                                    <select class="" name="featured">
                                                        <option value="0"
                                                            {{ old('featured', '0') == '0' ? 'selected' : '' }}>No
                                                        </option>
                                                        <option value="1"
                                                            {{ old('featured') == '1' ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                </div>
                                                @error('featured')
                                                    <div class="text-danger text-tiny">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>

                                        <div class="cols gap10">
                                            <button class="tf-button w-full" type="submit">Add product</button>
                                        </div>
                                    </div>
                                </form>
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
        function previewMainImage(input) {
            const preview = document.getElementById('previewImage');
            const previewContainer = document.getElementById('imgpreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewGalleryImages(input) {
            const galleryPreview = document.getElementById('galleryPreview');
            galleryPreview.innerHTML = '';

            if (input.files && input.files.length > 0) {
                for (let i = 0; i < input.files.length; i++) {
                    const reader = new FileReader();
                    const div = document.createElement('div');
                    div.className = 'item';
                    div.style.width = '100px';
                    div.style.height = '100px';
                    div.style.position = 'relative';

                    const img = document.createElement('img');
                    img.style.width = '100%';
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '8px';

                    reader.onload = function(e) {
                        img.src = e.target.result;
                    }

                    reader.readAsDataURL(input.files[i]);
                    div.appendChild(img);
                    galleryPreview.appendChild(div);
                }
            }
        }

        // Auto-generate slug from product name
        document.querySelector('input[name="name"]').addEventListener('blur', function() {
            const name = this.value;
            const slugInput = document.querySelector('input[name="slug"]');

            if (name && !slugInput.value) {
                fetch('{{ route('admin.generate.slug') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            name: name
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.slug) {
                            slugInput.value = data.slug;
                        }
                    });
            }
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Hide preview containers initially
            document.getElementById('imgpreview').style.display = 'none';
        });
    </script>
</body>

</html>
