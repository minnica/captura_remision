<?php 
require("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- estilo bootstrap4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- estilo de datatable con bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>   
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-md bg-light navbar-light">
        <a class="navbar-brand" href="#">Grupo <span class="text-danger">G</span>ilbert&#174;</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../areas.php">MENÚ ÁREAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">MENÚ MÓDULOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="../../logout.php">CERRAR SESIÓN</a>
                </li>
            </ul>
        </div>
    </nav>
    <header align="center">
        <h4 class="text-dark">CAPTURA   DE    REMISIONES</h4>
    </header>
    <div class="container-fluid bg-light">
        <form name="frmProduct" method="post" action="" id="frmProduct">
            <div class="row">
                <div class="col-4">
                    <input class="btn btn-outline-dark"  type="button" name="agregar_registros"value="Agregar Mas" onClick="AgregarMas();" />
                    <input class="btn btn btn-outline-danger" type="button" name="borrar_registros" value="Borrar Campos" onClick="BorrarRegistro();" />
                    <input class="btn btn-outline-success" type="submit" name="guardar" value="Guardar Ahora" />
                </div>
                <div class="col-4"><span class="success"><?php if(isset($resultado)) { echo $resultado; }?></span></div>
                <div class="col-4"></div>
            </div>            
            <hr>             
            <div class="table-responsive rounded">
                <table id="example" class="table rounded table-light table-bordered table-sm" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>OTA</th>
                            <th>REMISION</th>
                            <th>PROYECTO</th>
                            <th>DIRECCION</th>
                            <th>TALLER</th>
                            <th>MARCA</th>
                            <th>CANTIDAD</th>
                            <th>PU</th>
                            <th>REV</th>
                            <th>COMENTARIOS</th>
                        </tr>
                    </thead>                   
                    <tbody id="productos">
                        <?php require_once("InputDinamico.php") ?>             
                    </tbody>
                </table>                
            </div>            
        </div>
    </form>   
    <!-- Placed at the end of the document so the pages load faster --> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- scripts datatables -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!-- scripts ejemplo datatable con bootstrap -->
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <script>
        function AgregarMas() {
            $("<div>").load("InputDinamico.php", function() {
                $("#productos").append($(this).html());
            }); 
        }
        function BorrarRegistro() {
            $('tr.lista-producto').each(function(index, item){
                jQuery(':checkbox', this).each(function () {
                    if ($(this).is(':checked')) {
                        $(item).remove();
                    }
                });
            });
        }

        (function() {
         var form = document.getElementById('frmProduct');
         form.addEventListener('submit', function(event) {
           // si es false entonces que no haga el submit
           if (!confirm('Realmente desea guardar los registros?')) {
             event.preventDefault();
           }
         }, false);
       })();
    </script>
</body>
</html>