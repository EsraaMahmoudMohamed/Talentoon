angular.module('myApp').controller("login", function($scope, $http, user, $routeParams) {

  
  $scope.loginFn = function(vaild) {
    if (vaild) {
      var userdata = $scope.user
      console.log(userdata);
      user.login(userdata)

    }



  }

  //console.log(resolvedProducts);

})
