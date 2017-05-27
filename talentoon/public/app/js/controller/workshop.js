angular.module('myApp').controller("workshop", function ($scope, $http, workshops, $routeParams,$location,$rootScope) {

$scope.workshop_enroll = function(workshop_id) {
var workshop_id=workshop_id;
var user_id=userId;

console.log(user_id);
var obj={workshop_id,user_id}
console.log(obj);
		workshops.workshop_enroll(obj).then(function(data){
			console.log(data);

		} , function(err){
			console.log(err);

		});

}







});
