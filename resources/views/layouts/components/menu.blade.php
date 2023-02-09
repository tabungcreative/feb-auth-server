<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-home"></i>
        <span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Daftar Menu
</div>


<!-- Nav Item - Charts -->
{{-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-id-card"></i>
        <span>Personal Info</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-lock"></i>
        <span>Keamanan</span></a>
</li> --}}

@can('manage-user')
<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('user.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>User</span></a>
</li>
@endcan

@can('manage-role')
<li class="nav-item">
    <a class="nav-link" href="{{ route('role.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Hak Akses</span></a>
</li>
@endcan

@can('manage-oauth')
<li class="nav-item">
    <a class="nav-link" href="{{ route('client.index') }}">
        <i class="fas fa-fw fa-desktop"></i>
        <span>OAouth</span></a>
</li>
@endcan
