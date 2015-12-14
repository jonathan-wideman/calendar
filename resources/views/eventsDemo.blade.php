<!DOCTYPE html>
<html ng-app="Calendar">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS served from a CDN -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
    rel="stylesheet">

        <title>Events Demo</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .nav {
                width: 50%;
                display: inline-block;
            }

            .calendar {
                width: 100%;
            }

            .left {
                text-align: left;
            }

            .right {
                text-align: right;
            }

            .title {
                font-size: 96px;
            }

            .event {
                border: solid 2px;
                /* the border will curve into a 'D' */  
                border-radius: 10px 40px 40px 10px;
                margin: 10px;   
                padding: 10px;
                /*width: 50%;*/
                background-color: #eee;
                /*font-family: 'Lucida Console', Monospace; */
                font-family: 'Lato', Monospace;
                font-weight: bold;
            }

            .event-name {
                font-size: 16px;
                /*font-family: 'Lucida Console', Monospace;*/
                font-family: 'Lato', Monospace;
            }
        </style>

        <!--Moment.JS Date Library-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>

        <script data-require="angular.js@1.4.x" src="https://code.angularjs.org/1.4.8/angular.js" data-semver="1.4.8"></script>
        <script src="{{asset('js/app.js')}}"></script>

    </head>
    <body ng-controller="MainCtrl">

        <div class="calendar">
            <div class="title">Events Demo</div>
        </div>

        <div class="event" ng-repeat="event in events">
            <div class="event-name">
                <!-- <span contentEditable="true">@{{event.name}}</span> -->
                <input type="text" name="input" ng-model="event.name">
                (id: @{{event.id}})
                <a ng-click="updateEventName(event.id, event.name)">save</a>
            </div>
            <div>
                starts:
                <!-- <input type="text" name="input" ng-model="event.startString"> -->
                <!-- @{{event.startString | asDateTime}} -->
                @{{event.start}}
                <!-- <a ng-click="updateEventStart(event.id, event.startString)">save</a> -->
                <a ng-click="updateEventStart(event.id)">update</a>
            </div> 
            <div>
                ends:
                @{{event.end}}
                <a ng-click="updateEventEnd(event.id)">update</a>
            </div>
        </div>
        
    </body>
</html>
