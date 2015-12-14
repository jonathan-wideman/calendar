<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <!-- Bootstrap CSS served from a CDN -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
                font-family: "Lucida Console", Monospace;
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

                font-family: ;
                font-size:20px;
            }

            .div1 {
              display: hidden;
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

            ul li{
                font-size:15px;
            }

            .nav2 {
                font-size:20px;
                margin: 0;
                padding: 0;
                width: 50%;
                display: table;
                font-weight: 100;
                font-family: 'lato' ;
            }

            table {
                background: #fff;
                border-collapse: collapse;
                color: #222;
                font-family: 'lato';
                font-size: 13px;
                width: 100%;
            }

            td {
                border: 2px solid #ccc;
                height: 100px;
                color: #222;
                line-height: 22px;
                text-align: left;
                font-weight: bold;
                vertical-align: top;
            }

            tr:first-child td {
                text-align: center;
                vertical-align: text-top;
                height: 25px;
                width: 50px;
                color: #222;
                font-weight: 700;
            }

            .selected {
                background: #f0952d;
                border: 2;
                box-shadow: 0 2px 6px rgba(0, 0, 0, .5) inset;
            }

        </style>
    </head>

    <body>
        <div class="div2">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <i class=" glyphicon glyphicon-menu-up"></i>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li role="presentation"> <a data-toggle="tab" href="#wView">Week</a></li>
                            <li role="presentation"> <a href="#mView">Month</a></li>
                            <li role="presentation"> <a href="#dView">Day</a></li>
                        </ul>

                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" style="height: 25px;">
                            </div>
                            <button type="submit" style="height: 25px;" class="btn btn-default">Submit</button>
                        </form>

                        <div class="nav right">
                            <span>{{ Auth::user()->email }}</span>
                            <a href="logout"><i class=" glyphicon glyphicon-off"></i></a>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>

        <div class="tab-content">
            <div id="mView" role="presentation" class="tab-pane fade in active">
                <table>
                    <tr>
                        <td>Sun</td>
                        <td>Mon</td>
                        <td>Tue</td>
                        <td>Wed</td>
                        <td>Thu</td>
                        <td>Fri</td>
                        <td>Sat</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="wView" role="presentation" class="tab-pane fade in active"></div>
        <div id="dView" role="presentation" class="tab-pane fade in active"></div>
    </body>
</html>
