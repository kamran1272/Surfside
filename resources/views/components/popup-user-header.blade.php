<div class="popup-wrap user type-header">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span class="header-user wg-user">
                <span class="image">
                    <img src="{{ asset('assets/admin/images/avatar/user-2.jpg') }}" alt="">
                </span>
                <span class="flex flex-column">
                    <span class="body-title mb-2">Kamran Khan</span>
                    <span class="text-tiny">Admin</span>
                </span>
            </span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
            <li>
                <a href="#" class="user-item">
                    <div class="icon">
                        <i class="icon-user"></i>
                    </div>
                    <div class="body-title-2">Account</div>
                </a>
            </li>
            <li>
                <a href="#" class="user-item">
                    <div class="icon">
                        <i class="icon-mail"></i>
                    </div>
                    <div class="body-title-2">Inbox</div>
                    <div class="number">27</div>
                </a>
            </li>
            <li>
                <a href="#" class="user-item">
                    <div class="icon">
                        <i class="icon-file-text"></i>
                    </div>
                    <div class="body-title-2">Taskboard</div>
                </a>
            </li>
            <li>
                <a href="#" class="user-item">
                    <div class="icon">
                        <i class="icon-headphones"></i>
                    </div>
                    <div class="body-title-2">Support</div>
                </a>
            </li>
            <li>
                <a href="{{ url('/login') }}" class="user-item">
                    <div class="icon">
                        <i class="icon-log-out"></i>
                    </div>
                    <div class="body-title-2">Log out</div>
                </a>
            </li>
        </ul>
    </div>
</div>
