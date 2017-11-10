(function () {
    'use strict';

    angular.module('app').controller('empleado_controller', controller);

    controller.$inject = ['$location','AppService']; 

    function controller($location,AppService) {
        /* jshint validthis:true */
        var context = this;
        context.title = 'Empleado Controller';
        context.empleado = {};

        activate();

        function activate() { 
            AppService.getEmpleado().$promise.then(function (res) {
                context.oListEmpleado = res;
            });
        }

        context.visualizar = function(oEmpleado){
            context.empleado = oEmpleado;
        }
    }
})();
