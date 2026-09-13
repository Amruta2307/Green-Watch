
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Green Watch | Issue Submitted</title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        /* ================= BODY ================= */

        body {

            min-height: 100vh;

            font-family: Arial, Helvetica, sans-serif;

            background:
                linear-gradient(
                    rgba(3, 42, 27, 0.78),
                    rgba(3, 42, 27, 0.88)
                ),
                url("images/nature3.jfif");

            background-repeat: no-repeat;

            background-size: cover;

            background-position: center;

            background-attachment: fixed;

            color: white;

        }


        /* ================= HEADER ================= */

        header {

            width: 100%;

            height: 82px;

            background: #06402B;

            display: flex;

            align-items: center;

            justify-content: center;

            box-shadow:
                0 5px 20px rgba(0,0,0,0.35);

            border-bottom:
                2px solid rgba(255,255,255,0.15);

        }


        .header-content {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 18px;

        }


        .earth {

            width: 65px;

            height: 55px;

            object-fit: contain;

        }


        .header-title {

            text-align: center;

        }


        .header-title h1 {

            font-size: 26px;

            font-weight: 700;

            letter-spacing: 0.5px;

            margin-bottom: 3px;

        }


        .header-title p {

            font-size: 11px;

            color: #b9e6c9;

            letter-spacing: 2px;

        }


        /* ================= NAVIGATION ================= */

        nav {

            width: 100%;

            height: 55px;

            background:
                rgba(40, 100, 65, 0.92);

            display: flex;

            align-items: center;

            justify-content: center;

            box-shadow:
                0 4px 15px rgba(0,0,0,0.20);

        }


        .nav-container {

            display: flex;

            align-items: center;

            gap: 8px;

        }


        nav a {

            color: white;

            text-decoration: none;

            font-size: 16px;

            font-weight: 600;

            padding: 9px 22px;

            border-radius: 25px;

            transition: all 0.3s ease;

        }


        nav a:hover {

            background: rgba(255,255,255,0.18);

            transform: translateY(-2px);

        }


        .separator {

            color: rgba(255,255,255,0.5);

        }


        /* ================= MAIN AREA ================= */

        .main {

            min-height: calc(100vh - 137px);

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 45px 20px;

        }


        /* ================= SUCCESS CARD ================= */

        .success-card {

            width: 100%;

            max-width: 650px;

            background:
                rgba(255,255,255,0.97);

            border-radius: 28px;

            padding: 45px 50px;

            text-align: center;

            color: #183d29;

            box-shadow:
                0 25px 70px rgba(0,0,0,0.40);

            border:
                1px solid rgba(255,255,255,0.6);

            animation:
                cardAppear 0.7s ease;

        }


        /* ================= SUCCESS ICON ================= */

        .success-icon {

            width: 90px;

            height: 90px;

            margin: 0 auto 22px;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #22c55e,
                    #087f3d
                );

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            font-size: 48px;

            font-weight: bold;

            box-shadow:
                0 12px 30px rgba(22,163,74,0.30);

            animation:
                iconPop 0.6s ease;

        }


        /* ================= SUCCESS TITLE ================= */

        .success-card h1 {

            font-size: 31px;

            color: #126334;

            margin-bottom: 12px;

            font-weight: 700;

        }


        .success-card .subtitle {

            font-size: 15px;

            color: #64746a;

            line-height: 1.7;

            margin-bottom: 28px;

        }


        /* ================= DIVIDER ================= */

        .divider {

            width: 70px;

            height: 4px;

            background:
                linear-gradient(
                    to right,
                    #16a34a,
                    #74c365
                );

            border-radius: 10px;

            margin:
                0 auto 28px;

        }


        /* ================= INFORMATION BOX ================= */

        .info-box {

            background: #f0f9f3;

            border: 1px solid #d6ebdc;

            border-radius: 17px;

            padding: 20px;

            margin-bottom: 28px;

            text-align: left;

        }


        .info-row {

            display: flex;

            align-items: center;

            gap: 14px;

            padding: 9px 0;

        }


        .info-icon {

            width: 38px;

            height: 38px;

            flex-shrink: 0;

            border-radius: 10px;

            background: #dcf5e4;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;

        }


        .info-text strong {

            display: block;

            font-size: 13px;

            color: #205b38;

            margin-bottom: 2px;

        }


        .info-text span {

            font-size: 12px;

            color: #718078;

        }


        /* ================= BUTTON ================= */

        .back-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            min-width: 250px;

            padding: 14px 28px;

            border: none;

            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #087f3d
                );

            color: white;

            text-decoration: none;

            font-size: 15px;

            font-weight: 700;

            box-shadow:
                0 10px 25px rgba(22,163,74,0.28);

            transition:
                all 0.3s ease;

        }


        .back-button:hover {

            color: white;

            transform:
                translateY(-3px);

            box-shadow:
                0 15px 32px rgba(22,163,74,0.38);

        }


        .back-button:active {

            transform:
                translateY(0);

        }


        .arrow {

            font-size: 20px;

            transition:
                transform 0.3s ease;

        }


        .back-button:hover .arrow {

            transform:
                translateX(-4px);

        }


        /* ================= FOOTER TEXT ================= */

        .thank-you {

            margin-top: 22px;

            font-size: 11px;

            color: #829087;

        }


        .thank-you span {

            color: #168344;

            font-weight: 600;

        }


        /* ================= ANIMATIONS ================= */

        @keyframes cardAppear {

            from {

                opacity: 0;

                transform:
                    translateY(30px)
                    scale(0.97);

            }

            to {

                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);

            }

        }


        @keyframes iconPop {

            0% {

                opacity: 0;

                transform:
                    scale(0.4);

            }

            70% {

                transform:
                    scale(1.1);

            }

            100% {

                opacity: 1;

                transform:
                    scale(1);

            }

        }


        /* ================= MOBILE ================= */

        @media (max-width: 650px) {

            header {

                height: auto;

                padding: 15px;

            }


            .header-title h1 {

                font-size: 19px;

            }


            .header-title p {

                font-size: 8px;

                letter-spacing: 1px;

            }


            .earth {

                width: 45px;

                height: 45px;

            }


            nav {

                height: auto;

                padding: 8px;

            }


            .nav-container {

                gap: 2px;

            }


            nav a {

                padding: 8px 10px;

                font-size: 12px;

            }


            .separator {

                display: none;

            }


            .main {

                padding: 30px 15px;

            }


            .success-card {

                padding: 35px 22px;

                border-radius: 22px;

            }


            .success-icon {

                width: 75px;

                height: 75px;

                font-size: 40px;

            }


            .success-card h1 {

                font-size: 24px;

            }


            .success-card .subtitle {

                font-size: 13px;

            }


            .back-button {

                width: 100%;

                min-width: 0;

            }

        }

    </style>

