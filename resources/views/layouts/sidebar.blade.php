<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">

    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>

    <div class="sidebar-brand-text mx-3">Auth<sup>Crud</sup></div>
  </a>
  <hr class="sidebar-divider my-0">
  {{-- @if(in_array('Admin', Auth::user()->roles->pluck('name')->toArray()) || in_array('Admin', Auth::user()->roles->pluck('name')->toArray())) --}}

  <li class="nav-item">
    <a class="nav-link" href="{{ url('dashboard') }}">
      <i class="fas fa-fw fa-door-open" style="color:black"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/profile') }}">
      <i class="fas fa-fw fa-user" style="color:black"></i>
      <span>Profile</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('role/index') }}">
      <i class="fas fa-fw fa-tachometer-alt" style="color:black"></i>
      <span>Role</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('permission/index') }}">
      <i class="fas fa-fw fa-tachometer-alt" style="color:black"></i>
      <span>Permission</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('products') }}">
      <i class="fas fa-fw fa-tachometer-alt" style="color:black"></i>
      <span>Product</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="{{ url('category/index') }}">
      <i class="fas fa-fw fa-user" style="color:black"></i>
      <span>Category</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('attribute/index') }}">
      <i class="fas fa-fw fa-user" style="color:black"></i>
      <span>Attribute</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('users/index') }}">
      <i class="fas fa-fw fa-user" style="color:black"></i>
      <span>All User List</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('principle') }}">
      <i class="fas fa-fw fa-graduation-cap" style="color:black"></i>
      <span>Principle</span>
    </a>
  </li>

  {{-- @endif --}}

  {{-- @if(in_array('Admin', Auth::user()->roles->pluck('name')->toArray()) || in_array('Principle', Auth::user()->roles->pluck('name')->toArray())) --}}


  <li class="nav-item">
    <a class="nav-link" href="{{ url('teachers') }}">
      <i class="fas fa-fw fa-graduation-cap" style="color:black"></i>
      <span>Teachers</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('students') }}">
      <i class="fas fa-fw fa-graduation-cap" style="color:black"></i>
      <span>Students</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('books') }}">
      <i class="fas fa-fw fa-book" style="color:black"></i>
      <span>Books</span>
    </a>
  </li>

  {{-- @endif --}}

  {{-- @if(in_array('Admin', Auth::user()->roles->pluck('name')->toArray()) || in_array('Accountant', Auth::user()->roles->pluck('name')->toArray())) --}}
  <li class="nav-item">
    <a class="nav-link" href="{{ url('accounts') }}">
      <i class="fas fa-fw fa-file-invoice" style="color:black"></i>
      <span>Accounts</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('expensis') }}">
      <i class="fas fa-fw fa-file-invoice" style="color:black"></i>
      <span>Expenses</span>
    </a>
  </li>
  {{-- @endif --}}

  {{-- @if(in_array('Teacher', Auth::user()->roles->pluck('name')->toArray())) --}}

  <li class="nav-item">
    <a class="nav-link" href="{{ url('students') }}">
      <i class="fas fa-fw fa-graduation-cap" style="color:black"></i>
      <span>Students</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('books') }}">
      <i class="fas fa-fw fa-book" style="color:black"></i>
      <span>Books</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('posts/index') }}">
      <i class="fas fa-fw fa-graduation-cap" style="color:black"></i>
      <span>Post</span>
    </a>
  </li>

  {{-- @endif --}}
{{-- 
  <li class="nav-item">
    <a class="nav-link" href="{{ url('task') }}">
    <i class="fas fa-fw fa-check" style="color:black"></i>
      <span>Task</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('taskadd') }}">
    <i class="fas fa-fw fa-check" style="color:black"></i>
      <span>Add Task</span>
    </a>
  </li> --}}

 

  <hr class="sidebar-divider d-none d-md-block">

  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>