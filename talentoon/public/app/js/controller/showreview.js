angular.module('myApp').controller("showreview", function($scope, $http,showreview, $routeParams) {



  showreview.getAllReview().then(function(data){

    // console.log(data);
    $scope.allreview=data;
  console.log("allreview",data);
  } , function(err){
    console.log(err);

  });



  $scope.review = function(vaild) {
    if (vaild) {
      var reviewdata = $scope.review
      console.log(reviewdata);
      // review.addreview(reviewdata)

    }



  }

})
