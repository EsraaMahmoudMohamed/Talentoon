angular.module('talentoon').controller("login", function ($scope, $http, user,$state,$rootScope) {
$scope.user={}

    $scope.loginFn = function (valid) {
        console.log('in controller');
        if (valid) {
            console.log(valid);
            var userdata = $scope.user
            console.log($scope.user);
            console.log("inside login:", userdata);
            user.login(userdata).then(function (data) {
                console.log("dataaaaa minA",data);
                $rootScope.user_info = data.user
                $rootScope.token = data.token
                $state.go('home');
            }, function (err) {
                console.log(err);
            });

        }



    }

    //console.log(resolvedProducts);

})
