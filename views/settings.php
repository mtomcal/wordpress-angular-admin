<div ng-app="wpamin">
  <div ng-controller="MainCtrl" ng-cloak>
  <h2>Admin Settings</h2>
  <button class="button-primary" ng-click="toggle()">Test JSON Call</button>
  <img ng-show="loader" src="/wp-admin/images/wpspin_light.gif" alt="" />
  <p>{{message}}</p>
  </div>
</div>
