<!DOCTYPE html>
<html lang="en">

<head>

    @section('title', 'Login Admin')

    @include('admin.layout.header')

</head>

<body class="bg-gradient-primary">

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
            </div>
        @endif



        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            <i class="bi bi-shield-fill-exclamation"></i> {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{ route('doLogin') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" id="email"
                                                class="form-control form-control-user
                                            @error('email')
                                                is-invalid
                                            @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                            @error('email')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-user
                                            @error('password')
                                                is-invalid
                                            @enderror"
                                                id="exampleInputPassword" placeholder="Password" required>
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="container d-flex justify-content-between">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <div>
                                                <a class="small" href="register">Create an Account!</a>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        {{-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> --}}

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('admin.layout.script')

</body>

</html>
