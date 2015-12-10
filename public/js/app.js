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

    $scope.getEvents = function() {
        $http.get('events')
        .success(function(data) {
            $scope.events = data;
        });
    }

    $scope.getEvents();

    $scope.postData = {
        id: 1,
        start: 0,
        end: 0
    }

    $scope.updateTime = function() {
        // Create the http post request
        // the data holds the keywords
        // The request is a JSON request.
        $http.post('set-event-time', { "data" : $scope.postData}).
        success(function(data, status) {
            $scope.status = status;
            $scope.data = $scope.postData;
            $scope.result = data; // Show result from server in our <pre></pre> element
            $scope.getEvents();
        })
        .
        error(function(data, status) {
            $scope.data = data || "Request failed";
            $scope.status = status;         
        });
    };

}]);