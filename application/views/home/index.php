<!doctype html>
<html lang="es-CL">
<head>
    <meta charset="UTF-8">
    <title>Api: Feriados legales de Chile</title>
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/bootstrap-responsive.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo URL::to_asset('css/styles.css'); ?>">
</head>
<body>
    <header class="hero-unit" id="inicio">
        <div class="container">
            <h1>Api: Feriados legales de Chile</h1>
        </div>
    </header>
    <div class="container">
        <div class="content row-fluid">
            <div class="span3 side-bar" id="nav">
                <ul class="nav nav-list" data-spy="affix" data-offset-top="200">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#recurso">Recurso</a></li>
                    <li class="nav-header">Filtros</li>
                    <li><a href="#todos">Todos</a></li>
                    <li><a href="#año">Año</a></li>
                    <li><a href="#mes">Mes</a></li>
                    <li><a href="#dia">Día</a></li>
                    <li class="nav-header">Opciones</li>
                    <li><a href="#paginacion">Paginación</a></li>
                    <li><a href="#ordenamiento">Ordenamiento</a></li>
                    <li><a href="#jsonp">Jsonp (Callback)</a></li>
                    <li class="nav-header">Última actualización:<br>05-02-2013</li>
                </ul>
            </div>
            <div class="span9">
                <section>
                    <h3>Descripción</h3>
                    <p>
                        Esta Api te permitirá obtener los feriados legales de Chile.
                    </p>
                </section>
                <section id="recurso">
                    <h3>Recurso</h3>
                    <p>Cada consulta a la api retorna uno o más recursos de tipo "feriado". Estos recursos tienen la siguiente estructura.</p>
                    <h5>Recurso Feriado:</h5>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Propiedad</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>nombre</td>
                                <td>string</td>
                                <td>Nombre del feriado</td>
                            </tr>
                            <tr>
                                <td>comentarios</td>
                                <td>string</td>
                                <td>Comentarios sobre el feriado.</td>
                            </tr>
                            <tr>
                                <td>fecha</td>
                                <td>string (Y-m-d)</td>
                                <td>Fecha en la que es efectivo el feriado.</td>
                            </tr>
                            <tr>
                                <td>irrenunciable</td>
                                <td nowrap>integer - boolean</td>
                                <td>Específica si el feriado es irrenunciable</td>
                            </tr>
                            <tr>
                                <td>tipo</td>
                                <td>string</td>
                                <td>Tipo de feriado, puede ser "Civil" o "Religioso"</td>
                            </tr>
                            <tr>
                                <td>leyes</td>
                                <td>array</td>
                                <td>Información de las leyes asociadas al feriado, cada registro del arreglo es un objeto con los campos "nombre" y "url" de la ley asociada.</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section id="todos">
                    <h3>Filtros</h3>
                    <h4>Todos</h4>
                    <p>Mediante la url inicial de la api, es posible obtener todos los feriados existentes en nuestro repositorio.</p>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Url</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo URL::base(); ?>/feriados</td>
                                <td>Lista</td>
                                <td>Listado de todo los feriados</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section id="año">
                    <h4>Año</h4>
                    <p>Es posible obtener los feriados de un año en específico.</p>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Url</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Ejemplo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo URL::base(); ?>/feriados/(:año)</td>
                                <td>Lista</td>
                                <td>Listado de feriados</td>
                                <td><?php echo URL::base(); ?>/feriados/2013</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section id="mes">
                    <h4>Mes</h4>
                    <p>Se puede especificar también el mes del cual se necestian obtener los feriados.</p>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Url</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Ejemplo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo URL::base(); ?>/feriados/(:año)/(:mes)</td>
                                <td>Lista</td>
                                <td>Listado de feriados</td>
                                <td><?php echo URL::base(); ?>/feriados/2013/09</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section id="dia">
                    <h4>Día</h4>
                    <p>Mediante este metodo es posible saber si un día en específico es feriado.</p>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Url</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Ejemplo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo URL::base(); ?>/feriados/(:año)/(:mes)/(:día)</td>
                                <td>Feriado</td>
                                <td>Representación única de un feriado</td>
                                <td><?php echo URL::base(); ?>/feriados/2013/09/18</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section id="opciones">
                    <h3>Opciones</h3>
                    <p>Las siguientes opciones pueden se usadas como complemento a los metodos ya mencionados</p>
                </section>
                <section id="paginacion">
                    <h4>Paginación</h4>
                    <p>Es posible realizar paginaciónes a los metodos de tipo lista mediante los parámetros "limit" y "offset"</p>
                    <h5>limit [numeric]</h5>
                    <p>El parámetro limit especifica la cantidad máxima de feriados a obtener para los metodos de tipo "lista"</p>
                    <p class="well"><?php echo URL::base(); ?>/feriados?limit=5</p>
                    <i>Se obtendrán los primeros 5 feriados encontrados por la Api</i>
                    <h5>offset [numeric]</h5>
                    <p>El parámetro offset especifica limite inferior que se utilizará al obtener los feriados para los metodos de tipo "lista"</p>
                    <p class="well"><?php echo URL::base(); ?>/feriados?limit=5&offset=5</p>
                    <i>Se obtendrán 5 feriados a partir del 5° feriado encontrado por la Api</i>
                </section>
                <section id="ordenamiento">
                    <h4>Ordenamiento</h4>
                    <h5>orderBy [string], dafault [fecha]*</h5>
                    <p>Propiedad que se usará para ordenar los feriados obtenidos.</p>
                    <div class="well"><?php echo URL::base(); ?>/feriados?orderBy=nombre</div>
                    <h5>orderDir [string], default [asc]*</h5>
                    <p>Propiedad que se usará para definir la dirección del ordenamiento. Los posibles valores a usar son [asc] y [desc].</p>
                    <div class="well"><?php echo URL::base(); ?>/feriados?orderBy=nombre&orderDir=desc</div>
                </section>            
                <section id="jsonp">
                    <h4>Jsonp (Callback)</h4>
                    <h5>callback [string]</h5>
                    <p>Es posible usar la api mediante <a href="https://en.wikipedia.org/wiki/JSONP" target="_blank">Jsonp</a> para incluirla directamente en tus aplicaciones</p>
                    <div class="well"><?php echo URL::base(); ?>/feriados?callback={string}</div>
                </section>
            </div>
        </div>
    </div>
    <footer class="well">
        <div class="container">
        <p>Unidad de Modernización y Gobierno Digital</p>
        <p>Ministerio Secretaría General de la Presidencia</p>
        <p>
            <a class="powered_by" href="http://laravel.com" target="_blank">Powered by: <img src="<?php echo URL::to_asset('img/laravel.png'); ?>" width="32" alt="Laravel"></a>
        </p>
    </div>
   </footer>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/jquery-1.8.3.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo URL::to_asset('js/bootstrap.min.js'); ?>"></script>
</body>
</html>