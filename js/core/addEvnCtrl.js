/**
 * Created by elex on 22.12.2016.
 */

var EvnApp = angular.module('EvnApp', ['ngAnimate','ngResource','httpPostFix','ngRoute','ngCookies','ngSanitize']);


/* Добавление мероприятия */
EvnApp.controller('addCtrl', [
    '$scope', '$rootScope', '$http', '$location', '$routeParams', '$templateCache',
    function ($scope, $rootScope, $http, $location, $routeParams, $templateCache) {
        $scope.formInfo = {

        };
        /*обновление выбора Подтип мероприятияы*/
        $scope.update_rhb_type = function () {
            $http.get("/patient/Get_rhb_evnt/" + $scope.formInfo.typeid)
                .then(function (response) {
                    $scope.rhb_evnt_data = response.data;
                } );
        };

        $scope.m_save = function() {
            if (($scope.formInfo.rhb_res==0)&&($scope.formInfo.rhb_res_no==undefined)) {
                $scope.modalError="Причина не выполнения";
                $("#modealError").modal('show');
            } else{
                /*сохраниение*/
                $http.post(
                    '/patient/m_save/' + $scope.patient_id,
                    $.param($scope.formInfo)
                )
                    .success(function (response) {
                        /*todo проверка на ошибки*/
                        /* $location.path('/appCalendarEditEvent/'+response.event+"/");*/

                        location.replace('/patient/show/' + $scope.patient_id);

                    });
            };
        };

        /*заничение пациента ID*/
        $scope.patient_id = $("#patient_id").val();

        //$scope.formInfo = [];
        /*инфа об пациента*/
        $http.get("/patient/Get_m_add_form/" + $scope.patient_id)
            .then(function (response) {
                $scope.res = response;
                $scope.formInfo = {
                    'lpu' : response.data.user,
                    'prgid' : response.data.patient.pg_id
                };
            });
    }
]);


/* Редактирование мероприятия */
EvnApp.controller('editCtrl', [
    '$scope', '$rootScope', '$http', '$location', '$routeParams', '$templateCache',
    function ($scope, $rootScope, $http, $location, $routeParams, $templateCache) {

        /*обновление выбора Подтип мероприятияы*/
        $scope.update_rhb_type = function () {
            $http.get("/patient/Get_rhb_evnt/" + $scope.formInfo.typeid)
                .then(function (response) {
                    $scope.rhb_evnt_data = response.data;
                } );
        };

        $scope.m_update = function() {
            /*сохраниение*/
            $http.post(
                '/patient/m_update/' + $scope.patient_id,
                $.param($scope.formInfo)
            )
                .success(function (response) {
                    /*todo проверка на ошибки*/
                    /* $location.path('/appCalendarEditEvent/'+response.event+"/");*/

                    location.replace('/patient/show/' + $scope.patient_id);

                });
        };

        /*заничение пациента ID*/
        $scope.patient_id = $("#patient_id").val();
        $scope.rhb_id = $("#rhb_id").val();

        //$scope.formInfo = [];
        /*инфа об пациента*/
        $http.get("/patient/get_prg_rhb/" + $scope.patient_id + "/" + $scope.rhb_id)
            .then(function (response) {
                $scope.res = response;

                /*данные на форме из запроса*/
                $scope.formInfo = {
                    'lpu' : response.data.user
                    ,'prgid' : response.data.patient.pg_id
                    ,'typeid' : response.data.prg_rhb.typeid
                    ,'evntid' : response.data.prg_rhb.evntid
                    ,'dt_exc' : response.data.prg_rhb.dt_exc
                    ,'name' : response.data.prg_rhb.name
                    ,'resid' : response.data.prg_rhb.resid
                };
            });
    }
]);


$('.hasDatepicker2').datetimepicker({
    format : 'Y-m-d',
    lang : 'ru',
    timepicker : false,
    closeOnDateSelect : true
});