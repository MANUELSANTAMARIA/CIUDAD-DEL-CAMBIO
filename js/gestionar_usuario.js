  
$(document).ready(function() {
    cargar_usuario();
    // comporbar
    // console.log("gestionar usuario")
    // creamos una funcion
    var tipo_usuario_lo = $("#tipo_usuaro_lo").val();
    // console.log(tipo_usuario_lo);
    var funcion;
    function cargar_usuario(consulta){
        funcion='buscar_usuarios_adm';
        // peticion ajax
        $.post('../controlador/usuario.php',{consulta, funcion},(response)=>{
            // respuesta del servidro
            // console.log(response)
            const usuarios = JSON.parse(response);
            // template de usuarios
            let template = '';
            // para coger todos los usuario
            // [{"nombre":"Manuel Armando","apellidos":"Santamaria Chico","dni":"952681419","sexo":"HOMBRE","correo":"123","tipo":"root","us_tipo:1"},
            usuarios.forEach(usuario => {
                template += `
                <div class="card" usuarioId="${usuario.id_us}">
                <div class="card-body">
                <h1 style="color: #1783db; font-size: 15px;">${usuario.tipo}</h1>
                <h2 style="color: #0b7300; font-size: 20px;"><b>${usuario.nombre} ${usuario.apellidos}</b></h2>
                <ul style="text-decoration: none; list-style-type: none;">
                    <li style="margin-top: 10px;"><span><i class="fas fa-lg fa-id-card"></i></span> Dni: ${usuario.dni}</li>
                    <li style="margin-top: 10px;"><span><i class="fas fa-lg fa-at"></i></span> Correo: ${usuario.correo}</li>
                    <li style="margin-top: 10px;margin-boot: 10px;"><span><i class="fas fa-venus"></i><i class="fas fa-mars"></i></span> Sexo: ${usuario.sexo}</li>
                    <li style="margin-top: 10px;margin-boot: 10px;"><span><i class="fas fa-building""></i></span> Institucion: ${usuario.us_institucion}</li>
                    </ul>
                </div>
                `;

                // console.log(usuario.us_tipo)
                if(usuario.us_tipo != 1){
                template +=`
                <div class="card-footer">
                    <button type="button" class="inline-button-eliminar btn_confirmar_eliminar">
                        <i class="fas fa-window-close mr-1"></i> Eliminar
                    </button>
                </div>
                
                `;
                }

                template +=`
                </div>
                `
            })
            // retornar al frontend
            $('#usuarios-card').html(template);
            

        });//fin peticion ajax
    }
    //cuando se tecle se ejecuta una funcion de calban
    $(document).on('keyup','#buscar',function(){
        // cojo el valor id
        let valor = $(this).val();
        if(valor != ""){
            // console.log(valor);
            cargar_usuario(valor)

        }else{
            cargar_usuario();

        }
    })
    
    // cuando se utiliza template
    $(document).on("click", ".btn_confirmar_eliminar", function() {
        // Tu código aquí
        // console.log("click");
        $("#modal-confirmar-eliminar").css("display", "block");
    });
    // cerrar el modal-confirmar-eliminar
    $(document).on("click", ".closes", function() {
        $("#modal-confirmar-eliminar").css("display", "none");
        $("#input-confirmar-eliminacion").val("");
    });
    $(document).on("click", ".cerrar-modal", function() {
        $("#modal-confirmar-eliminar").css("display", "none");
        $("#input-confirmar-eliminacion").val("");
    });

    // cuando el usuario haga clickfuera del modal
    $(window).on("click", function(event) {
        if ($("#modal-confirmar-eliminar").length > 0) {
          if (event.target == $("#modal-confirmar-eliminar")[0]) {
            $("#modal-confirmar-eliminar").css("display", "none");
            $("#input-confirmar-eliminacion").val("");
          }
        }
    });


    // borrar usuario
    $(document).on('click', '.btn_confirmar_eliminar', (e) => {
        // coger elemento der card id de usuario
        const elemento = $(this)[0].activeElement.parentElement.parentElement;
        // cojo el elemento
        const id = $(elemento).attr('usuarioId');
        funcion = 'borrar-usuario';
        $('#id_user').val(id);
        $('#funcion').val(funcion);

    });
    // confirmar eliminar usu 
    $('#form-confirmar').submit(e => {
        let pass = $('#input-confirmar-eliminacion').val();
        let id_usuario = $('#id_user').val();
        funcion = $('#funcion').val();
        // console.log(pass,id_usuario,funcion)
        // 11 2 borrar-usuario
        $.post('../controlador/usuario.php', { pass, id_usuario, funcion }, (response) => {
            response = response.trim();
            // console.log(response)
            if (response == 'borrado') {
                $('#confirmarr').hide('slow');
                $('#confirmarr').show(1000);
                $('#confirmarr').hide(2000);
                $('#form-confirmar').trigger('reset');
            } else {
                $('#rechazar').hide('slow');
                $('#rechazar').show(1000);
                $('#rechazar').hide(2000);
                $('#form-confirmar').trigger('reset');
            }
            cargar_usuario();

        });
        // no se recargue la pagina
        e.preventDefault();
    })    



    //institucion 
    $(document).ready(function() {
        $('#select-instituciones').on('click', function() {
          funcion='buscar_institucion';
          // peticion ajax
          $.post('../controlador/usuario.php', {funcion}, (response) => { 
            let template = '';
            const ministerios = JSON.parse(response);
            ministerios.forEach(ministerio => {
              template += `<option value="${ministerio.id_tipo_institucion}">${ministerio.nombre_institucion}</option>`;
            });
      
            // agregar opciones al selector
            $('#select-instituciones').html(template);
      
            // Cambiar evento a 'change' después de cargar las opciones
            $('#select-instituciones').off('click').on('change', function() {
              // Lógica para manejar el cambio de selección
              
            });
          });
        });
      });
    

    $('#form-crear').submit(function(e) {
        e.preventDefault();
    
        let nombre_usuario = $('#nombre-usu').val();
        let apellido_usuario = $('#apellido-usu').val();
        let fecha_nacimiento = $('#fecha-nacimiento').val();
        let dni = $('#dni').val();
        let select_instituci = $('#select-instituciones option:selected')
        var select_institucion = $(select_instituci).attr('value');
        let select_sexo = $('#select-sexo').val();
        let correo = $('#correo').val();
        let contrasena = $('#contrasena').val();
        // obtener value option
        let select_tip = $('#select-tipo option:selected')
        var select_tipo = $(select_tip).attr('value');
        let data = {
          funcion: 'crear_usuario',
          nombre_usuario: nombre_usuario,
          apellido_usuario: apellido_usuario,
          fecha_nacimiento: fecha_nacimiento,
          dni: dni,
          select_institucion: select_institucion,
          select_sexo: select_sexo,
          correo: correo,
          contrasena: contrasena,
          select_tipo: select_tipo
        };
        $.post('../controlador/usuario.php', data, function(response) {
          response = response.trim();
          if (response == "add") {
            $('#add').hide('slow');
            $('#add').show(1000);
            $('#add').hide(2000);
            $('#form-crear').trigger('reset');
          } else if (response == "noadd") {
            $('#noadd').hide('slow');
            $('#noadd').show(1000);
            $('#noadd').hide(2000);
            $('#form-crear').trigger('reset');
          }
          cargar_usuario();
        });
    });  

    



});

