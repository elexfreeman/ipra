/**
 * Created by elex on 22.12.2016.
 */

var EvnApp = angular.module('EvnApp', ['ngAnimate','ngResource','httpPostFix','ngRoute','ngCookies','ngSanitize']);


/* Редактирование предзаказа */
EvnApp.controller('addCtrl',[
    '$scope','$rootScope','$http', '$location', '$routeParams','$templateCache',
    function($scope, $rootScope, $http, $location, $routeParams,$templateCache) {

    console.info($scope);

        /*инфа об пациента*/
        $http.get("/patient/Get_m_add_form/"+$scope.patient_id)
            .then(function(response) {
                $scope.res = response;
                // выбирам коечное время
            });
    }
]);
