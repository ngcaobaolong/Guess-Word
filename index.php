<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Guess Word</title>
    <link rel="icon" href="./assets/image/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/particle.css">
    <link rel="stylesheet" href="assets/css/Social-Icons.css">
    <link rel="stylesheet" href="assets/css/game.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body id="page-top"><a class="menu-toggle rounded" href="#"></a>
    <audio autoplay loop preload="auto" id="background">
        <source src="./assets/sound/theme.mp3" type="audio/mpeg">
    </audio>
    <div class="d-flex masthead-no-padding" style="background: rgb(0,0,0);">
        <div id="particles-js"></div>
        <div class="container my-auto" style="display : none;z-index:2" id="game">
            <div class="hangman">
                <div class="guess"></div>
                <form class="guessForm">
                    <input type="text" class="guessLetter" maxlength="1" placeholder="Enter a letter ...&#x23ce;" /> <button type="submit" class="guessButton">Guess</button>
                </form>
                <div class="wrong">
                    <div class="wrongLetters"></div>
                </div>
                <div class="message">
                    <h1 class="title"></h1>
                    <p class="text"></p>
                    <button class="restart button">Play Again?</button>
                    <button class="exit button">Back to menu</button>
                </div>
            </div>
        </div>
        <div class="container my-auto text-center" style="z-index: 2;" id="main">
            <h1 class="mb-1" style="color: rgb(255,255,255);font-size: 50px;font-family: 'Press Start 2P', cursive;">Guess Word</h1>
            <h3 class="mb-5"><em style="color: rgb(218,218,218);font-size: 18px;font-family: 'Press Start 2P', cursive">An addictive, relaxing game.</em></h3>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                print("<a class=\"btn btn-success js-scroll-trigger\" style=\"font-size: 23px;\" role=\"button\" href=\"#\" id=\"play-btn\">Play now !</a>");
            } else print("<button type=\"button\" class=\"btn btn-primary btn-lg\" id=\"login-btn\">Login</button>")
            ?>
            <br>
            <br>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
                print("<button type=\"button\" class=\"btn btn-danger btn-lg\" id=\"logout-btn\">Logout</button>")
            ?>
            <div class="btn-group btn-group-lg">
                <button class="btn btn-info" href="#" id="setting-btn"><i class="fas fa-cog"></i></button>
                <button class="btn btn-info" href="#" id="help-btn"><i class="fas fa-question"></i></button>
                <button class="btn btn-info" href="#" id="ranking-btn"><i class="fas fa-trophy"></i></button>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <div class="container">
        <!-- Setting -->
        <div class="modal fade" id="setting" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="z-index: auto;">
                    <div class="modal-header" style="padding:35px 50px;">
                        <h4><span class="glyphicon glyphicon-lock"></span>Setting</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <p>BGM <input type="range" id="volume-slider" value=20></p>

                    </div>
                </div>
            </div>
        </div>
        <!--Forgot-->
        <div class="modal fade" id="forgot" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="z-index: auto;">
                    <div class="modal-header" style="padding:35px 50px;">
                        <h4><span class="glyphicon glyphicon-lock"></span>Password reset</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" onsubmit="event.preventDefault()">
                            <div class="form-group">
                                <label for="email"><span class="glyphicon glyphicon-user"></span> Enter your email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email">
                            </div>
                            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Signup -->
        <div class="modal fade" id="signup" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="z-index: auto;">
                    <div class="modal-header" style="padding:35px 50px;">
                        <h4><span class="glyphicon glyphicon-lock"></span>Signup</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" onsubmit="event.preventDefault()">
                            <div class="form-group">
                                <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                                <input type="text" class="form-control" id="username-signup" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
                                <input type="text" class="form-control" id="email-signup" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                <input type="password" class="form-control" id="password-signup" placeholder="Password">
                            </div>
                            <button class="btn btn-success btn-block" id="signup-submit"><span class="glyphicon glyphicon-off"></span>Signup</button>
                        </form>
                        <p id="signup-message"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ranking -->
        <div class="modal fade" id="ranking" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="z-index: auto;">
                    <div class="modal-header" style="padding:35px 50px;">
                        <h4><span class="glyphicon glyphicon-lock"></span> Ranking</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <table id="ranking-tbl">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("config.php");
                                if ($stmt = $conn->prepare("SELECT userId,userName,userPoint FROM users ORDER BY userPoint LIMIT 10")) {
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while ($row = $result->fetch_row()) {
                                ?>
                                        <tr>
                                            <td><?php echo $row[0] ?></td>
                                            <td><?php echo $row[1] ?></td>
                                            <td><?php echo $row[2] ?></td>
                                        </tr>

                                <?php
                                        $conn->close();
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login -->
        <div class="modal fade" id="login" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="z-index: auto;">
                    <div class="modal-header" style="padding:35px 50px;">
                        <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" onsubmit="event.preventDefault()">
                            <div class="form-group">
                                <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                                <input type="text" class="form-control" id="username-login" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                <input type="password" class="form-control" id="password-login" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" value="" checked>Remember me</label>
                            </div>
                            <button class="btn btn-success btn-block" id="login-submit"><span class="glyphicon glyphicon-off"></span> Login</button>
                        </form>
                        <p id="login-message"></p>
                    </div>
                    <div style="text-align: center;">
                        <p>Not a member? <a id="signup-btn" data-dismiss="modal" href="#">Sign Up</a></p>
                        <p>Forgot <a href="#" id="forgot-btn" data-dismiss="modal">Password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="assets/js/particle.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/game.js"></script>
</body>

</html>