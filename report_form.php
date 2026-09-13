
<!-- report_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Green Watch | Report Environmental Issue</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;

            background:
                linear-gradient(
                    rgba(2, 35, 22, 0.72),
                    rgba(2, 35, 22, 0.78)
                ),
                url("images/nature.webp");

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            color: #ffffff;
        }

        /* ================= HEADER ================= */

        header {
            width: 100%;
            min-height: 78px;

            background: rgba(3, 45, 28, 0.96);

            display: flex;
            align-items: center;
            justify-content: center;

            border-bottom: 1px solid rgba(255,255,255,0.15);

            box-shadow: 0 5px 25px rgba(0,0,0,0.25);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand img {
            width: 55px;
            height: 55px;
            object-fit: contain;
        }

        .brand-text h1 {
            font-size: 26px;
            font-weight: 700;
            margin: 0;
            letter-spacing: 0.5px;
        }

        .brand-text p {
            margin: 2px 0 0;
            font-size: 12px;
            color: #b8eacb;
            letter-spacing: 1px;
        }

        /* ================= NAVIGATION ================= */

        nav {
            width: fit-content;
            margin: 22px auto;

            background: rgba(255,255,255,0.10);

            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);

            border: 1px solid rgba(255,255,255,0.18);

            padding: 8px;

            border-radius: 50px;

            box-shadow: 0 8px 30px rgba(0,0,0,0.20);
        }

        nav a {
            text-decoration: none;
            color: white;

            display: inline-block;

            padding: 9px 20px;

            border-radius: 30px;

            font-size: 14px;
            font-weight: 500;

            transition: 0.3s;
        }

        nav a:hover {
            background: #22c55e;
            color: white;

            transform: translateY(-2px);
        }

        nav a.active {
            background: #16a34a;
        }

        /* ================= MAIN ================= */

        .main-container {
            width: 100%;
            max-width: 1050px;

            margin: 30px auto 60px;

            padding: 0 20px;
        }

        .content-grid {
            display: grid;

            grid-template-columns: 0.85fr 1.15fr;

            gap: 25px;

            align-items: stretch;
        }

        /* ================= LEFT HERO ================= */

        .intro-card {

            position: relative;

            overflow: hidden;

            padding: 45px 35px;

            border-radius: 25px;

            background:
                linear-gradient(
                    145deg,
                    rgba(5,70,38,0.94),
                    rgba(4,38,26,0.94)
                );

            border: 1px solid rgba(255,255,255,0.14);

            box-shadow:
                0 20px 50px rgba(0,0,0,0.30);
        }

        .intro-card::before {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            right: -90px;
            top: -90px;

            border-radius: 50%;

            background: rgba(34,197,94,0.15);
        }

        .leaf-icon {
            width: 65px;
            height: 65px;

            border-radius: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(34,197,94,0.18);

            font-size: 32px;

            margin-bottom: 25px;
        }

        .intro-card h2 {
            font-size: 31px;

            line-height: 1.25;

            font-weight: 700;

            margin-bottom: 18px;
        }

        .intro-card h2 span {
            color: #4ade80;
        }

        .intro-card p {
            color: #c9ded2;

            line-height: 1.8;

            font-size: 14px;

            margin-bottom: 30px;
        }

        .benefit {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 17px;

            color: #e7f5ec;

            font-size: 13px;
        }

        .benefit-icon {
            width: 30px;
            height: 30px;

            flex-shrink: 0;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #16a34a;

            font-size: 14px;
        }

        /* ================= FORM CARD ================= */

        .form-card {

            background: rgba(255,255,255,0.96);

            border-radius: 25px;

            padding: 35px;

            color: #173a28;

            box-shadow:
                0 20px 50px rgba(0,0,0,0.30);

            border: 1px solid rgba(255,255,255,0.5);
        }

        .form-heading {
            margin-bottom: 25px;
        }

        .form-heading h2 {
            font-size: 24px;

            font-weight: 700;

            color: #12452d;

            margin-bottom: 5px;
        }

        .form-heading p {
            color: #6b7c72;

            font-size: 13px;

            margin: 0;
        }

        /* ================= FORM INPUTS ================= */

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;

            font-size: 13px;

            font-weight: 600;

            color: #24553b;

            margin-bottom: 8px;
        }

        .required {
            color: #dc2626;
        }

        .form-control {
            border: 1px solid #d7e4dc;

            border-radius: 11px;

            padding: 12px 15px;

            font-size: 13px;

            background: #f8fbf9;

            transition: 0.25s;

            box-shadow: none;
        }

        .form-control:focus {
            border-color: #22a85a;

            background: white;

            box-shadow:
                0 0 0 4px rgba(34,168,90,0.10);
        }

        textarea.form-control {
            min-height: 110px;

            resize: vertical;
        }

        /* ================= FILE UPLOAD ================= */

        .upload-box {
            position: relative;
        }

        .upload-box input[type="file"] {
            padding: 10px;
            cursor: pointer;
        }

        .upload-box input[type="file"]::file-selector-button {

            border: none;

            background: #e5f6eb;

            color: #176b3a;

            padding: 8px 13px;

            border-radius: 8px;

            margin-right: 10px;

            font-weight: 600;

            cursor: pointer;
        }

        /* ================= SUBMIT BUTTON ================= */

        .submit-btn {

            width: 100%;

            border: none;

            padding: 14px;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #087f3d
                );

            color: white;

            font-size: 15px;

            font-weight: 600;

            letter-spacing: 0.3px;

            cursor: pointer;

            transition: 0.3s;

            box-shadow:
                0 8px 20px rgba(22,163,74,0.25);
        }

        .submit-btn:hover {

            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(22,163,74,0.35);

            background:
                linear-gradient(
                    135deg,
                    #22c55e,
                    #087f3d
                );
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* ================= PRIVACY TEXT ================= */

        .privacy-note {

            text-align: center;

            margin-top: 15px;

            font-size: 11px;

            color: #829087;
        }

        /* ================= FOOTER ================= */

        footer {

            text-align: center;

            padding: 20px;

            background: rgba(2,30,19,0.90);

            color: #b8d7c5;

            font-size: 12px;

            border-top: 1px solid rgba(255,255,255,0.10);
        }

        footer strong {
            color: #4ade80;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 850px) {

            .content-grid {
                grid-template-columns: 1fr;
            }

            .intro-card {
                padding: 30px;
            }

            .intro-card h2 {
                font-size: 27px;
            }
        }

        @media (max-width: 600px) {

            header {
                padding: 12px;
            }

            .brand-text h1 {
                font-size: 19px;
            }

            .brand-text p {
                font-size: 9px;
            }

            .brand img {
                width: 45px;
                height: 45px;
            }

            nav {
                width: calc(100% - 30px);

                text-align: center;

                border-radius: 15px;
            }

            nav a {
                padding: 8px 10px;

                font-size: 12px;
            }

            .form-card {
                padding: 23px;
            }

            .main-container {
                padding: 0 12px;
            }
        }

    </style>
</head>

<body>

<!-- ================= HEADER ================= -->

<header>

    <div class="brand">

        <img src="images/earth.gif" alt="Green Watch Earth">

        <div class="brand-text">

            <h1>Green Watch</h1>

            <p>NATURE ISSUE REPORTING & AWARENESS PORTAL</p>

        </div>

    </div>

</header>


<!-- ================= NAVIGATION ================= -->

<nav>

    <a href="admin_login.php">
         Admin
    </a>

    <a href="report_form.php" class="active">
         Report Issue
    </a>

    <a href="user_dashboard.php">
         Verify
    </a>

</nav>


<!-- ================= MAIN CONTENT ================= -->

<div class="main-container">

    <div class="content-grid">


        <!-- ================= LEFT SECTION ================= -->

        <div class="intro-card">

            <div class="leaf-icon">
                🌿
            </div>

            <h2>
                Speak Up for<br>
                <span>Nature.</span>
            </h2>

            <p>
                Found an environmental issue in your area?
                Report it through Green Watch and help create
                cleaner, healthier and greener communities.
            </p>


            <div class="benefit">

                <div class="benefit-icon">✓</div>

                <span>
                    Report environmental problems easily
                </span>

            </div>


            <div class="benefit">

                <div class="benefit-icon">📍</div>

                <span>
                    Provide the exact issue location
                </span>

            </div>


            <div class="benefit">

                <div class="benefit-icon">📷</div>

                <span>
                    Upload photographic evidence
                </span>

            </div>


            <div class="benefit">

                <div class="benefit-icon">🌱</div>

                <span>
                    Contribute to a greener future
                </span>

            </div>

        </div>


        <!-- ================= FORM SECTION ================= -->

        <div class="form-card">


            <div class="form-heading">

                <h2>Report an Environmental Issue</h2>

                <p>
                    Tell us what is happening and help us take action.
                </p>

            </div>


            <!-- FORM START -->

            <form
                action="submit_issue.php"
                method="POST"
                enctype="multipart/form-data"
            >


                <!-- ISSUE TITLE -->

                <div class="form-group">

                    <label for="title">
                        Issue Title
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        placeholder="Example: Garbage dumping near road"
                        required
                    >

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group">

                    <label for="description">
                        Description of the Issue
                        <span class="required">*</span>
                    </label>

                    <textarea
                        class="form-control"
                        id="description"
                        name="description"
                        placeholder="Describe the environmental issue in detail..."
                        required
                    ></textarea>

                </div>


                <!-- LOCATION -->

                <div class="form-group">

                    <label for="location">
                        Location
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="location"
                        name="location"
                        placeholder="Example: Near Bus Stop, Sector 10"
                        required
                    >

                </div>


                <!-- IMAGE -->

                <div class="form-group upload-box">

                    <label for="image_before">
                        Upload Image of the Issue
                        <span class="required">*</span>
                    </label>

                    <input
                        class="form-control"
                        type="file"
                        id="image_before"
                        name="image_before"
                        accept="image/*"
                        required
                    >

                </div>


                <!-- SUBMIT -->

                <button
                    type="submit"
                    name="b1"
                    class="submit-btn"
                >

                    Submit Environmental Report

                </button>


                <div class="privacy-note">

                    Your report helps build a cleaner and greener community.

                </div>


            </form>

            <!-- FORM END -->

        </div>

    </div>

</div>


<!-- ================= FOOTER ================= -->

<footer>

    <strong>Green Watch</strong>
    &nbsp;•&nbsp;
    Together for a Cleaner, Greener Tomorrow 🌍

</footer>


</body>
</html>

