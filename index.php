<?php 
require_once "controladores/pagina.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/usuariosInformacion.controlador.php";
require_once "controladores/ponencias.controlador.php";
require_once "controladores/proximosEventos.controlador.php";
require_once "controladores/constancias.controlador.php";
require_once "controladores/eventosConcluidos.controlador.php";
require_once "controladores/encuestas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/usuarioDTO.php";
require_once "modelos/usuarioDAO.php";

require_once "modelos/usuariosInformacion.modelo.php";
require_once "modelos/usuarioInformacionDTO.php";
require_once "modelos/usuarioInformacionDAO.php";

require_once "modelos/ponencias.modelo.php";
require_once "modelos/ponenciaDTO.php";
require_once "modelos/ponenciaDAO.php";

require_once "modelos/encuestas.modelo.php";
require_once "modelos/encuestasDTO.php";
require_once "modelos/encuestasDAO.php";

require_once "modelos/constancias.modelo.php";
require_once "modelos/constanciasDTO.php";
require_once "modelos/constanciasDAO.php";

require_once "modelos/proximosEventos.modelo.php";
require_once "modelos/proximosEventosDTO.php";
require_once "modelos/proximosEventosDAO.php";

require_once "modelos/eventosConcluidos.modelo.php";
require_once "modelos/eventosConcluidosDTO.php";
require_once "modelos/eventosConcluidosDAO.php";

require_once "modelos/excel/php-excel-reader/excel_reader2.php";
require_once "modelos/excel/SpreadsheetReader.php";


$admin = new ControladorPagina();
$admin -> ctrAdmin();


?>