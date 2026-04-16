<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Login SIIFIV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f4f6f9;
        }

        .container{
            width:1000px;
            height:600px;
            display:flex;
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 40px rgba(0,0,0,0.15);
        }

        /* LEFT SIDE */
        .left{
            width:50%;
            padding:60px;
        }

        .logo{
            text-align:center;
            margin-bottom:10px;
        }

        .logo img{
            width:70px;
        }

        h2{
            text-align:center;
            margin:10px 0;
        }

        .subtitle{
            text-align:center;
            font-size:14px;
            color:#777;
            margin-bottom:30px;
        }

        /* SWITCH BUTTONS */
        .switch{
            background:#e9ecef;
            border-radius:30px;
            display:flex;
            margin-bottom:30px;
            overflow:hidden;
        }

        .switch button{
            flex:1;
            padding:10px;
            border:none;
            cursor:pointer;
            background:transparent;
            font-weight:bold;
        }

        .switch .active{
            background:#1da1f2;
            color:white;
            border-radius:30px;
        }

        /* INPUTS */
        .input-group{
            display:flex;
            align-items:center;
            background:#f2f2f2;
            padding:10px 15px;
            border-radius:10px;
            margin-bottom:15px;
        }

        .input-group span{
            margin-right:10px;
            font-size:18px;
        }

        .input-group input{
            border:none;
            background:transparent;
            outline:none;
            width:100%;
        }

        /* BUTTON */
        .btn{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background:#1da1f2;
            color:white;
            font-weight:bold;
            margin-top:10px;
            cursor:pointer;
        }

        .divider{
            display:flex;
            align-items:center;
            margin:25px 0;
            color:#999;
            font-size:13px;
        }

        .divider::before,
        .divider::after{
            content:'';
            flex:1;
            height:1px;
            background:#ddd;
        }

        .divider span{
            margin:0 10px;
        }

        .social{
            display:flex;
            justify-content:center;
            gap:20px;
        }

        .social div{
            width:40px;
            height:40px;
            border-radius:50%;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f2f2f2;
            cursor:pointer;
            font-weight:bold;
        }
        .logo img{
        width:150px;
        }

        /* pocionamiento de la imagen de la derecha  */
        .right{
            width:50%;
            background:url('{{ asset("images/login.jpg") }}') right/cover no-repeat;
            background-position: 75% 100%; /* 75% horizontal = derecha, 100% vertical = medio */
        }

        .hidden{
            display:none;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="left">
        
        <div class="logo">
        <img src="{{ asset('images/logo_siffiv.png') }}" alt="Logo">
        </div>

        <h2>BIENVENIDO</h2>

        <div class="switch">
            <button id="btnLogin" class="active" onclick="showLogin()">Iniciar sesión</button>
            <button id="btnRegister" onclick="showRegister()">Registrate</button>
        </div>

        <!-- LOGIN -->
        <div id="loginForm">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Correo" required>
                </div>

                <div class="input-group">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>

                <button type="submit" class="btn">Continue</button>
            </form>
             <div class="divider">
            <span>O inicia con</span>
        </div>

        <div class="social">
            <div>
                <a href="/auth/google">
                    <i class="fa-brands fa-google"></i>
                </a>
            </div>
        </div>
        </div>

        <!-- REGISTER -->
        <div id="registerForm" class="hidden">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <span><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="name" placeholder="Nombre" required>
                </div>

                <div class="input-group">
                    <span><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Correo" required>
                </div>

                <div class="input-group">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>

                <div class="input-group">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
                </div>

                <button type="submit" class="btn">Registrarse</button>
            </form>
        </div>
    </div>

    <div class="right"></div>

</div>

<script>
function showLogin(){
    document.getElementById('loginForm').classList.remove('hidden');
    document.getElementById('registerForm').classList.add('hidden');
    document.getElementById('btnLogin').classList.add('active');
    document.getElementById('btnRegister').classList.remove('active');
}

function showRegister(){
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('registerForm').classList.remove('hidden');
    document.getElementById('btnLogin').classList.remove('active');
    document.getElementById('btnRegister').classList.add('active');
}
</script>

</body>
</html>