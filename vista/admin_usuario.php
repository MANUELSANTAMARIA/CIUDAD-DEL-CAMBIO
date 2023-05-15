<?php
//inciar sesiones 
session_start();
if($_SESSION['us_tipo']==1){
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
          <h1>GESTIONAR DE USUARIO 
            <input type="hidden" value="<?php echo $_SESSION["us_tipo"]?>" id="tipo_usuaro_lo">
            <button class="inline-button" id="crear-usuario">AGREGAR USUARIO</button>
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
      <div id="usuarios-card" class="contenedor-card">

      </div>
    </div>
    <div class="card-footer">

    </div>
    
  </section>




  <!-- MODAL DE CREAR USUARIO  -->
<div id="modal-crear-usuario" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h4 class="titulo-modal">AGREGAR USUARIO</h1>
    <!-- alert de crear usuario -->
    <div class="stylo-alerta-confirmacion" id="add" style='display:none;'>
      <span><i class="fas fa-check"></i>Ingresado con exito</span>
    </div>
    <div class="stylo-alerta-rechazo" id="noadd" style='display:none;'>
      <span><i class="fas fa-times m-1"></i>Correo ya ingresado</span>
    </div>
    <!-- form para agregar usuario -->
    <form id="form-crear" class="formulario">
        <!-- formato de formulario de usuario -->
        <div class="form">
          <input id="nombre-usu" type="text" class="form-control" required>
		      <label class="lbl">
		  	  <span class="text-span"><i class="fas fa-user"></i> NOMBRE</span>
		      </label>
        </div> 
        
        <div class="form">
          <input id="apellido-usu" type="text" class="form-control" required>
		      <label class="lbl">
		  	  <span class="text-span"><i class="fas fa-user"></i> APELLIDO</span>
		      </label>
        </div>

        <div class="form">
          <input id="fecha-nacimiento" type="Date" class="form-control" pattern="\d{2}/\d{2}/\d{4}" required>
		      <label class="lbl">
		  	  <span class="text-span"><i class="fa-sharp fa-solid fa-calendar-week"></i> FECHA DE NACIMIENTO FORMATO dd/mm/aaaa</span>
		      </label>
        </div>

        <div class="combodesplegable">
            <select class="select" id="select-sexo">
              <option selected>SEXO</option>
              <option>HOMBRE</option>
              <option>MUJER</option>
            </select> 
        </div>

        <div class="form">
          <input id="dni" type="number" class="form-control" required>
		      <label class="lbl">
		  	  <span class="text-span"><i class="fa-solid fa-address-card"></i> DNI</span>
		      </label>
        </div>


        <div class="combodesplegable">
            <select class="select" id="select-instituciones">
              <option selected>INSTITUCION A LA QUE PERTENECE</option>
            </select> 
        </div>
        

        <div class="form">
          <input id="correo" type="email" class="form-control" required>
		      <label class="lbl">
          <span class="text-span"><i class="fas fa-at"></i> CORREO</span>
		      </label>
        </div>

        <div class="form">
          <input id="contrasena" type="password" class="form-control" required>
		      <label class="lbl">
		  	  <span class="text-span"><i class="fas fa-lock"></i> CONTRASEÑA</span>
		      </label>
        </div>


        <div class="combodesplegable">
            <select class="select" id="select-tipo">
              <option selected>TIPO DE USUARIO</option>
              <option value="2">ADMINISTRADOR</option>
              <option value="3">TECNICO</option>
            </select> 
        </div>


        <div class="button-container">
       <!-- botones cerrar y guardar -->
          <button type="submit" class="inline-button">Guardar</button>
          <button type="button" class="inline-button btn_cerrar_modal"  id="btn_cerrar_modal">Cerrar</button>
        
        </div>
    </form>
  </div>
</div>


<!-- MODAL CONFIRMAR ACCION  -->
<div id="modal-confirmar-eliminar" class="modal">
  <div class="modal-content">
  <span class="closes">&times;</span>
  <h4 class="titulo-modal">CONFIRMAR ACCION</h1>
  <div class="stylo-alerta-confirmacion" id="confirmarr" style='display:none;'>
    <span><i class="fas fa-check"></i>Usuario Eliminado</span>
  </div>
  <div class="stylo-alerta-rechazo" id="rechazar" style='display:none;'>
    <span><i class="fas fa-times m-1"></i>Contraseña Incorrecta</span>
  </div>
    <!-- form de cambiar contraseña -->
    <form id="form-confirmar" class="formulario">
        <!-- contraseña vieja input -->
              <div class="form">
                <input type="password" class="form-control" id="input-confirmar-eliminacion" required>
		            <label class="lbl">
		  	        <span class="text-span"><i class="fas fa-unlock-alt"></i> INGRESAR PASSWORD</span>
		            </label>
              </div>
              <!-- para darle id usuario -->
              <input type="hidden" id="id_user">
              <input type="hidden" id="funcion">
      <div class="button-container">
       <!-- botones cerrar y guardar -->
        <button type="submit" class="inline-button-eliminar">CONFIRMAR</button>
        
      </div> 
       
     </form>
  </div>
</div>




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