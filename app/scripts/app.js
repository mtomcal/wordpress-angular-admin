'use strict';

angular.module('wpamin', ["ngResource"])
  .config(function ($routeProvider, $window) {
    $routeProvider
      .when('/', {
        templateUrl: $window.wpamin_vars.url + 'app/views/main.html',
        controller: 'MainCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
