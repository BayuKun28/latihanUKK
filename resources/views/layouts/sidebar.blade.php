 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/" class="brand-link">
         <img src="{{ asset('') }}dist/img/AdminLTELogo.png" alt="E-KASIR Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">E-KASIR SMK</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="/" class="nav-link">
                         <i class="fas fa-home mr-2"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/kategori" class="nav-link">
                         <i class="fas fa-box mr-2"></i>
                         <p>
                             Kategori
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/satuan" class="nav-link">
                         <i class="fas fa-boxes mr-2"></i>
                         <p>
                             Satuan
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/product" class="nav-link">
                         <i class="fas fa-shopping-bag mr-2"></i>
                         <p>
                             Product
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/users" class="nav-link">
                         <i class="fas fa-user mr-2"></i>
                         <p>
                             Manage Users
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
