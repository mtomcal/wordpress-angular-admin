angular.module('wpamin').
    factory('Process', function($resource, $window){
  return $resource($window.ajaxurl, {action: 'wpamin-process', wpamin_nonce: $window.wpamin_vars.nonce}, {
    query: {method:'JSON', query: {}, cache: true}
  });
});
