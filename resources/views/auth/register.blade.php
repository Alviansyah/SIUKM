
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Daftar</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/jquery.ui.all.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/images/ico/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">

</head><!--/head-->
<body onload="ajax()">
<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="/images/ico/desain.png" width="175" height="50" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li style="padding-left: 20px" class="dropdown">
                    <a style="width: 100px;color: white" class="btn btn-info btn-md btn-block" data-toggle="dropdown">Masuk <i class="icon-angle-down"></i></a>
                    <div class="dropdown-menu" style="padding: 20px;width: 250px">
                        <br>
                        <form action="/auth/login" method="post" role="form" class="form-1 center" style="width: 100%">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md btn-block">Masuk</button>
                            </div>

                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header><!--/header-->

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Daftar</h1>

            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">

                </ul>
            </div>
            <div style="clear: both" class="col-sm-6"><h4 id="timer"></h4></div>
        </div>
    </div>
    <br>
</section><!--/#title-->

<section id="registration" class="container">
    <form action="/register/user" method="post" role="form" class="form-1 center">
        {!! csrf_field() !!}
        <fieldset class="registration-form" style=" width: 500px;">

            <div class="form-group">
                @if ($errors->first('name'))
                    <div style="margin-bottom: 0" class="alert alert-danger">
                        {{ $errors->first('name')  }}
                    </div>
                @endif
                <input type="text" id="name" name="name" placeholder="Nama Lengkap" class="form-control"
                       style="border-color: grey;height: 40px" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                @if ($errors->first('username'))
                    <div style="margin-bottom: 0" class="alert alert-danger">
                        {{ $errors->first('username')  }}
                    </div>
                @endif
                <input type="text" id="username" name="username" placeholder="Username, contoh: username"
                       style="border-color: grey;height: 40px" class="form-control" value="{{ old('username') }}">
            </div>

            <div class="form-group">
                @if ($errors->first('email'))
                    <div style="margin-bottom: 0" class="alert alert-danger">
                        {{ $errors->first('email')  }}
                    </div>
                @endif
                <input type="text" id="email" name="email" placeholder="Email" class="form-control"
                       style="border-color: grey;height: 40px" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                @if ($errors->first('Tlahir'))
                    <div style="margin-bottom: 0" class="alert alert-danger">
                        {{ $errors->first('Tlahir')  }}
                    </div>
                @endif
                <input name="Tlahir" type="text" id="datepicker" class="form-control"
                       style="border-color: grey;height: 40px" placeholder="Tangal Lahir"  value="{{ old('Tlahir') }}">
            </div>

            <div class="form-group">
                @if ($errors->first('gender'))
                    <div style="margin-bottom: 0" class="alert alert-danger">
                        {{ $errors->first('gender')  }}
                    </div>
                @endif
            <div class="input-group" style="padding-right: 50px;height: 40px">
                <h4 style="text-align: left" for="">Jenis Kelamin</h4>
                <label class="input-group-addon" for="user_gender_laki-laki">
            <input @if(old('gender')=='Laki-laki') checked="checked" @endif value="Laki-laki" name="gender"
                   id="user_gender_laki-laki" type="radio"> Laki-laki
             </label>
                <label class="input-group-addon" for="user_gender_perempuan">
                    <input @if(old('gender')=='Perempuan') checked="checked" @endif value="Perempuan" name="gender"
                           id="user_gender_perempuan" type="radio"> Perempuan
                </label>
            </div><!-- /input-group -->
            </div>
            <div class="form-group">
                @if ($errors->first('password'))
                    <div style="margin-bottom: 0" class="alert alert-danger">
                        {{ $errors->first('password')  }}
                    </div>
                @endif
                <input type="password" id="password" name="password" placeholder="Password" class="form-control"
                       style="border-color: grey;height: 40px">
            </div>

            <div class="form-group">
                <input type="password" id="password_confirm" name="password_confirmation" placeholder="Password (Confirm)"
                       class="form-control" style="border-color: grey;height: 40px">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-md btn-block"  style= "height: 40px">Register</button>
            </div>
        </fieldset>
    </form>
</section><!--/#registration-->

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.prettyPhoto.js"></script>
<script src="/js/main.js"></script>
<script src="/js/jquery-1.10.2.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jq.js"></script>
</body>
</html>