<!doctype html>
<html lang="en">
<head>
    <title>Sign Up | MiniShop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url(/login/images/1212.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>
                        <form class="signin-form" method="POST">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="name" id="name" required>
                                <label class="form-control-placeholder" id="name" for="username">UserName</label>
                            </div><br>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email" required>
                                <label class="form-control-placeholder" id="email" for="username">Email</label>
                            </div><br>
                            <div class="form-group">
                                <input id="password" name="password" type="password" class="form-control" required>
                                <label class="form-control-placeholder" id="password" for="password">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="button" onclick="reg()" class="form-control btn btn-primary rounded submit px-3" style="color: #c2a942;">Sign up</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center">Already Have Account ? <a href="{{route('auth.userLogin')}}">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function reg() {
        axios.post('{{route('auth.userRegister')}}', {
            name:document.getElementById('name').value,
            email:document.getElementById('email').value,
            password:document.getElementById('password').value,
        }).then(function(response) {
            toastr.success(response.data.message);
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: response.data.message,
                showConfirmButton: false,
                timer: 3000
            })
            window.location.href = '{{ route('home')}}';
        })
            .catch(function(error) {
                toastr.error(error.response.data.message);
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: error.response.data.message,
                    showConfirmButton: false,
                    timer: 3000
                })
            });
    }
</script>
<script src="{{asset('login/js/jquery.min.js')}}"></script>
<script src="{{asset('login/js/popper.js')}}"></script>
<script src="{{asset('login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('login/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

