
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
        }

        .card {
            border-radius: 15px; 
        }

        .card-header {
            background-color: #007bff; 
            color: white; 
            border-top-left-radius: 15px; 
            border-top-right-radius: 15px; 
        }

        .btn-primary {
            background-color: #007bff; 
            border: none; 
        }

        .btn-primary:hover {
            background-color: #0056b3; 
        }

        .text-center a {
            color: #007bff; 
        }

        .text-center a:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4 class="font-weight-bold">Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