</head>


<body>


<!-- =================================================
     HEADER
================================================= -->

<header>

    <div class="header-content">

        <img
            src="images/earth.gif"
            class="earth"
            alt="Earth">


        <div class="header-title">

            <h1>Green Watch</h1>

            <p>
                NATURE ISSUE REPORTING & AWARENESS PORTAL
            </p>

        </div>


        <img
            src="images/earth.gif"
            class="earth"
            alt="Earth">

    </div>

</header>


<!-- =================================================
     NAVIGATION
================================================= -->

<nav>

    <div class="nav-container">

        <a href="admin_login.php">
            Admin
        </a>

        <span class="separator">|</span>

        <a href="user_dashboard.php">
             Verify
        </a>

        <span class="separator">|</span>

        <a href="report_form.php">
             Report
        </a>

    </div>

</nav>


<!-- =================================================
     MAIN SUCCESS SECTION
================================================= -->

<div class="main">

    <div class="success-card">


        <!-- SUCCESS ICON -->

        <div class="success-icon">
            ✓
        </div>


        <!-- SUCCESS MESSAGE -->

        <h1>
            Issue Submitted Successfully!
        </h1>


        <div class="divider"></div>


        <p class="subtitle">

            Thank you for taking the initiative to
            protect our environment.

            <br>

            Your environmental issue has been
            successfully recorded in
            <strong>Green Watch</strong>.

        </p>


        <!-- =================================================
             INFORMATION BOX
        ================================================= -->

        <div class="info-box">


            <div class="info-row">

                <div class="info-icon">
                    🌱
                </div>

                <div class="info-text">

                    <strong>
                        Your Report Matters
                    </strong>

                    <span>
                        Every report helps build a cleaner
                        and greener community.
                    </span>

                </div>

            </div>


            <div class="info-row">

                <div class="info-icon">
                    📋
                </div>

                <div class="info-text">

                    <strong>
                        Report Recorded
                    </strong>

                    <span>
                        Your submitted information has
                        been stored successfully.
                    </span>

                </div>

            </div>


            <div class="info-row">

                <div class="info-icon">
                    🌍
                </div>

                <div class="info-text">

                    <strong>
                        Together for Nature
                    </strong>

                    <span>
                        Your contribution supports a
                        healthier environment.
                    </span>

                </div>

            </div>


        </div>


        <!-- =================================================
             BACK TO REPORT FORM BUTTON
        ================================================= -->

        <a
            href="report_form.php"
            class="back-button">

            <span class="arrow">
                ←
            </span>

            Back to Report Form

        </a>


        <p class="thank-you">

            Thank you for being a responsible
            <span>Green Watch Citizen 🌿</span>

        </p>


    </div>

