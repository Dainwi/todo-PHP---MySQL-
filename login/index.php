<?php
include_once('../includes/header.php');
?>
<div class="body">
    <div class="row">
        <div class="col-md-12 mt-2">
            <form id="loginForm">
                <h1> Log In </h1>
                <fieldset>
                    <legend class="text-align-center">Hey! Welcome Back</legend>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </fieldset>
                <button type="submit" id="submit">Sign In</button>
                <div class="mt-2" style="display: flex; flex-direction:column">
                    <a href="<?php echo $url . '/signup' ?>">Don't have an account? Register here</a>
                    <a href="forgot_password.php">Forgot Password?</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();

            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                type: "POST",
                url: "login_action.php",
                data: {
                    login: true,
                    email: email,
                    password: password
                },
                success: function (response) {
                    if (response.trim() === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'You have been logged in successfully',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            window.location.href = "<?php echo $url; ?>/dashboard";
                        });
                    } else if (response.trim() === "Invalidpassword") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid Password',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid Email',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                }
            });
        });
    });
</script>

<?php
include_once('../includes/footer.php');
?>