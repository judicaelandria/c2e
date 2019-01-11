<html>
<head>
    <style>
        h1{
            font-size: 30pt;
        }
        p, strong, span{
            font-size: 16pt;
        }
        .c2e-container{
            text-align: center;
        }
        .c2e-content{
            max-width: 500px;
            display: inline-block;
            text-align: left;
        }
        .c2e-header{
        }
    </style>
</head>
<body>
<div class="c2e-container">
    <div class="c2e-content">
        <div class="c2e-header" style="background-color: #191919;
            height: 40px;">

        </div>
        <h1>  Bienvenue! </h1>
        <p>
            <strong>Merci d'avoir créer un compte</strong><br/>
            <span>Login : <strong>{{ $login }}</strong></span><br/>
            <span>Mot de passe : <strong>{{ $password }}</strong></span>
        </p>
    </div>
</div>
</body>