<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="" style="height: 100vh;">
        <div class="row m-0">
            <h1 class="text-center mt-5 text-primary">LOGIN <i class="fa-solid fa-arrow-right-from-bracket"></i></h1>

            <form action="../actions/login.php" method="post" class="mt-3">
                <!-- Bold to add emphasis -->
                <div class="row mb-3 w-25 mx-auto">
                    <div class="col-3">
                        <label for="username" class="form-label">Username</label>
                    </div>
                    <div class="col-9">
                        <input type="text" name="username" id="username" class="form-control" placeholder="USERNAME" autofocus required>
                    </div>
                </div>

                <div class="row mb-3 w-25 mx-auto">
                    <div class="col-3">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="col-9">
                        <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" required>
                    </div>
                </div>

                <div class="row mb-3 w-25 mx-auto">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100 text-center">Login</button>
                    </div>
                </div>

                <div class="row mx-auto">
                    <div class="col text-center">
                        <button type="button" class="btn btn-danger text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Create an Account
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container">
                <div class="modal-body">
                    <div class="text-end mb-5">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <h1 class="modal-title text-danger text-center" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Registration</h1>

                    <form action="../actions/register.php" method="post">
                        <div class="row mb-3 mt-3">
                            <div class="col">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first-name" class="form-control" required autofocus>
                            </div>
                            <div class="col">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last-name" class="form-control" required>
                            </div>
                        </col>

                        <div class="row mb-3 mt-3">
                            <div class="col">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" minlength="8" aria-describedby="password-info" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Register</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>