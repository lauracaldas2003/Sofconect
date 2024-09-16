<html>
<head>
  <title> SUBASTA </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<ul>
  <li><a href="index.html">Antena</a></li>
</ul>



<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md-4">

    <center><h1>BASE DE DATOS SUBASTASC</h1></center>
    <center><h1>Formulario Tabla antenas</h1></center>

    <form method="POST" action="antena.php" >

    <div class="form-group">
      <label for="id_antena">Antena </label>
      <input type="text" name="id_antena" class="form-control" id="id_antena">
    </div>

    <div class="form-group">
        <label for="instalacion">Instalacion </label>
        <input type="text" name="instalacion" class="form-control" id="instalacion" >
    </div>

    <div class="form-group">
        <label for="fecha">Fecha </label>
        <input type="text" name="fecha" class="form-control" id="fecha" >
    </div>

    <div class="form-group">
        <label for="altura_torre">Altura_torre </label>
        <input type="text" name="altura_torre" class="form-control" id="altura_torre">
    </div>

    <div class="form-group">
        <label for="id_tec">Id_tec </label>
        <input type="text" name="id_tec" class="form-control" id="id_tec">
    </div>

    <div class="form-group">
        <label for="id_ofer">Id oferta </label>
        <input type="text" name="id_tec" class="form-control" id="id_ofer">
    </div>


    <center>

      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Nuevo" class="btn btn-success" name="btn_nuevo">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("conexion.php");

      $id_ant    ="";
      $insta   ="";
      $fecha  ="";
      $altura  ="";
      $id_tec    ="";
      $id_ofer    ="";

      if(isset($_POST['btn_consultar']))
      {
        $id_ant  = $_POST['id_antena'];
        $exit=0;

         if ($id_ant =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id_antena</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM antena  WHERE id_antena = '$id_ant'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['id_antena'].'<br>';
                   echo $row['instalacion'].'<br>';
                   echo $row['fecha'].'<br>';
                   echo $row['altura_torre'].'<br>';
                   echo $row['id_tec'].'<br>';
                   echo $row['id_ofer'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">La id_antena de la antena no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $id_ant  = $_POST['id_antena'];
        $insta = $_POST ['instalacion'];
        $fecha = $_POST ['fecha'];
        $altura= $_POST ['altura_torre'];
        $id_tec = $_POST ['id_tec'];

         if ($id_ant =="")
         {
           echo '<div class= "alert alert-success">El campo: id_antena es obligatorio</div>';
         }
           else
           {
           $sql_insert = "INSERT INTO antena (id_antena,instalacion,fecha,
             altura_torre,id_tec,id_ofer)
            VALUES ('$id_ant', '$insta','$fecha','$altura','$id_tec','$id_ofer')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">La antena se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $id_ant  = $_POST['id_antena'];
        $insta = $_POST ['instalacion'];
        $fecha = $_POST ['fecha'];
        $altura= $_POST ['altura_torre'];
        $id_tec = $_POST ['id_tec'];
        $id_ofer = $_POST ['id_ofer'];

         if ($id_ant =="" || $insta ==""  || $fecha =="")
         {
           echo '<div class= "alert alert-success">Los campos: id_antena,
           instalacion, fecha son obligatorios</div>';
         }
           else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM antena  WHERE id_antena = '$id_ant'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">El id_antena de la antena no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE autor SET
                               id_antena='$id_ant',
                               instalacion ='$insta',
                               fecha='$fecha',
                               altura_torre='$altura',
                               id_tec='$id_tec'
                               id_ofer='$id_ofer'
                             WHERE id_antena='$id_ant'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $id_ant  = $_POST['id_antena'];
        $exit=0;
         if ($id_ant =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id_antena</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM autor  WHERE id_antena = '$id_ant'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El id_antena de la antena no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM autor WHERE id_antena='$id_ant'";
             $myPDO ->query($sql);
             echo '<div class= "alert alert-success">El registro de elimino</div>';
           }
      }
    }

  ?>

  </div>

  <div class="col-md-4"></div>
</div>

</body>
</html>