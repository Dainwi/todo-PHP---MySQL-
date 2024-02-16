<?php
include_once "../../includes/header.php";
?>
<div class="container">
    <div class="row justify-content-center mt-10">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title text-center">Welcome to Todo App</h5>
                </div>
                <div class="card-body">
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Please login or register to continue</h6> -->
                    <form id="login"  method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>

                    </form>
                </div>
                <div class="card-footer">
                    <p class="card-text text-center">Don't have an account? <a href="../register/">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#login').submit(function(e) {
            e.preventDefault();

            var email = $("#email").val();
            var password = $("#password").val();

            console.log(name, email, password);

            $.ajax({
                type: "POST",
                url: "action.php",
                data: {
                    email: email,
                    password: password
                },
                success: function(response) {
                    console.log(response);
                    if (response === 'success') {
                        window.location.href = "../dashboard/";
                    } else {
                        alert(response); // Show the error message
                    }
                }
            });
        });
    });
</script>

<?php
include_once "../../includes/footer.php";
?>