</div>


</body>

</html>


<?php

/* =====================================================
   DATABASE CONNECTION
===================================================== */

$servername = "localhost";
$username = "root";
$password = "";
$database = "greenwatch";


$conn = new mysqli(
    $servername,
    $username,
    $password,
    $database
);


/* =====================================================
   CHECK CONNECTION
===================================================== */

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}


/* =====================================================
   HANDLE FORM SUBMISSION
===================================================== */

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $title =
        $_POST['title'];

    $description =
        $_POST['description'];

    $location =
        $_POST['location'];


    /* ================================================
       FILE HANDLING
    ================================================= */

    $image_before_name =
        $_FILES['image_before']['name'];

    $image_before_tmp =
        $_FILES['image_before']['tmp_name'];


    $upload_folder =
        "uploads/";


    /* ================================================
       CREATE UPLOAD FOLDER
    ================================================= */

    if (!file_exists($upload_folder))
    {
        mkdir(
            $upload_folder,
            0777,
            true
        );
    }


    /* ================================================
       IMAGE PATH
    ================================================= */

    $image_before_path =
        $upload_folder .
        basename($image_before_name);


    /* ================================================
       MOVE IMAGE
    ================================================= */

    if (
        move_uploaded_file(
            $image_before_tmp,
            $image_before_path
        )
    )
    {

        /* ============================================
           INSERT INTO DATABASE
        ============================================ */

        $stmt =
            $conn->prepare(
                "INSERT INTO issues
                (title, description, location, image_before)
                VALUES (?, ?, ?, ?)"
            );


        $stmt->bind_param(
            "ssss",
            $title,
            $description,
            $location,
            $image_before_path
        );


        if ($stmt->execute())
        {

            /*
               SUCCESS PAGE CONTENT
               IS ALREADY DISPLAYED ABOVE.
            */

        }

        else
        {

            echo
            "<script>
                alert('Failed to insert data.');
                window.location.href='report_form.php';
            </script>";

        }

    }

    else
    {

        echo
        "<script>
            alert('Image upload failed!');
            window.location.href='report_form.php';
        </script>";

    }

}


$conn->close();

?>
