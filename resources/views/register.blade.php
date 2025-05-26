<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #43cea2, #185a9d);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 24px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2c5282;
            border: none;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #2b6cb0;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #2c5282;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #e53e3e;
            text-align: center;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Register</h2>

        @if ($errors->any())
            <p class="error-message">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="/register">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>

        <a class="login-link" href="/login">Already have an account? Login</a>
    </div>

</body>
</html>
