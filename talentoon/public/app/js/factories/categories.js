angular.module('myApp').factory("categories",function($q,$http){

return {

		getAllCategory:function(){

			var def =$q.defer();
			$http({
				url:'http://localhost:8000/api/category' ,
				method:'GET'

			}).then(function(res){
				console.log(res.data.data);
				if(res.data.data.length){
					console.log(res.data);
					def.resolve(res.data.data)
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
				url:'http://localhost:8000/api/category/'+index ,
				method:'GET'
			}).then(function(res){
				console.log("response is " , res.data.posts);
				if(res.data.posts.length){
		     			def.resolve(res.data.posts);
		     			console.log("res.data.posts is " , res.data.posts )
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

		},
		addevent:function(eventdata){

			var def =$q.defer();
			$http({
				url:'addevent url' ,
				method:'GET',
				data:eventdata

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
