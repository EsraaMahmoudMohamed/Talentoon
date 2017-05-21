angular.module('myApp').controller("showreview", function($scope, $http,showreview, $routeParams) {



  showreview.getAllReview().then(function(data){

    // console.log(data);
    $scope.allreview=data;
  console.log("allreview",data);
  } , function(err){
    console.log(err);

  });


})
