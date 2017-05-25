angular.module('myApp').controller("login", function ($scope, $http, user, $routeParams,$location) {


    $scope.loginFn = function (valid) {
        if (valid) {
            console.log(valid);
            var userdata = $scope.user
            console.log("inside login:", userdata);
            user.login(userdata).then(function (data) {
                //console.log("blaaaaaaaaaaaa");
                //console.log("data inside login-controller:", data.token);
                console.log("dataaaaa",data);
                localStorage.setItem('token', JSON.stringify(data.token));
                $location.url('/');
            }, function (err) {
                console.log(err);
            });

        }



    }

    //console.log(resolvedProducts);

})
