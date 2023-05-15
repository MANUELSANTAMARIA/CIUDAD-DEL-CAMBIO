<?php
//inciar sesiones 
session_start();
if($_SESSION['us_tipo']==1||$_SESSION['us_tipo']==2){
    include_once 'layouts/header.php';
?>
<?php
    include_once 'layouts/nav.php';
    
?>

<!-- contenido de la pagina -->
<div class="content-wrapper">
<!-- contenido de la cabezera -->
  <section class="content-header">
          <h1 class="titulo">Datos Personales</h1>              
  </section>
   
  <div class="personal-info">
    <h2>MIS DATOS PERSONALES</h2>
    <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario'] ?>">
    <ul>
      <li><b style="color:#0b7300">NOMBRE:</b><a id="nombre"></a> <?php echo $_SESSION["nombre"]?></li>
      <li><b style="color:#0b7300">APELLIDO:</b><a id="apelllido"></a> <?php echo $_SESSION["apellido"]?></li>
      <li><b style="color:#0b7300">EDAD:</b><a id="edad"></a> <?php echo $_SESSION["edad"]?></li>
      <li><b style="color:#0b7300">DNI:</b><a id="dni_us"></a> <?php echo $_SESSION["dni"]?></li>
      <li><b style="color:#0b7300">INSTITUCION:</b><a id="dni_us"></a> <?php echo $_SESSION["nomnre-institucion"]?></li>
      <li>
      <b style="color:#0b7300">TIPO USUARIO:</b>
      <span id="us_tipo"><?php echo $_SESSION["rol"]?></span></li>
      <li><button class="inline-button">CAMBIAR CONTRASEÑA</button></li>
    </ul>
  </div>
  
  




  <!-- modal de cambiar contraseña -->
<div id="modal-cambiar-contraseña" class="modal">
  <div class="modal-content">
  <span class="close">&times;</span>
    <!-- form de cambiar contraseña -->
    <form id="form-pass" class="formulario">
        <h4 class="titulo-modal">CAMBIAR CONTRASEÑA</h1>
        <!-- contraseña vieja input -->
              <div class="form">
                <input id="contrasena_actual" type="password" class="form-control" required>
		            <label class="lbl">
		  	        <span class="text-span"><i class="fas fa-unlock-alt"></i> INGRESAR PASSWORD</span>
		            </label>
              </div>

              <div class="form">
                <input id="contrasena_nueva" type="text" class="form-control" required>
		            <label class="lbl">
		  	        <span class="text-span"><i class="fas fa-lock"></i> INGRESAR PASSWORD NUEVO</span>
		            </label>
              </div>
      <div class="button-container">
       <!-- botones cerrar y guardar -->
        <button type="submit" class="inline-button">Guardar</button>
        <button type="button" class="inline-button" class="btn_cerrar_modal" id="btn_cerrar_modal">Cerrar</button>
        
      </div>  
     </form>
    
    
  </div>
</div>
 
<div>

<?php
include_once 'layouts/footer.php';
}
else{
    header('Location: ../index.php');
}
?>