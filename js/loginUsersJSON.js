$('#loginUsuarioJSON').click(function () {
    $.ajax({
        type: 'post',
        url: '../php/usersLoginJSON.php',
        data: {
            'nUsuario': $('#cmpNusuario').val(),
            'password': $('#cmpPassword').val()
            //cmpNusuario, cmpPassword
            //nUsuario, password
        },
        dataType: "json",
        success: function (data) {
            if (data.answer == "usuarioAutenticado") {
                $('#cmpUsuarioAdministrador').val('');
                $('#cmpNusuario').val('');
                $('#cmpPassword').val('');
                $('#cmpCorreoElectronico').val('');
                //alert('Bienvenido:  ' + data.user);
                //{"answer":"usuarioAutenticado","user":"maira.martell"}
                toastr.options.progressBar = true;
                toastr.success(data.message);
            } else {
                toastr.error('El servicio responde: ' + data.answer + "-**Con mensaje: **--" + data.message);
            }
        },
        error: function(data){
            toastr.error('El servicio responde: ' + data.answer + "-**Con mensaje: **--" + data.error);
        }
    });
});