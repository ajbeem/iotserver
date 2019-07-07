$('#salvarRegistroCliente').click( function () { 
     $.ajax({
            type: 'post',
            url: '../php/altaUsuarios.php',
            data: {
                'usuarioAdministrador'      : $('#cmpUsuarioAdministrador').val(),
                'nUsuario'		            : $('#cmpNusuario').val(),
                'password'	                : $('#cmpPassword').val(),
                'correoElectronicoUsuario'  : $('#cmpCorreoElectronico').val()
                /*cmpUsuarioAdministrador, cmpNusuario, cmpPassword, cmpCorreoElectronico
                usuarioAdministrador, nUsuario, password, correoElectronicoUsuario*/
            },
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