/*=============================================
SideBar Menu
=============================================*/

$('.sidebar-menu').tree();

/*=============================================
Funcion para llenar los input de los coordinadores para actualizar
=============================================*/
function llenarValoresCoordinadores(id,usuario,correo) {
    var inputUsuario = document.getElementById("usuarioAC");
    inputUsuario.value = usuario;

    var inputCorreo = document.getElementById("correoAC");
    inputCorreo.value = correo;

    var inputId = document.getElementById("idCoordinador");
    inputId.value = id;
}


/*=============================================
Funcion para llenar los input de los participantes para actualizar
=============================================*/

function llenarValoresParticipantes(id,usuario,correo) {
    var inputUsuario = document.getElementById("usuarioPA");
    inputUsuario.value = usuario;

    var inputCorreo = document.getElementById("correoPA");
    inputCorreo.value = correo;

    var inputId = document.getElementById("idParticipante");
    inputId.value = id;
    

    }


/*=============================================
Funcion para llenar los input de la ponencia para actualizar
=============================================*/

function llenarValoresPonente(id,idCoordinador,nombre,fechaPonencia,horaPonencia,espacios,categoriaPonencia,modalidadPonencia,numeroCuenta,costoPonencia) {
        
    let select = document.getElementById("idCoordinadorActualizar");
    select.value = idCoordinador;  

    var inputNombre = document.getElementById("NombrePonenciaActualizar");
    inputNombre.value = nombre;

    var inputFechaPonencia = document.getElementById("fechaPonenciaActualizar");
    inputFechaPonencia.value = fechaPonencia;

    var inputHoraPonencia= document.getElementById("horaPonenciaActualizar");
    inputHoraPonencia.value = horaPonencia;

    var inputEspacios= document.getElementById("espaciosPonenciaActualizar");
    inputEspacios.value = espacios;

    var inputCategoriaPonencia = document.getElementById("categoriaPonenciaActualizar");
    inputCategoriaPonencia.value = categoriaPonencia;
    
    let modalidad = document.getElementById("modalidadPonenciaActualizar");
    modalidad.value = modalidadPonencia;  

    var inputCosto = document.getElementById("costoPonenciaAct");
    inputCosto.value = costoPonencia;  

    var inputNumeroPonencia= document.getElementById("numeroPonenciaAct");
    inputNumeroPonencia.value = numeroCuenta;

    var NumeroPonencia= document.getElementById("numeroPonenciaActualizar");
    var costo= document.getElementById("costoPonenciaActualizar");

    if (modalidadPonencia=="Gratuito"){
        NumeroPonencia.style.display  ="none";
        costo.style.display ="none";
    } 
    if (modalidadPonencia=="Costo"){
        NumeroPonencia.style.display  ="block";
        costo.style.display ="block";
    } 

    var inputId = document.getElementById("idPonencia");
    inputId.value = id;
    

    }
/*=============================================
Funcion para obtener la id del usuario para registrar su informacion
=============================================*/

function llenarId(id,tipoUsuario) {

    var Id = document.getElementById("usuarioInformacionID");
    Id.value = id;
    id.placeholder = id;

    var gradoYgrupo=document.getElementById("idGradoYGrupo");
    //mostramos o ocultamos el grado y grupo dependiendo si es participante o coordinador
    if(tipoUsuario=='coordinador'){
        gradoYgrupo.style.display = "none";
    }

    if(tipoUsuario=='participante')
        gradoYgrupo.style.display="block";
    }


function llenarIdEventoConcluido(id) { //función para darle el valor de la id al input de proximo evento
        var Id = document.getElementById("idProximoEventoConcluido");
        Id.value = id;
        id.placeholder = id;
}

