<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ URL::to('/') }}">
                <i class="bi bi-view-stacked"></i>
                <span>View Site</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/auth/contents">
                        <i class="bi bi-circle"></i><span>Content</span>
                    </a>
                </li>
                <li>
                    <a href="/auth/menus">
                        <i class="bi bi-circle"></i><span>Menu</span>
                    </a>
                </li>
                <li>
                    <a href="/auth/posts">
                        <i class="bi bi-circle"></i><span>Post</span>
                    </a>
                </li>
                <li>
                    <a href="/auth/banners">
                        <i class="bi bi-circle"></i><span>Banner</span>
                    </a>
                </li>
                <li>
                    <a href="/auth/categories">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
            </ul>
        </li>



    </ul>


</aside><!-- End Sidebar-->
