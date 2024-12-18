<!-- app-header -->
<header class="app-header">
    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">
        <!-- Start::header-content-left -->
        <div class="header-content-left">
            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle header-link"
                    data-bs-toggle="sidebar">
                    <span class="open-toggle me-2">
                        <i class="bx bx-menu header-link-icon"></i>
                    </span>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            {{-- <div class="main-header-center header-link">
                <a aria-label="anchor" href="javascript:void(0);" class="header-link">
                    <span class="text-light">{{ __('Periode Aktif') }}</span>
                    <span class="text-light">&nbsp; : &nbsp;</span>
                    <span class="badge bg-danger pulse pulse-secondary"><strong>123</strong></span>
                </a>
            </div> --}}
        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">
            <!-- Start::header-element -->
            {{-- <div class="header-element country-selector">
                <!-- Start::header-link|dropdown-toggle -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link dropdown-toggle"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <i class="bx bx-globe header-link-icon"></i>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="border-0 main-header-dropdown dropdown-menu" data-popper-placement="none">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            {{ __('Indonesia') }}
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            {{ __('Inggris') }}
                        </a>
                    </li>
                </ul>
            </div> --}}
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link layout-setting">
                    <!-- Start::header-link-icon -->
                    <i class="bx bx-sun bx-flip-horizontal header-link-icon ionicon dark-layout"></i>
                    <!-- End::header-link-icon -->
                    <!--  Start::header-link-icon -->
                    <i class="bx bx-moon bx-flip-horizontal header-link-icon ionicon light-layout"></i>
                    <!-- End::header-link-icon -->
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element cart-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                {{-- <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside">
                    <i class="bx bx-cart header-link-icon ionicon"></i>
                    <span class="badge bg-danger rounded-pill header-icon-badge" id="cart-icon-badge">5</span>
                </a> --}}
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                {{-- <div class="border-0 main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">Cart Items</p>
                            <span class="badge bg-success-transparent" id="cart-data">5 Items</span>
                        </div>
                    </div>
                    <div>
                        <hr class="dropdown-divider">
                    </div>
                    <ul class="mb-0 list-unstyled" id="header-cart-items-scroll">
                        <li class="dropdown-item border-bottom">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <span class="p-1 avatar avatar-xl bd-gray-200">
                                    <img src="{{ url(config('common.path_template') . 'assets/images/ecommerce/png/1.png') }}"
                                        alt="">
                                </span>
                                <div class="flex-grow-1 ms-3">
                                    <div class="mb-0 d-flex align-items-start justify-content-between">
                                        <div class=" fs-13 fw-semibold">
                                            <a href="cart.html">Cactus mini plant</a>
                                        </div>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content align-items-start">
                                        <div class=" fw-normal fs-12 text-muted">Quantity:02</div>
                                        <div class="d-flex align-items-center">
                                            <span class=" fw-semibold fs-16">$1,229</span>
                                            <p class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                $1,799</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item border-bottom">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <span class="p-1 avatar avatar-xl bd-gray-200">
                                    <img src="{{ url(config('common.path_template') . 'assets/images/ecommerce/png/15.png') }}"
                                        alt="">
                                </span>
                                <div class="flex-grow-1 ms-3">
                                    <div class="mb-0 d-flex align-items-start justify-content-between">
                                        <div class=" fs-13 fw-semibold">
                                            <a href="cart.html">Sports shoes for men</a>
                                        </div>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content align-items-start">
                                        <div class=" fw-normal fs-12 text-muted">Quantity:01</div>
                                        <div class="d-flex align-items-center">
                                            <span class=" fw-semibold fs-16">$10,229</span>
                                            <p class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                $799</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item border-bottom">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <span class="p-1 avatar avatar-xl bd-gray-200">
                                    <img src="{{ url(config('common.path_template') . 'assets/images/ecommerce/png/40.png') }}"
                                        alt="">
                                </span>
                                <div class="flex-grow-1 ms-3">
                                    <div class="mb-0 d-flex align-items-start justify-content-between">
                                        <div class=" fs-13 fw-semibold">
                                            <a href="cart.html">Pink color smart watch </a>
                                        </div>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content align-items-start">
                                        <div class=" fw-normal fs-12 text-muted">Quantity:03</div>
                                        <div class="d-flex align-items-center">
                                            <span class=" fw-semibold fs-16">$5,500</span>
                                            <p class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                $599</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item border-bottom">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <span class="p-1 avatar avatar-xl bd-gray-200">
                                    <img src="{{ url(config('common.path_template') . 'assets/images/ecommerce/png/8.png') }}"
                                        alt="">
                                </span>
                                <div class="flex-grow-1 ms-3">
                                    <div class="mb-0 d-flex align-items-start justify-content-between">
                                        <div class=" fs-13 fw-semibold">
                                            <a href="cart.html">Red Leafs plant </a>
                                        </div>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content align-items-start">
                                        <div class=" fw-normal fs-12 text-muted">Quantity:01</div>
                                        <div class="d-flex align-items-center">
                                            <span class=" fw-semibold fs-16">$15,300</span>
                                            <p class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                $799</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start cart-dropdown-item">
                                <span class="p-1 avatar avatar-xl bd-gray-200">
                                    <img src="{{ url(config('common.path_template') . 'assets/images/ecommerce/png/11.png') }}"
                                        alt="">
                                </span>
                                <div class="flex-grow-1 ms-3">
                                    <div class="mb-0 d-flex align-items-start justify-content-between">
                                        <div class=" fs-13 fw-semibold">
                                            <a href="cart.html">Good luck mini plant</a>
                                        </div>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="header-cart-remove float-end dropdown-item-close"><i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="min-w-fit-content align-items-start">
                                        <div class=" fw-normal fs-12 text-muted">Quantity:02</div>
                                        <div class="d-flex align-items-center">
                                            <span class=" fw-semibold fs-16">$600</span>
                                            <p class="mb-0 text-muted text-decoration-line-through ms-1 op-6 fs-12">
                                                $99</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="p-3 empty-header-item border-top">
                        <div class="d-grid">
                            <a href="checkout.html" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
                    <div class="p-5 empty-item d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xxl avatar-rounded bg-warning-transparent">
                                <i class="bx bx-cart bx-tada fs-2"></i>
                            </span>
                            <h6 class="mt-3 mb-2 fw-bold">Your Cart is Empty</h6>
                            <a href="products.html" class="m-1 btn btn-primary btn-wave btn-sm"
                                data-abc="true">continue shopping <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div> --}}
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element notifications-dropdown ">
                <!-- Start::header-link|dropdown-toggle -->
                {{-- <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                    <i class="bx bx-bell bx-flip-horizontal header-link-icon ionicon"></i>
                    <span class="badge bg-info rounded-pill header-icon-badge pulse pulse-secondary"
                        id="notification-icon-badge">5</span>
                </a> --}}
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                {{-- <div class="border-0 main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                            <span class="badge bg-secondary-transparent" id="notifiation-data">5 Unread</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="mb-0 list-unstyled" id="header-notification-scroll">
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-secondary-transparent rounded-2">
                                        <img src="{{ url(config('common.path_template') . 'assets/images/faces/2.jpg') }}"
                                            alt="">
                                    </span>
                                </div>
                                <div class="flex-grow-1 d-flex justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Olivia
                                                James</a></p>
                                        <span class="fs-12 text-muted fw-normal">Congratulate for New template
                                            start</span>
                                    </div>
                                    <div class="min-w-fit-content ms-2 text-end">
                                        <a aria-label="anchor" href="javascript:void(0);"
                                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-14"></i></a>
                                        <p class="mb-0 text-muted fs-11">2 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-warning-transparent rounded-2"><i
                                            class="bx bx-pyramid fs-18"></i></span>
                                </div>
                                <div class="flex-grow-1 d-flex justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Order Placed
                                                <span class="text-warning">ID: #1116773</span></a></p>
                                        <span class="fs-12 text-muted fw-normal header-notification-text">Order
                                            Placed Successfully</span>
                                    </div>
                                    <div class="min-w-fit-content ms-2 text-end">
                                        <a aria-label="anchor" href="javascript:void(0);"
                                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-14"></i></a>
                                        <p class="mb-0 text-muted fs-11">5 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-secondary-transparent rounded-2">
                                        <img src="{{ url(config('common.path_template') . 'assets/images/faces/8.jpg') }}"
                                            alt="">
                                    </span>
                                </div>
                                <div class="flex-grow-1 d-flex justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Elizabeth
                                                Lewis</a></p>
                                        <span class="fs-12 text-muted fw-normal">added new schedule realease
                                            date</span>
                                    </div>
                                    <div class="min-w-fit-content ms-2 text-end">
                                        <a aria-label="anchor" href="javascript:void(0);"
                                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-14"></i></a>
                                        <p class="mb-0 text-muted fs-11">10 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-primary-transparent rounded-2"><i
                                            class="bx bx-pulse fs-18"></i></span>
                                </div>
                                <div class="flex-grow-1 d-flex justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Your Order
                                                Has Been Shipped</a></p>
                                        <span class="fs-12 text-muted fw-normal header-notification-text">Order
                                            No: 123456 Has Shipped To Your Delivery Address</span>
                                    </div>
                                    <div class="min-w-fit-content ms-2 text-end">
                                        <a aria-label="anchor" href="javascript:void(0);"
                                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-14"></i></a>
                                        <p class="mb-0 text-muted fs-11">12 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-item">
                            <div class="d-flex align-items-start">
                                <div class="pe-2">
                                    <span class="avatar avatar-md bg-pink-transparent rounded-2"><i
                                            class="bx bx-badge-check"></i></span>
                                </div>
                                <div class="flex-grow-1 d-flex justify-content-between">
                                    <div>
                                        <p class="mb-0 fw-semibold"><a href="notifications.html">Account Has
                                                Been Verified</a></p>
                                        <span class="fs-12 text-muted fw-normal header-notification-text">Your
                                            Account Has Been Verified Sucessfully</span>
                                    </div>
                                    <div class="min-w-fit-content ms-2 text-end">
                                        <a aria-label="anchor" href="javascript:void(0);"
                                            class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                class="ti ti-x fs-14"></i></a>
                                        <p class="mb-0 text-muted fs-11">20 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="p-3 empty-header-item1 border-top">
                        <div class="d-grid">
                            <a href="notifications.html" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="p-5 empty-item1 d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                <i class="bx bx-bell-off bx-tada fs-2"></i>
                            </span>
                            <h6 class="mt-3 fw-semibold">No New Notifications</h6>
                        </div>
                    </div>
                </div> --}}
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            {{-- <div class="d-flex header-settings header-shortcuts-dropdown">
                <a aria-label="anchor" href="javascript:void(0);" class="header-link nav-link icon"
                    data-bs-toggle="offcanvas" data-bs-target="#apps" aria-controls="apps">
                    <i class="bx bxs-grid header-link-icon"></i>
                </a>
            </div> --}}

            <div class="offcanvas offcanvas-end wd-330" tabindex="-1" id="apps" aria-labelledby="appsLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 id="appsLabel" class="mb-0 fs-18">Related Apps</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="bx bx-x apps-btn-close"></i></button>
                </div>
                <div class="p-3">
                    <div class="row g-3">
                        <div class="col-6">
                            <a href="full-calendar.html">
                                <div class="p-3 text-center border related-app">
                                    <span class="p-2 mb-2 avatar fs-23 bg-success-transparent">
                                        <i class="bx bx-calendar text-success"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Calendar</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="mail.html">
                                <div class="p-3 text-center border related-app">
                                    <span class="p-2 mb-2 avatar fs-23 bg-info-transparent">
                                        <i class="bx bx-envelope text-info"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Mail</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="profile.html">
                                <div class="p-3 text-center border related-app">
                                    <span class="p-2 mb-2 avatar bg-warning-transparent fs-23 bg">
                                        <i class="bx bx-user text-warning"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Profile</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="chat.html">
                                <div class="p-3 text-center border related-app">
                                    <span class="p-2 mb-2 avatar bg-pink-transparent fs-23 bg">
                                        <i class="bx bx-chat text-pink"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Chat</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="contacts.html">
                                <div class="p-3 text-center border related-app">
                                    <span class="p-2 mb-2 avatar bg-secondary-transparent fs-23 bg">
                                        <i class="bx bx-phone text-secondary"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Contacts</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="mail-settings.html">
                                <div class="p-3 text-center border related-app">
                                    <span class="p-2 mb-2 avatar bg-teal-transparent fs-23 bg">
                                        <i class="bx bx-cog text-teal"></i>
                                    </span>
                                    <span class="d-block fs-13 text-muted fw-semibold">Settings</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start::header-element -->
            <div class="header-element header-fullscreen">
                <!-- Start::header-link -->
                <a aria-label="anchor" onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                    <i class="bx bx-fullscreen header-link-icon full-screen-open"></i>
                    <i class="bx bx-exit-fullscreen header-link-icon full-screen-close d-none"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element mainuserProfile">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="d-sm-flex wd-100p">
                            <div class="avatar avatar-sm">
                                <img alt="avatar" class="rounded-circle"
                                    src="{{ !empty(auth()->user()->image) ? url(config('common.path_storage') . auth()->user()->image) : url(config('common.path_template') . config('common.image_user_profile_small')) }}"
                                    width="28" height="28">
                            </div>
                            <div class="my-auto ms-2 d-none d-xl-flex">
                                <h6 class="mb-0 font-weight-semibold fs-13 user-name d-sm-block d-none">
                                    {{ auth()->user()->name }}</h6>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="overflow-hidden border-0 dropdown-menu main-header-dropdown header-profile-dropdown"
                    aria-labelledby="mainHeaderProfile">
                    <li>
                        <a class="dropdown-item border-bottom" href="{{ route('profile.index') }}">
                            <i class="fs-13 me-2 bx bx-user"></i>
                            {{ __('Profil') }}
                        </a>
                    </li>
                    {{-- <li>
                        <a class="dropdown-item border-bottom" href="mail.html">
                            <i class="fs-13 me-2 bx bx-comment"></i>
                            {{ __('Pesan') }}
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a class="dropdown-item border-bottom" href="mail-settings.html">
                            <i class="fs-13 me-2 bx bx-cog"></i>
                            {{ __('Pengaturan') }}
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a class="dropdown-item border-bottom" href="faq's.html">
                            <i class="fs-13 me-2 bx bx-help-circle"></i>
                            {{ __('Bantuan') }}
                        </a>
                    </li> --}}
                    <li>
                        <a class="dropdown-item logout" href="#">
                            <i class="fs-13 me-2 bx bx-arrow-to-right"></i>
                            {{ __('Logout') }}
                        </a>
                        <form action="{{ route('logout') }}" method="post" id="form-logout">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|switcher-icon -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link switcher-icon ms-1"
                    data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
                    <i class="bx bx-cog bx-spin header-link-icon"></i>
                </a>
                <!-- End::header-link|switcher-icon -->
            </div>
            <!-- End::header-element -->
        </div>
        <!-- End::header-content-right -->
    </div>
    <!-- End::main-header-container -->
</header>
<!-- /app-header -->
