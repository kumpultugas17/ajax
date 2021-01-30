<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body style="font-family: Quicksand;">
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">LOGIN</h4>
                        <hr>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukkan username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan password">
                        </div>

                        <button class="btn btn-login btn-block btn-success">LOGIN</button>
                    </div>
                </div>
                <div class="text-center" style="margin-top: 15px;">
                    Belum punya akun? <a href="register.php">Silahkan register</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function(){
            $(".btn-login").click(function(){
                var username = $("#username").val();
                var password = $("#password").val();

                if (username.length == "") {
                    $("#username").addClass('is-invalid');
                } else if (password.length == "") {
                    $("#password").addClass('is-invalid');
                } else {
                    $.ajax({
                        url: "cek-login.php",
                        type: "POST",
                        data: {
                            "username": username,
                            "password": password
                        },
                        success:function(response){
                            if (response == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Login Berhasil!',
                                    text: 'Anda akan diarahkan dalam 3 detik',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                })
                                .then (function(){
                                    window.location.href = "dashboard.php";
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Login Gagal!',
                                    text: 'Silahkan coba lagi.'
                                });
                            }
                            console.log(response); 
                        },
                        error:function(response){
                            Swal.fire({
                                icon: 'error',
                                title: 'Peringatan!',
                                text: 'Server error!'
                            });
                            console.log(response);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>