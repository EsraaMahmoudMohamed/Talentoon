angular.module('myApp').controller("categories",function($scope,$http,categories,$routeParams,$rootScope,$timeout,FileUploader){

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

		if (filesuploaded.length > 0){
			// alert("sorry files is required")
			$description = $scope.talent.description;
			$from_when = $scope.talent.from_when;

			talent.talent_id = $rootScope.user_id;
			talent.category_id = $routeParams['category_id'];
			talent.from_when = $from_when;
			talent.description = $description;
			talent.files_of_initial_review = filesuploaded;

			console.log("Talent Object is ",talent);




            var fd = new FormData()
            console.log("file descriptionnnnn",fd)
            for (var i in filesuploaded) {
                fd.append("fileToUpload",filesuploaded[i]);
            }
            var config = {headers: {'Content-Type': undefined}};
            var url = "upload.php"
            // var url =  "http://172.16.2.239:8000/api/test"

            console.log("________________In Form Data______________________")

            var httpPromise = $http.post(url, fd, config);
            console.log(httpPromise)
            console.log("________________After HTTP Promise Form Data______________________")




		}else{
			alert("sorry files is required")
		}

	}



     $scope.submit = function() {
            // $scope.form.image = filesuploaded;
            console.log("inside submit scope " ,filesuploaded)

            $http({
              method  : 'POST',
              url     : 'http://localhost:8000/api/uploads/singleuploded',
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
            $scope.currentFile = element.files[0];
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
        if (filesmentoruploaded.length > 0){
            // alert("sorry files is required")
            $experience = $scope.mentor.experience;
            $years_of_experience = $scope.mentor.years_of_experience;

            mentor.mentor_id = $rootScope.user_id;
            mentor.category_id = $routeParams['category_id'];
            mentor.years_of_experience = $years_of_experience;
            mentor.experience = $experience;
            mentor.files_of_mentor_data = filesmentoruploaded;

            console.log("Mentor Object is ",mentor);
        }else{
            alert("sorry profile files is required")
        }

    }








	$scope.categories=categories;
	//get all category
	categories.getAllCategory().then(function(data){
		console.log(data);
		$scope.categories=data;

	} , function(err){
		console.log(err);

	});

$scope.comment={};
	$scope.addcomment= function(valid) {
    if (valid) {
      var comment = $scope.comment
      console.log(comment);
			console.log("vaild in add comment");

    }
		else{
			console.log("error in add comment");
		}
  }

	//get all posts under category
	var index= $routeParams['category_id'];
    $scope.cat_id=index;
    var user_id=1;
    categories.getCategoryPosts(index).then(function(data){
        console.log("inside controller" , data)
        $scope.category_posts=data;

    console.log($scope.category_posts);
    } , function(err){
        console.log(err);

    });




	// subscrib in category
	// categories.subscribe(index,user_id).then(function(data){
	//
	// 	$scope.status=data['status'];
	// 	console.log("hiii")
	// } , function(err){
	// 	console.log(err);
	//
	// });




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










    console.log("Scope_Mentor_Uploader",$scope.ment_uploader)

    //Mentor Uploader


    //files with ng file upload
    var ment_uploader = $scope.ment_uploader = new FileUploader({
        // url: 'http://172.16.2.239:8000/api/test'
        // url:'upload.php'

    });

    // FILTERS
    // a sync filter
    ment_uploader.filters.push({
        name: 'syncFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            console.log('syncFilter');
            return this.queue.length < 10;
        }
    });

    // an async filter
    ment_uploader.filters.push({
        name: 'asyncFilter',
        fn: function(item /*{File|FileLikeObject}*/, options, deferred) {
            console.log('asyncFilter');
            setTimeout(deferred.resolve, 1e3);
        }
    });

    // CALLBACKS
    ment_uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
        console.info('onWhenAddingFileFailed', item, filter, options);
    };
    ment_uploader.onAfterAddingFile = function(fileItem) {
        console.info('onAfterAddingFile', fileItem);
    };
    ment_uploader.onAfterAddingAll = function(addedFileItems) {
        console.info('onAfterAddingAll', addedFileItems);
    };
    ment_uploader.onBeforeUploadItem = function(item) {
        console.info('onBeforeUploadItem', item);
    };
    ment_uploader.onProgressItem = function(fileItem, progress) {
        console.info('onProgressItem', fileItem, progress);
    };
    ment_uploader.onProgressAll = function(progress) {
        console.info('onProgressAll', progress);
    };
    ment_uploader.onSuccessItem = function(fileItem, response, status, headers) {
        console.info('onSuccessItem', fileItem, response, status, headers);
        filesmentoruploaded.push(fileItem._file);
        console.log("file item is ",filesmentoruploaded)
    };
    ment_uploader.onErrorItem = function(fileItem, response, status, headers) {
        console.info('onErrorItem', fileItem, response, status, headers);
    };
    ment_uploader.onCancelItem = function(fileItem, response, status, headers) {
        console.info('onCancelItem', fileItem, response, status, headers);
    };
    ment_uploader.onCompleteItem = function(fileItem, response, status, headers) {
        console.info('onCompleteItem', fileItem, response, status, headers);
        console.log("File uploaded",fileItem);
    };
    ment_uploader.onCompleteAll = function() {
        console.info('onCompleteAll');
    };

    console.info('ment_uploader',ment_uploader);


})
