var app = angular.module('Calendar', []);

app.filter('asDateTime', function() {
    return function(input) {
        input = input || '';
        // var day = moment();
        var day = moment(input);
        return day.toDate();
        // return input;
    }
});

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
            $scope.events = data.sort(function(a, b) {
                return a.name < b.name ? -1 : 1;
            });
        });
    }

    $scope.getEvents();

    $scope.updatePostData = function() {
        $scope.postData = {
            id: 1,
            start: Date.now(),
            end: Date.now()
        }
    }

    $scope.updateTime = function() {
        // Create the http post request
        // the data holds the keywords
        // The request is a JSON request.
        $scope.updatePostData();
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

    $scope.updateEventStart = function(id, startText) {
        start = Date.now();
        if (startText) {
            start = moment(startText).toDate();
            console.log(start);
        }
        var postData = {
            id: id,
            start: start
        }
        $http.post('set-event-time', { "data" : postData}).
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
    }

    $scope.updateEventEnd = function(id) {
        var postData = {
            id: id,
            end: Date.now()
        }
        $http.post('set-event-time', { "data" : postData}).
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
    }

    $scope.updateEventName = function(id, name) {
        var postData = {
            id: id,
            name: name
        }
        $http.post('set-event-name', { "data" : postData}).
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
    }

}]);