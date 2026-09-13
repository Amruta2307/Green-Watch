
<?php

/* =====================================================
   DATABASE CONNECTION
===================================================== */

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "greenwatch"
);


/* =====================================================
   CHECK CONNECTION
===================================================== */

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


/* =====================================================
   HANDLE SOLUTION SUBMISSION
===================================================== */

if (isset($_POST['submit_solution'])) {

    $id = intval($_POST['issue_id']);

    $feedback = trim($_POST['feedback']);


    /* ================================================
       IMAGE UPLOAD
    ================================================= */

    if (
        isset($_FILES['solved_image']) &&
        $_FILES['solved_image']['error'] == 0
    ) {

        $image_name =
            $_FILES['solved_image']['name'];

        $temp =
            $_FILES['solved_image']['tmp_name'];


        $upload_folder = "uploads/";


        if (!file_exists($upload_folder)) {

            mkdir(
                $upload_folder,
                0777,
                true
            );

        }


        /* Create unique image name */

        $extension =
            strtolower(
                pathinfo(
                    $image_name,
                    PATHINFO_EXTENSION
                )
            );


        $new_image_name =
            "solved_" .
            date("Ymd_His") .
            "_" .
            uniqid() .
            "." .
            $extension;


        $path =
            $upload_folder .
            $new_image_name;


        move_uploaded_file(
            $temp,
            $path
        );


        /* ============================================
           UPDATE ISSUE
        ============================================ */

        $stmt = $conn->prepare(
            "UPDATE issues
             SET image_after = ?,
                 feedback = ?,
                 status = 'Solved'
             WHERE id = ?"
        );


        $stmt->bind_param(
            "ssi",
            $path,
            $feedback,
            $id
        );


        $stmt->execute();

        $stmt->close();

    }

}


/* =====================================================
   GET ALL ISSUES
===================================================== */

$result =
    $conn->query(
        "SELECT * FROM issues ORDER BY id DESC"
    );


/* =====================================================
   DASHBOARD STATISTICS
===================================================== */

$total_result =
    $conn->query(
        "SELECT COUNT(*) AS total FROM issues"
    );

$total =
    $total_result->fetch_assoc()['total'];


$pending_result =
    $conn->query(
        "SELECT COUNT(*) AS pending
         FROM issues
         WHERE status='Pending'"
    );

$pending =
    $pending_result->fetch_assoc()['pending'];


$solved_result =
    $conn->query(
        "SELECT COUNT(*) AS solved
         FROM issues
         WHERE status='Solved'"
    );

