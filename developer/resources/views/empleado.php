<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid" ng-controller="empleado_controller as ctrl">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <p>Acerca de la API:</p>
                    <ul>
                        <li>Para consultar la API con respuesta JSON se debe realizar una petición GET a  {server-domain}/api/json/employe/salary/{min}/{max}</li>
                        <li>Para consultar la API con respuesta JSON se debe realizar una petición GET a  {server-domain}/api/xml/employe/salary/{min}/{max}</li>
                        <li>Los parámetros GET para filtrar tienen como nombre "{min}=Salario Minimo" y "{max}=Salario Maximo".</li>
                    </ul>
                </div>        
            </div>
        </div>
        <div class="row">
            <h1>Listado de empleados</h1>
            <form class="form-inline">
                <div class="form-group">
                    <label for="exampleInputEmail2">Búsqueda por e-mail</label>
                    <input type="text" class="form-control" name="email" ng-model="search" placeholder="El email o una parte de él">
                </div>
                <button class="btn btn-default">Buscar</button>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Cargo</th>
                            <th>Salario</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="empleado in ctrl.oListEmpleado | filter:search">
                            <td>{{empleado.name}}</td>
                            <td>{{empleado.email}}</td>
                            <td>{{empleado.position}}</td>
                            <td>{{empleado.salary}}</td>
                            <td>
                                <a class="btn btn-info" ng-click="ctrl.visualizar(empleado)" data-toggle="modal" data-target="#modal_contenido">Ver detalle</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="modal fade" id="modal_contenido">
                <div class="modal-dialog modal-lg" style="width:60%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">visualizar empleado</h4>
                        </div>
                        <div class="modal-body">
                        <p>Datos del empleado seleccionado:</p>
                            <ul>
                                <li><strong>Nombre:</strong> {{ctrl.empleado.name}}</li>
                                <li><strong>E-mail:</strong> {{ctrl.empleado.email}}</li>
                                <li><strong>Teléfono:</strong> {{ctrl.empleado.phone}}</li>
                                <li><strong>Dirección:</strong> {{ctrl.empleado.address}}</li>
                                <li><strong>Cargo:</strong> {{ctrl.empleado.position}}</li>
                                <li><strong>Salario:</strong> {{ctrl.empleado.salary}}</li>
                                <li>
                                    <ul>
                                        <strong>Skills:</strong> 
                                        <li ng-repeat="item in ctrl.empleado.skills">{{item.skill}}</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-resource.min.js"></script>
    
    <script src="/js/angular/app.service.js"></script>
    <script src="/js/angular/app.controller.js"></script>
</body>
</html>