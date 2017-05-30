angular.module('myApp').controller("register", function($scope, $http, user, $routeParams,dateFilter) {

user.getAllCountry().then(function(data){

		// console.log(data);
		$scope.countries=data;
console.log("countries",$scope.countries);
	} , function(err){
		console.log(err);

	});

  $scope.registerFn = function(vaild) {
    if (vaild) {
      var userdata = $scope.user
		// $scope.user.date_of_birthday=	 dateFilter(date_of_birthday, 'yyyy-MM-dd')
		// console.log($scope.user.date_of_birthday);
      // user.register(userdata);
	console.log("if vaild",$scope.user);
    }
		console.log($scope.user);
  }



})
