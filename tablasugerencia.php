<?php
session_start();
         if ($_SESSION){     
                           if ($_SESSION["perfil"]=="admin"){
                
                           }else{
                                header("location:index.php"); 
                           }
                            
                }else{
                    header("location:index.php");
                }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Administración</title>
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
            <li><a href="tablatipoproducto.php">Tabla Tipo Producto</a></li>
            <li><a href="tablaimagenproducto.php">Tabla Imagen Producto</a></li>
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
        <li class="breadcrumb-item active">Tabla Sugerencia</li>
      </ol>
    <ol class="breadcrumb">
        <a href="crearSugerenciaPA.php?mensaje="><button class="btn btn-primary btn-block">Crear</button></a>
      </ol>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Sugerencias</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Usuario</th>
                  <th>Tema</th>
                  <th>Mensaje</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  require_once('sugerenciaCollector.php');
                  $objeto = new sugerenciaCollector();
                  $arrayCre = $objeto->showSugerencia();
                  foreach($arrayCre as $cre){
                      echo "<tr>";
                      echo "<td>". $cre->getIdsugerencia() . "</td>";
                      echo "<td>". $cre->getNombre() . "</td>";
                      echo "<td>". $cre->getTema() . "</td>";
                      echo "<td>". $cre->getMensaje() . "</td>";
                      $envio = $cre->getIdsugerencia();
                      echo "<td>". "<a href='editarSugerenciaPA.php?id=$envio'><button class='material-icons button2 edit'>edit</button></a>" . "</td>";
                      echo "<td>". "<a href='eliminarSugerencia.php?id=$envio'><button class='material-icons button2 delete'>delete</button></a>" . "</td>";
                  }
                 
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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
            <h5 class="modal-title" id="exampleModalLabel">Estas seguro?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Logout" para cerrar session.</div>
          <div class="modal-footer">
              <form action="logout.php">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              
               <a class="btn btn-primary" href="logout.php">Logout</a>
              </form>
           
          </div>
        </div>
      </div>
    </div>
      <!-- eliminar Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="js2/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js2/sb-admin-datatables.min.js"></script>
    <script src="js2/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
