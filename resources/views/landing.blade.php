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

            .title {
                font-size: 96px;

            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Web Calendar</div>

                <div>
                  <!-- LOGIN FORM -->
                  <form id="loginform" class="form-horizontal" role="form" method="POST" action="/auth/login">
                      {!! csrf_field() !!}

                      <div class="container">
                      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                          <div class="panel panel-info" >
                                  <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                      <li role="presentation" class="active"><a data-toggle="tab" href="#loginbox">Signin</a></li>
                                      <li role="presentation"><a data-toggle="tab" href="#signupbox">Register</a></li>
                                      </ul>
                                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                                  </div>

                                  <div style="padding-top:30px" class="panel-body" >

                                      <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                      <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" placeholder="email" type="email" name="email" value="{{ old('email') }}">
                      </div>

                      <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" placeholder="password" type="password" name="password" id="password">
                      </div>

                      <div class="input-group">
                      <div class="checkbox">
                          <input type="checkbox" name="remember"> Remember Me
                      </div>


                    <div style="margin-top:10px" class="form-group">
                      <div class="input-group">
                          <button id="btn-login" type="submit" href="#" class="btn btn-success"><i class=" glyphicon glyphicon-ok-sign">Login</i></button>
                      </div>
                           </div>
                         </div>
                           </form>

                      </div>
                  </form>
                  </div>
                  </div>
                  </div>
                </div>
              </div>


                <div>


                    <ul>
                        <li>fast</li>
                        <li>efficient</li>
                        <li>simple</li>
                    </ul>
                </div>
            </div>
        </div>




    </body>
</html>
