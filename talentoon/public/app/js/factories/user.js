angular.module('myApp').factory("user", function ($http, $q) {

    return {
        register: function (userdata) {
            $http({
                // url:'http://localhost:8000/api/signup' ,
                method: 'POST',
                data: userdata

            }).then(function (res) {

                console.log(res);

            }, function (err) {
                // console.log(err);

            })


        },

        login: function (userdata) {
            $http({
                // url:'http://localhost:8000/api/login' ,
                method: 'POST',
                data: userdata

            }).then(function (res) {

                console.log(res);

            }, function (err) {
                // console.log(err);

            })


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

            })
            return def.promise;

        }


    }


})
