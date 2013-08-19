'use strict';

angular.module('wpamin')
  .controller('MainCtrl', function ($scope, Process) {
    $scope.message = "";
    $scope.loader = false;

    $scope.toggle = function () {
      $scope.loader = true;
      Process.query(function (data) {
        $scope.message = data["Message"];
        $scope.loader = false;
      });
    };


  });