function llenarIdEncuesta(id, nombre) { //función para darle el valor de la id al input de proximo evento
    var Id = document.getElementById("idPonenciaEncuesta");
    Id.value = id;
    id.placeholder = id;

    var nombreInput = document.getElementById("encuestaPregunta1");
    nombreInput.value = "¿Qué calificación del 1 al 5 le das a la ponencia '"+nombre+"' ?";
    nombreInput.placeholder = nombreInput.value;
}
/*=============================================
Notificacionees
=============================================*/
    const toast = document.getElementById('toasts')
    
    const messages = [
        '° Informacion: ',
        '° Operación fallida',
        '° Operación exitosa',
        '° Puede que haya un error'
    ]
    
    const types = [
        'info',
        'success',
        'error',
        'warning'
    ]
    
    
    function createToast(message = null, type) {
        let properties
    
        const notif = document.createElement('div')
        const notifIcon = document.createElement('span')
        const notificationType = type
        
        properties = setProperties(notificationType)
    
        notif.classList.add('toast')
        notif.classList.add(notificationType)
        
        notifIcon.classList.add(properties[0])
        notifIcon.classList.add(properties[1])
        if(message==""){
            notif.innerText = messages[properties[2]]
        }else{
            notif.innerText = message
        }

    
        toast.appendChild(notif)
        notif.append(notifIcon)
    
        setTimeout(() => {
            notif.remove()
        }, 3000)
    }
    
    function setProperties(notificationType){
        let propertyList
    
        switch (notificationType) {
            case 'info':
                propertyList = ['fa', 'fa-info-circle', 0]
                break
            case 'error':
                propertyList = ['fa', 'fa-exclamation-circle', 1]
                break
            case 'success':
                propertyList = ['fa', 'fa-check-circle', 2]
                break
            case 'warning':
                propertyList = ['fa', 'fa-exclamation-triangle', 3]
                break
        }
    
        return propertyList;
    }
    //funciones para recargar solo una tabla sin recargar toda la pagina
    function redireccionarUsuarios() {
        createToast('Actualizando..','info')
        setTimeout("window.location = 'usuarios';", 3000);
      }

      function recargarTablaParticipantes()
      { 
        $("#tablaParticipantes").load(window.location.href+" #tablaParticipantes");
      }

      function recargarTablaCoordinadores()
      { 
        $("#tablaCoordinadores").load(window.location.href+" #tablaCoordinadores");
      }

      function recargarTablaEventos(){
        $("#contenidoEventos").load(window.location.href+" #contenidoEventos");
      }
      
      function recargarTablaConstancias(){
        $("#contenidoConstancias").load(window.location.href+" #contenidoConstancias");
      }
      
 
/*=============================================
ponencias
=============================================*/


//función para mostrar el input del numero de  cuenta en dado caso que la ponencia sea de paga
function mostrarNumeroDeCuenta() {
    var nCuenta=document.getElementById("numeroDeCuenta");
    var costo= document.getElementById("costoPonencia");
    var modalidad= document.getElementById("modalidadPonencia");
    if (modalidad.value=="Gratuito"){
        nCuenta.style.display  ="none";
        costo.style.display ="none";
    } 
    if (modalidad.value=="Costo"){
        nCuenta.style.display  ="block";
        costo.style.display ="block";
    } 

    }

    function recargarPonente()
    { 
      $("#informacionPonente").load(location.href+" #informacionPonente");
    }

    function recargarPonencias()
    { 
      $("#tablaPonencias").load(location.href+" #tablaPonencias");
    }

    function recargarEncuestas()
    { 
      $("#tablaEncuestas").load(location.href+" #tablaEncuestas");
    }

//función para mostrar el input del numero de  cuenta en dado caso que la ponencia sea de paga cuando actualizamos
function mostrarNumeroDeCuentaActualizar() {
        var nCuenta=document.getElementById("numeroPonenciaActualizar");
        var costo=document.getElementById("costoPonenciaActualizar");
        var modalidad= document.getElementById("modalidadPonenciaActualizar");
        if (modalidad.value=="Gratuito"){
            nCuenta.style.display  ="none";
            costo.style.display  ="none";
        } 
        if (modalidad.value=="Costo"){
            nCuenta.style.display  ="block";
            costo.style.display  ="block";
        } 
        }
        function mostrarContraseña(){
            var contraseña= document.getElementById("contrasenaRC");
            contraseña.type="text";

            contraseña= document.getElementById("contrasenaRP");
            contraseña.type="text";
        }
        function ocultarContraseña(){
            var contraseña= document.getElementById("contrasenaRC");
            contraseña.type="password";

            contraseña= document.getElementById("contrasenaRP");
            contraseña.type="password";
        }
