angular.module('myApp').controller("addworkshop",function($scope,$http,categories,$routeParams,$location,$rootScope){


  $scope.newworkshop = function(vaild) {
     if (vaild) {
       var category= $routeParams['category_id'];
       var mentor_id= 1;
       $scope.workshop.category_id=category
       $scope.workshop.mentor_id=mentor_id
       $scope.workshop.is_approved=0
       $scope.workshop.media_url="image"
       $scope.workshop.media_type="image"

        var workshopdata = $scope.workshop;

       categories.addworkshop(workshopdata).then(function(data){

           console.log("the workshop request from server is ",data);
//when data retrived from server
//            $location.url('/category/'+$scope.post.category_id);
       } , function(err){
       	console.log(err);

       });

     }

   }


});
