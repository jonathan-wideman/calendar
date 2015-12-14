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
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!--Moment.JS Date Library-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>

        <title>My Calendar</title>
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
                font-weight: bold;
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

                font-family: ;
                font-size:20px;
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

            table.monthView {
              background: #fff;
              border-collapse: collapse;
              font-family: 'lato';
              font-size: 13px;
              width: 100%;
            }

            table.monthView td {
              border: 2px solid #ccc;
              height: 100px;
              line-height: 22px;
              text-align: left;
              font-weight: bold;
              vertical-align: top;
            }

            table.monthView tr:first-child td {
              text-align: center;
              vertical-align: text-top;
              height: 25px;
              width: 25px;
              font-weight: 700;
            }

           td:hover {
              background-color: #337ab7;
              color: white;
            }


      table.weekView {
        table-layout:fixed;
        background: #fff;
        border-collapse: collapse;
        font-family: 'lato';
        font-size: 13px;
        width: 100%;
      }

      table.weekView td {
        border: 2px solid #ccc;
        height: 25px;
        line-height: 22px;
        text-align: left;
        font-weight: bold;
        vertical-align: top;
      }

      th {
        text-align: center;
        vertical-align: text-top;
        height: 25px;
        width: 50px;
        font-weight: 700;
      }

      th.time {
        text-align: center;
        vertical-align: text-top;
        height: 25px;
        width: 25px;
        font-weight: 700;
      }

      td.Time {
        text-align: center;
        vertical-align: text-top;
        height: 50px;
        width: 25px;
        font-weight: 700;
      }

      #displayMoment {
        font-size: 20px;
        text-align: center;
      }

      #monthYear {
        font-size: 20px;
        text-align: center;
      }

      #monthTitle {
        font-size: 20px;
        text-align: center;
      }

      #calLayout {
        text-align: center;
      }

      #navToggle {
        position:relative;
        top: -15px;
        left: 5px;
        font-size: 30;

      }

      #navUser {
        font-size: 15px;
      }



      </style>
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
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

              <ul class="nav navbar-nav">
                <li role="presentation"> <a data-toggle="tab" href="#wView">Week</a></li>
                <li role="presentation" class="active"> <a data-toggle="tab" href="#mView">Month</a></li>
                <li role="presentation"> <a data-toggle="tab" href="#dView">Day</a></li>
              </ul>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" style="height: 25px;">
              </div>
              <button type="submit" style="height: 25px;" class="btn btn-default">Submit</button>
            </form>
            <div class="nav right">
              <div id="navUser"><span>{{ Auth::user()->email }}</span>
              <a href="logout"><i class=" glyphicon glyphicon-off"></i></a></div>
            </div>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <!-- Toggle Nav Button-->
      <div id="navToggle"><button class="btn1"><i class=" glyphicon glyphicon-menu-down"></i></button></div>
      </head>

      <body>




          <!--Month view layout-->
          <div class="tab-content">
            <div id="mView" role="presentation" class="tab-pane fade in active">
              <div id="monthTitle"></div>
            <div id="calLayout">  <button onclick="lastMonth()"<i class=" glyphicon glyphicon-menu-left"></i></button>
              <button onclick="nextMonth()"<i class=" glyphicon glyphicon-menu-right"></i></button></div>

              <div id="calendarMonth"></div>

                <script>
                cal_days_labels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

                cal_days_in_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
                // this is the current date
                cal_current_date = new Date();
                function Calendar(month, year) {
                  this.month = (isNaN(month) || month == null) ? cal_current_date.getMonth() : month;
                  this.year  = (isNaN(year) || year == null) ? cal_current_date.getFullYear() : year;
                  this.html = '';
                }
                Calendar.prototype.generateHTML = function(){

                  var firstDay = new Date(this.year, this.month, 1);
                  var startingDay = firstDay.getDay();

                  var monthLength = cal_days_in_month[this.month];

                  var html = '<br><table class="monthView">';
                  html += '<tr class="calendar-header">';

                  for(var i = 0; i <= 6; i++ ){
                    html += '<th>';
                    html += cal_days_labels[i];
                    html += '</th>';
                  }
                  html += '</tr><tr>';

                  var day = 1;
                  for (var i = 0; i < 9; i++) {
                    for (var j = 0; j <= 6; j++) {
                      html += '<td class="calendar-day">';
                      if (day <= monthLength && (i > 0 || j >= startingDay)) {
                        html += day;
                        day++;
                      }
                      html += '</td>';
                    }
                    if (day > monthLength) {
                      break;
                    } else {
                      html += '</tr><tr>';
                    }
                  }
                  html += '</tr></table>';

                  this.html = html;
                }

                Calendar.prototype.getHTML = function() {
                  return this.html;
                }
                </script>

                <script type="text/javascript">
                var Moment = moment();
                document.getElementById("monthTitle").innerHTML = Moment.format("MMMM YYYY");
                var cal = new Calendar();
                cal.generateHTML();
                document.getElementById("calendarMonth").innerHTML = cal.getHTML();

                 function nextMonth() {
                   Moment.add(1, 'month');
                   document.getElementById("monthTitle").innerHTML = Moment.format("MMMM YYYY");
                   var month = Moment.month();
                   var cal = new Calendar(month);
                   cal.generateHTML();
                   document.getElementById("calendarMonth").innerHTML = cal.getHTML();
                 }

                 function lastMonth() {
                   Moment.subtract(1, 'month');
                   document.getElementById("monthTitle").innerHTML = Moment.format("MMMM YYYY");
                   var month = Moment.month();
                   var cal = new Calendar(month);
                   cal.generateHTML();
                   document.getElementById("calendarMonth").innerHTML = cal.getHTML();
                 }
                </script>
            </div>

                <!--Week view layout-->
                <div id="wView" role="presentation" class="tab-pane fade">
                  <div id="monthYear"></div>
                <div id="calLayout"><button onclick="lastWeek()"<i class=" glyphicon glyphicon-menu-left"></i></button>
                  <button onclick="nextWeek()"<i class=" glyphicon glyphicon-menu-right"></i></button></div>


                  <br><table class="weekView">

                    <tr>
                      <th class="time"></th>
                      <th><div id="sunDisplay"></div></th>
                      <th><div id="monDisplay"></div></th>
                      <th><div id="tueDisplay"></div></th>
                      <th><div id="wedDisplay"></div></th>
                      <th><div id="thuDisplay"></div></th>
                      <th><div id="friDisplay"></div></th>
                      <th><div id="satDisplay"></div></th>
                    </tr>

                    <tr>
                      <td rowspan="2">12am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">1am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">2am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">3am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">4am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">5am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">6am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">7am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">8am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">9am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">10am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">11am</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">12pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">1pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">2pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">3pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">4pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">5pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">6pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">7pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">8pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">9pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">10pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td rowspan="2">11pm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>

                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>


                  </table>
                </div>

                <!--Day view layout-->
                <div id="dView" role="presentation" class="tab-pane fade">

                  <table class="weekView">
                    <div id="displayMoment"></div>
                    <div id="calLayout"><button onclick="yesterday()"<i class=" glyphicon glyphicon-menu-left"></i></button>
                    <button onclick="tomorrow()"<i class=" glyphicon glyphicon-menu-right"></i></button></div>

                    <tr>
                      <th class="time"></th>
                      <th ></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>

                    <tr>
                      <td rowspan="2">12am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">1am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">2am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">3am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">4am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">5am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">6am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">7am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">8am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">9am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">10am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">11am</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">12pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">1pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">2pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">3pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">4pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">5pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">6pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">7pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">8pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">9pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">10pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td rowspan="2">11pm</td>
                      <td colspan="7"></td>
                    </tr>

                    <tr>
                      <td colspan="7"></td>
                    </tr>

                  </table>
                </div>

              </div>
            </div>
          </body>

  <!--Display Week View Date-->
    <script type="text/javascript">

    var NowMoment = moment();
    var Sun = moment(NowMoment.day(0)).format("ddd, Do"),
        Mon = moment(NowMoment.day(1)).format("ddd, Do"),
        Tue = moment(NowMoment.day(2)).format("ddd, Do"),
        Wed = moment(NowMoment.day(3)).format("ddd, Do"),
        Thu = moment(NowMoment.day(4)).format("ddd, Do"),
        Fri = moment(NowMoment.day(5)).format("ddd, Do"),
        Sat = moment(NowMoment.day(6)).format("ddd, Do"),
        monthYear = moment(NowMoment.day(3)).format("MMMM YYYY");


      document.getElementById("sunDisplay").innerHTML = Sun;
      document.getElementById("monDisplay").innerHTML = Mon;
      document.getElementById("tueDisplay").innerHTML = Tue;
      document.getElementById("wedDisplay").innerHTML = Wed;
      document.getElementById("thuDisplay").innerHTML = Thu;
      document.getElementById("friDisplay").innerHTML = Fri;
      document.getElementById("satDisplay").innerHTML = Sat;
      document.getElementById("monthYear").innerHTML = monthYear;


      function lastWeek() {
        Sun = moment(NowMoment.day(-7)).format("ddd, Do"),
        Mon = moment(NowMoment.day(1)).format("ddd, Do"),
        Tue = moment(NowMoment.day(2)).format("ddd, Do"),
        Wed = moment(NowMoment.day(3)).format("ddd, Do"),
        Thu = moment(NowMoment.day(4)).format("ddd, Do"),
        Fri = moment(NowMoment.day(5)).format("ddd, Do"),
        Sat = moment(NowMoment.day(6)).format("ddd, Do");
        monthYear = moment(NowMoment.day(3)).format("MMMM YYYY");


        document.getElementById("sunDisplay").innerHTML = Sun;
        document.getElementById("monDisplay").innerHTML = Mon;
        document.getElementById("tueDisplay").innerHTML = Tue;
        document.getElementById("wedDisplay").innerHTML = Wed;
        document.getElementById("thuDisplay").innerHTML = Thu;
        document.getElementById("friDisplay").innerHTML = Fri;
        document.getElementById("satDisplay").innerHTML = Sat;
        document.getElementById("monthYear").innerHTML = monthYear;
      }

      //nextWeek function
      function nextWeek() {
        Sun = moment(NowMoment.day(7)).format("ddd, Do"),
        Mon = moment(NowMoment.day(1)).format("ddd, Do"),
        Tue = moment(NowMoment.day(2)).format("ddd, Do"),
        Wed = moment(NowMoment.day(3)).format("ddd, Do"),
        Thu = moment(NowMoment.day(4)).format("ddd, Do"),
        Fri = moment(NowMoment.day(5)).format("ddd, Do"),
        Sat = moment(NowMoment.day(6)).format("ddd, Do");
        monthYear = moment(NowMoment.day(3)).format("MMMM YYYY");

        document.getElementById("sunDisplay").innerHTML = Sun;
        document.getElementById("monDisplay").innerHTML = Mon;
        document.getElementById("tueDisplay").innerHTML = Tue;
        document.getElementById("wedDisplay").innerHTML = Wed;
        document.getElementById("thuDisplay").innerHTML = Thu;
        document.getElementById("friDisplay").innerHTML = Fri;
        document.getElementById("satDisplay").innerHTML = Sat;
        document.getElementById("monthYear").innerHTML = monthYear;
      }

      </script>

<!--Display Day view date-->
        <script type="text/javascript">
          var NowMoment = moment();
          var Day = moment(NowMoment).format("dddd, MMMM Do YYYY");
          var displayDate = document.getElementById('displayMoment');
          displayDate.innerHTML = Day;


          //tomorrow function displays tomorrow's date
          function tomorrow() {
            var nextDay = moment(NowMoment.add('days', 1)).format("ddd, MMMM Do YYYY");
            displayDate.innerHTML = nextDay;
          }

          function yesterday() {
            var previousDay = moment(NowMoment.subtract('days', 1)).format("ddd, MMMM Do YYYY");
            displayDate.innerHTML = previousDay;
          }

        </script>

<!--Script to toggle Navbar-->

        <script>
          $(document).ready(function(){

            $(".btn1").click(function(){
              $("nav").slideToggle("fast", "linear");
            });
          });
          </script>
          </html>