//funcion para cambiar los input en caso que el usuario sea externo o interno
function mostrarTipoUsuario(){
    var gradoYgrupo=document.getElementById("idGradoYGrupo");
    var puestoInformacion=document.getElementById("idPuestoInformacion");
    var matricula=document.getElementById("idMatriculaInformacion");
    var tipoUsuario= document.getElementById("tipoUsuario");
    if (tipoUsuario.value=="Externo"){
        gradoYgrupo.style.display  ="none";
        matricula.style.display  ="none";
        puestoInformacion.style.display = "none";

        document.getElementById("idLlenarGrado").value  ="Visitante";
        document.getElementById("idInputInformacionPuesto").value  ="Visitante";
        document.getElementById("idInputInformacionMatricula").value  ="Visitante";

    } 
    if (tipoUsuario.value=="Interno"){
        gradoYgrupo.style.display  ="block";
        matricula.style.display  ="block";
        puestoInformacion.style.display = "block";


        document.getElementById("idLlenarGrado").value  ="";
        document.getElementById("idInputInformacionPuesto").value  ="";
        document.getElementById("idInputInformacionMatricula").value  ="";


    } 
}

        //mostrar formulario para actualizar el ponente
function mostrarFormularioPonente() {
        var  actualizarPonente= $("#actualizarPonente");
        actualizarPonente.show(1000);

        var  informacionPonente= $("#informacionPonente");
        informacionPonente.hide(800);

    }
            //mostrar formulario para actualizar el proximo evento
function mostrarFormularioProximoEvento() {
    var  actualizarPonente= $("#formularioActualizarEventos");
    actualizarPonente.show(1000);

    var  informacionPonente= $("#informacionProximoEvento");
    informacionPonente.hide(800);

}
 //mostrar formulario para actualizar las preguntas
function mostrarFormularioPreguntas(){
    var  actualizarPonente= $("#formularioActualizarPreguntas");
    actualizarPonente.show(1000);

    var  informacionPonente= $("#preguntasPonencia");
    informacionPonente.hide(800);
}


        //mostrar formulario para actualizar la informacion
    function mostrarFormularioInformacion() {
        var  actualizarInformacion= $("#actualizarInformacion");
        actualizarInformacion.show(1000);

        var  informacion= $("#informacionUsuario");
        informacion.hide(800);

        var matricula=  document.getElementById("InformacionMatriculaAct");
        if(matricula.value=="Visitante"){
            matricula.readOnly="true";
        }
        
        var informacionGrado=  document.getElementById("InformacionGradoAct");
        if(informacionGrado.value=="Visitante"){
            informacionGrado.readOnly="true";
        }

        var informacionPuesto=  document.getElementById("InformacionPuestoAct");
        if(informacionPuesto.value=="Visitante"){
            informacionPuesto.readOnly="true";
        }

    }
    //ocultar formulario
   
function  regresarInformacion() {
            var  actualizarPonente= $("#actualizarPonente");
            actualizarPonente.hide(800);

            var  informacionPonente= $("#informacionPonente");
            informacionPonente.show(1000);

    
    }
    //ocultar formulario
    function regresarInformacionUsuario() {

        var  informacion= $("#informacionUsuario");
        informacion.show(1000);
        
        var  actualizarInformacion= $("#actualizarInformacion");
        actualizarInformacion.hide(800);
    }

    //ocultar formulario
    function regresarInformacionProximoEvento() {

        var  informacion= $("#informacionProximoEvento");
        informacion.show(1000);
        
        var  actualizarInformacion= $("#formularioActualizarEventos");
        actualizarInformacion.hide(800);
    }
    
    //ocultar formulario
    function regresarAPreguntas(){

        var  informacionPonente= $("#preguntasPonencia");
        informacionPonente.show(1000);

        var  actualizarPonente= $("#formularioActualizarPreguntas");
        actualizarPonente.hide(800);
    

    }
         
/*=============================================
VALIDACIONES
=============================================*/

