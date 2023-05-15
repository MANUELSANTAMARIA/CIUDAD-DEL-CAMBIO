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
          <h1 class="titulo">ROOT</h1>                     
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