'use strict';

angular.module('wpamin')
  .controller('MainCtrl', function ($scope, Process) {
    $scope.message = "";

    $scope.toggle = function () {
      Process.query(function (data) {
        $scope.message = data["Message"];
      });
    };


  });
