
<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <a class="header-brand d-md-none" href="#">Logo</a>
        <nav class="header-nav ms-auto me-4">
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input class="btn-check" id="btn-light-theme" type="radio" name="theme-switch" autocomplete="off" value="light" onchange="handleThemeChange(this)">
                <label class="btn btn-primary" for="btn-light-theme">
                    <svg class="icon">
                        <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-sun') }}"></use>
                    </svg>
                </label>
                <input class="btn-check" id="btn-dark-theme" type="radio" name="theme-switch" autocomplete="off" value="dark" onchange="handleThemeChange(this)">
                <label class="btn btn-primary" for="btn-dark-theme">
                    <svg class="icon">
                        <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-moon') }}"></use>
                    </svg>
                </label>
            </div>
        </nav>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                                             role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img"
                                                       src="{{ asset('../resources/themes/admin/img/avatars/8.jpg') }}"
                                                       alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2 dark:bg-white dark:bg-opacity-10">
                        <div class="fw-semibold">Account</div>
                    </div>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-bell')}}"></use>
                        </svg>
                        Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item"
                                                                                         href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-envelope-open')}}"></use>
                        </svg>
                        Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item"
                                                                                             href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-task')}}"></use>
                        </svg>
                        Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item"
                                                                                         href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-comment-square')}}"></use>
                        </svg>
                        Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                    <div class="dropdown-header bg-light py-2 dark:bg-white dark:bg-opacity-10">
                        <div class="fw-semibold">Settings</div>
                    </div>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-user')}}"></use>
                        </svg>
                        Profile</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-settings')}}"></use>
                        </svg>
                        Settings</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-credit-card')}}"></use>
                        </svg>
                        Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item"
                                                                                               href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('../resources/themes/admin/icons/svg/free.svg#cil-file')}}"></use>
                        </svg>
                        Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>

                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <!-- if breadcrumb is single--><span>Home</span>
                </li>
                <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
        </nav>
    </div>
</header>
