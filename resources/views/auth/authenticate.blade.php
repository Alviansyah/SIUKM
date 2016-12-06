<!DOCTYPE html>
<html>
<head>
    <title>SI UKM UNEJ</title>
    <!-- FONTS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/css/custom-css.css">

    <link rel="stylesheet" href="/fontawesome/css/font-awesome.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<!-- JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/materialize.js"></script>
<!-- Navigation Section -->
<header>
    <div class="navbar-fixed">
        <nav class="blue darken-3">
            <div class="nav-wrapper container">
                <a href="#!" class="brand-logo">SI UKM</a>
                <!-- SideNav Trigger -->
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <!-- Desktop Plat -->
                <ul class="right hide-on-med-and-down">
                    <li><a href="home.php">Homepage</a></li>
                </ul>
                <!-- Mobile Plat -->
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="home.php">Homepage</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <center>
            <h3 face="Opificio">SIGN IN</h3>
        </center>
        <div class="divider"></div>
    </div>

    <div class="row">
        <div class="container">
            <div class="col s12 m12 l8 offset-l2">
                <div class="card teal lighten-5">
                    <div class="card-content white-text">
                        <div class="row">

                            <form class="col s12 centered" method="post"  action='/auth/login'>
                                {!! csrf_field() !!}
                                @if ($errors->first('username'))
                                    <div style="margin-bottom: 0" class="card-panel red lighten-2">
                                        {{ $errors->first('username')  }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="input-field centered">

                                        <input id="last_name" type="text" name="username" style="color: black">
                                        <label class="" for="last_name">Username</label>
                                    </div>
                                </div>
                                @if ($errors->first('password'))
                                    <div style="margin-bottom: 0" class="card-panel red lighten-2">
                                        {{ $errors->first('password')  }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="input-field centered">

                                        <input id="password" class="validate" type="password" name="password">
                                        <label for="password">Password</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <center>
                                        <div class="waves-effect waves-light btn">
                                            <button type="submit" class="btn-flat white-text">Sign In</button>
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Section -->
<footer class="page-footer teal darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">SISTEM INFORMASI</h5>
                <p class="grey-text text-lighten-4">UNIT KEGIATAN MAHASISWA<br>UNIVERSITAS JEMBER</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Line</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">BBM</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            &copy; 2014 SIUKM DevTeam
            <a class="grey-text text-lighten-4 right" href="#!">SSO UNEJ</a>
        </div>
    </div>
</footer>
</body>
</html>