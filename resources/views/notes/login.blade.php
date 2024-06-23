<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Display Notes</title>
        <link rel="stylesheet" href="{{ asset('css/app3.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <form method="POST" action="{{ route('notes.login') }}">
            @csrf
            <div class="form-container">
                <h2>Login</h2>
                
                <div>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" required>
                </div>
            
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                
                <div class="remember-forgot-container">
                    <div class="remember-container">
                       
                    </div>
                    {{-- {{ route(' password.request') }} --}}
                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                </div>

                <div>
                    <button type="submit">Sign In</button>
                </div>

                <div class="register-link">
                    <p>Not registered yet? <a href="{{ route('notes.register') }}">Register for free.</a></p>
                </div>
            </div>
    </form>






    <div class="message">
        @if(session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif
    </div>
    
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>