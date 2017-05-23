angular.module('myApp').controller("addpost",function($scope,$http,categories,$routeParams,$location){
  $scope.newpost = function(vaild) {
     if (vaild) {
       var category= $routeParams['category_id'];
       var user_id= 1;
       var postdata = $scope.post
       $scope.post.category_id=category
        $scope.post.user_id=user_id
       console.log(postdata);
       categories.addpost(postdata).then(function(data){
//when data retrived from server
           $location.url('/category/'+$scope.post.category_id);
       } , function(err){
       	console.log(err);

       });

     }

   }
	});
