window.baseurl = window.location.protocol +"//"+ window.location.host;
var app = angular.module("app", ["ngResource"]);
app.factory("AppService", function ($resource) {
    return $resource(null, { id: "@_id" }, {
        getEmpleado: { method: "GET", url: baseurl + "/empleado/listar", isArray: true },
    });
});