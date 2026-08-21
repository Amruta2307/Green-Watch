<?php
// When form is submitted
if (isset($_POST['admin_login'])) 
{
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];

    // Hardcoded credentials
    $valid_email = "admin@gmail.com";
    $valid_password = "admin123";

    if ($admin_email === $valid_email && $admin_password === $valid_password)
    {
        // Redirect to dashboard
        header("Location: admin_dashboard.php?auth=1");
        exit();
    }
    else 
    {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

            /* Beautiful background */
            background: linear-gradient(
                135deg,
                #0f2027,
                #203a43,
                #2c5364
            );

            padding: 20px;
        }

        /* Background decorative circles */

        body::before {
            content: "";
            position: fixed;
            width: 300px;
            height: 300px;
            background: #4CAF50;
            border-radius: 50%;
            top: -100px;
            left: -100px;
            opacity: 0.15;
            filter: blur(5px);
        }

        body::after {
            content: "";
            position: fixed;
            width: 350px;
            height: 350px;
            background: #00e5ff;
            border-radius: 50%;
            bottom: -150px;
            right: -120px;
            opacity: 0.12;
            filter: blur(5px);
        }

        /* Login container */

        .login-container {
            width: 100%;
            max-width: 430px;
            position: relative;
            z-index: 2;
        }

        /* Login card */

        .login-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            border: 1px solid rgba(255, 255, 255, 0.2);

            padding: 40px 35px;

            border-radius: 25px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.35);

            color: white;
        }

        /* Admin icon */

        .admin-icon {
            width: 80px;
            height: 80px;

            margin: 0 auto 20px;

            border-radius: 50%;

            display: flex;
            justify-content: center;
            align-items: center;

            background: linear-gradient(
                135deg,
                #4CAF50,
                #2e8b57
            );

            box-shadow:
                0 8px 25px rgba(76, 175, 80, 0.4);

            font-size: 35px;
        }

        /* Heading */

        h1 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #d5d5d5;
            font-size: 14px;
            margin-bottom: 30px;
        }

        /* Input group */

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            color: #4CAF50;
            font-size: 17px;
        }

        .input-group input {
            width: 100%;

            padding: 14px 15px 14px 45px;

            border: 1px solid rgba(255,255,255,0.25);

            border-radius: 12px;

            outline: none;

            background: rgba(255,255,255,0.1);

            color: white;

            font-size: 15px;

            transition: 0.3s;
        }

        .input-group input::placeholder {
            color: #cccccc;
        }

        .input-group input:focus {
            border-color: #4CAF50;

            background: rgba(255,255,255,0.15);

            box-shadow:
                0 0 0 3px rgba(76,175,80,0.15);
        }

        /* Login button */

        button {
            width: 100%;

            padding: 14px;

            margin-top: 5px;

            border: none;

            border-radius: 12px;

            background: linear-gradient(
                135deg,
                #4CAF50,
                #2e8b57
            );

            color: white;

            font-size: 17px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;

            box-shadow:
                0 8px 20px rgba(76,175,80,0.3);
        }

        button i {
            margin-right: 8px;
        }

        button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(76,175,80,0.45);
        }

        button:active {
            transform: translateY(0);
        }

        /* Error message */

        .error {
            margin-top: 20px;

            padding: 12px;

            border-radius: 10px;

            background: rgba(255, 60, 60, 0.15);

            border: 1px solid rgba(255, 80, 80, 0.4);

            color: #ffb3b3;

            text-align: center;

            font-size: 14px;
        }

        /* Footer */

        .footer {
            text-align: center;

            margin-top: 25px;

            font-size: 12px;

            color: #bdbdbd;
        }

        /* Mobile responsive */

        @media (max-width: 480px) {

            .login-card {
                padding: 30px 22px;
            }

            h1 {
                font-size: 26px;
            }

            .admin-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
            }
        }

    </style>
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <!-- Admin Icon -->
        <div class="admin-icon">
            <i class="fa-solid fa-user-shield"></i>
        </div>

        <h1>Admin Login</h1>

        <p class="subtitle">
            Welcome back! Please login to your dashboard.
        </p>

        <form method="POST">

            <!-- Email -->
            <div class="input-group">

                <i class="fa-solid fa-envelope"></i>

                <input 
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >

            </div>

            <!-- Password -->
            <div class="input-group">

                <i class="fa-solid fa-lock"></i>

                <input 
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

            </div>

            <!-- Login Button -->

            <button type="submit" name="admin_login">

                <i class="fa-solid fa-right-to-bracket"></i>

                Login

            </button>

            <!-- Error -->

            <?php if (!empty($error)) { ?>

                <div class="error">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <?php echo $error; ?>

                </div>

            <?php } ?>

        </form>

        <div class="footer">
            © 2026 Admin Panel • Secure Login
        </div>

    </div>

</div>

</body>
</html>