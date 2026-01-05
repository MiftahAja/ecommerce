<nav class="sidebar-nav scroll-sidebar" data-simplebar>
  <ul id="sidebarnav">

    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">MAIN</span>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
         href="{{ route('admin.dashboard') }}">
        <i class="ti ti-layout-dashboard"></i>
        <span class="hide-menu">Dashboard</span>
      </a>
    </li>

    <li class="nav-small-cap mt-3">
      <span class="hide-menu">MANAGEMENT</span>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
         href="{{ route('admin.categories.index') }}">
        <i class="ti ti-tag"></i>
        <span class="hide-menu">Categories</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
         href="{{ route('admin.products.index') }}">
        <i class="ti ti-list-check"></i>
        <span class="hide-menu">Products</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
         href="{{ route('admin.orders.index') }}">
        <i class="ti ti-alert-circle"></i>
        <span class="hide-menu">Orders</span>
      </a>
    </li>

    <li class="nav-small-cap mt-3">
      <span class="hide-menu">REPORTS</span>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}"
         href="{{ route('admin.reports.sales') }}">
        <i class="ti ti-chart-bar"></i>
        <span class="hide-menu">Sales Reports</span>
      </a>
    </li>

  </ul>
</nav>