$solved =
    $solved_result->fetch_assoc()['solved'];

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Green Watch | Admin Dashboard
    </title>


    <style>

        /* =================================================
           GLOBAL
        ================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                #f3f7f4;

            color:
                #183b29;

        }


        /* =================================================
           HEADER
        ================================================= */

        header {

            height: 78px;

            width: 100%;

            background:
                linear-gradient(
                    135deg,
                    #06402B,
                    #087443
                );

            color: white;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding:
                0 35px;

            box-shadow:
                0 4px 18px
                rgba(0,0,0,0.20);

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 13px;

        }


        .brand img {

            width: 50px;

            height: 50px;

            object-fit: contain;

        }


        .brand-text h1 {

            font-size: 23px;

            margin-bottom: 3px;

        }


        .brand-text p {

            font-size: 10px;

            letter-spacing: 1.5px;

            color:
                #b8e5c8;

        }


        .admin-label {

            background:
                rgba(255,255,255,0.12);

            padding:
                9px 16px;

            border-radius:
                20px;

            font-size:
                13px;

        }


        /* =================================================
           NAVIGATION
        ================================================= */

        nav {

            background:
                #ffffff;

            border-bottom:
                1px solid #dfe9e2;

            min-height:
                55px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            box-shadow:
                0 2px 8px
                rgba(0,0,0,0.06);

        }


        .nav-container {

            display:
                flex;

            align-items:
                center;

            gap:
                8px;

        }


        nav a {

            text-decoration:
                none;

            color:
                #315443;

            font-size:
                14px;

            font-weight:
                600;

            padding:
                9px 20px;

            border-radius:
                25px;

            transition:
                0.3s;

        }


        nav a:hover {

            background:
                #e7f7ed;

            color:
                #087443;

        }


        nav a.active {

            background:
                #087443;

            color:
                white;

        }


        /* =================================================
           MAIN CONTAINER
        ================================================= */

        .container {

            width:
                100%;

            max-width:
                1400px;

            margin:
                auto;

            padding:
                35px 25px 60px;

        }


        /* =================================================
           PAGE TITLE
        ================================================= */

        .page-heading {

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            margin-bottom:
                25px;

        }


        .page-heading h2 {

            font-size:
                28px;

            color:
                #123f29;

        }


        .page-heading p {

            color:
                #718078;

            font-size:
                13px;

            margin-top:
                5px;

        }


        .dashboard-icon {

            font-size:
                42px;

        }


        /* =================================================
           STATISTICS
        ================================================= */

        .stats {

            display:
                grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap:
                20px;

            margin-bottom:
                30px;

        }


        .stat-card {

            background:
                white;

            border-radius:
                18px;

            padding:
                23px;

            display:
                flex;

            align-items:
                center;

            gap:
                18px;

            border:
                1px solid #e0ebe3;

            box-shadow:
                0 7px 25px
                rgba(25,70,45,0.07);

            transition:
                0.3s;

        }


        .stat-card:hover {

            transform:
                translateY(-4px);

            box-shadow:
                0 12px 30px
                rgba(25,70,45,0.12);

        }


        .stat-icon {

            width:
                55px;

            height:
                55px;

            border-radius:
                15px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                25px;

        }


        .total-icon {

            background:
                #e5f2ff;

        }


        .pending-icon {

            background:
                #fff6d8;

        }


        .solved-icon {

            background:
                #e2f8e9;

        }


        .stat-text span {

            display:
                block;

            color:
                #77877d;

            font-size:
                12px;

            margin-bottom:
                4px;

        }


        .stat-text strong {

            font-size:
                27px;

            color:
                #16452d;

        }


        /* =================================================
           MANAGEMENT BAR
        ================================================= */

        .management-bar {

            background:
                white;

            border:
                1px solid #e0ebe3;

            border-radius:
                16px;

            padding:
                17px 20px;

            margin-bottom:
                20px;

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

        }


        .management-title {

            font-size:
                16px;

            font-weight:
                700;

            color:
                #214d35;

        }


        .search-box {

            width:
                280px;

            padding:
                11px 15px;

            border:
                1px solid #d5e2da;

            border-radius:
                10px;

            outline:
                none;

            font-size:
                13px;

        }


        .search-box:focus {

            border-color:
                #1c9b52;

            box-shadow:
                0 0 0 3px
                rgba(28,155,82,0.10);

        }


        /* =================================================
           ISSUE GRID
        ================================================= */

        .issue-grid {

            display:
                grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap:
                22px;

        }


        /* =================================================
           ISSUE CARD
        ================================================= */

        .issue-card {

            background:
                white;

            border:
                1px solid #e0ebe3;

            border-radius:
                20px;

            overflow:
                hidden;

            box-shadow:
                0 7px 25px
                rgba(25,70,45,0.07);

            transition:
                0.3s;

        }


        .issue-card:hover {

            transform:
                translateY(-5px);

            box-shadow:
                0 15px 35px
                rgba(25,70,45,0.13);

        }


        /* =================================================
           CARD HEADER
        ================================================= */

        .issue-header {

            padding:
                17px 18px;

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            border-bottom:
                1px solid #edf2ee;

        }


        .issue-number {

            font-size:
                12px;

            font-weight:
                700;

            color:
                #75847b;

        }


        /* =================================================
           STATUS BADGES
        ================================================= */

        .status {

            padding:
                6px 11px;

            border-radius:
                20px;

            font-size:
                11px;

            font-weight:
                700;

        }


        .status-pending {

            background:
                #fff4cf;

            color:
                #946d00;

        }


        .status-solved {

            background:
                #ddf6e5;

            color:
                #18723b;

        }


        /* =================================================
           ISSUE BODY
        ================================================= */

        .issue-body {

            padding:
                18px;

        }


        .issue-title {

            font-size:
                17px;

            font-weight:
                700;

            color:
                #15472e;

            margin-bottom:
                8px;

        }


        .location {

            font-size:
                12px;

            color:
                #6c7b72;

            margin-bottom:
                13px;

        }


        .description {

            font-size:
                12px;

            color:
                #53645a;

            line-height:
                1.6;

            min-height:
                57px;

        }


        /* =================================================
           IMAGE SECTION
        ================================================= */

        .image-section {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                10px;

            margin-top:
                17px;

        }


        .image-box {

            border-radius:
                12px;

            overflow:
                hidden;

            background:
                #eef4f0;

            position:
                relative;

        }


        .image-box img {

            width:
                100%;

            height:
                135px;

            object-fit:
                cover;

            display:
                block;

            transition:
                0.3s;

        }


        .image-box:hover img {

            transform:
                scale(1.05);

        }


        .image-label {

            position:
                absolute;

            left:
                8px;

            top:
                8px;

            padding:
                4px 8px;

            border-radius:
                8px;

            background:
                rgba(0,0,0,0.65);

            color:
                white;

            font-size:
                10px;

            font-weight:
                600;

        }


        .no-image {

            height:
                135px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                #8b9b91;

            font-size:
                11px;

        }


        /* =================================================
           FEEDBACK
        ================================================= */

        .feedback {

            margin-top:
                15px;

            padding:
                12px;

            background:
                #f4faf6;

            border-radius:
                11px;

            border-left:
                3px solid #25a65a;

        }


        .feedback strong {

            display:
                block;

            font-size:
                11px;

            color:
                #27613e;

            margin-bottom:
                4px;

        }


        .feedback span {

            font-size:
                11px;

            color:
                #66776d;

            line-height:
                1.5;

        }


        /* =================================================
           SOLUTION FORM
        ================================================= */

        .solution-box {

            margin-top:
                18px;

            padding:
                15px;

            background:
                #f8fbf9;

            border:
                1px solid #e0ebe3;

            border-radius:
                13px;

        }


        .solution-box h4 {

            font-size:
                13px;

            color:
                #20563a;

            margin-bottom:
                12px;

        }


        .solution-box input[type="file"] {

            width:
                100%;

            font-size:
                11px;

            margin-bottom:
                10px;

        }


        .solution-box textarea {

            width:
                100%;

            min-height:
                75px;

            resize:
                vertical;

            border:
                1px solid #d6e2da;

            border-radius:
                9px;

            padding:
                9px;

            font-family:
                Arial;

            font-size:
                11px;

            outline:
                none;

        }


        .solution-box textarea:focus {

            border-color:
                #22a55a;

        }


        /* =================================================
           SOLUTION BUTTON
        ================================================= */

        .solve-button {

            width:
                100%;

            margin-top:
                10px;

            border:
                none;

            border-radius:
                10px;

            padding:
                11px;

            background:
                linear-gradient(
                    135deg,
                    #16a34a,
                    #087f3d
                );

            color:
                white;

            font-size:
                12px;

            font-weight:
                700;

            cursor:
                pointer;

            transition:
                0.3s;

        }


        .solve-button:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 7px 18px
                rgba(22,163,74,0.25);

        }


        /* =================================================
           SOLVED MESSAGE
        ================================================= */

        .solved-message {

            margin-top:
                18px;

            padding:
                12px;

            border-radius:
                10px;

            background:
                #e9f8ee;

            color:
                #18723b;

            text-align:
                center;

            font-size:
                12px;

            font-weight:
                700;

        }


        /* =================================================
           EMPTY STATE
        ================================================= */

        .empty {

            grid-column:
                1 / -1;

            background:
                white;

            padding:
                60px;

            text-align:
                center;

            border-radius:
                18px;

            color:
                #718078;

        }


        .empty-icon {

            font-size:
                50px;

            margin-bottom:
                15px;

        }


        /* =================================================
           FOOTER
        ================================================= */

        footer {

            text-align:
                center;

            padding:
                20px;

            background:
                #06402B;

            color:
                #b8d9c5;

            font-size:
                11px;

        }


        footer strong {

            color:
                #55d47e;

        }


        /* =================================================
           RESPONSIVE
        ================================================= */

        @media (max-width: 1100px) {

            .issue-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }

        }


        @media (max-width: 750px) {

            header {

                padding:
                    0 15px;

            }


            .admin-label {

                display:
                    none;

            }


            .stats {

                grid-template-columns:
                    1fr;

            }


            .issue-grid {

                grid-template-columns:
                    1fr;

            }


            .management-bar {

                flex-direction:
                    column;

                align-items:
                    stretch;

                gap:
                    12px;

            }


            .search-box {

                width:
                    100%;

            }


            .page-heading {

                flex-direction:
                    column;

                align-items:
                    flex-start;

                gap:
                    10px;

            }


            .brand-text h1 {

                font-size:
                    19px;

            }


            .brand-text p {

                font-size:
                    8px;

            }


            nav {

                overflow-x:
                    auto;

                justify-content:
                    flex-start;

            }


            .nav-container {

                margin:
                    auto;

                white-space:
                    nowrap;

            }

        }


    </style>

