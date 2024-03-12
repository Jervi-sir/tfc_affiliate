<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('admin.dashboard') }}" class="side-menu {{ request()->routeIs('admin.dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.affiliated.list') }}" class="side-menu {{ request()->routeIs('admin.affiliated.list') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> List Affiliates </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.product.list') }}" class="side-menu {{ request()->routeIs('admin.product.list') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> List Products </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.product.add') }}" class="side-menu {{ request()->routeIs('admin.product.add') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> Add Product </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.order.list') }}" class="side-menu {{ request()->routeIs('admin.order.list') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> List Orders </div>
            </a>
        </li>
        <!-- Add more menu items here -->
    </ul>
</nav>
