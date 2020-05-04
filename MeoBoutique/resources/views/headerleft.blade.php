<nav class="sidebar-nav">
    <ul id="sidebar-menu">
        <li class="nav-devider"></li>
        <li class="nav-label"><a href="{{ route('trang-chu', $admin->id) }}">Home</a></li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-columns"></i><span class="hide-menu">Quản lí sản phẩm</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('them-san-pham-gio-hang', $admin->id) }}">Thêm sản phẩm</a></li>
                <li><a href="{{ route('danh-sach-san-pham', $admin->id) }}">Danh sách sản phẩm</a></li>
                <li><a href="{{ route('them-phieu-tra-don-hang', $admin->id) }}">Phiếu trả</a></li>
            </ul>
        </li>

        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Quản lí đơn hàng</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('danh-sach-don-hang', $admin->id) }}">Đơn hàng mới tạo</a></li>
                <li><a href="{{ route('danh-sach-don-hang-da-thanh-toan', $admin->id) }}">Đơn hàng đã thanh toán</a></li>
                <li><a href="{{ route('danh-sach-don-hang-bi-tra', $admin->id) }}">Đơn hàng bị trả</a></li>
            </ul>
        </li>

        
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Danh thu</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('danh-thu-shop', [$admin->id, 2020]) }}">Năm 2020</a></li>
                <li><a href="{{ route('danh-thu-shop', [$admin->id, 2021]) }}">Năm 2021</a></li>
            </ul>
        </li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Quản lí cộng tác viên</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="ui-alert.html">Thêm cộng tác viên</a></li>
                <li><a href="ui-alert.html">Danh sách cộng tác viên</a></li>
                <li><a href="ui-alert.html">Thêm sản phẩm cộng tác viên</a></li>
                <li><a href="ui-alert.html">Doanh thu cộng tác viên</a></li>

            </ul>
        </li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Quản lí loại sản phẩm</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('them-loai-san-pham', $admin->id ) }}">Thêm loại sản phẩm</a></li>
            </ul>
        </li>

        
        <!--
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Tables</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="table-bootstrap.html">Basic Tables</a></li>
                <li><a href="table-datatable.html">Data Tables</a></li>
            </ul>
        </li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="ti-wallet m-r-5"></i><span class="hide-menu">Widgets</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="widget.html">Widgets</a></li>
            </ul>
        </li>
        <li class="nav-label">EXTRA</li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Sample Pages <span class="label label-rouded label-success pull-right">8</span></span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#" class="has-arrow">Authentication <span class="label label-rounded label-success">3</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-invoice.html">Invoice</a></li>
                    </ul>
                </li>
                <li><a href="#" class="has-arrow">Error Pages</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="page-error-400.html">400</a></li>
                        <li><a href="page-error-403.html">403</a></li>
                        <li><a href="page-error-404.html">404</a></li>
                        <li><a href="page-error-500.html">500</a></li>
                        <li><a href="page-error-503.html">503</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-map-marker"></i><span class="hide-menu">Maps</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="map-vector.html">Vector Map</a></li>
            </ul>
        </li>
        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-level-down"></i><span class="hide-menu">Multi level dd</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#">item 1.1</a></li>
                <li><a href="#">item 1.2</a></li>
                <li> <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">item 1.3.1</a></li>
                        <li><a href="#">item 1.3.2</a></li>
                        <li><a href="#">item 1.3.3</a></li>
                        <li><a href="#">item 1.3.4</a></li>
                    </ul>
                </li>
                <li><a href="#">item 1.4</a></li>
            </ul>
        </li> -->
    </ul>
</nav>