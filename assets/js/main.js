$(document).ready(main());

function main(){
  //INIT
  var contFM = 0;
  var registro = {}
  
  $('#terminosycondiciones').load('assets/texto/terminosycondiciones.html');
  //var fecha_registro = moment().format('YYYY-MM-DD');

  ////////////////////*****SIGNATURE*****/////////////////////////////
  var canvas = document.getElementById("signature");
  var signaturePad = new SignaturePad(canvas);
  signaturePad.penColor = "rgb(66, 133, 244)";
  $('#clear-signature').on('click', function(){
      signaturePad.clear();
  });

  ////////////////////*****CHILDREN*****/////////////////////////////
  $("#btnaddMenores").on('click',function(){
    var template = $("#template").clone();
    template.attr("id", "fm-"+contFM);
    template.appendTo(".formMenores");
    contFM++;
  });
  ////////////////////*****SAVE*****/////////////////////////////
  //$("#form-id").submit(function(e) {


  $('#form-id').on('submit', function (e) {
      e.preventDefault();
      if(signaturePad.isEmpty()){
        swal({
          title: "Información",
          text: "La firma es requerida.",
          type: "info"
        })
      } else{
        var datosMenores = [];
        for(var i = 0; i<contFM;i++){
          var padre = $("#fm-"+i);
          var obj = {};
          obj.nombre = padre.find("#Mnombre").val();
          obj.primerApellido = padre.find("#Mprimerapellido").val();
          obj.segundoApellido = padre.find("#Msegundoapellido").val();
          obj.fecha = padre.find("#Mfecha").val();
          obj.genero = padre.find("#Mgenero").val();
          if(obj.nombre != ''){
            datosMenores.push(obj);
          }
          
        }
        registro.identificacion = $("#identificacion").val();
        registro.nombre = $("#nombre").val();
        registro.primerapellido = $("#primerapellido").val();
        registro.segundoapellido = $("#segundoapellido").val();
        registro.email = $("#email").val();
        registro.celular = $("#celular").val();
        registro.fecha = $("#fecha").val();
        registro.genero = $("#genero").val();
        registro.direccion = $("#direccion").val();
        registro.provincia = $("#provincia").val();
        registro.menores = datosMenores;
        registro.firma = signaturePad.toDataURL();

        send(registro);
      }
      
  });

  validarFormulario(); 
}

function validarFormulario(){
  //VALIDADOR FORMULARIO
  bootstrapValidate(
     '#email',
     'email:Ingrese una dirección de correo electronico válidad!'
  );
  bootstrapValidate('#identificacion', 'numeric:Solo puede ingresar números');
  bootstrapValidate('#nombre', 'required:Este Campo es Requerido');
  bootstrapValidate('#primerapellido', 'required:Este Campo es Requerido');
  bootstrapValidate('#segundoapellido', 'required:Este Campo es Requerido');
  bootstrapValidate('#celular', 'required:Este Campo es Requerido');
  bootstrapValidate('#direccion', 'required:Este Campo es Requerido');   
}

function send(registro){
  swal({
    title: "Envio de información",
    text: "¿Desea enviar la información al sistema para su revisión?",
    type: "info",
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true
  }, function () {
     $.ajax({
        url : "api/save",
        type: "POST",
        data: {info:JSON.stringify(registro)},
        success: function(data)
        {
          setTimeout(function () {
          swal({
              title: "Respuesta",
              text: "La información ha sido recibida. Gracias",
              type: "info"
          })
            location.reload();
          }, 2000);
        },
        error: function (error)
        { 
          swal({
              title: "Envio de información",
              text: "Ha ocurrido un error, intente de nuevo!",
              type: "error"
          })
        }
     });
  });
}