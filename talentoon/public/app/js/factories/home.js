angular.module('myApp').factory("Home",function($q,$http){

return {

		getTopPosts:function(){

			var def =$q.defer();
			$http({
				url:'json/posts.json' ,
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

		},
    getEvents:function(){

			var def =$q.defer();
			$http({
				url:'http://127.0.0.1:8000/api/event' ,
				method:'GET'

			}).then(function(res){
				console.log('gggfff',res);
				if(res.data){
					console.log(res.data);
					def.resolve(res.data.event)
				}else{
					def.reject('there is no data ')
				}

			},function(err){
				// console.log(err);
				def.reject(err);
			})
			return def.promise ;

		},

		postDetails:function(index){

			var def =$q.defer();
			$http({
				url:'json/posts.json' ,
				method:'GET'

			}).then(function(res){
				// console.log(res);
				if(res.data.length){
						def.resolve(res.data[index])

				}else{
					def.reject('there is no data ')
				}

			},function(err){
				def.reject(err);
			})
			return def.promise ;

		}
		}


})
