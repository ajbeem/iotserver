$('#salvarRegistroPromotor').click( function () { 
     $.ajax({
            type: 'post',
            url: '../php/altaPromotores.php',
            data: {
                'usuarioAdministrador'      : $('#cmpUsuarioAdministrador').val(),
                'nombreCompletoPromotor'    : $('#cmpNombreCompleto').val(),
                'nUsuario'		            : $('#cmpNusuario').val(),
                'password'	                : $('#cmpPassword').val(),
                'correoElectronicoPromotor' : $('#cmpCorreoElectronico').val(),
                'CIUDAD'                    : $('#cmpCIUDAD').val(),
                'ESTADO'                    : $('#cmpESTADO').val(),
                'ZONA'                      : $('#cmpZONA').val(),
                'TELEFONO'                  : $('#cmpTELEFONO').val(),
                'CURP'                      : $('#cmpCURP').val(),
                'RFC'                       : $('#cmpRFC').val(),
                'NSS'                       : $('#cmpNSS').val(),
                'TELCASA'                   : $('#cmpTELCASA').val(),
                'NUM_EMERGENCIA'            : $('#cmpNUM_EMERGENCIA').val(),
                'DOMICILIO'                 : $('#cmpDOMICILIO').val(),
                'SISTEMA_OPERATIVO'         : $('#cmpSISTEMA_OPERATIVO').val(),

            },
            success: function(data) {
                if (data == "registroCorrecto") {                     
                    $('#cmpNombreCompleto').val('');
                    $('#cmpNusuario').val('');
                    $('#cmpPassword').val('');
                    $('#cmpCorreoElectronico').val('');
                    $('#cmpCIUDAD').val('');
                    $('#cmpESTADO').val('');
                    $('#cmpZONA').val('');
                    $('#cmpTELEFONO').val('')
                    $('#cmpCURP').val('');
                    $('#cmpRFC').val('');
                    $('#cmpNSS').val('');
                    $('#cmpTELCASA').val('');
                    $('#cmpNUM_EMERGENCIA').val('');
                    $('#cmpDOMICILIO').val('');
                    $('#cmpSISTEMA_OPERATIVO').val('');
                    toastr.success("Registro Almacenado Correctamente!!");

                } else {
                    toastr.error(data); 
                }
            }
    });                
} );