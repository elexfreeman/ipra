/**
 * Created by elex on 22.12.2016.
 */

var EvnApp = angular.module('EvnApp', ['ngAnimate','ngResource','httpPostFix','ngRoute','ngCookies','ngSanitize']);


/* Редактирование мероприятия */
EvnApp.controller('addCtrl', [
    '$scope', '$rootScope', '$http', '$location', '$routeParams', '$templateCache',
    function ($scope, $rootScope, $http, $location, $routeParams, $templateCache) {

        /*обновление выбора Подтип мероприятияы*/
        $scope.update_rhb_type = function () {
            $http.get("/patient/Get_rhb_evnt/" + $scope.rhb_type)
                .then(function (response) {
                    $scope.rhb_evnt_data = response.data;
                } );
        };

        $scope.m_save = function() {
           /*сохраниение*/
            $http.post(
                '/patient/m_save',
                $.param($scope.formInfo)
            )
                .success(function(response) {
                    /*todo проверка на ошибки*/
                    /* $location.path('/appCalendarEditEvent/'+response.event+"/");*/
                    $scope.res = response;


                });
        };

        /*заничение пациента ID*/
        $scope.patient_id = $("#patient_id").val();

        /*инфа об пациента*/
        $http.get("/patient/Get_m_add_form/" + $scope.patient_id)
            .then(function (response) {
                $scope.res = response;


            });
    }
]);
