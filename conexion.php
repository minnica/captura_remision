<?php 
if(!empty($_POST["guardar"])) {
    $conn = mysqli_connect("localhost","root","", "gilbertm_prueba");
    $contador = count($_POST["ota"]);
    $ProContador=0;
    $query = "INSERT INTO captura (Ota, Remision, Proyecto, Direccion, Taller, Marca, Cantidad, Peso_unitario, Rev, Comentarios) VALUES ";
    $queryValue = "";
    for($i=0;$i<$contador;$i++) {
        if(!empty($_POST["ota"][$i]) || !empty($_POST["remision"][$i]) || !empty($_POST["proyecto"][$i])|| !empty($_POST["direccion"][$i])||!empty($_POST["taller"][$i])||!empty($_POST["marca"][$i])|| !empty($_POST["cantidad"][$i])|| !empty($_POST["peso_unitario"][$i])|| !empty($_POST["rev"][$i])|| !empty($_POST["comentarios"][$i]) ) {
            $ProContador++;
            if($queryValue!="") {
                $queryValue .= ",";
            }
            $queryValue .= "('" . $_POST["ota"][$i] . "', '" . $_POST["remision"][$i] . "', '" . $_POST["proyecto"][$i] . "','" . $_POST["direccion"][$i] . "', '" . $_POST["taller"][$i] . "', '" . $_POST["marca"][$i] . "', '" . $_POST["cantidad"][$i] . "','" . $_POST["peso_unitario"][$i] . "','" . $_POST["rev"][$i] . "','" . $_POST["comentarios"][$i] . "')";
        }
    }
    $sql = $query.$queryValue;
    if($ProContador!=0) {
        $resultadocon = mysqli_query($conn, $sql);
        if(!empty($resultadocon)) $resultado = " <br><ul class='list-group' style='margin-top:15px;'>
        <li class='list-group-item'>Registro(s) Agregado Correctamente.</li></ul>";
        header("location:index.php");
        return;
    }
}
?>