angular.module('myApp').controller("categories",function($scope,$http,categories,$routeParams,$rootScope,$timeout,FileUploader){
	$scope.categories=categories;
	//get all category
	categories.getAllCategory().then(function(data){
		console.log(data);
		$scope.categories=data;

	} , function(err){
		console.log(err);

	});


	//get all posts under category
	var index= $routeParams['category_id'];
	$scope.cat_id=index;
	$rootScope.user_id=1;

	categories.getCategoryPosts(index).then(function(data){

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




	//files with ng file upload
	var uploader = $scope.uploader = new FileUploader({
        url: 'upload.php'
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



    console.log("_____________________________________________");
    console.log($scope.uploader.FileItem)
    console.log("_____________________________________________");

})
