<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Bootstrap 3 Template / Theme - Flathood</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/formValidation.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-static">
            <div class="container">
                <a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </a>
                <div class="nav-collapse collase">
                    <ul class="nav navbar-nav">  
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                    <ul class="nav navbar-right navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="#">About</a></li>
                            </ul>
                        </li>  
                    </ul>
                </div>		
            </div>
        </nav><!-- /.navbar -->

        <header class="masthead">
            <div class="container">
                <div class="row">
                    <div class="col col-sm-6">
                        <h1><a href="#" title="scroll down for your viewing pleasure">First Social Network</a></h1>
                        <p class="lead">Just try it...</p>
                    </div>
                    <div class="col col-sm-6">
                        <div class="well pull-right">
                            <img src="//placehold.it/280x100/E7E7E7">        
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col col-sm-6">

                        <div class="panel">
                            <div class="panel-body">
                                <h1>Sign In</h1>
                                <form role="form" id="formLogIn">
                                    <div class="form-group">
                                        <label for="email_login">Email address:</label>
                                        <input type="email" class="form-control" id="email_login" name="email_login">
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd_login">Password:</label>
                                        <input type="password" class="form-control" id="pwd_login" name="pwd_login">
                                    </div>
                                    <button type="button" class="btn btn-default" id="logInSubmit">Sign In</button>
                                    <img src="img/ajax-loader.gif" alt="loading..." class="loading" id="loader"/>
                                </form>
                                <h5>OR</h5>
                                <button type="button" class="btn btn-success" id="signUpFormCollaps">Sign Up</button>
                                <div class="collapse">
                                <h1>Sign Up</h1>
                                <form role="form" id="defaultForm" action="users/registration.php" method="post">
                                    <div class="form-group ">
                                        <label for="username">Username: *</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">First Name:</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name:</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address: *</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password: *</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Retype password:</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                    </div>
                                    <div class="form-group">
                                        <label for="datepicker">Birth date:</label>
                                        <div class="input-group input-append date" id="datePicker">
                                            <input type="text" class="form-control" name="date" />
                                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>  
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" value="male" id="gender" /> Male
                                            </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" value="female" id="gender" /> Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-9 col-lg-offset-3">
                                            <button type="submit" id="submit" class="btn btn-primary">Sign up</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="js/lib/formValidation.min.js" type="text/javascript"></script>
    <script src="js/lib/bootstrap.js" type="text/javascript"></script>
    <script src="js/validation.js" type="text/javascript"></script>
    <script src="js/scripts.js"></script>
    <script>

    </script>

</body>
</html>