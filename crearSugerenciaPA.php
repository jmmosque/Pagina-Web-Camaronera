<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Camaron Latino</a>
    
      
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user-md"></i>
            <span class="nav-link-text">Usuario</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li><a href="indexadministrativo.php">Tabla Usuario</a></li>
            <li><a href="tablacredencial.php">Tabla Credencial</a></li>
            <li><a href="tablarol.php">Tabla Rol</a></li>
            <li><a href="tablasugerencia.php">Tabla Sugerencia</a></li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file-text-o"></i>
            <span class="nav-link-text">Publicacion</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
            <li><a href="tablapublicacion.php">Tabla Publicacion</a></li>
            <li><a href="tablacomentario.php">Tabla Comentario</a></li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-server"></i>
            <span class="nav-link-text">Servicio</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents3">
            <li><a href="tablaservicio.php">Tabla Servicio</a></li>
            <li><a href="tablatiposervicio.php">Tabla Tipo Servicio</a></li>
            <li><a href="tablaimagenservicio.php">Tabla Imagen Servicio</a></li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-product-hunt"></i>
            <span class="nav-link-text">Producto</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents4">
            <li><a href="tablaproducto.php">Tabla Producto</a></li>
            <li><a href="tablatiposervicio.php">Tabla Tipo Servicio</a></li>
            <li><a href="tablaimagenservicio.php">Tabla Imagen Servicio</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="tablasugerencia.php">Sugerencia</a>
        </li>
        <li class="breadcrumb-item active">Creacion Sugerencia</li>
      </ol>
   <section id="tamasec">

        <div class="containerlogin">
            <div class="card card-register mx-auto mt-5">
              <div class="card-header">Crear  </div>
              <div class="card-body">
                <form action="crearSugerencia.php" method="post">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label>Ingrese Tema</label>
                        <input class="form-control" placeholder="" name="tem">
                      </div>
                      <div class="col-md-6">
                        <label>Elija Usuario</label><br>
                          <?php 
                          require_once('usuarioCollector.php');
                          $objeto = new usuarioCollector();
                          $array = $objeto->showUsuarios();
                          echo "<select name='select'>";
                            foreach($array as $r){
                                $id = $r->getIdUsuario();
                                $no = $r->getNombre();
                                echo "<option value='$id' selected>$no</option>";
                            }
                          echo "</select>";
                          ?>
                      </div>
                    </div>
                  
                  <div class="form-group">
                    <label>Mensaje</label>
                    <!--<input class="form-control" placeholder="" name="des">-->
                    <textarea name="message" id="message" required="required" class="form-control" rows="6"></textarea>
                  </div>
                     <button button class="btn btn-primary btn-block" type="submit"> Crear </button>
                </form>
              </div>
            </div>
          </div>
    </section>   
     
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <form action="logout.php">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a class="btn btn-primary" href="logout.php">Logout</a>
              </form>
           
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js2/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js2/sb-admin-datatables.min.js"></script>
    <script src="js2/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
