<?php
function active($currect_page)
{
  $url_array =  explode('/', $_SERVER['REQUEST_URI']); // current page url
  $url = end($url_array);
  if ($currect_page == $url) {
    echo 'active'; //class name in css 
  }
}
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo url('admin/images/logos/favicon.png') ?>" />
  <link rel="stylesheet" href="<?php echo url('admin/css/styles.min.css') ?>" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          <img src="assets/images/logos/logo-wrappixel.svg" alt="" width="150">
        </a>


      </div>

      <div class="d-lg-flex align-items-center gap-2">
        <h3 class="text-white mb-2 mr-2 mb-lg-0 fs-5 text-center">
          Hi... {{session()->get('aname') }} 
        </h3>
        <div class="d-flex align-items-center justify-content-center gap-2">

          <div class="dropdown d-flex">
            <a class="btn btn-primary d-flex align-items-center gap-1 " href="javascript:void(0)" id="drop4"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-shopping-cart fs-5"></i>
              Buy Now
              <i class="ti ti-chevron-down fs-5"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="assets/images/logos/logo.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-layout-grid"></i>
                  </span>
                  <span class="hide-menu">Categories</span>
                </div>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between"
                    href="add_categories">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Add Categories</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between"
                    href="manage_categories">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Manage Categories</span>
                    </div>

                  </a>
                </li>


            </li>
          </ul>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-layout-grid"></i>
                </span>
                <span class="hide-menu">Services</span>
              </div>
            </a>
            <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="add_services">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Add Service</span>
                  </div>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link justify-content-between"
                  href="manage_services">
                  <div class="d-flex align-items-center gap-3">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage Service</span>
                  </div>
                </a>
              </li>
          </li>
          </ul>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="/manage_contacts" aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Manage Contact</span>
              </div>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="/manage_customers" aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Manage Customers</span>
              </div>
            </a>
          </li>


          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->