</head>


<body>


<!-- =================================================
     HEADER
================================================= -->

<header>

    <div class="brand">

        <img
            src="images/earth.gif"
            alt="Green Watch">

        <div class="brand-text">

            <h1>
                Green Watch
            </h1>

            <p>
                NATURE ISSUE REPORTING & AWARENESS PORTAL
            </p>

        </div>

    </div>


    <div class="admin-label">

         Administrator Dashboard

    </div>

</header>


<!-- =================================================
     NAVIGATION
================================================= -->

<nav>

    <div class="nav-container">

        <a
            href="admin_login.php"
            class="active">

             Admin

        </a>


        <a href="report_form.php">

             Report

        </a>


        <a href="user_dashboard.php">

             Verify

        </a>

    </div>

</nav>


<!-- =================================================
     MAIN
================================================= -->

<div class="container">


    <!-- PAGE HEADING -->

    <div class="page-heading">

        <div>

            <h2>
                Admin Dashboard
            </h2>

            <p>
                Monitor, review and resolve environmental issues
                reported by citizens.
            </p>

        </div>


        <div class="dashboard-icon">

            🌿

        </div>

    </div>


    <!-- =================================================
         STATISTICS
    ================================================= -->

    <div class="stats">


        <!-- TOTAL -->

        <div class="stat-card">

            <div class="stat-icon total-icon">
                📋
            </div>

            <div class="stat-text">

                <span>
                    Total Reports
                </span>

                <strong>
                    <?= $total ?>
                </strong>

            </div>

        </div>


        <!-- PENDING -->

        <div class="stat-card">

            <div class="stat-icon pending-icon">
                ⏳
            </div>

            <div class="stat-text">

                <span>
                    Pending Issues
                </span>

                <strong>
                    <?= $pending ?>
                </strong>

            </div>

        </div>


        <!-- SOLVED -->

        <div class="stat-card">

            <div class="stat-icon solved-icon">
                ✓
            </div>

            <div class="stat-text">

                <span>
                    Resolved Issues
                </span>

                <strong>
                    <?= $solved ?>
                </strong>

            </div>

        </div>

    </div>


    <!-- =================================================
         MANAGEMENT BAR
    ================================================= -->

    <div class="management-bar">

        <div class="management-title">

            Reported Environmental Issues

        </div>


        <input
            type="text"
            id="searchInput"
            class="search-box"
            placeholder="🔎 Search by location or issue..."
            onkeyup="searchIssues()"
        >

    </div>


    <!-- =================================================
         ISSUE CARDS
    ================================================= -->

    <div
        class="issue-grid"
        id="issueGrid"
    >


        <?php

        if ($result->num_rows > 0) {

            while (
                $row =
                $result->fetch_assoc()
            ) {

        ?>


        <!-- =================================================
             ISSUE CARD
        ================================================= -->

        <div
            class="issue-card"
            data-search="
                <?= strtolower(
                    htmlspecialchars(
                        $row['location']
                    )
                ) ?>

                <?= strtolower(
                    htmlspecialchars(
                        $row['title']
                    )
                ) ?>
            "
        >


            <!-- CARD HEADER -->

            <div class="issue-header">

                <span class="issue-number">

                    ISSUE #
                    <?= $row['id'] ?>

                </span>


                <?php

                if ($row['status'] == 'Pending') {

                ?>

                    <span
                        class="status status-pending">

                        ⏳ Pending

                    </span>

                <?php

                } else {

                ?>

                    <span
                        class="status status-solved">

                        ✓ Solved

                    </span>

                <?php

                }

                ?>

            </div>


            <!-- CARD BODY -->

            <div class="issue-body">


                <div class="issue-title">

                    <?= htmlspecialchars(
                        $row['title']
                    ) ?>

                </div>


                <div class="location">

                    📍
                    <?= htmlspecialchars(
                        $row['location']
                    ) ?>

                </div>


                <div class="description">

                    <?= htmlspecialchars(
                        $row['description']
                    ) ?>

                </div>


                <!-- =================================================
                     BEFORE / AFTER IMAGES
                ================================================= -->

                <div class="image-section">


                    <!-- BEFORE -->

                    <div class="image-box">

                        <span class="image-label">
                            BEFORE
                        </span>

                        <img
                            src="<?= htmlspecialchars(
                                $row['image_before']
                            ) ?>"
                            alt="Before Image"
                        >

                    </div>


                    <!-- AFTER -->

                    <div class="image-box">

                        <?php

                        if (
                            !empty(
                                $row['image_after']
                            )
                        ) {

                        ?>

                            <span class="image-label">
                                AFTER
                            </span>

                            <img
                                src="<?= htmlspecialchars(
                                    $row['image_after']
                                ) ?>"
                                alt="After Image"
                            >

                        <?php

                        } else {

                        ?>

                            <div class="no-image">

                                After image
                                not available

                            </div>

                        <?php

                        } ?>

                    </div>

                </div>


                <!-- =================================================
                     FEEDBACK
                ================================================= -->

                <?php

                if (
                    !empty(
                        $row['feedback']
                    )
                ) {

                ?>

                    <div class="feedback">

                        <strong>
                            💬 Admin Feedback
                        </strong>

                        <span>

                            <?= htmlspecialchars(
                                $row['feedback']
                            ) ?>

                        </span>

                    </div>

                <?php

                }


                /* =================================================
                   PENDING → SOLUTION FORM
                ================================================= */

                if (
                    $row['status']
                    == 'Pending'
                ) {

                ?>

                    <div class="solution-box">

                        <h4>
                            🛠 Resolve This Issue
                        </h4>


                        <form
                            method="POST"
                            enctype="multipart/form-data"
                        >


                            <input
                                type="hidden"
                                name="issue_id"
                                value="<?= $row['id'] ?>"
                            >


                            <input
                                type="file"
                                name="solved_image"
                                accept="image/*"
                                required
                            >


                            <textarea
                                name="feedback"
                                placeholder="Write resolution feedback..."
                                required
                            ></textarea>


                            <button
                                type="submit"
                                name="submit_solution"
                                class="solve-button"
                            >

                                ✓ Mark Issue as Solved

                            </button>


                        </form>

                    </div>


                <?php

                } else {

                ?>


                    <div class="solved-message">

                        ✓ Issue Successfully Resolved

                    </div>


                <?php

                } ?>


            </div>

        </div>


        <?php

            }

        } else {

        ?>


        <!-- EMPTY STATE -->

        <div class="empty">

            <div class="empty-icon">
                🌱
            </div>

            <h3>
                No Environmental Issues Yet
            </h3>

            <p>
                Reported issues will appear here.
            </p>

        </div>


        <?php

        }

        ?>


    </div>

</div>


<!-- =================================================
     FOOTER
================================================= -->

<footer>

    <strong>
        Green Watch
    </strong>

    &nbsp;•&nbsp;

    Admin Environmental Management Portal

    &nbsp;•&nbsp;

    Together for a Cleaner, Greener Future 🌍

</footer>


<!-- =================================================
     SEARCH SCRIPT
================================================= -->

<script>

function searchIssues()
{

    let input =
        document
        .getElementById("searchInput")
        .value
        .toLowerCase();


    let cards =
        document
        .getElementsByClassName("issue-card");


    for (
        let i = 0;
        i < cards.length;
        i++
    )
    {

        let text =
            cards[i]
            .getAttribute("data-search")
            .toLowerCase();


        if (
            text.includes(input)
        )
        {

            cards[i].style.display =
                "";

        }

        else
        {

            cards[i].style.display =
                "none";

        }

    }

}

</script>


</body>

</html>

