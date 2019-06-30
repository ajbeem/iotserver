function materialesEntregados(){ 
    if( $("#pantalonContirantesRecibido").is(':checked')&& $("#chalecoDeEspumaRecibido").is(':checked')
        && $("#sudaderaConLogotipoRecibido").is(':checked')&& $("#parDeGuantesRecibido").is(':checked')
        && $("#cubreZapatosRecibido").is(':checked')&& $("#cabezaDeOsoRecibido").is(':checked')&& $("#lentesNegrosMetalicosRecibido").is(':checked')
        && $("#3arosDePlasticoRecibido").is(':checked')) {  
          //alert("Recibido Completo");
            $("#cmpEntregaDeMaterialesCompleto").val('Completo');  
        } else {  
          //alert("Recibido INCOMPLETO");
            $("#cmpEntregaDeMaterialesCompleto").val('INCOMPLETO')  
        }
  }
/*cmpHoraSalidaEncargado, cmpTelefonoTienda, cmpEvaluacionAnimacion, cmpLimpiezaDisfraz,cmpEstadoDisfraz, cmpVasos20oz, cmpVasos24oz,
    cmpVasos32oz, cmpObservacionesEncargado, cmpEntregaDeMaterialesCompleto, variable = $('#').value,*/
function comprobarCampos(){
    var hrSalida = $('#cmpHoraSalidaEncargado').value;
    var telTienda = $('#cmpTelefonoTienda').value;
    var evaluacionAnim = $('#cmpEvaluacionAnimacion').value; 
    var limpDizf = $('#cmpLimpiezaDisfraz').value; 
    var edoDifraz = $('#cmpEstadoDisfraz').value;
    var vazos20 = $('#cmpVasos20oz').value;
    var vazos24 = $('#cmpVasos24oz').value; 
    var vazos32 = $('#cmpVasos32oz').value;
    var materialesCompleto = $('#cmpEntregaDeMaterialesCompleto').value;

    if (
      hrSalida =="" || telTienda =="" || evaluacionAnim =="" || limpDizf =="" || edoDifraz =="" || vazos20 ==""
      || vazos24 =="" || vazos32 =="" || materialesCompleto == ""){
          toastr.error("Por favor llena todos los campos"); 
          //$('#cmpEntregaDeMaterialesCompleto').val('Llena todos los campos');
          return false;
      }else{
          toastr.success("Datos completos gracias");
      }
  }
function enviarFormularioEncargado(){
    //alert ('se ESTAN ENVIADO LOS DATOS');
    
        $.ajax({
            type: 'post',
            url: '../php/datosReporteEncargado.php',
            data: {
                //hrSalidaCompleta    :   horaSalida.getHours() +':'+ horaSalida.getMinutes() +':'+ horaSalida.getSeconds(),
                nombreEncargado : $('#cmpNombreEncargado').val(), 
                telefonoTienda  : $('#cmpTelefonoTienda').val(),
                observacionesEncargado : $('#cmpObservacionesEncargado').val(), 
                entregaDeMaterialesCompleto : $('#cmpEntregaDeMaterialesCompleto').val(),
                vasos_24_Oz     : $('#cmpVasos24oz').val(),
                vasos_20_Oz     : $('#cmpVasos20oz').val(), 
                vasos_32_Oz     : $('#cmpVasos32oz').val(),
                evaluacionAnimacion : $('#cmpEvaluacionAnimacion').val(), 
                evaluacionEstadoDisfraz : $('#cmpEstadoDisfraz').val(), 
                limpiezaDisfraz : $('#cmpLimpiezaDisfrazModal').val(),
                    },
                    success: function(data) {
                        toastr.success("Se están enviando los Datos!!");
                    }
                });    
}