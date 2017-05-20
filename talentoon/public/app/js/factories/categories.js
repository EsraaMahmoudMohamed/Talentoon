angular.module('myApp').factory("categories",function($q,$http){

return {

		getAllCategory:function(){

			var def =$q.defer();
			$http({
				url:'json/categories.json' ,
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
		getCategoryPosts:function(index){

			var def =$q.defer();
			$http({
				url:'json/posts.json' ,
				method:'GET'

			}).then(function(res){
				// console.log(res);
				if(res.data.length){
		     def.resolve(res.data);
						// def.resolve(res.data[index])

				}else{
					def.reject('there is no data ')
				}

			},function(err){
				def.reject(err);
			})
			return def.promise ;

		},
		subscribe:function(index,user_id){

			var def =$q.defer();
			$http({
				url:'json/posts.json' ,
				method:'GET'

			}).then(function(res){
				// console.log(res);
				if(res.data.length){
		     def.resolve(res.data);

				}else{
					def.reject('there is no data ')
				}

			},function(err){
				def.reject(err);
			})
			return def.promise ;

		},
		addpost:function(postdata){

			var def =$q.defer();
			$http({
				url:'addpost url' ,
				method:'GET',
				data:postdata

			}).then(function(res){

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
