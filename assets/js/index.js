    $(document).ready(function () {
        var audio = document.getElementById("background");
        audio.volume = 0.2;
        $("#login-btn").click(function () {
            $("#login").modal();
        });
        $("#logout-btn").click(function () {
            location.href = './logout.php'
        });
        $("#play-btn").click(function () {
            $("#main").fadeOut("fast", function () {
                $("#game").fadeIn()
            });
        });
        $("#signup-btn").click(function () {
            $("#signup").modal();
        });
        $("#forgot-btn").click(function () {
            $("#forgot").modal();
        });
        $("#setting-btn").click(function () {
            $("#setting").modal();
        });
        $("#ranking-btn").click(function () {
            $("#ranking").modal();
        });
        $("#volume-slider").change(function (e) {
            audio.volume = e.currentTarget.value / 100;
        })
        $("#signup-submit").click(function () {
            var username = $("#username-signup").val().trim();
            var password = $("#password-signup").val().trim();
            var email = $("#email-signup").val().trim();
            if (username != "" && password != "" && email != "") {
                $.ajax({
                    url: 'signup.php',
                    type: 'post',
                    data: { username: username, password: password, email: email },
                    success: function (response) {
                        var msg = "";
                        console.log(response);
                        if (response == 1) {
                            msg = "Signup success. You can now login.";
                        } else {
                            msg = "Invalid username and password!";
                        }
                        $("#signup-message").html(msg);
                    }
                });
            }
        });
        $("#login-submit").click(function () {
            var username = $("#username-login").val().trim();
            var password = $("#password-login").val().trim();
            if (username != "" && password != "") {
                $.ajax({
                    url: 'login.php',
                    type: 'post',
                    data: { username: username, password: password },
                    success: function (response) {
                        var msg = "";
                        console.log(response);
                        if (response == 1) {
                            msg = "Login success. Redirecting ...";
                            location.reload();
                        } else {
                            msg = "Invalid username and password!";
                        }
                        $("#login-message").html(msg);
                    }
                });
            }
        });
    });