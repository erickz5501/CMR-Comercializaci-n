<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Material Login Form a Responsive Widget Template :: w3layouts</title>
        <!-- meta tags -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="keywords"
            content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
        Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
        />
        <!-- /meta tags -->
        <!-- custom style sheet -->
        <link href="{{ asset('login/css/style.css')}}" rel="stylesheet" type="text/css" />
        <!-- /custom style sheet -->
        <!-- fontawesome css -->
        <link href="{{ asset('login/css/fontawesome-all.css')}}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('login/css/bootstrap.min.css')}}">
        <!-- /fontawesome css -->
        <!-- google fonts-->
        <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- /google fonts-->
    </head>

    <body>
        <h1  >Bienvenido a nuestra plataforma Web</h2>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="w3l-login-form">
                        <img src="{{ asset('login/images/grupo2.png')}}" class="" alt="Avatar Image" width="200" height="200">

                    <h2 class="resplandor"><strong>Ingresar al Sistema</strong></h2>
                    <form action="#" method="POST">
                        <div class="w3l-form-group" title="Ingresa tu correo">
                            <label>Correo:</label>
                            <div class="group">
                                <i class="fas fa-user iconcenter"  ></i>
                                <input type="text" class="form-control" placeholder="Username" required="required" />
                            </div>
                        </div>
                        <div class="w3l-form-group" title="Ingresa tu correo">
                            <label>Contraseña:</label>
                            <div class="group">
                                <i class="fas fa-unlock iconcenter"></i>
                                <input type="password" class="form-control" placeholder="Password" required="required" />
                            </div>
                        </div>
                        <div class="forgot">
                            <a href="#">¿Se te olvidó tu contraseña?</a>
                            <p><input type="checkbox" />Recordar contraseña</p>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <button class="loco" href="hola.php" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                    <p class="w3l-register-p">¿No tienes una cuenta?<a href="/dashboard/herramientas/ubicardoc" class="register"> Registrarse</a></p>
                </div>
                <!-- <button type="submit" href="{{ url('/dashboard')}}">Login</button> -->
            </div>
        </div>

        <footer>

            <p class="copyright-agileinfo">
                &copy; 2021 CeatecSoft. Todos los derechos reservados | Diseñado por
                <a href="https://ceatec.com.pe/">CeatecSoft.</a>
            </p>
        </footer>

        <!-- <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js.map"></script> -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('login/js/bootstrap.min.js')}}"></script>
        <script>
            console.log("La resolución de tu pantalla es: " + screen.width + " x " + screen.height)
        </script>
    </body>
</html>
