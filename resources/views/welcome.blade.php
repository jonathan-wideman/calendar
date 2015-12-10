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


<body>


  <div class="container">
    <div class="title">Web Calendar</div>
      <div class="content">
            <div class="container">
              <div class="container">
              <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                  <div class="panel panel-info" >
                          <div class="panel-heading">

                            <ul class="nav nav-tabs">
                              <li role="presentation" class="active"><a data-toggle="tab" href="#loginbox">Signin</a></li>
                              <li role="presentation"><a data-toggle="tab" href="#signupbox">Register</a></li>
                              </ul>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                          </div>


<div class="tab-content">



    <!-- LOGIN FORM -->
    <div id="loginbox" role="presentation" class="tab-pane fade in active">
    <div class="tab-content">
    <form id="loginform" class="form-horizontal" role="form" method="POST" action="/auth/login">
        {!! csrf_field() !!}



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
  </div>
</div>






<!--Registration Form -->
  <div id="signupbox" role="presentation" class="tab-pane fade">
      <div class="panel-body" >
        <form id="signupform" class="form-horizontal" role="form" method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div id="signupalert" style="display:none" class="alert alert-danger">
                <p>Error:</p>
                <span></span>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                      <div class="col-md-9">
                          <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
  <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                    </div>
                                </div>

                            </form>
  </div>
</div>






</div>
</div>
</div>
</div>
</div>
</div>



</html>
