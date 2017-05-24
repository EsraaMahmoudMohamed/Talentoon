angular.module('myApp').factory("user", function ($http, $q) {

    return {
        register: function (userdata) {

            //console.log("naaaaahla");
            var def = $q.defer();
            $http({
                url: 'http://localhost:8000/api/signup',
                method: 'POST',
                data: userdata
            }).then(function (res) {
                console.log(res);
                if (res.data) {
                    def.resolve(res.data)
                } else {
                    def.reject('Couldnot create User')
                }

            }, function (err) {
                // console.log(err);
            });
            return def.promise;
        },

        login: function (userdata) {
            var def = $q.defer();
            $http({
                url: 'http://localhost:8000/api/login',
                method: 'POST',
                data: userdata
    
            }).then(function (res) {
                //console.log("userfactory:",res);
                if (res.data) {
                    def.resolve(res.data)
                } else {
                    def.reject('User Couldnot Login');
                }
            }, function (err) {
                console.log(err);
            });
            return def.promise;
        },

        getAllCountry: function () {
            console.log('nahla  ')
            var def = $q.defer();
            $http({
                url:'http://localhost:8000/api/countries',
                method: 'GET'

            }).then(function (res) {
                console.log('in factory', res)
                if (res.data.length) {
                    def.resolve(res.data)
                } else {
                    def.reject('there is no data ')
                }

                console.log(res);
            }, function (err) {
                // console.log(err);
            });
            return def.promise;
        }
    };
});


