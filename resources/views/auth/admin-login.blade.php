<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CECOMP 2024 - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
        }
        body {
            background-image: url('https://www.uns.edu.pe/recursos/noticias/b77a9072bbaf2bb858f02a6999b66c99.jpg');

}
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            color: #000;
        }

        .avatar-container {
            width: 80px;
            height: 80px;
            background: #e0e0e0;
            border-radius: 50%;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-icon {
            width: 60%;
            height: 60%;
            background: #999;
            border-radius: 50%;
        }

        .login-form {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group img {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            opacity: 0.5;
        }

        .input-group input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-register {
            background-color: #007bff;
            color: white;
        }

        .btn-login {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .error-message {
            color: #dc3545;
            margin-top: 1rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="title">BIENVENIDO</h1>
        <div class="avatar-container">
            <div class="avatar-icon"></div>
        </div>
        
        <form class="login-form" action="{{ route('loginM') }}" method="POST">
            @csrf
            <div class="input-group">
                
                <input type="email" name="email" placeholder="usuario" required>
            </div>
            
            <div class="input-group">
            
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="btn-container">
               
                <button type="submit" class="btn btn-login">INICIAR SESION</button>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <strong>{{ $errors->first() }}</strong>
                </div>
            @endif
        </form>
    </div>
</body>
</html>