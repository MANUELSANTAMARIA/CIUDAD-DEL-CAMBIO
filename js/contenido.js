

// Obtén el modal
var modal_cambiar_contrasena = document.getElementById("modal-cambiar-contraseña");
var modal_crear_usuario = document.getElementById("modal-crear-usuario");


// Obtén el botón que abre el modal
var btn_cambiar_contrasena = document.querySelector(".inline-button");
var btn_crear_usuario = document.getElementById("crear-usuario");



// Obtén el elemento <span> que cierra el modal
var cerrar = document.getElementsByClassName("close")[0];

var btn_cerrar_modal = document.getElementById("btn_cerrar_modal");
var contrasena_actual = document.getElementById("contrasena_actual");
var contrasena_nueva = document.getElementById("contrasena_nueva");



//DATOS PERSONALES

// Cuando el usuario hace clic en el botón, abre el modal
if (btn_cambiar_contrasena) {
btn_cambiar_contrasena.onclick = function() {
  modal_cambiar_contrasena.style.display = "block";
}
}
// Cuando el usuario hace clic en <span> (x), cierra el modal
if (cerrar) {
cerrar.onclick = function() {
  // cerrar modal del contraseña con span
  if(modal_cambiar_contrasena){
  modal_cambiar_contrasena.style.display = "none";
  contrasena_actual.value="";
  contrasena_nueva.value="";
  }
  // cerrar modal de usuario <span> (x)
  if(modal_crear_usuario){
    modal_crear_usuario.style.display = "none";
  }
}
}
// Cuando el usuario hace clic fuera del modal, también se cierra
window.onclick = function(event) {
  if(modal_cambiar_contrasena){
    if (event.target == modal_cambiar_contrasena) {
    modal_cambiar_contrasena.style.display = "none";
    }
  }
  if(modal_crear_usuario){
  if (event.target == modal_crear_usuario) {
    modal_crear_usuario.style.display = "none";
  }
  }
}



//GESTIONAR USUARIO
// btn_crear_usuario
if (btn_crear_usuario){
  btn_crear_usuario.onclick = function(){
  modal_crear_usuario.style.display = "block";
  }
}//fin de cerar usuario
// btn_confirmar_eliminar






// formulario de usuario
// validar cedula con 10 caracteres
if(modal_crear_usuario){
document.getElementById('dni').addEventListener('input', function(event) {
  if (event.target.value.length > 10) {
    event.target.value = event.target.value.slice(0, 10);
  }
});
}

//btn_cerrar sesion
if(btn_cerrar_modal){
btn_cerrar_modal.onclick = function(){
//   // cerrar modal de contraseña
  if(modal_cambiar_contrasena){
  modal_cambiar_contrasena.style.display = "none";
  contrasena_actual.value="";
  contrasena_nueva.value="";
  }

  
  // cerrar modal de usuario
  if(modal_crear_usuario){
//     // coger los elementos del form usuario
  let nombre_usuario = document.getElementById("nombre-usu");
  let apellido_usuario = document.getElementById("apellido-usu");
  let select_sexo = document.getElementById("select-sexo");
  let fecha_nacimiento = document.getElementById("fecha-nacimiento");
  let dni = document.getElementById("dni");
  let correo = document.getElementById("correo");
  let contrasena = document.getElementById("contrasena");
  let select_tipo = document.getElementById("select-tipo");
    modal_crear_usuario.style.display = "none";
    nombre_usuario.value="";
    apellido_usuario.value="";
    select_sexo.selectedIndex = 0;// Establecer el índice seleccionado en el primer valor
    fecha_nacimiento.value="";
    dni.value="";
    correo.value="";
    contrasena.value="";
    select_tipo.value="";

  }
}
}


