<?php
//inciar sesiones 
session_start();
if($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2 || $_SESSION['us_tipo'] == 3){
    include_once 'layouts/header.php';
?>
<?php
    include_once 'layouts/nav.php';
    
?>

<!-- contenido de la pagina -->
<div class="content-wrapper">
<!-- contenido de la cabezera -->
  <section class="content-header">
    <div class="container-fluid">
          <h1>PROYECTOS
            <input type="hidden" value="<?php echo $_SESSION["us_tipo"]?>" id="tipo_usuaro_lo">
            <button class="inline-button" id="crear-proyecto">AGREGAR USUARIO</button>
          </h1>
    </div>
    <!--buscar -->
    <div class="buscar-usu">
      <input type="text" class="form-control" id="buscar" required>
      <label class="lbl">
		    <span class="text-span"><i class="fas fa-search"></i> BUSCAR</span>
      </label>
    </div>

    <div class="card-body">
      <div id="proyecto-card" class="contenedor-card">

      </div>
    </div>
    
  </section>
  

</div>


<?php
include_once 'layouts/footer.php';
?>
<?php
}
else{
    header('Location: ../index.php');
}
?>

