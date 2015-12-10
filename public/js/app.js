var app = angular.module('Calendar', []);

app.controller('MainCtrl', ['$scope', '$http', function($scope, $http) {
    $scope.name = 'Angular';

    // $scope.events = [
    //     {
    //         name: "foo",
    //         start: 1,
    //         end: 2,
    //         icon: ""
    //     },
    //     {
    //         name: "bar",
    //         start: 1,
    //         end: 2,
    //         icon: ""
    //     },
    //     {
    //         name: "bat",
    //         start: 1,
    //         end: 2,
    //         icon: ""
    //     },
    //     {
    //         name: "bin",
    //         start: 1,
    //         end: 2,
    //         icon: ""
    //     },
    //     {
    //         name: "bly",
    //         start: 1,
    //         end: 2,
    //         icon: ""
    //     },
    // ];

    $http.get('events')
    .success(function(data) {
        $scope.events = data;
    });

}]);