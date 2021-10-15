<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">لوحة التحكم</li>
                     <!-- Redeny -->
                      <!-- Admin Panel -->

                @if(auth()->user()->type == "admin")

                    <!-- admins -->
                    <li>
                        <a href="{{ route('admins.index') }}">
                            <i class="dripicons-network-1"></i>
                            <span>المشرفون</span>
                        </a>
                    </li>

                    <!-- Categories -->
                    <li>
                        <a href="{{ route('admin-categories.index') }}">
                            <i class="dripicons-network-1"></i>
                            <span>الأقسام</span>
                        </a>
                    </li>


                    <!-- admins -->
                    <li>
                        <a href="{{ route('admin-news.index') }}">
                            <i class="dripicons-network-1"></i>
                            <span>الأخبار</span>
                        </a>
                    </li>

                    <!-- sponsors -->
                    <li>
                        <a href="{{ route('admin-sponsors.index') }}">
                            <i class="dripicons-network-1"></i>
                            <span>الإعلانات</span>
                        </a>
                    </li>

                    <!-- admins -->
                    <li>
                        <a href="{{ route('admin-contacts.index') }}">
                            <i class="dripicons-network-1"></i>
                            <span>الشكاوي</span>
                        </a>
                    </li>
                @else

                    <!-- add news -->
                        <li>
                            <a href="{{ route('admin-news.create') }}">
                                <i class="dripicons-network-1"></i>
                                <span>إضافة خبر</span>
                            </a>
                        </li>

                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
