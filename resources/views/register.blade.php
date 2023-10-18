<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <div class="row my-5 d-flex justify-content-center">
            <div class="col-6">

                <p class="text-center h1 fw-bold">Sign up</p>

                <form action="{{ route('register.store') }}" method="POST" class="mx-1 mx-md-4">
                    @csrf

                    <!-- Name input -->
                    <div class="form-outline flex-fill mb-4">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" />
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <!-- Email input -->
                    <div class="form-outline flex-fill mb-4">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" />
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Password input -->
                    <div class="form-outline flex-fill mb-4">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" />
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Repeat your Password input -->
                    <div class="form-outline flex-fill mb-4">
                        <label class="form-label">Repeat your Password</label>
                        <input type="password" name="password_confirmation" class="form-control" />
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <!-- Register buttons -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>

                    <!-- Back To Login buttons -->
                    <div class="d-flex justify-content-center mt-3">
                        <p>Back To? <a href="/">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
