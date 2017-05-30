angular.module('myApp').factory("competition", function ($q, $http, $rootScope) {
    return {
        addcompetition: function (competition) {
            var def = $q.defer();
            $http({
                url: 'http://localhost:8000/api/competition/create_competition',
                method: 'POST',
                data: competition
            }).then(function (res) {
                console.log(res.data);
                if (res.data) {
                    def.resolve(res.data)
                } else {
                    def.reject('there is no data ')
                }
            }, function (err) {
                def.reject(err);
            })
            return def.promise;
        }
    }
})
