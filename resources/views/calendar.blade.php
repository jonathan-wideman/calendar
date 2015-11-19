<!DOCTYPE html>
<html>
    <head>
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
            <span>user@email.com</span>
            <span><a href="/">logout</a></span>
        </div>
        <div class="calendar">
            <div class="title">Calendar Page</div>
        </div>
    </body>
</html>
