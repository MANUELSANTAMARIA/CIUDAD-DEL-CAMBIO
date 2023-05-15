$(document).ready(function() {
    cargar_proyectos();
    var tipo_usuario_lo = $("#tipo_usuaro_lo").val();
    // console.log(tipo_usuario_lo);
    var funcion;

    function cargar_proyectos(consulta){
        funcion='cargar_proyeco';
        // peticion ajax
        $.post('../controlador/usuario.php',{consulta, funcion},(response)=>{
          var proyectos = JSON.parse(response);
            console.log(proyectos)


        })

    }



 
    
});    