angular.module('myApp').controller("categories",function($location,$scope,$http,categories,$routeParams,$rootScope,$timeout,FileUploader){

	var filesuploaded = []
    var filesmentoruploaded = []
	var talent = {}
    var mentor = {}

    console.log('iam here')
	//
    // $scope.show = function() {
    //     ModalService.showModal({
    //         templateUrl: 'talent_complete_profile.html',
    //         controller: "talents"
    //     }).then(function(modal) {
    //         modal.element.modal();
    //         modal.close.then(function(result) {
    //             $scope.message = "You said " + result;
    //         });
    //     });
    // };
	//
	//



	$scope.completeTalentProfile = function(){

		if (filesuploaded.length > 0)
		{

			talent.talent_id = 1;
			talent.category_id = $routeParams['category_id'];
			talent.from_when =$scope.talent.from_when;
			talent.description = $scope.talent.description;
			talent.files_of_initial_review = filesuploaded;

			console.log("Talent Object is ",talent);

            categories.complete_talent_profile(talent).then(function(data){
                console.log(data)



            }, function (err) {
                console.log(err)
            });




            // var fd = new FormData()
            // console.log("file descriptionnnnn",fd)
            // for (var i in filesuploaded) {
            //     fd.append("fileToUpload",filesuploaded[i]);
            // }
            // var config = {headers: {'Content-Type': undefined}};
            // var url = "upload.php"
            // // var url =  "http://172.16.2.239:8000/api/test"
            //
            // console.log("________________In Form Data______________________")
            //
            // var httpPromise = $http.post(url, fd, config);
            // console.log(httpPromise)
            // console.log("________________After HTTP Promise Form Data______________________")
            //



		}else{
			alert("sorry files is required")
		}

	}



     $scope.submit = function() {
            // $scope.form.image = filesuploaded;
            console.log("inside submit scope " ,filesuploaded)

            $http({
              method  : 'POST',
              url     : 'http://localhost:8000/api/test',
              processData: false,
              transformRequest: function (data) {
                  var formData = new FormData();
                  for(var i =0;i< filesuploaded.length;i++){
                        formData.append("file", filesuploaded[i]);
                        console.log("file in loop",filesuploaded[i])
                  }

                  return formData;
              },
              data : filesuploaded,
              headers: {
                     'Content-Type': undefined,
                     'Process-Data':false
              }
           }).then(function(data){
                // alert(data);
                console.log("thennnnnnn",data)
           });

    };




    $scope.uploadedFile = function(element) {
            console.log("element is ",element)
            $scope.currentFile = element.files[0];

            filesuploaded.push(element.files[0])

            var reader = new FileReader();

            reader.onload = function(event) {
              $scope.image_source = event.target.result
              $scope.$apply(function($scope) {
                $scope.files = element.files;
              });
            }
        reader.readAsDataURL(element.files[0]);
    }












    $scope.completeMentorProfile = function(){

        mentor.mentor_id = 1;
        mentor.category_id = $routeParams['category_id'];
        mentor.years_of_experience = $scope.mentor.years_of_experience;
        mentor.experience =$scope.mentor.experience;
        mentor.status=1;


        console.log("Mentor Object is ",mentor);

    categories.complete_mentor_profile(mentor).then(function(data){
        console.log(data)

        }, function (err) {
                console.log(err)
            });




    }

    $scope.unmentor = function(){

        mentor.mentor_id = 1;
        //$routeParams['category_id']
        mentor.category_id = 1;
        mentor.action="unmentor";


        console.log("Mentor Object is ",mentor);

        categories.unmentor(mentor).then(function(data){
            console.log(data)

        }, function (err) {
            console.log(err)
        });




    }


    //assuming we have user id and the role that define him as mentor
    //here we will get the mentor status to make toggle button in views
    // categories.getUser(1).then(function(data){
    //
    //     console.log(data);
    //     $scope.currentUser=data;
    //
    // } , function(err){
    //     console.log(err);
    //
    // });

//------------------------------------------------------------------
	//get all category
	categories.getAllCategory().then(function(data){
		$scope.categories=data;
	} , function(err){
		console.log(err);

	});
//----------------------------------------------------------------------
$scope.comment={};
	$scope.addcomment= function(valid) {
    if (valid) {
      var comment = $scope.comment
      // console.log(comment);
			// console.log("vaild in add comment");

    }
		else{
			console.log("error in add comment");
		}
  }
//---------------------------------------------------------------
	//get 3  posts under category
	// $scope.allposts = function() {
	var index= $routeParams['category_id'];
    $scope.cat_id=index;
    var user_id=1;
    categories.getCategoryPosts(index).then(function(data){
        // console.log("inside controller" , data)
        $scope.category_posts=data;
        // console.log("la2aa",$scope.category_posts);

    console.log($scope.category_posts);
    } , function(err){
        console.log(err);

    });
// }
//------------------------------------------------------------------

$scope.allposts = function() {
var index= $routeParams['category_id'];
	$scope.cat_id=index;
	var user_id=1;
	categories.getCategoryPosts(index).then(function(data){
			// console.log("inside controller" , data)
			$rootScope.categoryPosts=data;
			$location.url('/category/'+index+'/posts');
			console.log('/category/'+index+'/posts')
			console.log("all posts under category",$scope.categoryposts);


	} , function(err){
			console.log(err);

	});
}
//--------------------------------------------------------------



var index= $routeParams['category_id'];
	$scope.cat_id=index;
	var user_id=1;
	categories.getCategoryposts(index).then(function(data){
			// console.log("inside controller" , data)
			$rootScope.categoryPosts=data;
			// $location.url('/category/'+index+'/posts');
			console.log('/category/'+index+'/posts')
			console.log("all posts under category",$scope.categoryposts);


	} , function(err){
			console.log(err);

	});

//---------------------------------------------------------------
//get all post under category
// $scope.allposts = function() {
//     $rootScope.cat_id=index;
//     var user_id=1;
// 		categories.getAllCategoryPosts(index).then(function(data){
// 				// console.log("inside controller" , data)
// 				$scope.categoryposts=data;
// 				// console.log("la2aa",$scope.category_posts);
//
// 		console.log($scope.categoryposts);
// 		} , function(err){
// 				console.log(err);
//
// 		});
//
// }
	// subscribe in category
		  // var unsubscribe_status=0;
		// console.log("user id ",user_id);
		// 	console.log("cat id",index);
// var obj={index,user_id,subscribe_status};



//----------------------------single----post---------------------------------------
// $scope.singlepost=function(id){
var index= $routeParams['category_id'];
var id= $routeParams['post_id'];
// var id=id
	$scope.cat_id=index;
	var user_id=1;
	categories.getCategoryPost(id).then(function(data){
			// console.log("inside controller" , data)
			$rootScope.category_post=data;
			// $rootScope.category_post = localStorage.getItem("data");
			console.log("single post from controller",$rootScope.category_post);

    //  $location.url('/category/'+index+'/posts/'+id);

	} , function(err){
			console.log(err);

	});


// }
//---------------------------------------------------------

// subscribe in category
$scope.subscribe = function() {
	$routeParams['user_id']=1;
	 var subscriber_id= $routeParams['user_id'];
	 var subscribed=1;
	var category_id = $routeParams['category_id'];
var obj={subscriber_id, category_id,subscribed }
console.log(obj);
		categories.subscribe(obj).then(function(data){
			// $rootScope.status=data;
			localStorage.setItem('status',data);
			$rootScope.status = localStorage.getItem("status");
			console.log("status in controller",$rootScope.status);
			 $location.url('/category/'+category_id);
			// console.log("hiii")
		} , function(err){
			console.log(err);

		});

}
//----------------------------------------------------

// unsubscribe in category
$scope.unsubscribe = function() {
	$routeParams['user_id']=1;
	 var subscriber_id= $routeParams['user_id'];
	 var subscribed=0;
	var category_id = $routeParams['category_id'];
var obj={subscriber_id, category_id,subscribed }
console.log(obj);
		categories.unsubscribe(obj).then(function(data){
			localStorage.setItem('status',data);
			$rootScope.status = localStorage.getItem("status");
			// $rootScope.status=data;
			console.log("status in controller",$rootScope.status);
			  $location.url('/category/'+category_id);
			// console.log("hiii")
		} , function(err){
			console.log(err);

		});

}

//--------------------------------------------------------------------

	// categories.unsubscribe(index,user_id,unsubscribe_status).then(function(data){
	// 	$scope.status=data.status;
	//
	// } , function(err){
	// 	console.log(err);
	//
	// });

//--------------------------------------------------------




//----------------------------------


    // Talent Uploader

	//files with ng file upload
	var uploader = $scope.uploader = new FileUploader({
        // url: 'http://172.16.2.239:8000/api/test'
        // url: 'upload.php'
        url: 'http://localhost:8000/api/uploads/singleuploded'
    });

    // FILTERS
    // a sync filter
    uploader.filters.push({
        name: 'syncFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            console.log('syncFilter');
            return this.queue.length < 10;
        }
    });

    // an async filter
    uploader.filters.push({
        name: 'asyncFilter',
        fn: function(item /*{File|FileLikeObject}*/, options, deferred) {
            console.log('asyncFilter');
            setTimeout(deferred.resolve, 1e3);
        }
    });

    // CALLBACKS
    uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
        console.info('onWhenAddingFileFailed', item, filter, options);
    };
    uploader.onAfterAddingFile = function(fileItem) {
        console.info('onAfterAddingFile', fileItem);
    };
    uploader.onAfterAddingAll = function(addedFileItems) {
        console.info('onAfterAddingAll', addedFileItems);
    };
    uploader.onBeforeUploadItem = function(item) {
        console.info('onBeforeUploadItem', item);
    };
    uploader.onProgressItem = function(fileItem, progress) {
        console.info('onProgressItem', fileItem, progress);
    };
    uploader.onProgressAll = function(progress) {
        console.info('onProgressAll', progress);
    };
    uploader.onSuccessItem = function(fileItem, response, status, headers) {
        console.info('onSuccessItem', fileItem, response, status, headers);
        filesuploaded.push(fileItem._file);
        console.log("file item is ",filesuploaded)
    };
    uploader.onErrorItem = function(fileItem, response, status, headers) {
        console.info('onErrorItem', fileItem, response, status, headers);
    };
    uploader.onCancelItem = function(fileItem, response, status, headers) {
        console.info('onCancelItem', fileItem, response, status, headers);
    };
    uploader.onCompleteItem = function(fileItem, response, status, headers) {
        console.info('onCompleteItem', fileItem, response, status, headers);
        console.log("File uploaded",fileItem);
    };
    uploader.onCompleteAll = function() {
        console.info('onCompleteAll');
    };

    console.info('uploader', uploader);


    //End Talent Uploader
})
