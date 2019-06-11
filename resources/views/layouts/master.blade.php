<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SIDS MEMBERSHIP</title>
  <link rel="icon" href="{!! asset('./images/logoSIDS1.jpg') !!}"/>

  <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel ="stylesheet" href="{{ asset('/css/app.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href=" {{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">                <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"  type='text/css'>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      
    </ul>

    


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div>
  
    <a href="/home" class="brand-link">

      <div>
      <img src="{{ asset('./images/logoSIDS1.jpg')}}" alt="SIDSMembership Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      </div>

      <span class="brand-text font-weight-light">SIDS MEMBERSHIP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('./images/avatar2.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->username }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font libravry -->
               <li class="nav-item">
                <a href="/home" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                   Dashboard
                  </p>
                </a>
              </li>

              @if(Auth::user()->admin != '1')

              <li class="nav-item">
                <a href="/memberform" class="nav-link">
                  <i class="nav-icon fab fa-wpforms"></i><p>
                   Registration Form
                  </p>
                </a>
              </li>
             @endif

              <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Manage Members
                      <i class="right fa fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: block;">
                     <li class="nav-item">
                      <a href="/members" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Member Details</p>
                      </a>
                  
                        <li class="nav-item">
                       <a href="/membershipdetails" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                         <p>Membership</p>
                       </a>
                     </li>
                    </li>
                   </ul>
                </li>

                @if(Auth::user()->admin)
                <li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-user-plus"></i>
                      <p>
                        Manage Users
                        <i class="right fa fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">

                       <li class="nav-item">
                        <a href="{{ route('user.create')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Add New User</p>
                        </a>

                          <li class="nav-item">
                         <a href="{{ route('users')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                           <p>User Details</p>
                         </a>
                       </li>
                      </li>
                     </ul>
                  </li>
                  @endif

              <li class="nav-item">
                  <a href="{{ route('user.profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>  
                  <p>My Profile</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="/generateReport" class="nav-link">
                    <i class="nav-icon fas fa-address-book"></i>  
                <p>Reports</p>
                </a>
              </li>


            <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-power-off red"></i>
              <p>
               Logout
              </p>
            </a>
          </li>
          
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <p>
    @include('messages')
    @yield('content')
    </p>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>

@yield('scripts')
<script src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="bootstrap-show-password.min.js"></script>
<script>
    var pwd = document.getElementById('pwd');
    var eye = document.getElementById('eye');

    eye.addEventListener('click', togglePass);

    function togglePass(){
    eye.classList.toggle('active');

    (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
    }


</script>
</body>
</html>
