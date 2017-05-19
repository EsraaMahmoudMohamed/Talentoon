angular.module('myApp').config(function($routeProvider){

$routeProvider.when('/',{
	templateUrl:'views/home.html',
	controller:'homec'
})

.when('/post/:post_id',{
	templateUrl:'views/post.html',
	controller:'homec'
})
//all category
.when('/categories',{
	templateUrl:'views/categories.html',
	controller:'categories',
	resolve:{

		resolvedCategory : function(categories){
			return categories.getAllCategory().then(function(res){
				return res ;
			}) ;
		},

	}
})

//allposts in category
.when('/category/:category_id',{
	templateUrl:'views/category.html',
	controller:'categories'
})

//user subscribe in category

.when('/category/subscribe/:category_id/:user_id',{
	// templateUrl:'views/category.html',
	controller:'categories'
})

})
