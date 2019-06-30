$('#guardarDatos').click( function () { 
     $.ajax({
            type: 'post',
            url: '../php/altaAdministradores.php',
            data: {
                'nombreCompleto'    : $('#cmpNombreCompleto').val(),
                'nUsuario'		    : $('#cmpNusuario').val(),
                'password'	        : $('#cmpPassword').val(),
                'correoElectronico' : $('#cmpCorreoElectronico').val(),
                //cmpNombreCompleto, cmpCorreoElectronico, cmpNusuario, cmpPassword
            },
            success: function(data) {
                if (data == "registroCorrecto") {                     
                    $('#cmpNombreCompleto').val('');
                    $('#cmpNusuario').val('');
                    $('#cmpPassword').val('');
                    $('#cmpCorreoElectronico').val('');
                    toastr.success("Registro Almacenado Correctamente!");

                } else {
                    toastr.error("El registro no ha sido guardado!"); 
                }
            }
    });                
} );