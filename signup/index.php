<?php
include_once('../includes/header.php');
?>
<div class="body">
    <div class="row">
        <div class="col-md-12">
            <form id="signupForm">
                <h1> Sign Up </h1>
                <fieldset>
                    <legend class="text-align-center">Please fill the form to join us</legend>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </fieldset>
                <button type="submit" id="submit">Sign Up</button>
                <p>Already have an account? <a href="<?php echo $url; ?>/login">Login</a></p>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#signupForm').submit(function (e) {
            e.preventDefault();

            // var formData = $(this).serialize();
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                type: "POST",
                url: "signup_action.php",
                data: {
                    signup: true,
                    name: name,
                    email: email,
                    password: password,
                },
                success: function (response) {
                    if (response.trim() === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'You have successfully signed up',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            window.location.href = '<?php echo $url; ?>';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
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
