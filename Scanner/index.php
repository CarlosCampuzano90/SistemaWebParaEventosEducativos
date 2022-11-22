<?php
session_start(); 
if (!isset($_SESSION['administrador'])) 
{
   header("location:../promocion"); 
}else{

} 
?>
<?php include 'header.php' ?>

<nav class="navbar navbar-light navbar-dark" >

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<br><br>
<body>
<script src="html5-qrcode.min.js"></script>
<style>
    #toasts{
    position: fixed;
    bottom: 10px;
    right: 10px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: center;
    
}

.toast{
    width: 420px;
    height: 70px;
    border-radius: 5px;
    margin: 0.5rem;
    color: #ffffff;
    font-weight: 900;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: row-reverse;
    
}
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
  .alto{
    height: center;
  }
  body{
    background-color: rgb(34, 45, 50) !important;
  }
  .navbar{
	background-color: rgb(34, 45, 50) !important;
  width: auto;
  border-left-width: 4px;
  border-right-width: 4px;
  border-right-style: solid;
  border-left-style:solid ;
  border-right-color: #F50003;
  border-left-color: #4F1F91;

}

.info{
    background-color: #2196f3;
}

.success{
    background-color: #4caf50;
}

.error{
    background-color: #ff5252;
}

.warning{
    background-color: #ffc107;
}
</style>
<div id="toasts"></div>
<div class="bg-light row mx-auto">
<div class="col-md-12 mx-auto">
<p class="col-12 text-center">Coloca el codigo a escanear para su uso.</p>
<div class="row ">
  <div class="col-12 mx-auto">
    <div class="mx-auto" style="width:500px; height:420px;" id="reader"></div>
  </div>
</div>
</div>
</div>
<div class="col-md-12 text-white">
    <h1 class="display-5 text-white">Escaneado en proceso</h1>
     <p>Informes: <span id="txtHint"></span></p>
 
  </div>
<script>

function showHint(str) {
  if (str.length == 0) {

    document.getElementById("txtHint").innerHTML = "";
    createToast('QR invalido','error');
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    createToast('QR Leído, retire el gafete','info');
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.response);
        var resultado = this.response.split(",");
        createToast(resultado[0],resultado[1]);
      }
    };
    xmlhttp.open("GET", "insercion.php?asistencia=" + str, true);
    xmlhttp.send();
    document.getElementById("txtHint").innerHTML = "";
  }
}



  </script>
  

<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    showHint(qrCodeMessage);

}



function onScanError(errorMessage) { onScanSuccess
  //handle scan error
}



// Create instance of the object. The only argument is the "id" of HTML element created above.
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 4, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);


</script>
<script src="jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>

 </body>

 <script defer>
 
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
    
   </script>
    



  

   