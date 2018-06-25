
/// <reference path="angular.js" />
/// <reference path="angular-route.js" />
/// <reference path="angular-translate.js" />
/// <reference path="angular-cookies.min.js" />
/// <reference path="angular-translate-storage-cookie.js" />
/// <reference path="services.js" />

var app = angular.module("Portfolio", ["ngMessages", 'pascalprecht.translate', 'ngCookies']);

app.controller("Skills", function ($scope, $http) {
        $http({
            method: "GET",
            url: "/api/skills"
        })
        .then(function (response) {
            $scope.skills = response["data"];   // the objects are inside of an array called 'data'
        });
    })
    .controller("About", function ($scope, $rootScope, ProfessionalInfoService) {
        ProfessionalInfoService.newData($rootScope.lang).then(function (response) {
            $rootScope.x = response["data"].jobs;
            $rootScope.professionalInfo = formatJobs(response["data"].jobs);
            $rootScope.applicant = response["data"].applicant;
            $rootScope.translatedApplicant = response.data.translatedApplicant;
        });
    })
    .controller("Interests", function ($scope, $rootScope, HobbiesService) {
        var lang = $rootScope.lang;
        HobbiesService.newData(lang).then(function (response) {
            $rootScope.interests = response["data"].translatedInterests;
        });
    })
    .controller("Contacts", function ($scope, $http) {
        $scope.sendMessage = function () {
            $http({
                method: "POST",
                url: "/api/contact",
                data: $scope.model
            })
            .then(function (response) {
                var data = response["data"];
                if (data.msg) {
                    $scope.emailSuccess = true;
                }
                else {
                    console.log(data.errors);
                    if(data.errors.name) {
                        for (var i = 0; i < data.errors.name.length; i++) {
                            if ($('input[name=name]').next('.error').length !== 0) {
                                $('input[name=name]').next('.error').remove();
                            }
                            $('input[name=name]').after('<p class="error">' + data.errors.name[i] + '</p>');
                        }
                    }
                    if(data.errors.email) {
                        for (var i = 0; i < data.errors.email.length; i++) {
                            if ($('input[name=email]').next('.error').length !== 0) {
                                $('input[name=email]').next('.error').remove();
                            }
                            $('input[name=email]').after('<p class="error">' + data.errors.email[i] + '</p>');
                        }
                    }
                    if(data.errors.message) {
                        for (var i = 0; i < data.errors.message.length; i++) {
                            if ($('textarea').next('.error').length !== 0) {
                                $('textarea').next('.error').remove();
                                alert('x');
                            }
                            $('textarea').after('<p class="error">' + data.errors.message[i] + '</p>');
                        }
                    }
                }
            })
        }
    })
    .controller("Language", function ($scope, $rootScope, $translate, HobbiesService, ProfessionalInfoService, $http) {
        $rootScope.lang = $translate.proposedLanguage();

        $scope.changeLang = function(lang_abbreviation) {
            $translate.use(lang_abbreviation);  // change for front-end

            $http({
                url: '/api/language',
                method: 'GET',
                params: {'lang': lang_abbreviation}
            });
        };

        $rootScope.$on('$translateChangeSuccess', function (event, data) {
            var lang = data.language;
            $rootScope.lang = lang;
            HobbiesService.newData(lang).then(function (response) {
                $rootScope.interests = response["data"].translatedInterests;
            });
            ProfessionalInfoService.newData(lang).then(function (response) {
                $rootScope.professionalInfo = formatJobs(response["data"].jobs);
                $rootScope.applicant = response["data"].applicant;
            });
        });

    })
    .config(['$translateProvider', function ($translateProvider) {
        $translateProvider
          .useStaticFilesLoader({
              prefix: "/Helpers/translations_",
              suffix: ".json"
          })
        .preferredLanguage('pt')
        .useCookieStorage();
    }]);


function formatJobs(jobs) {
    jobs.forEach(function (value, index) {
        // for each job, remove the last dot from the list of tasks - bc it will be a divider - and then convert the tasks into an an array by calling split()
        jobs[index].tasks = jobs[index].tasks.substring(0, jobs[index].tasks.length - 1).split(".");

        // now that the tasks are an array, we'll manipulate them
        jobs[index].tasks.forEach(function(v, i) {
            if (i !== jobs[index].tasks.length - 1) { // if not the last task..
                jobs[index].tasks[i] = '"' + v + '.",'; // add '' and commas
            }
            else { // except if it is the last element (task)
                jobs[index].tasks[i] = '"' + v + '."';
            }
        });
    });
    return jobs;
}

