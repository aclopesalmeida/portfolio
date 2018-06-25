
app.service('HobbiesService', function ($http) {
        return {
            newData: function (lang) {
                return $http({
                    method: "get",
                    url: "/api/interests/",
                    params : {lang: lang}
                });
            }
        }
    })
    .service('ProfessionalInfoService', function ($http) {
        return {
            newData: function (lang) {
                return $http({
                    method: "get",
                    url: "/api/jobs/",
                    params: { lang : lang},
                    responseType: 'application/json'
                });
            }
        }
    });

