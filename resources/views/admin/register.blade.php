<!DOCTYPE html>
<html lang="en">

<head>

    @section('title', 'Register Admin')
    @include('admin.layout.header')

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="{{ route('doRegister') }}" method="POST">
                                @csrf
                                
                                {{-- Name --}}
                                <div class="form-group">
                                    <input type="text" name="name" id="id" class="form-control form-control-user" placeholder="Name">
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Email">
                                </div>

                                {{-- Password --}}
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Password">
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-user btn-primary w-100 fw-bold">Daftar</button>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Already have an account? Login!</a>
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
