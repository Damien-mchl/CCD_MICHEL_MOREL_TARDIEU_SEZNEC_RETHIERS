<?php

namespace GEG\vue;
const AFFICHER_PLANNING = 1;
use GEG\modele\Creneau;
use Slim\Slim;

class VuePlanning
{
    public $app;

    public function __construct()
    {
      $this->app = Slim::getInstance();
    }

    public function afficherPlanning($semaine){
      $html="";
      for ($jour=1; $jour<=7 ; $jour++) {
        $jourL = "";
        switch ($jour) {
              case 1 :
                  $jourL = "Lundi";
                  break;
              case 2 :
                  $jourL = "Mardi";
                  break;
              case 3 :
                  $jourL = "Mercredi";
                  break;
              case 4 :
                  $jourL = "Jeudi";
                  break;
              case 5 :
                  $jourL = "Vendredi";
                  break;
              case 6 :
                  $jourL = "Samedi";
                  break;
              case 7 :
                  $jourL = "Dimanche";
                  break;
          }

        $creneaux = Creneau::where('semaine','=',$semaine)->where('jour','=',$jour)->orderBy('jour')->orderBy('heureDeb');
        $html.=<<<END
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2" >
                <div  style="text-align: center;font-size: 20px;padding-bottom: 10px;"class="text-xs font-weight-bold text-primary text-uppercase mb-1">$jourL</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
END;
        foreach ($creneaux as $c) {
          $besoins = $c->besoins();
          $heureDeb = $c['heureDeb'];
          $heureFin = $c['heureFin'];
          $html.=<<<END
          <div class="mb-4">
            <div class=" border-left-primary shadow  py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div style="text-align: center;font-size: 15px;"class="col mr-2" >
                    <p>De $heureDeb à $heureFin</p>
                    <div  style="text-align: center;font-size: 12px;"class="text-xs font-weight-bold text-primary text-uppercase mb-1">
END;
              foreach ($besoins as $b) {
                $role = $b->role_id()->get();
                $label = $role['label'];
                $html.=<<<END
                <div class="h5 mb-0 font-weight-bold text-gray-800">$label</div><div class="col-auto"></div>
END;
              }
              $html.=<<<END

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
END;
        }
        $html.=<<<END
        </div>
        </div>
        </div>
        </div>
        </div>
END;
      }
      return $html;
    }

    public function render($selecteur){
      $content = "";
      switch ($selecteur) {
            case AFFICHER_PLANNING :
                $content = $this->afficherPlanning('A');
                break;
        }
        $nom = $_SESSION['id_connect'];

        $urlRacine = $this->app->urlFor('racine');
        $urlCSS = $this->app->request->getRootURI() . '/www/css';
        $urlJS = $this->app->request->getRootURI() . '/www/js';
        $urlVendor = $this->app->request->getRootURI() . '/www/vendor';
        $html = <<<END

        <!DOCTYPE html>
        <html lang="en">

        <head>

          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>SB Admin 2 - Blank</title>

          <!-- Custom fonts for this template-->
          <link href="$urlVendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

          <!-- Custom styles for this template-->
          <link href="$urlCSS/sb-admin-2.css" rel="stylesheet">

        </head>

        <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

          <!-- Sidebar -->
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="$urlRacine">
              <div class="sidebar-brand-icon">
                <i class="fas fa-store" style="color: #ffe31a"></i>
              </div>
              <div class="sidebar-brand-text mx-3" style="color: #ffe31a">GEG<sup>  Nancy</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
              <a class="nav-link" href="$urlRacine">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Planning
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
              <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Graphiques</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
              <a class="nav-link" href="$urlRacine"+"planning">
                <i class="fas fa-fw fa-table"></i>
                <span>Créneaux</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          </ul>
          <!-- End of Sidebar -->

          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

              <!-- Topbar -->
              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                  <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-search fa-fw"></i>
                    </a>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mr-2 d-none d-lg-inline" style="color: #858796">$nom</span>
                      <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                      </a>
                    </div>
                  </li>

                </ul>

              </nav>
              <!-- End of Topbar -->

              <!-- Begin Page Content -->
              <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Créneaux</h1>

                <div class="tableauaffichage">
                  <div class="col-xl-3 col-md-6 mb-4">
                    $content
                  </div>
                </div>

                <div>
                  Création créneaux <form id="creaCre" method="post" action="" enctype='multipart/form-data'>
                  <select name="jour">
                    <option value="lun">Lundi</option>
                    <option value="mar">Mardi</option>
                    <option value="mer">Mercredi</option>
                    <option value="jeu">Jeudi</option>
                    <option value="ven">Vendredi</option>
                    <option value="sam">Samedi</option>
                    <option value="dim">Dimanche</option>
                  </select>
                  <select name="semaine">
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                  </select>
                  <input type="number" name="heureD" placeholder="Heure début">
                  <input type="number" name="heureF" placeholder="Heure fin">
                  <input type="submit">
                </form>
                  </form>
                </div>

              </div>
              <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Enerwin 2020</span>
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

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="$urlVendor/jquery/jquery.min.js"></script>
        <script src="$urlVendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="$urlVendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="$urlJS/sb-admin-2.js"></script>

        </body>

        </html>



END;
      echo $html;
    }
}
