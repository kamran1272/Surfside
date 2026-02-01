<div class="header-dashboard">
    <div class="wrap">
        <div class="header-left">
            <a href="{{ url('/index-2') }}">
                <img class="" id="logo_header_mobile" alt=""
                    src="{{ asset('assets/admin/images/logo/logo.png') }}"
                    data-light="{{ asset('assets/admin/images/logo/logo.png') }}"
                    data-dark="{{ asset('assets/admin/images/logo/logo.png') }}" data-width="154px" data-height="52px"
                    data-retina="{{ asset('assets/admin/images/logo/logo.png') }}">
            </a>
            <div class="button-show-hide">
                <i class="icon-menu-left"></i>
            </div>
            <x-admin-search-form />
        </div>
        <div class="header-grid">
            <x-popup-msg-header />
            <x-popup-user-header />
        </div>
    </div>
</div>
