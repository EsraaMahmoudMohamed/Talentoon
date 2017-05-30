angular.module('myApp').controller("competition",function($scope,$http,$routeParams,$location,$rootScope,competition){

  $scope.newcompetition = function(valid){

      console.log("hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii",valid)
     if (valid) {
         var competitiondata = $scope.competition;

         competition.addcompetition(competitiondata).then(function(data){
             console.log(data);

         } , function(err){
            console.log(err);
         });
     }
   }
});
