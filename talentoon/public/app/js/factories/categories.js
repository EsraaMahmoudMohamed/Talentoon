angular.module('myApp').factory("categories",function($q,$http,$rootScope){
return {
		getAllCategory:function(){

			var def =$q.defer();
			$http({
				url:'http://localhost:8000/api/category' ,
				// url:'json/categories.json',
				method:'GET'

			}).then(function(res){
				// console.log(res.data.data);
				if(res.data.data.length){
				// if(res.data.length){
					// console.log(res.data);
					def.resolve(res.data.data)
					// def.resolve(res.data)


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
				// console.log("response is " , res.data.posts);
				if(res.data.posts.length){
		     			def.resolve(res.data.posts);
							// 			console.log("res.data.posts is " , res.data.posts )
						// def.resolve(res.data[index])
				}else{
					def.reject('there is no data ')
				}

			},function(err){
				def.reject(err);
			})
			return def.promise ;

		},
		subscribe:function(data){
			// console.log("from factories CAT ID",category_id);
			// console.log("from factories subscriber_id",subscriber_id);
			// console.log("from factories STATUS =",subscribed);

			var def =$q.defer();

			$http({

				url:'http://localhost:8000/api/categorysubscribe',
				method:'POST',
				data:data

			}).then(function(res){
				console.log("res from subscribe",res);
				if(res.data.status){
					console.log(res.data.status);
		     def.resolve(res.data.status);

				}else{
					def.reject('there is no data ')
				}

			},function(err){
				def.reject(err);
			})
			return def.promise ;

		},
		unsubscribe:function(data){
			// console.log("from factories",index,user_id,status);
        console.log(data);
			var def =$q.defer();

			$http({
				url:'http://localhost:8000/api/categoryunsubscribe' ,
				method:'POST',
				data:data

			}).then(function(res){
				console.log(res);
				console.log(res.data.status);

					console.log(res.data.status);
		     def.resolve(res.data.status);


			},function(err){
				def.reject(err);
			})
			return def.promise ;

		}
		,
		addpost:function(postdata){
			// console.log("Post Dataaaa",postdata);
			var def =$q.defer();
			// console.log('the url ya esraa', 'http://172.16.2.239:8000/api/categories/'+postdata.category_id+'/posts');
			$http({
				url:'http://localhost:8000/api/categories/'+postdata.category_id+'/posts',
                // url:'http://172.16.2.239:8000/api/posts',
				method:'POST',
				data:postdata
			}).then(function(res){

                console.log("____________in res add post ",res.data.post_id)
                console.log("____________media type ",$rootScope.currentFile.type)
				console.log('_________',$rootScope.currentFile.name)


				/////////////////////////
                $http({
                    method  : 'POST',
                    url     : 'http://localhost:8000/api/single_upload/'+res.data.post_id,
                    processData: false,
					data:{"media_url":"uploads/files"+$rootScope.currentFile.name,"media_type":$rootScope.currentFile.type},
                    transformRequest: function (data) {
                        var formData = new FormData();

                        //for(var i =0;i< filesuploaded.length;i++){
                        formData.append("file", $rootScope.currentFile);
                        //  console.log("file in loop",filesuploaded[i])
                        //}
                        return formData;
                    },
                    headers: {
                        'Content-Type': undefined,
                        'Process-Data':false
                    }
                }).then(function(data){
                    // alert(data);
                    console.log("thennnnn in add post",data)
                });

                //////////////////////////////////////////////



				if(res.data){
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
		addworkshop:function(workshopdata){
			console.log(workshopdata);
			console.log(workshopdata.category_id);
			var def =$q.defer();
			$http({

				url:'http://localhost:8000/api/categories/'+workshopdata.category_id+'/workshops' ,
				method:'POST',
				data:workshopdata

			}).then(function(res){
				console.log(res);
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

		},
		complete_talent_profile:function(talent_data){

			var def =$q.defer();
			$http({
				url:'talentdata  url' ,
				method:'POST',
				data:talent_data

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
   		 ,
		complete_mentor_profile:function(mentor_data){

			var def =$q.defer();
			$http({
				url:'http://127.0.0.1:8000/api/categorymentor/store' ,
				method:'POST',
				data:mentor_data

			}).then(function(res){

				if(res.data){
					console.log(res.data);
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
		,

		unmentor:function(mentor_data){
            var def =$q.defer();

            $http({
                url:'http://127.0.0.1:8000/api/categorymentor/update' ,
                method:'PUT',
                data:mentor_data

            }).then(function(res){
                console.log("i am in unmentor",res.data);
                if(res.data){
                    console.log(res.data);
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
