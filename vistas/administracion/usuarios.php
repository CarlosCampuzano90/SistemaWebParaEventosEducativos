<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Gestión de usuarios
    
    </h1>
    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Gestión de usuarios</li>
    
    </ol>



  </section>

  <!-- Main content -->
  <section class="content">

    
    

    <!-- Default box -->
    <div class="box" id="hola">
      
      <div class="box-header with-border">
        <h3 class="box-title">Coordinadores</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Coordinadores">
            <i class="fa fa-minus"></i></button>

        </div>
      </div>
      <div class="box-body" id="tablaCoordinadores">

        <?php
        $coordinador = new ControladorCoordinadores();
        $coordinador -> ctrMostrarCoordinadores();
        ?>
      <!--/div-->
      <!-- /.box-body -->
      <div class="box-footer">

      <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#registrar" >Registrar Coodinador <i class="fa fa-user-plus " aria-hidden="true"></i></button>
      <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header tituloTabla">
                <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form method="post" id="formularioRegistroCoordinador" >
                <div class="form-group">
                  <label for="usuario" class="col-form-label">Usuario:</label>
                  <input type="text" class="form-control form-control-sm" id="usuarioRC" name="usuarioRC" >
                </div>
                <div class="form-group">
                  <label for="usuario" class="col-form-label">Correo:</label>
                  <input type="text" class="form-control form-control-sm" id="correoRC" name="correoRC" >
                </div>

                <div class="form-group">
                  <label for="contrasena" class="col-form-label">Contraseña:</label>
                  <i class="fa fa-eye" onmouseover="mostrarContraseña();" onmouseout="ocultarContraseña();" aria-hidden="true" ></i>
                  <input type="password" class="form-control form-control-sm" id="contrasenaRC" name="contrasenaRC" >
                </div>

                <div class="modal-footer">
        
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-success" onclick="validacionCoordinadorRegistro();" >Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                 
                </div>

                <?php
                $coordinador -> ctrRegistrarCoordinador();
                ?>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>

    </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
    
  </section>
  <!-- /.content -->

  <!--PARTICIPANTE-->
 <!-- Main content -->
 <section class="content">
  
    <!-- Default box -->
  <div class="box" >
     <div class="box-header with-border">
        <h3 class="box-title">Participantes</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" 
                  title="Ocultar Participante">
            <i class="fa fa-minus"></i></button>

        </div>
      </div>
      
      <div class="box-body" id="tablaParticipantes">
      <?php
        $participante = new ControladorParticipantes();
        $participante -> ctrMostrarParticipante();
        ?>
      </div>
      <!-- /.box-body -->
      
    <div class="box-footer">

      <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#registrarParticipante" >Registrar Participante <i class="fa fa-user-plus " aria-hidden="true"></i></button>
      <div class="modal fade" id="registrarParticipante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header tituloTabla">
                <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <form method="post" id="formularioRegistroParticipante">
                  <div class="form-group">
                    <label for="usuario" class="col-form-label">Usuario participante:</label>
                    <input type="text" class="form-control form-control-sm" id="usuarioRP" name="usuarioRP" >
                  </div>

                  <div class="form-group">
                    <label for="correoRP" class="col-form-label">Correo:</label>
                    <input type="text" class="form-control form-control-sm" id="correoRP" name="correoRP" >
                  </div>
                  

                  <div class="form-group">
                    <label for="contrasena" class="col-form-label">Contraseña:</label>
                    <i class="fa fa-eye" onmouseover="mostrarContraseña();" onmouseout="ocultarContraseña();" aria-hidden="true" ></i>
                    <input type="password" class="form-control form-control-sm" id="contrasenaRP" name="contrasenaRP" >
                  </div>


                  <div class="modal-footer">
          
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-success" onclick="validacionParticipanteRegistro()">Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                  
                  </div>

                  <?php


                  $participante -> ctrRegistrarParticipante();

                  ?>
              </form>
            </div>

          </div>
        </div>
        
       
     </div>
     <div class="container-md">
        <form class="form-inline" action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <label for="file" > <h5><kbd>Importar usuarios desde excel</kbd></h5></label> 
            <div class="form-group mx-sm-3 mb-2">
                <input class="form-control-file"  type="file" name="file" id="file" accept=".xls,.xlsx"> 
            </div>
            <button type="submit" id="submit" name="import"
                    class="btn btn-success mb-2"> <i class="fa fa-upload fa-lg" aria-hidden="true"></i></button>
                    <?php
                    $admin=new ControladorPagina();
                    $admin -> ctrImportarExcel();
                  ?>
        </form>
        </div>

      <!-- /.box-footer-->
    </div>
    
  </div>
    <!-- /.box -->
        <div  class="modal fade" id="registrarInformacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header tituloTabla">
                  <img src="vistas/img/icono.png" class="img-fluid" style="max-width: 7%;" >
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">

                    <form method="post" enctype="multipart/form-data" id="formularioInformacion">
                        <div class="form-group">
                          <label for="usuario" class="col-form-label">ID del usuario:</label>
                          <input type="text" class="form-control form-control-sm" id="usuarioInformacionID" name="InformacionID" readonly>
                        </div>
                  
                        <div class="form-group">
                        <label for="tipoUsuario" class="col-form-label">Tipo de usuario:</label>
                        <i class="fa fa-info-circle" aria-hidden="true" title="Eliga si el usuario pertenece a la UPEMOR o es un visitante"></i>
                          <select class="form-control form-control-sm" id="tipoUsuario" onchange="mostrarTipoUsuario()">
                          <option value="Interno" selected>Interno</option>
                          <option value="Externo">Externo </option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="usuario" class="col-form-label">Nombre(s):</label>
                          <input type="text" class="form-control form-control-sm" name="InformacionNombre" id="idInformacionNombre" >
                        </div>

                        <div class="form-group">
                          <label for="contrasena" class="col-form-label">Apellido(s):</label>
                          <input type="text" class="form-control form-control-sm" name="InformacionApellido" id="idInformacionApellido">
                        </div>

                        <div class="form-group" id="idMatriculaInformacion">
                          <label for="contrasena" class="col-form-label">Matrícula:</label>
                          <input type="text" class="form-control form-control-sm" name="InformacionMatricula" id="idInputInformacionMatricula">
                        </div>

                        <div class="form-group" id="idGradoYGrupo" style="display: none;">
                          <label for="contrasena" class="col-form-label">Grado y grupo:</label>
                          <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacío"></i>
                          <input type="text" class="form-control form-control-sm" name="InformacionGrado" id="idLlenarGrado">
                        </div>

                        <div class="form-group" id="idPuestoInformacion" >
                          <label for="contrasena" class="col-form-label">Puesto:</label>
                          <input type="text" class="form-control form-control-sm" name="InformacionPuesto" id="idInputInformacionPuesto">
                        </div>
                        <div class="form-group">
                          <label for="InformacionGeneroAct" class="col-form-label">Genero: </label>
                          <select class="form-control form-control-sm" name="InformacionGenero" id="InformacionGenero">
                              <option value="Masculino" selected>Masculino</option>
                              <option value="Femenino">Femenino</option>
                              </select>
                        </div>

                        <div class="form-group">
                          <label class="col-form-label">Foto</label>
                          <i class="fa fa-info-circle" aria-hidden="true" title="Se puede dejar vacio"></i>
                          <input type="file" class="form-control form-control-sm" id="image" name="image" multiple />
                        </div>

                        <div class="modal-footer">
                
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                          <button id="botonValidarInformacion" type="button" class="btn btn-success" onclick="validacionUsuarioInformacion()">Registrar <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                        
                        </div>

                        <?php
                              $usuario = new ControladorUsuarioInformacion();
                              $usuario -> ctrRegistrarUsuarioInfo();
                              
                        ?>
                    </form>
                  </div>
              </div>

            </div>
          </div>
      </div>

      
  </section>


   
</div>
<!-- /.content-wrapper -->

