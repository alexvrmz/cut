<!DOCTYPE html>
<html lang="es_MX">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Centro Universitario Tlacaélel
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/estilos.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/estilos.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.4.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="../assets/js/axios.min.js"></script>
</head>

<body class=" sidebar-mini ">
  <div class="wrapper ">
    <div class="sidebar" data-color="red">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <div class="photo">
          <a href="https://cutlacaelel.ml" class="simple-text logo-mini">
            <img src="../imagenes/logocut.png">
          </a>
        </div>
        <a href="https://cutlacaelel.ml" class="simple-text logo-normal">
          CU Tlacaélel
        </a>
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-simple btn-icon btn-neutral btn-round">
            <i class="now-ui-icons text_align-center visible-on-sidebar-regular"></i>
            <i class="now-ui-icons design_bullet-list-67 visible-on-sidebar-mini"></i>
          </button>
        </div>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="../imagenes/img-avatar.gif" />
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                Júan Alvarez
                <b class="caret"></b><br>
                <small>ID: 201502156 | 2<sup>do</sup> Semestre</small>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">MP</span>
                    <span class="sidebar-normal">Mi perfil</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">EP</span>
                    <span class="sidebar-normal">Editar Perfil</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">A</span>
                    <span class="sidebar-normal">Ajustes</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">

          <?php if($_SERVER['PHP_SELF'] == '/front/principal.php'){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
            <a href="principal.php">
              <i class="now-ui-icons design_app"></i>
              <p>Principal</p>
            </a>
          </li>

          <?php if($_SERVER['PHP_SELF'] == '/front/calificaciones.php'){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
            <a href="calificaciones.php">
              <i class="now-ui-icons business_chart-pie-36"></i>
              <p>Calificaciones</p>
            </a>
          </li>

          <?php if($_SERVER['PHP_SELF'] == '/front/inscripcion-actual.php'){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
            <a data-toggle="collapse" href="#componentsExamples" aria-expanded="true">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>
                Inscripciones
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse  <?php if($_SERVER['PHP_SELF'] == '/front/inscripcion-actual.php'){ ?>show<?php } ?> " id="componentsExamples">
              <ul class="nav">
                <?php if($_SERVER['PHP_SELF'] == '/front/inscripcion-actual.php'){ ?>
                <li class="active">
                <?php } else { ?>
                <li>
                <?php } ?>
                  <a href="../front/inscripcion-actual.php">
                    <span class="sidebar-mini-icon">IA</span>
                    <span class="sidebar-normal"> Inscripción Actual </span>
                  </a>
                </li>
                <li>
                  <a href="../../examples/components/grid.html">
                    <span class="sidebar-mini-icon">1<sup>er</sup></span>
                    <span class="sidebar-normal"> Semestre </span>
                  </a>
                </li>
                
              </ul>
            </div>
          </li>

          <?php if($_SERVER['PHP_SELF'] == '/front/talleres.php'){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
            <a href="talleres.php">
              <i class="now-ui-icons ui-2_settings-90"></i>
              <p>Talleres</p>
            </a>
          </li>

          <?php if($_SERVER['PHP_SELF'] == '/front/planes-de-estudio.php'){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
            <a href="planes-de-estudio.php">
              <i class="now-ui-icons text_align-left"></i>
              <p>Planes de Estudios</p>
            </a>
          </li>

          <?php if($_SERVER['PHP_SELF'] == '/front/finanzas.php'){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
            <a href="finanzas.php">
              <i class="now-ui-icons business_chart-bar-32"></i>
              <p>Finanzas</p>
            </a>
          </li>

          <?php if($_SERVER['PHP_SELF'] == '/front/calendario.php'){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
            <a href="calendario.php">
              <i class="now-ui-icons ui-1_calendar-60"></i>
              <p>Calendario</p>
            </a>
          </li>

          <?php if($_SERVER['PHP_SELF'] == '/front/alumnos.php' || $_SERVER['PHP_SELF'] == '/front/profesores.php'){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
          <?php } ?>
            <a data-toggle="collapse" href="#componentsExamples2" aria-expanded="true">
              <i class="now-ui-icons loader_gear"></i>
              <p>Administración<b class="caret"></b>
              </p>
            </a>
            <div class="collapse  <?php if($_SERVER['PHP_SELF'] == '/front/alumnos.php' || $_SERVER['PHP_SELF'] == '/front/profesores.php'){ ?>show<?php } ?> " id="componentsExamples2">
              <ul class="nav">
                <?php if($_SERVER['PHP_SELF'] == '/front/alumnos.php'){ ?>
                <li class="active">
                <?php } else { ?>
                <li>
                <?php } ?>
                  <a href="../front/alumnos.php">
                    <span class="sidebar-mini-icon">A</span>
                    <span class="sidebar-normal"> Alumnos </span>
                  </a>
                </li>
                <?php if($_SERVER['PHP_SELF'] == '/front/profesores.php'){ ?>
                <li class="active">
                <?php } else { ?>
                <li>
                <?php } ?>
                  <a href="../front/profesores.php">
                    <span class="sidebar-mini-icon">P</span>
                    <span class="sidebar-normal"> Profesores </span>
                  </a>
                </li>
                
              </ul>
            </div>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"><?php echo basename($_SERVER['PHP_SELF'], '.php'); ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->