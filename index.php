<?php
include("connections/conexion_aerolinea.php");

$sql_ciudad_o = "SELECT id, nombre FROM ciudades";
$ciudad_o = $conn->query($sql_ciudad_o);

$sql_ciudad_d = "SELECT id, nombre FROM ciudades";
$ciudad_d = $conn->query($sql_ciudad_d);

$sql_categoria = "SELECT id, denominacion FROM categorias";
$categoria = $conn->query($sql_categoria);
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <title>Aerolínea</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/jquery-ui.css" rel="stylesheet" media="screen">
        <style>
            body {
                background-image: url("img/fondo.jpg");
                background-size: 100% 100%;  -moz-background-size: 100% 100%;
                opacity: 0.8;
            }
            #footer {
                position:fixed;
                left:0px;
                bottom:0px;
                height:60px;
                width:100%;
                background:#CFD7DB;
            }
        </style>
    </head> 
    <body class="container">
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/head.jpg" alt="" id="fondo">
                <div class="carousel-caption">
                    <h1>Aerolínea</h1>
                    <p>Test Desarrollo</p>
                </div>
            </div>
        </div>
        <br>
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item" style="width:20%;">
                <a class="nav-link active" data-toggle="pill" href="#home"><center>Inicio</center></a>
            </li>
            <li class="nav-item" style="width:20%;">
                <a class="nav-link" data-toggle="pill" href="#menu1"><center>Reserve su vuelo</center></a>
            </li>
            <li class="nav-item" style="width:20%;">
                <a class="nav-link" data-toggle="pill" href="#menu2"><center>Ver información del vuelo</center></a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="home" class="container tab-pane active">
                <br><br>
                <h3 class="text-center"><font color="#35935D"><b>Bienvenidos a su página de reservas online!</b></font></h3>
            </div>
            <div id="menu1" class="container tab-pane fade">
                <br><br>
                <form class="form-horizontal" method="post" name="formulario" id="formulario">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="origen" class="control-label">Ciudad de Orígen</label>
                                <select name="origen" class="form-control" id="origen">
                                    <option value="">Seleccione..</option>
                                    <?php
                                    if ($ciudad_o->num_rows > 0) {
                                        while ($row = $ciudad_o->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        echo "No hay resultados";
                                    }
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha" class="control-label">Fecha Salida</label>
                                <input type="text" class="form-control" name="fecha_salida" id="fecha_salida" placeholder="DD/MM/YYYY" readonly>
                            </div>

                            <br><br>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success btn-lg" style="width:80%;">Reservar</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="destino" class="control-label">Ciudad de Destino</label>
                                <select name="destino" class="form-control" id="destino">
                                    <option value="">Seleccione..</option>
                                    <?php
                                    if ($ciudad_d->num_rows > 0) {
                                        while ($row = $ciudad_d->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        echo "No hay resultados";
                                    }
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoria" class="control-label">Categoría</label>
                                <select name="categoria" class="form-control" id="categoria" required>
                                    <option value="">Seleccione..</option>
                                    <?php
                                    if ($categoria->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $categoria->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['denominacion']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        echo "No hay resultados";
                                    }
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Agregar servicios especiales?</label>
                                <br>
                                <label class="radio-inline col-lg-3">
                                    <input type="radio" name="optradio">Si
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio">No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="servicios">Seleccione los servicios especiales que desea incluír:</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Comidas especiales
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Menores sin acompañante
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Condiciones médicas especiales
                                </label>  
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Asiento adicional
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Oxígeno a bordo
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Viaje con bebé
                                </label>
                                <br>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">Otros
                                </label> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="origen" placeholder="Describa...">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="respuesta">
                </div>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>
                <h3>Detalles</h3>
                <p>Los detalles de tu vuelo:</p>
            </div>
        </div>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Confirmar Reserva</h4>
                    </div>
                    <div class="modal-body">     
                        <label class="checkbox-inline">
                            <input type="checkbox" value="" required>Acepto los términos y condiciones:
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Confirmar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '< Ant',
                nextText: 'Sig >',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy/mm/dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function () {
                $("#fecha_salida").datepicker();
            });

            $(document).ready(function () {
                $('#submit').on('click', function (e) {
                    e.preventDefault();
                    $('#myModal').modal('show');
                });

            });
            $(function () {
                $("#submit").click(function () {
                    var url = "ajax/insertar.php"; // El script a dónde se realizará la petición.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
                        success: function (data)
                        {
                            $("#respuesta").html(data); // Mostrar la respuestas del script PHP.
                        }
                    });

                    return false; // Evitar ejecutar el submit del formulario.
                });
            });
        </script>
        <br><br><br><br>
        <div id="footer">
            <!--Copyright-->
            <div class="footer-copyright py-3 text-center">
                <font size=3> © 2018 Desarrollado por Marisol Murcia - </font>
                <font size=3><a href="#"> Colombian Outsourcing Solutions</a></font>
                <br>
            </div>
            <!--/.Copyright-->
        </div>
    </body> 
</html>