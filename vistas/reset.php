<?php 
if( isset($_GET['email'])  && isset($_GET['token']) ){
    $email=$_GET['email'];
    $token=$_GET['token'];
}else{
    header("Location: ../promociones");
}

?>

<form class="col-md-12" method="POST" action="../reset" id="formularioRestablecerContrasena">
            <div class="form-group">
                    <label for="c" class="form-label">Codigo</label>
                    <input type="readonly" class="form-control" id="c" name="email" value="<?php  echo $_GET['email'];?>">
                    <input type="readonly" class="form-control" id="c" name="token" value="<?php echo $_GET['token'];?>">
            </div> 
                <button type="submit" class="btn btn-primary">Restablecer</button>
        </form>
        <script>
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["formularioRestablecerContrasena"].submit();
    }
    </script>