//PONENCIAS
        //funcion para validar la información del registro de una ponencia
      function validacionRegistroPonencia(evento) {
        evento.preventDefault();
        var nombre = document.getElementById('NombrePonencia');
        //valido el nombre del ponencia
        if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)) {
            createToast(' Tiene que escribir el nombre de la ponencia','warning');
            nombre.placeholder="Tiene que escribir el nombre de la ponencia"; 
            nombre.focus();
            return;
        }
        //valido la fecha de la ponencia
        var fecha = document.getElementById('fechaPonencia');
        if (!isNaN(fecha.value)) {
          createToast(' Ingrese una fecha','warning');
          fecha.focus();
          return;
        }

        //valida la hora de la ponencia
        var hora = document.getElementById('horaPonencia');
        if (!isNaN(hora.value)) {
            createToast(' Ingrese una hora','warning');
            hora.focus();
            return;
        }

        //valida los espacios disponibles de la ponencia
        var espaciosPonencia = document.getElementById('espaciosPonencia');
        if (espaciosPonencia.value==0) {
            createToast(' Ingrese el numero de espacios','warning');
            espaciosPonencia.placeholder="Tiene que escribir los espacios de la ponencia"; 
            espaciosPonencia.focus();
            return;
        }

        //valida la categoría de la ponencia
        var categoriaPonencia = document.getElementById('categoriaPonencia');
        if (categoriaPonencia.value == null || categoriaPonencia.value.length == 0 || /^\s+$/.test(categoriaPonencia.value)) {
            createToast(' Ingrese la categoría de la ponencia','warning');
            categoriaPonencia.placeholder="Ingrese la categoría de la ponencia"; 
            categoriaPonencia.focus();
            return;
        }

        //valida la modalidad de la ponencia
        var Modalidad = document.getElementById('modalidadPonencia');
        if (Modalidad.value=="Costo") {
            var numeroPonencia = document.getElementById('numeroPonencia');
            if (numeroPonencia.value==0){
                createToast(' Ingrese el numero de cuenta de la ponencia','warning');
                numeroPonencia.placeholder="Ingrese el numero de cuenta de la ponencia"; 
                numeroPonencia.focus();
                return;
            }
            var costoPonencia = document.getElementById('costoDePonencia');
            if (costoPonencia.value==0){
                createToast(' Ingrese el costo de la ponencia','warning');
                costoPonencia.placeholder="Ingrese el costo de la ponencia"; 
                costoPonencia.focus();
                return;
            }
        }

        //valida el nombre del ponente de la ponencia
        var nombrePonente = document.getElementById('nombrePonente');
        if (nombrePonente.value == null || nombrePonente.value.length == 0 || /^\s+$/.test(nombrePonente.value)) {
            createToast(' Ingrese el nombre del ponente','warning');
            nombrePonente.placeholder="Ingrese el nombre del ponente"; 
            nombrePonente.focus();
            return;
        }

        //valida la firma del ponente de la ponencia
        var imageFirma = document.getElementById('imageFirma');
        if (imageFirma.files.length==0) {
            createToast(' Ingrese la firma digital del ponente','warning');
            imageFirma.placeholder="Ingrese la firma digital del ponente"; 
            imageFirma.focus();
            return;
        }


        this.submit();
      }

    // Función para la validación de la actualización de la ponencia
      function validacionActualizacionPonencia(evento) {
        evento.preventDefault();
        var nombre = document.getElementById('NombrePonenciaActualizar');
        //valido el nombre del ponencia
        if(nombre.value == null || nombre.value.length == 0 || /^\s+$/.test(nombre.value)) {
            createToast(' Tiene que escribir el nombre de la ponencia','warning');
            nombre.placeholder="Tiene que escribir el nombre de la ponencia"; 
            nombre.focus();
            return;
        }
        //valido la fecha de la ponencia
        var fecha = document.getElementById('fechaPonenciaActualizar');
        if (!isNaN(fecha.value)) {
          createToast(' Ingrese una fecha','warning');
          fecha.focus();
          return;
        }

        //valida la hora de la ponencia
        var hora = document.getElementById('horaPonenciaActualizar');
        if (!isNaN(hora.value)) {
            createToast(' Ingrese una hora','warning');
            hora.focus();
            return;
        }

        //valida los espacios disponibles de la ponencia
        var espaciosPonencia = document.getElementById('espaciosPonenciaActualizar');
        if (espaciosPonencia.value==0) {
            createToast(' Ingrese el numero de espacios','warning');
            espaciosPonencia.placeholder="Tiene que escribir los espacios de la ponencia"; 
            espaciosPonencia.focus();
            return;
        }

        //valida la categoría de la ponencia
        var categoriaPonencia = document.getElementById('categoriaPonenciaActualizar');
        if (categoriaPonencia.value == null || categoriaPonencia.value.length == 0 || /^\s+$/.test(categoriaPonencia.value)) {
            createToast(' Ingrese la categoría de la ponencia','warning');
            categoriaPonencia.placeholder="Ingrese la categoría de la ponencia"; 
            categoriaPonencia.focus();
            return;
        }

        //valida la modalidad de la ponencia
        var Modalidad = document.getElementById('modalidadPonenciaActualizar');
        if (Modalidad.value=="Costo") {
            var numeroPonencia = document.getElementById('numeroPonenciaAct');
            if (numeroPonencia.value==0){
                createToast(' Ingrese el numero de cuenta de la ponencia','warning');
                numeroPonencia.placeholder="Ingrese el numero de cuenta de la ponencia"; 
                numeroPonencia.focus();
                return;
            }
            var costoPonencia = document.getElementById('costoPonenciaAct');
            if (costoPonencia.value==0){
                createToast(' Ingrese el costo de la ponencia','warning');
                costoPonencia.placeholder="Ingrese el costo de la ponencia"; 
                costoPonencia.focus();
                return;
            }
        }
        this.submit();
    }

    //función para la validacion de los datos en la actualización del ponente
    function validacionActualizacionPonente(evento){
        evento.preventDefault();
        //valida el nombre del ponente de la ponencia
        var nombrePonente = document.getElementById('nombrePonenteActualizar');
        if (nombrePonente.value == null || nombrePonente.value.length == 0 || /^\s+$/.test(nombrePonente.value)) {
            createToast(' Ingrese el nombre del ponente','warning');
            nombrePonente.placeholder="Ingrese el nombre del ponente"; 
            nombrePonente.focus();
            return;
        }
        this.submit();
    
      }
    //función para la validacion de los datos en la actualización de  informacion del usuario
      function validacionActualizacionInformacion(evento){
        evento.preventDefault();
        //valida el nombre del usuario en la actualización
        var nombreUsuario= document.getElementById('InformacionNombreAct');
        if (nombreUsuario.value == null || nombreUsuario.value.length == 0 || /^\s+$/.test(nombreUsuario.value)) {
            createToast(' Ingrese el nombre del usuario','warning');
            nombreUsuario.placeholder="Ingrese el nombre del usuario"; 
            nombreUsuario.focus();
            return;
        }

        //valida el apellido del usuario en la actualización
        var apellidoUsuario= document.getElementById('InformacionApellidoAct');
        if (apellidoUsuario.value == null || apellidoUsuario.value.length == 0 || /^\s+$/.test(apellidoUsuario.value)) {
            createToast(' Ingrese el nombre del usuario','warning');
            apellidoUsuario.placeholder="Ingrese el nombre del usuario"; 
            apellidoUsuario.focus();
            return;
        }
        //valida la matricula del usuario en la actualización
        var matriculaUsuario= document.getElementById('InformacionMatriculaAct');
        if (matriculaUsuario.value == null || matriculaUsuario.value.length == 0 || /^\s+$/.test(matriculaUsuario.value)) {
            createToast(' Ingrese la matricula del usuario','warning');
            matriculaUsuario.placeholder="Ingrese la matricula del usuario"; 
            matriculaUsuario.focus();
            return;
        }

        //valida el puesto del usuario en la actualización
        var informacionPuesto= document.getElementById('InformacionPuestoAct');
        if (informacionPuesto.value == null || informacionPuesto.value.length == 0 || /^\s+$/.test(informacionPuesto.value)) {
            createToast(' Ingrese el puesto del usuario','warning');
            informacionPuesto.placeholder="Ingrese el puesto del usuario"; 
            informacionPuesto.focus();
            return;
        }
        


        this.submit();
    
      }
    //función para la validacion de los datos del registro del cordinador
      function validacionCoordinadorRegistro(){
        var formulario=document.getElementById("formularioRegistroCoordinador");
        //valida el usuario del coordinador
        var usuarioRC = document.getElementById('usuarioRC');
        var alfanumerico = /^[a-zA-Z0-9]+$/; //expresion regular para valores alfanumericos
        if (usuarioRC.value == null || usuarioRC.value.length == 0) {
            createToast(' Ingrese el usuario','warning');
            usuarioRC.placeholder="Ingrese el usuario"; 
            usuarioRC.focus();
            return;
        }

        if(!alfanumerico.test(usuarioRC.value)){
            createToast(' Ingrese el usuario solo con letras y números','warning');
            usuarioRC.value="";
            usuarioRC.placeholder="Ingrese el usuario solo con letras y números"; 
            usuarioRC.focus();
            return;
        }
              //valida el correo con una expresion regular
        var emailValido =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        var correoRC= document.getElementById('correoRC');
        if(!emailValido.test(correoRC.value)){
            createToast(' Ingrese un email valido','warning');
            correoRC.placeholder="Ingrese un email valido"; 
            correoRC.value="";
            correoRC.focus();
            return;
        }

        //valida la contraseña del coordinador
        var contrasenaRC = document.getElementById('contrasenaRC');
        if (contrasenaRC.value == null || contrasenaRC.value.length == 0 || /^\s+$/.test(contrasenaRC.value)) {
            createToast(' Ingrese la contraseña del usuario','warning');
            contrasenaRC.placeholder="Ingrese la contraseña del usuario"; 
            contrasenaRC.focus();
            return;
        }

        formulario.submit()
    
      }

      function validacionParticipanteRegistro(){
        var formulario=document.getElementById("formularioRegistroParticipante");
        //valida el usuario del participante
        var usuarioRP = document.getElementById('usuarioRP');
        var alfanumerico = /^[a-zA-Z0-9]+$/; //expresion regular para valores alfanumericos
        if (usuarioRP.value == null || usuarioRP.value.length == 0) {
            createToast(' Ingrese el usuario','warning');
            usuarioRP.placeholder="Ingrese el usuario"; 
            usuarioRP.focus();
            return;
        }

        if(!alfanumerico.test(usuarioRP.value)){
            createToast(' Ingrese el usuario solo con letras y números','warning');
            usuarioRP.value="";
            usuarioRP.placeholder="Ingrese el usuario solo con letras y números"; 
            usuarioRP.focus();
            return;
        }
        //valida el correo con una expresion regular
        var emailValido =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        var correoRP= document.getElementById('correoRP');
        if(!emailValido.test(correoRP.value)){
            createToast(' Ingrese un email valido','warning');
            correoRP.placeholder="Ingrese un email valido"; 
            correoRP.value="";
            correoRP.focus();
            return;
        }

        //valida la contraseña del participante
        var contrasenaRP = document.getElementById('contrasenaRP');
        if (contrasenaRP.value == null || contrasenaRP.value.length == 0 || /^\s+$/.test(contrasenaRP.value)) {
            createToast(' Ingrese la contraseña del usuario','warning');
            contrasenaRP.placeholder="Ingrese la contraseña del usuario"; 
            contrasenaRP.focus();
            return;
        }

        formulario.submit()
    
      }

      function validacionUsuarioInformacion(){
  
            //valida el nombre del usuario en el registro
            var nombreUsuario= document.getElementById('idInformacionNombre');
            if (nombreUsuario.value == null || nombreUsuario.value.length == 0 || /^\s+$/.test(nombreUsuario.value)) {
                createToast(' Ingrese el nombre del usuario','warning');
                nombreUsuario.placeholder="Ingrese el nombre del usuario"; 
                nombreUsuario.focus();
                return;
            }
    
            //valida el apellido del usuario en el registro
            var apellidoUsuario= document.getElementById('idInformacionApellido');
            if (apellidoUsuario.value == null || apellidoUsuario.value.length == 0 || /^\s+$/.test(apellidoUsuario.value)) {
                createToast(' Ingrese el nombre del usuario','warning');
                apellidoUsuario.placeholder="Ingrese el nombre del usuario"; 
                apellidoUsuario.focus();
                return;
            }
            //valida la matricula del usuario en el registro
            var matriculaUsuario= document.getElementById('idInputInformacionMatricula');
            if (matriculaUsuario.value == null || matriculaUsuario.value.length == 0 || /^\s+$/.test(matriculaUsuario.value)) {
                createToast(' Ingrese la matricula del usuario','warning');
                matriculaUsuario.placeholder="Ingrese la matricula del usuario"; 
                matriculaUsuario.focus();
                return;
            }
    
            //valida el puesto del usuario en el registro
            var informacionPuesto= document.getElementById('idInputInformacionPuesto');
            if (informacionPuesto.value == null || informacionPuesto.value.length == 0 || /^\s+$/.test(informacionPuesto.value)) {
                createToast(' Ingrese el puesto del usuario','warning');
                informacionPuesto.placeholder="Ingrese el puesto del usuario"; 
                informacionPuesto.focus();
                return;
            }
            botonValidarInformacion=document.getElementById('botonValidarInformacion');
            botonValidarInformacion.type="submit";
      }


    //función para la validacion de los datos del registro del participante por su cuenta 
    function validacionRegistroInicio(evento){
        evento.preventDefault();
        //valida el nombre del usuario en el registro
        var nombreUsuario= document.getElementById('usuarioNuevo');
        if (nombreUsuario.value == null || nombreUsuario.value.length < 6 ) {
            createToast(' Mínimo 6 caracteres alfanuméricos','warning');
            nombreUsuario.placeholder="Mínimo 6 caracteres alfanuméricos"; 
            nombreUsuario.focus();
            return;
        }
        var alfanumerico = /^[a-zA-Z0-9]+$/; //expresion regular para valores alfanumericos
        if(!alfanumerico.test(nombreUsuario.value)){
            createToast(' Ingresa tu usuario solo con letras y números','warning');
            nombreUsuario.value="";
            nombreUsuario.placeholder="Ingresa tu usuario solo con letras y números"; 
            nombreUsuario.focus();
            return;
        }

        //valida el correo con una expresion regular
        var emailValido =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        var correo= document.getElementById('correoNuevo');
        if(!emailValido.test(correo.value)){
            createToast(' Ingresa un email valido','warning');
            correo.placeholder="Ingrese un email valido"; 
            correo.value="";
            correo.focus();
            return;
        }

        var contrasena= document.getElementById('contrasenaNuevo');
        if (contrasena.value == null || contrasena.value.length < 6 ||  /^\s+$/.test(contrasena.value)) {
            createToast(' Ingresa tu contrasena de usuario mínimo 8 caracteres','warning');
            contrasena.placeholder="Mínimo 8 caracteres"; 
            contrasena.focus();
            return;
        }
        var contrasena2= document.getElementById('contrasenaNuevo2');
        if(contrasena.value!=contrasena2.value){
            createToast(' Las contraseñas no coinciden','warning');
            contrasena2.focus();
            return;
        }



        this.submit();
    
      }


      //función para la validacion de los datos del registro del participante por su cuenta 
    function validacionCambiarContrasena(evento){
        evento.preventDefault();
        var contrasena= document.getElementById('contrasenaNuevo');
        if (contrasena.value == null || contrasena.value.length < 6 ||  /^\s+$/.test(contrasena.value)) {
            createToast(' Ingresa tu contrasena de usuario mínimo 8 caracteres','warning');
            contrasena.placeholder="Mínimo 8 caracteres"; 
            contrasena.focus();
            return;
        }
        var contrasena2= document.getElementById('contrasenaNuevo2');
        if(contrasena.value!=contrasena2.value){
            createToast(' Las contraseñas no coinciden','warning');
            contrasena2.focus();
            return;
        }

        this.submit();
    
      }