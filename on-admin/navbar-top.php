<?php
if (!defined("ADMIN_PAGE")) {
    die('cannot direct access, use index.php please');
}
 ?>
 <header class="main-header">
   <!-- Logo -->
   <a href="#" class="logo">
     <!-- mini logo for sidebar mini 50x50 pixels -->
     <span class="logo-mini"><b>B</b>TH</span>
     <!-- logo for regular state and mobile devices -->
     <span class="logo-lg"><b>INVENTORY</b> BTH</span>
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
     <!-- Sidebar toggle button-->
     <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
       <span class="sr-only">Toggle navigation</span>
     </a>

     <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">

         <!-- User Account: style can be found in dropdown.less -->
         <li class="dropdown user user-menu">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">

             <span class="hidden-xs"><?=$userObject->nama?></span>
           </a>
         </li>
         <!-- User Account: style can be found in dropdown.less -->
         <li>
           <a href="../logout.php" >
             <span class="hidden-xs">Logout</span>
           </a>
         </li>
       </ul>
     </div>
   </nav>
 </header>
