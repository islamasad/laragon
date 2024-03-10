<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link href="/css/dashboard.css" rel="stylesheet">
        <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="/vendor/simple-datatables/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigasi -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Kosman</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="nav-link" href="">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Konten -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">
        
              <li class="nav-item">
                <a class="nav-link " href="index.html">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
                </a>
              </li><!-- End Dashboard Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="components-alerts.html">
                      <i class="bi bi-circle"></i><span>Alerts</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-accordion.html">
                      <i class="bi bi-circle"></i><span>Accordion</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-badges.html">
                      <i class="bi bi-circle"></i><span>Badges</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-breadcrumbs.html">
                      <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-buttons.html">
                      <i class="bi bi-circle"></i><span>Buttons</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-cards.html">
                      <i class="bi bi-circle"></i><span>Cards</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-carousel.html">
                      <i class="bi bi-circle"></i><span>Carousel</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-list-group.html">
                      <i class="bi bi-circle"></i><span>List group</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-modal.html">
                      <i class="bi bi-circle"></i><span>Modal</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-tabs.html">
                      <i class="bi bi-circle"></i><span>Tabs</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-pagination.html">
                      <i class="bi bi-circle"></i><span>Pagination</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-progress.html">
                      <i class="bi bi-circle"></i><span>Progress</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-spinners.html">
                      <i class="bi bi-circle"></i><span>Spinners</span>
                    </a>
                  </li>
                  <li>
                    <a href="components-tooltips.html">
                      <i class="bi bi-circle"></i><span>Tooltips</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Components Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="forms-elements.html">
                      <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                  </li>
                  <li>
                    <a href="forms-layouts.html">
                      <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                  </li>
                  <li>
                    <a href="forms-editors.html">
                      <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                  </li>
                  <li>
                    <a href="forms-validation.html">
                      <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Forms Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="tables-general.html">
                      <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                  </li>
                  <li>
                    <a href="tables-data.html">
                      <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Tables Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="charts-chartjs.html">
                      <i class="bi bi-circle"></i><span>Chart.js</span>
                    </a>
                  </li>
                  <li>
                    <a href="charts-apexcharts.html">
                      <i class="bi bi-circle"></i><span>ApexCharts</span>
                    </a>
                  </li>
                  <li>
                    <a href="charts-echarts.html">
                      <i class="bi bi-circle"></i><span>ECharts</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Charts Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="icons-bootstrap.html">
                      <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                    </a>
                  </li>
                  <li>
                    <a href="icons-remix.html">
                      <i class="bi bi-circle"></i><span>Remix Icons</span>
                    </a>
                  </li>
                  <li>
                    <a href="icons-boxicons.html">
                      <i class="bi bi-circle"></i><span>Boxicons</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Icons Nav -->
        
              <li class="nav-heading">Pages</li>
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
                </a>
              </li><!-- End Profile Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>F.A.Q</span>
                </a>
              </li><!-- End F.A.Q Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                  <i class="bi bi-envelope"></i>
                  <span>Contact</span>
                </a>
              </li><!-- End Contact Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-register.html">
                  <i class="bi bi-card-list"></i>
                  <span>Register</span>
                </a>
              </li><!-- End Register Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                  <i class="bi bi-box-arrow-in-right"></i>
                  <span>Login</span>
                </a>
              </li><!-- End Login Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.html">
                  <i class="bi bi-dash-circle"></i>
                  <span>Error 404</span>
                </a>
              </li><!-- End Error 404 Page Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" href="pages-blank.html">
                  <i class="bi bi-file-earmark"></i>
                  <span>Blank</span>
                </a>
              </li><!-- End Blank Page Nav -->
        
            </ul>
        
        </aside><!-- End Sidebar-->
        
        <main id="main" class="main mt-0">
        
            <div class="pagetitle">
              <h1>Dashboard</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
        
            <section class="section dashboard">
              <div class="row">
        
                <!-- Left side columns -->
                <div class="col-lg-8">
                  <div class="row">
        
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                      <div class="card info-card sales-card">
        
                        <div class="filter">
                          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                              <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                          </ul>
                        </div>
        
                        <div class="card-body">
                          <h5 class="card-title">Sales <span>| Today</span></h5>
        
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                              <h6>145</h6>
                              <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
        
                            </div>
                          </div>
                        </div>
        
                      </div>
                    </div><!-- End Sales Card -->
        
                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                      <div class="card info-card revenue-card">
        
                        <div class="filter">
                          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                              <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                          </ul>
                        </div>
        
                        <div class="card-body">
                          <h5 class="card-title">Revenue <span>| This Month</span></h5>
        
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                              <h6>$3,264</h6>
                              <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
        
                            </div>
                          </div>
                        </div>
        
                      </div>
                    </div><!-- End Revenue Card -->
        
                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">
        
                      <div class="card info-card customers-card">
        
                        <div class="filter">
                          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                              <h6>Filter</h6>
                            </li>
        
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                          </ul>
                        </div>
        
                        <div class="card-body">
                          <h5 class="card-title">Customers <span>| This Year</span></h5>
        
                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                              <h6>1244</h6>
                              <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
        
                            </div>
                          </div>
        
                        </div>
                      </div>
        
                    </div><!-- End Customers Card -->
         
                  </div>
                </div><!-- End Left side columns -->
        
                <!-- Right side columns -->
                <div class="col-lg-4">
        
                  <!-- Recent Activity -->
                  <div class="card">
                    <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                        </li>
        
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div>
        
                    <div class="card-body">
                      <h5 class="card-title">Recent Activity <span>| Today</span></h5>
        
                      <div class="activity">
        
                        <div class="activity-item d-flex">
                          <div class="activite-label">32 min</div>
                          <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                          <div class="activity-content">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                          </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                          <div class="activite-label">56 min</div>
                          <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                          <div class="activity-content">
                            Voluptatem blanditiis blanditiis eveniet
                          </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                          <div class="activite-label">2 hrs</div>
                          <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                          <div class="activity-content">
                            Voluptates corrupti molestias voluptatem
                          </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                          <div class="activite-label">1 day</div>
                          <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                          <div class="activity-content">
                            Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                          </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                          <div class="activite-label">2 days</div>
                          <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                          <div class="activity-content">
                            Est sit eum reiciendis exercitationem
                          </div>
                        </div><!-- End activity item-->
        
                        <div class="activity-item d-flex">
                          <div class="activite-label">4 weeks</div>
                          <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                          <div class="activity-content">
                            Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                          </div>
                        </div><!-- End activity item-->
        
                      </div>
        
                    </div>
                  </div><!-- End Recent Activity -->
        
                </div><!-- End Right side columns -->
        
              </div>
            </section>
        
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer><!-- End Footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <!-- Vendor JS Files -->
        <script src="/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/vendor/chart.js/chart.umd.js"></script>
        <script src="/vendor/echarts/echarts.min.js"></script>
        <script src="/vendor/quill/quill.min.js"></script>
        <script src="/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="/vendor/tinymce/tinymce.min.js"></script>
        <script src="/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="js/dashboard.js"></script>
    </body>
</html>
