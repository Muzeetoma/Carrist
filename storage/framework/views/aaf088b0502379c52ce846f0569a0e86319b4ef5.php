<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'QuickMech')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery.js')); ?>" ></script>
   
    <link href="<?php echo e(asset('sb_admin/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 <!-- Custom styles for this template -->
 <link href="<?php echo e(asset('sb_admin/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
 <link href="<?php echo e(asset('css/w3.css')); ?>" rel="stylesheet">
 <script src="<?php echo e(asset('sb_admin/js/bootstrap.min.js')); ?>"></script>
 <script src="<?php echo e(asset('sb_admin/js/bootbox.min.js')); ?>"></script>
 <link href="<?php echo e(asset('sb_admin/css/bootstrap.min.css')); ?>" rel="stylesheet">
 
 <!-- Custom styles for this page -->
 <link href="<?php echo e(asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
 <script src="<?php echo e(asset('sb_admin/js/jquery.js')); ?>"></script>
 <!--<script src="<?php echo e(asset('sb_admin/w3/w3.js')); ?>"></script>-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lineawesome/css/line-awesome.min.css')); ?>" rel="stylesheet">

       <style>
.bg-g {
   background-color: #000!important;
   background-image: -webkit-gradient(linear,left top,left bottom,color-stop(10%,#000;),to(#000;))!important;
   background-image: linear-gradient(to top right, #000 0%, #000 100%)!important;
   background-size: cover;
}
.page-item.active .page-link {
   z-index: 1;
   color: #fff;
   background-color: limegreen;
   border-color: limegreen;
}

   </style>
   <script>

   document.getElementById("spin").style.display = "block";

   </script>
</head>
<body id="page-top" onload="dontShow()">
 

  <!--spinner-->
      <div style="width:100%;height:100%;background-color:rgba(250,250,250,0.7);position:fixed;top:0;left:0;z-index:100" id="spin">
  <center>

       <div class="spinner-border text-primary" style="margin-top:25%"></div>
      </center>

  </div>

  <!--spinner-->
    <!-- Page Wrapper -->
 <div id="wrapper" style="background-color:#eee">
<!-- Sidebar -->
   <ul class="navbar-nav bg-g sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex" href="#">

       <div class="sidebar-brand-text mx-3">ADMIN</div>
     </a>

     <!-- Divider -->


     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
       <a class="nav-link" href="/admin">
         <i class="fas fa-fw fa-folder"></i>
         <span>Dasboard</span></a>
     </li>

     <!-- Divider -->

<hr class="sidebar-divider">

     <!-- Heading
     <div class="sidebar-heading" style='color:white'>
       Interface
     </div>-->

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
       <a class="nav-link" href="/admin/users">
         <i class="fas fa-fw fa-user"></i>
         <span>Users</span>
       </a>

     </li>

       <!-- Divider -->
       <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
     <a class="nav-link collapsed" href="<?php echo e(route('admin.carparts')); ?>">
       <i class="fas fa-fw fa-car"></i>
       <span>Car Parts</span>
     </a>

   </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo e(route('admin.dealers')); ?>">
         <i class="fas fa-fw fa-users"></i>
         <span>Dealers</span>
       </a>

     </li>
         <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo e(route('admin.dealer-types')); ?>">
         <i class="fas fa-fw fa-users">T</i>
         <span class="ml-2"> Dealer Types</span>
       </a>

     </li>

      <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo e(route('admin.mechanic-types')); ?>">
         <i class="fas fa-fw fa-cog"></i>
         <span>Mechanic Types</span>
       </a>

     </li>


       <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo e(route('admin.car-names')); ?>">
         <i class="fas fa-fw fa-car"></i>
         <span>Car Names</span>
       </a>

     </li>

       <!-- Divider -->


       <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="<?php echo e(route('logout')); ?>">
         <i class="fas fa-fw fa-arrow-left"></i>
         <span>Log out</span>
       </a>

     </li>
           <!-- Divider -->


     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
       <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>


   </ul>
   <!-- End of Sidebar -->


   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content" style="background-color:#eee">

         <br>

       <!-- Begin Page Content -->
       <div class="container-fluid" style="background-color:#eee">

     

         <!-- DataTales Example -->
         <div class="card shadow mb-4" style="border:none">
           <div class="card-header py-3" style="">

             <!--<h5 class="m-0 font-weight-bold text-dark">Dashboard</h5>-->

           </div>
           <div class="card-body">
           

        <div id="app">
      
        <main class="">
          <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->yieldContent('content'); ?>
        </main>
            </div>
           </div>
         </div>

       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->

     <!-- Footer -->
     <footer class="sticky-footer" style="background-color:#eee">
       <div class="container my-auto">
         <div class="copyright text-center my-auto">
           <span>Copyright &copy; 2021 Carrist.com</span>
         </div>
       </div>
     </footer>
     <!-- End of Footer -->

   </div>
   <!-- End of Content Wrapper -->

 </div>

 <!-- End of Page Wrapper -->
 <!-- Scroll to Top Button-->

 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
 </a>


<script>


   function showSpinner(){

       document.getElementById("spin").style.display = "block";
   }
    function dontShow(){
        document.getElementById("spin").style.display = "none";
    }

   </script>
 <!-- Bootstrap core JavaScript-->
 
 <script src="<?php echo e(asset('sb_admin/vendor/jquery/jquery.min.js')); ?>"></script>
 <script src="<?php echo e(asset('sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?php echo e(asset('sb_admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?php echo e(asset('sb_admin/js/sb-admin-2.min.js')); ?>"></script>

 <!-- Page level plugins -->
 <script src="<?php echo e(asset('sb_admin/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
 <script src="<?php echo e(asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

 <!-- Page level custom scripts -->
 <script src="<?php echo e(asset('sb_admin/js/demo/datatables-demo.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\USER\carrier\resources\views/layouts/admin.blade.php ENDPATH**/ ?>