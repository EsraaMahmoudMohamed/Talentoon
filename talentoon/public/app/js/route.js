angular.module('myApp').config(function($routeProvider){

$routeProvider.when('/',{
	templateUrl:'views/home.html',
	controller:'homec'
})

.when('/post/:post_id',{
	templateUrl:'views/post.html',
	controller:'homec'
})

.when('/initial_review',{
	templateUrl:'views/initial_review.html',
	controller:'initial_review'
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

.when('/category/unsubscribe/:category_id/:user_id',{
	// templateUrl:'views/category.html',
	controller:'categories'
})



//user choose to be a talent under a certain category
.when('/category/betalent/:category_id/:user_id',{
	controller:'talents'
})



//user choose to be a mentor under a certain category
.when('/category/bementor/:category_id/:user_id',{
	controller:'mentors'
})




//add post
.when('/category/:category_id/addpost',{
	templateUrl:'views/addpost.html',
	controller:'addpost'
})
//add event
.when('/category/:category_id/addevent',{
	templateUrl:'views/addevent.html',
	controller:'addevents'
})

//user routes
.when('/register',{
	templateUrl:'views/register.html',
	controller:'register'

})

.when('/login',{
	templateUrl:'views/login.html' ,
	controller:'login'

})

.when('/showreview',{
	templateUrl:'views/showreview.html' ,
	controller:'showreview'

})

.when('/category/:category_id/posts',{
	templateUrl:'views/categoryposts.html',
	controller:'categories'
})

})
