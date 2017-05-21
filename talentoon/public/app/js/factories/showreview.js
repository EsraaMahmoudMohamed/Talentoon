angular.module('myApp').factory("showreview",function($q,$http){

return {

		getAllReview:function(){

			var def =$q.defer();
			$http({
				url:'json/review.json' ,
				method:'GET'

			}).then(function(res){
				// console.log(res);
				if(res.data.length){
					def.resolve(res.data)
				}else{
					def.reject('there is no data ')
				}

			},function(err){
				// console.log(err);
				def.reject(err);
			})
			return def.promise ;

		}

		}


})
