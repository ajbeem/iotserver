$('#salvarRegistroCliente').click( function () { 
     $.ajax({
            type: 'post',
            url: '../php/altaUsuariosJSON.php',
            data: {
                'usuarioAdministrador'      : $('#cmpUsuarioAdministrador').val(),
                'nUsuario'		            : $('#cmpNusuario').val(),
                'password'	                : $('#cmpPassword').val(),
                'correoElectronicoUsuario'  : $('#cmpCorreoElectronico').val()
    /*
            cmpUsuarioAdministrador, cmpNusuario, cmpPassword, cmpCorreoElectronico
                usuarioAdministrador, nUsuario, password, correoElectronicoUsuario
            ajim/53526alfred
                */
            },
            dataType: "json"
            ,
            success: function(data) {
                if (data == "registroCorrecto") {                     
                    $('#cmpUsuarioAdministrador').val('');
                    $('#cmpNusuario').val('');
                    $('#cmpPassword').val('');
                    $('#cmpCorreoElectronico').val('');
                    toastr.success("Registro Almacenado Correctamente!!");
                } else {
                    toastr.error(data); 
                }
            }
    });                
} );

$('#salvarRegistroUsuarioJSON').click( function () { 
    $.ajax({
           type: 'post',
           url: '../php/altaUsuarios.php',
           data: {
               'usuarioAdministrador'      : $('#cmpUsuarioAdministrador').val(),
               'nUsuario'		            : $('#cmpNusuario').val(),
               'password'	                : $('#cmpPassword').val(),
               'correoElectronicoUsuario'  : $('#cmpCorreoElectronico').val()
           },
           dataType: "json",
           success: function(data) {
               if (data.answer == "registroCorrecto") {                     
                   $('#cmpUsuarioAdministrador').val('');
                   $('#cmpNusuario').val('');
                   $('#cmpPassword').val('');
                   $('#cmpCorreoElectronico').val('');
                   toastr.success(data.message);
               } else {
                   toastr.error('El servicio responde: '+data.answer +"-**Con mensaje: **--"+data.message); 
               }
           }
   });                
} );
