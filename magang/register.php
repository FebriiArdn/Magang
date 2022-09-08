<?php
require 'function.php';

//daftar
if(isset($_POST['register'])){
    $namalengkap = $_POST["namalengkap"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_sql = "INSERT INTO user (namalengkap, email, password) 
                VALUES ('$namalengkap','$email', '$password')";

    if(mysqli_query($conn, $query_sql)) {
        //jika berhasil
        echo '
        <script> 
        alert("Registrasi Berhasil");
        window.location.href="login.php";
        </script>
        ';
    } else {
        //jika gagal
        echo '
        <script> 
        alert("Registrasi gagal");
        window.location.href="register.php";
        </script>
        ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="register.php" method="post">
                                        <div class="form-group">
                                                <label class="small mb-1" for="inputnamalengkap">Nama Lengkap</label>
                                                <input class="form-control py-4" id="inputnamalengkap" name="namalengkap" type="namalengkap" aria-describedby="namalengkap" placeholder="Masukkan Nama Lengkap" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                            <button type="submit" name="register" class="btn btn-primary btn-block" href="login.php">Buat</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Sudah punya akun? Login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
