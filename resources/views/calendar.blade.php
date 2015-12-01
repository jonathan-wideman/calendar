<!DOCTYPE html>
<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS served from a CDN -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
    rel="stylesheet">


        <title>Laravel</title>

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
        </style>
    </head>
    <body>
        <div class="nav left">
            <span>[^]</span>
            <span>day</span>
            <span>week</span>
            <span>month</span>
            <span>toolbar</span>
            <span>search</span>
        </div>
        <div class="nav right">
            <span>{{ Auth::user()->email }}</span>
            <a href="logout"><i class=" glyphicon glyphicon-off"></i></a>
        </div>
        <div class="calendar">
            <div class="title">Calendar Page</div>
        </div>
    </body>
</html>
