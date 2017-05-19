angular.module('myApp').controller("homec",function(Home,$scope,$http,$routeParams){

	Home.getTopPosts().then(function(data){

		// console.log(data);
		$scope.topposts=data;
console.log("top posts",data);
	} , function(err){
		console.log(err);

	});

	Home.getEvents().then(function(data){

		console.log(data);
		$scope.events=data;

	} , function(err){
		console.log(err);

	});


	var post_id= $routeParams['post_id'];
	Home.postDetails(post_id).then(function(data){
		$scope.post=data;
	} , function(err){
		console.log(err);

	});
})
