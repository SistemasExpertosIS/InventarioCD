<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            body{
                background-image: url('img/Welcome.png');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 30px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            a:link, a:visited {
            background-color: none;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            }

            a:hover, a:active {
              background-color: none;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="links">
                    <a data-toggle="modal" href="#myDocs">Documentación</a>
                    <a data-toggle="modal" href="#myWho">Quienes Somos</a>
                    <a data-toggle="modal" href="#myContactos">Contactos</a>
                </div>
            </div>
        </div>
        <div>
                    <!-- Modal Documentacion-->
          <div class="modal" id="myDocs" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h1 class="modal-title">Documentación</h1>
                </div>
                <div class="modal-body">
                     <p>Documentos STI</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
                  <!-- Modal Quienes Somos-->
          <div class="modal" id="myWho" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h1 class="modal-title">Quienes Somos</h1>
                </div>
                <div class="modal-body">
                    <img src="/img/sti.png" style="width:150px;height:150px;"/>
                      <p>Soluciones tecnológicas Integrales (STI), se dedica al análisis, diseño, creación e implementación de soluciones con base en tecnología y su capacitado recurso humano.
                      Hace meses el control del Inventario de la empresa se realizaba con asignaciones de tareas manuales aumentando los tiempos de los procesos impactando en todas las áreas de la misma, es por ello que se nos contrata para llevar a cabo el Sistema de Control de Inventarios buscando eficiencia y eficacia en la gestión de inventarios, se ve plasmado en cada etapa del proyecto la solución integral que se le brinda a la empresa.
                      </p>
                      <p>
                      La empresa STI se encarga de dar soluciones integrales a un número de empresas de diferentes rubros. La problemática actual radica en que no cuenta con un sistema para el control de su inventario. Lo cual genera problemas al momento de llevar un control de la existencia de los productos en bodega central y sus sucursales, se registra de manera manual las entradas y salidas del inventario, solicitudes y ordenes de compras, movimiento de productos en stock. Quien se encarga de realizar el inventario es el jefe de bodega, procesos vitales de la empresa que no cuenta con ninguna forma sistematizada para su gestión. Los encargados de sucursales y jefes de bodega se quejan por los tiempos elevados de respuesta a sus órdenes de compra, tardanza en las entregas y nulo seguimiento de estas. Los cual genera que la empresa tenga que realizar varios pasos manuales para encontrar productos disponibles en el inventario de sus sucursales, agregar costos por el movimiento de productos entre sucursales, tiempos elevados de respuesta para los clientes, etc
                      </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Contactos-->
            <div class="modal" id="myContactos" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h1 class="modal-title" id="myModalLabel">Contactos</h1>
                        </div>
                        
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div>
                                  <div>
                                       <br><h4>Telefono: 22450000</h4>
                                       <br><h4>Email: STI_Contacto@STI.COM</h4> 
                                       <br><h4>Facebook: STIHn</h4> 
                                  </div>
                                  <div>
                                      
                                  </div>
                            </div>
                            <p class="statusMsg"></p>
                            <form role="form">
                                <div class="form-group">
                                    <label for="inputName">Nombre</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Nombre"/>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Correo</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Correo"/>
                                </div>
                                <div class="form-group">
                                    <label for="inputMessage">Mensaje</label>
                                    <textarea class="form-control" id="inputMessage" placeholder="Mensaje"></textarea>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">ENVIAR</button>
                        </div>
                    </div>
                </div>
            </div>
                    
    </body>
</html>
