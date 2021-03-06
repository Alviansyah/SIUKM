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
<!-- Navigation Section -->
<header>
    <div class="navbar-fixed">
        <nav class="blue darken-3">
            <div class="nav-wrapper container">
                <a href="/" class="brand-logo">SI UKM</a>
                <!-- SideNav Trigger -->
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/">Home</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="drop3">{{Auth::user()->username}}<i class="material-icons right">arrow_drop_down</i></a></li>
                    <!-- Dropdown Structure -->
                    <ul id="drop3" class="dropdown-content dropdown-content-lower-pos">
                        <li><a href="/auth/logout">Logout</a></li>
                    </ul>
                </ul>
                <!-- Mobile Plat -->
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="/auth/logout">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main>
<div class="section-white">
    <div class="container">
        <div class="row">
            @yield('title')
        </div>
        @yield('content')
    </div>
</div>
</main>

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
<!-- JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/materialize.js"></script>
<script type="text/javascript" src="/js/jq.js"></script>
<script type="text/javascript">
$('.datepicker').pickadate({
selectMonths: true, // Creates a dropdown to control month
selectYears: 40, // Creates a dropdown of 15 years to control year
    format: 'yyyy-mm-dd'
});
</script>
</body>
</html>