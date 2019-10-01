<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teltonika test task</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.4/examples/dashboard/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script>
        $(window).on('load', function() {
           $('.nav.nav-sidebar > li').on('click', function(){
               $('.nav.nav-sidebar > li').removeClass('active');
               $(this).addClass('active');
           })
        });
    </script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Teltonika test task</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Teltonika test task</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="mailto:laurynas.ragelskis@gmail.com">laurynas.ragelskis@gmail.com</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="#support">Support actions</a></li>
                <li><a href="#users">Users actions</a></li>
                <li><a href="#todos">Todos actions</a></li>
                <li><a href="#log">Log actions</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 id="overview" class="page-header">Todo list API</h1>

            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>Support</h4>
                    <span class="text-muted">Actions for API using</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>Users</h4>
                    <span class="text-muted">Actions for users maintaining</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>Todos</h4>
                    <span class="text-muted">Actions for todo list maintaining</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>Log</h4>
                    <span class="text-muted">Action for log maintaining</span>
                </div>
            </div>

            <h2 class="sub-header">Description</h2>
            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <li class="list-group-item">For JWT authentication used <code>tymon/jwt-auth</code> package</li>
                        <li class="list-group-item">Logging - simple model/controller instead core functions rewriting</li>
                        <li class="list-group-item">Frondend - hardcoded one page <code>Bootstrap/jQuery</code></li>
                        <li class="list-group-item">Database - <code>MySQL</code> (table created by migration, edited manually)</li>
                        <li class="list-group-item">Core - <code>laravel/lumen-framework</code></li>
                    </ul>
                </div>
            </div>

            <h2 class="sub-header">Source code</h2>
            <div class="row">
                <div class="col-xs-12">
                    <p>Project public repository <a href="https://github.com/LaurynasRagelskis/teltonika" target="_blank">https://github.com/LaurynasRagelskis/teltonika</a></p>
                </div>
            </div>

            <h2 class="sub-header">Start using</h2>
            <div class="row">
                <div class="col-sm-6">
                    <p>
                        <b>For admin (role1) testing</b><br />
                        Request POST http://teltonika.ragelskis.lt/api/login<br />
                        <code>
                            email: admin<br />
                            password: 12345
                        </code>
                    </p>
                </div>
                <div class="col-sm-6">
                    <p>
                        <b>For user (role2) testing</b><br />
                        Request POST http://teltonika.ragelskis.lt/api/register<br />
                        and register new user.
                    </p>
                </div>
            </div>

            <h2 id="support" class="sub-header">Support actions</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Request</th>
                        <th>Route</th>
                        <th>Params</th>
                        <th>Controller@method</th>
                        <th>Permissions</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><button class="btn btn-info">POST</button></td>
                        <td>api/register</td>
                        <td>
                            <ul>
                                <li>name</li>
                                <li>email</li>
                                <li>password</li>
                                <li>password_confirmation</li>
                            </ul>
                        </td>
                        <td>AuthController@register</td>
                        <td>Not authorised user</td>
                        <td>Create new 'role2' user</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-info">POST</button></td>
                        <td>api/login</td>
                        <td>
                            <ul>
                                <li>email</li>
                                <li>password</li>
                            </ul>
                        </td>
                        <td>AuthController@login</td>
                        <td>Not authorised user</td>
                        <td>User authentication.<br />Returns JWT for 'Bearer Token' type authorization.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-info">POST</button></td>
                        <td>api/password/request</td>
                        <td>
                            <ul>
                                <li>email</li>
                            </ul>
                        </td>
                        <td>AuthController@requestNewPassword</td>
                        <td>Not authorised user</td>
                        <td>
                            Create token for password reset.<br>
                            Send email to user with password reset link
                        </td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success">GET</button></td>
                        <td>api/password/request/{token}</td>
                        <td></td>
                        <td>AuthController@newPasswordForm</td>
                        <td>Not authorised user</td>
                        <td>Show form for new password saving.<br>
                            Instead this action can be used:<br>
                            <code>POST api/password/request/{token}</code>
                        </td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-info">POST</button></td>
                        <td>api/password/request/{token}</td>
                        <td>
                            <ul>
                                <li>password</li>
                                <li>password_confirmation</li>
                            </ul>
                        </td>
                        <td>AuthController@resetPassword</td>
                        <td>Not authorised user</td>
                        <td>Save new password for user.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h2 id="users" class="sub-header">Users actions</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Request</th>
                        <th>Route</th>
                        <th>Params</th>
                        <th>Controller@method</th>
                        <th>Permissions</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><button class="btn btn-success">GET</button></td>
                        <td>api/profile</td>
                        <td></td>
                        <td>UserController@profile</td>
                        <td>role1, role2</td>
                        <td>Return authorised user details.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success">GET</button></td>
                        <td>api/users</td>
                        <td></td>
                        <td>UserController@all</td>
                        <td>role1</td>
                        <td>Return all users.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success">GET</button></td>
                        <td>api/users/{id}</td>
                        <td></td>
                        <td>UserController@view</td>
                        <td>role1, role2 (for itself)</td>
                        <td>Return user details.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h2 id="todos" class="sub-header">Todos actions</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Request</th>
                        <th>Route</th>
                        <th>Params</th>
                        <th>Controller@method</th>
                        <th>Permissions</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><button class="btn btn-info">POST</button></td>
                        <td>api/todo</td>
                        <td>
                            <ul>
                                <li>task</li>
                            </ul>
                        </td>
                        <td>TodoController@add</td>
                        <td>role2</td>
                        <td>Create new todo.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success">GET</button></td>
                        <td>api/todo</td>
                        <td></td>
                        <td>TodoController@all</td>
                        <td>role1, role2</td>
                        <td>For authorised user return todos list.<br />
                            For admin returns todos list of all users.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success">GET</button></td>
                        <td>api/todo/{id}</td>
                        <td></td>
                        <td>TodoController@view</td>
                        <td>role1, role2</td>
                        <td>Return todo details.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-warning">PUT</button></td>
                        <td>api/todo/{id}</td>
                        <td>
                            <ul>
                                <li>task</li>
                            </ul>
                        </td>
                        <td>TodoController@edit</td>
                        <td>role2</td>
                        <td>Update user todo.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-danger">DELETE</button></td>
                        <td>api/todo/{id}</td>
                        <td></td>
                        <td>TodoController@add</td>
                        <td>role1</td>
                        <td>Delete todo.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h2 id="log" class="sub-header">Log actions</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Request</th>
                        <th>Route</th>
                        <th>Params</th>
                        <th>Controller</th>
                        <th>Permissions</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><button class="btn btn-success">GET</button></td>
                        <td>api/log</td>
                        <td></td>
                        <td>LogController@all</td>
                        <td>role1</td>
                        <td>Return all log list.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-success">GET</button></td>
                        <td>api/log/{id}</td>
                        <td></td>
                        <td>LogController@view</td>
                        <td>role1</td>
                        <td>Return log input details.</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-danger">DELETE</button></td>
                        <td>api/log</td>
                        <td></td>
                        <td>LogController@clear</td>
                        <td>role1</td>
                        <td>Delete all log inputs.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>