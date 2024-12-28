<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('../assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('../assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h3 class="text-center">Login</h3>
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <a href="./index.html" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        In</a>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="mb-0 fw-bold">Belum Punya Akun?</p>
                                        <a class="text-primary fw-bold ms-2"
                                            href="./authentication-register.html">Daftar disini</a>
                                    </div>
                                    <small>Atau</small>
                                    <div class="d-flex justify-content-start gap-2 mt-2">
                                        <a href="#" class="btn btn-outline-danger fs-4"><i
                                                class="ti ti-brand-google"></i></a>
                                        <a href="#" class="btn btn-outline-primary fs-4"><i
                                                class="ti ti-brand-facebook"></i></a>
                                        <a href="#" class="btn btn-outline-info fs-4"><i
                                                class="ti ti-brand-twitter"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('../assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
