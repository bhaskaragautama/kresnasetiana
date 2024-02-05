<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kresna Setiana - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASEURL ?>assets/bootstrap/css/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <div class="flasher">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-7 d-lg-block d-none bg-dark">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-5">
                        <div class="handwriting text-white text-center fs-1">Kresna Setiana</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-xxl-6 col-xl-8 col-10 text-center my-5">
                        <h3 class="fw-bold">Welcome Back!</h3>
                        <p class="mb-5">Please enter your details below</p>
                        <form action="<?= BASEURL . 'login/dologin'; ?>" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control focus-ring border-0 border-bottom rounded-0 px-0" style="--bs-focus-ring-color: transparent" id="username" name="username" placeholder="Username" required autofocus>
                                <label for="username" class="px-0">Username</label>
                            </div>
                            <div class="form-floating mb-5">
                                <input type="password" class="form-control focus-ring border-0 border-bottom rounded-0 px-0" style="--bs-focus-ring-color: transparent" id="password" name="password" placeholder="Password" required autofocus>
                                <label for="password" class="px-0">Password</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-lg btn-dark rounded-pill" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?= BASEURL ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>