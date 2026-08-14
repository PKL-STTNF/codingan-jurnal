<!-- OVERLAY MOBILE -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>


<!-- TOMBOL MENU MOBILE -->
<button class="mobile-menu-btn" id="mobileMenuBtn">
    <i class="bi bi-list"></i>
</button>


<div class="admin-sidebar" id="adminSidebar">

    <!-- LOGO -->
    <div class="admin-logo">

        <a href="{{ route('admin.dashboard') }}">

            <i class="bi bi-speedometer2"></i>

            <span>Admin Jurnal PKL</span>

        </a>

    </div>


    <!-- MENU -->
    <div class="admin-menu">

        <div class="menu-title">
            MENU UTAMA
        </div>


        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2-fill"></i>

            <span>Dashboard</span>

        </a>


        <a href="{{ route('admin.latest-journals') }}"
           class="{{ request()->routeIs('admin.latest-journals') ? 'active' : '' }}">

            <i class="bi bi-clock-history"></i>

            <span>Jurnal Terbaru</span>

        </a>


        <a href="{{ route('admin.journals') }}"
           class="{{ request()->routeIs('admin.journals') ? 'active' : '' }}">

            <i class="bi bi-journal-text"></i>

            <span>Semua Jurnal</span>

        </a>


        <a href="{{ route('admin.users') }}"
           class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">

            <i class="bi bi-people-fill"></i>

            <span>Kelola User</span>

        </a>

    </div>


    <!-- USER -->
    <div class="admin-bottom">

        <div class="admin-user">

            <div class="admin-avatar">

                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

            </div>

            <div>

                <strong>
                    {{ Auth::user()->name }}
                </strong>

                <small>
                    Administrator
                </small>

            </div>

        </div>


        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                    class="logout-btn">

                <i class="bi bi-box-arrow-left"></i>

                Logout

            </button>

        </form>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const menuBtn = document.getElementById('mobileMenuBtn');
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        sidebar.classList.add('show');
        overlay.classList.add('show');
    }

    function closeSidebar() {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
    }

    menuBtn.addEventListener('click', function () {

        if (sidebar.classList.contains('show')) {
            closeSidebar();
        } else {
            openSidebar();
        }

    });

    overlay.addEventListener('click', closeSidebar);


    // Tutup sidebar setelah memilih menu di HP
    sidebar.querySelectorAll('a').forEach(function (link) {

        link.addEventListener('click', function () {

            if (window.innerWidth <= 768) {
                closeSidebar();
            }

        });

    });

});

</script>