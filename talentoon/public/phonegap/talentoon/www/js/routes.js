angular.module('talentoon').config(function($stateProvider) {
  $stateProvider
    //
    .state('app', {
      url: '/app',
      templateUrl: 'templates/app.html',
      controller: 'app',
      abstract: true
    })


    .state('landing', {
      url: '',
      templateUrl: 'templates/landing.html',
    //   controller: 'home',
    })

    .state('home', {
      url: '/home',
      templateUrl: 'templates/home.html',
      controller: 'homec',
    })

    .state('login', {
      url: '/login',
      templateUrl: 'templates/login.html',
      controller: 'login'
    })
    //
    // .state('register', {
    //   url: '/register',
    //   templateUrl: 'templates/register.html',
    //   controller: 'register'
    // })
    //
    //
    // .state('app.about', {
    //   url: '/about',
    //   views: {
    //     "pageContent": {
    //       templateUrl: "templates/about.html"
    //     }
    //   }
    // })
    //
    // .state('app.chat', {
    //   url: '/chat',
    //   views: {
    //     "pageContent": {
    //       templateUrl: "templates/chat.html",
    //       controller: "publicChat"
    //     }
    //   }
    // })
    //
    // .state('app.private', {
    //   url: '/private/:username',
    //   views: {
    //     "pageContent": {
    //       templateUrl: "templates/chat.html",
    //       controller: "publicChat"
    //     }
    //   }
    // })
    // .state('app.activeUser', {
    //   url: '/activeuser',
    //   views: {
    //     "pageContent": {
    //       templateUrl: "templates/activeUser.html",
    //       controller: "activeUser"
    //     }
    //   }
    // })

})
