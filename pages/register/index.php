<?php
include_once "../../includes/header.php";
?>

<div class="container">
    <div class="row justify-content-center mt-10">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">Register an Account</h5>
                </div>
                <div class="card-body">
                    <form method="post" id="registerForm" action="register_action.php" autocomplete="off">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <p class="text-danger" id="errorMessage"></p>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="card-text text-center">Already have an account? <a href="../login/">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault();

            var name = $("#username").val();
            var email = $("#email").val();
            var password = $("#password").val();

            $.ajax({
                type: "POST",
                url: "register_action.php",
                data: {
                    username: name,
                    email: email,
                    password: password
                },
                success: function(response) {
                    if (response === 'success') {
                        window.location.href = "../dashboard/";
                    } else {
                        $('#errorMessage').text(response);
                    }
                }
            });
        });
    });
</script>

<?php
include_once "../../includes/footer.php";
?>
