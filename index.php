<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/navbar.css">
    <style>
        .content .box-login{
            width: 400px;
            height:400px
        }

        .loginbtn {
            background-color: #74B243;
            color: #E6E6E6;
            box-sizing: border-box;
            margin: auto;
            text-align: center;
            margin-top: 10px;
            height: 40px;
            line-height: 40px;
            width: 350px;
            border-radius: 10px;
            border: 0;
            margin-left: 10px;
        }

        .loginbtn:hover {
            background-color: #D79E31;
            color: #E6E6E6;
            box-sizing: border-box;
            margin: auto;
            text-align: center;
            margin-top: 20px;
            height: 40px;
            line-height: 40px;
            width: 350px;
            border-radius: 10px;
            border: 0;
            margin-left: 10px;
        }

        .voice-btn {
            background-color: #74B243;
            color: #E6E6E6;
            border: 0;
            border-radius: 10px;
            margin-left:10px;
            margin-top: 5px;
            height: 20px;
            line-height: 0px;
            width: 200px;
            cursor: pointer;
        }

        .voice-btn:hover {
            background-color: #D79E31;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="nav">
        <div class="containerr">
            <div class="logo">
                <a href="">NotifyCast</a>
            </div>
            <div class="navbar">
            </div>
        </div>
    </nav>
    <!-- Tutup Navbar -->

    <!-- Konten -->
    <div class="content">
        <!-- Box Login -->
        <div class="box-login">
            <!-- Judul -->
            <div class="judul">
                <h3>Login Admin</h3>
            </div>
            <!-- Tutup judul -->

            <!-- Inputan -->
            <form id="login_admin" action="validasi_admin.php" method="POST">
                <div class="input">
                    <input type="text" name="username" id="username" placeholder="Username" autocomplete="none">
                    <button type="button" id="startButtonUsername" class="voice-btn">Start Voice Recognition</button>
                    <br />
                    <input type="password" name="password" id="password" placeholder="Password">
                    <button type="button" id="startButtonPassword" class="voice-btn">Start Voice Recognition</button>
                </div>
                <!-- Tutup Inputan -->

                <!-- Tombol -->
                <input type="submit" value="Login" name="login" class="loginbtn">
                <!-- Tutup Tombol -->
            </form>

            <!-- Konfirmasi -->
            <div class="confirm">
                <center>
                    <p>Anda bukan admin?<a href="user.php">Klik Disini</a></p>
                </center>
            </div>
            <!-- Tutup konfirmasi -->
        </div>
        <!-- Tutup Box -->
    </div>
    <!-- Tutup Konten -->

    <!-- Footer -->
    <footer class="footer">
        <div class="containerr">
            <p>Kelompok 3 RPL | Notifycast 2024</p>
        </div>
    </footer>
    <!-- Tutup Footer -->

    <!-- Voice Recognition Script -->
    <script>
        const startButtonUsername = document.getElementById('startButtonUsername');
        const startButtonPassword = document.getElementById('startButtonPassword');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');

        const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();

        recognition.onstart = function() {
            console.log('Voice recognition started. Try speaking into the microphone.');
        };

        recognition.onspeechend = function() {
            recognition.stop();
        };

        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            if (recognition.inputType === 'username') {
                usernameInput.value = transcript;
            } else if (recognition.inputType === 'password') {
                passwordInput.value = transcript;
            }
        };

        startButtonUsername.addEventListener('click', () => {
            recognition.inputType = 'username';
            recognition.start();
        });

        startButtonPassword.addEventListener('click', () => {
            recognition.inputType = 'password';
            recognition.start();
        });
    </script>
</body>

</html>
