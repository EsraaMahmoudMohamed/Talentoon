angular.module('myApp').controller("categories",function($scope,$http,categories,$routeParams){

	$scope.categories=categories;
//get all category
	categories.getAllCategory().then(function(data){

		console.log(data);
		$scope.categories=data;

	} , function(err){
		console.log(err);

	});


//get all posts under category

var index= $routeParams['category_id'];
$scope.cat_id=index;
var user_id=1;
categories.getCategoryPosts(index).then(function(data){

	$scope.category_posts=data;
console.log($scope.category_posts);
} , function(err){
	console.log(err);

});

// subscrib in category
// categories.subscribe(index,user_id).then(function(data){
//
// 	$scope.status=data['status'];
// 	console.log("hiii")
// } , function(err){
// 	console.log(err);
//
// });

})
