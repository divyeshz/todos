<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="row my-5 d-flex justify-content-center">
            <div class="col-6">

                {{-- Include Flash Message  --}}
                @include('layouts.flash')

                <p class="text-center h1 fw-bold">Log in</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" />
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" />
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mb-4">Sign in</button>
                    </div>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="register">Register</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        $("#alert-box").delay(3000).fadeOut();
    </script>
</body>

</html>
