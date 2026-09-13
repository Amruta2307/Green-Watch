
<?php
$conn = new mysqli("localhost", "root", "", "greenwatch");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM issues ORDER BY id DESC";
$result = $conn->query($sql);

/* Statistics */
$total_result = $conn->query("SELECT COUNT(*) AS total FROM issues");
$total = $total_result->fetch_assoc()['total'];

$pending_result = $conn->query("SELECT COUNT(*) AS pending FROM issues WHERE status='Pending'");
$pending = $pending_result->fetch_assoc()['pending'];

$solved_result = $conn->query("SELECT COUNT(*) AS solved FROM issues WHERE status='Solved'");
$solved = $solved_result->fetch_assoc()['solved'];

$verified_result = $conn->query("SELECT COUNT(*) AS verified FROM issues WHERE status='Verified'");
$verified = $verified_result->fetch_assoc()['verified'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Green Watch | User Dashboard</title>

<style>

/* =========================
   GLOBAL
========================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}

body {
    background: #eef7f1;
    color: #26352d;
}

/* =========================
   HEADER
========================= */

.header {
    background: linear-gradient(135deg, #063d29, #087443);
    color: white;
    padding: 22px 6%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.logo-section {
    display: flex;
    align-items: center;
    gap: 14px;
}

.logo {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    object-fit: cover;
}

.logo-section h1 {
    font-size: 25px;
    letter-spacing: 0.5px;
}

.logo-section p {
    font-size: 13px;
    opacity: 0.85;
    margin-top: 3px;
}

.user-badge {
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.25);
    padding: 10px 18px;
    border-radius: 25px;
    font-size: 14px;
}

/* =========================
   NAVIGATION
========================= */

.navbar {
    background: white;
    padding: 13px 6%;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
}

.navbar a {
    text-decoration: none;
    color: #315044;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 600;
    transition: 0.3s;
}

.navbar a:hover {
    background: #e4f5ea;
    color: #087443;
}

.navbar a.active {
    background: #087443;
    color: white;
}

/* =========================
   MAIN CONTAINER
========================= */

.container {
    width: 90%;
    max-width: 1400px;
    margin: 35px auto;
}

/* =========================
   PAGE TITLE
========================= */

.page-title {
    margin-bottom: 28px;
}

.page-title h2 {
    color: #063d29;
    font-size: 30px;
    margin-bottom: 7px;
}

.page-title p {
    color: #687970;
    font-size: 15px;
}

/* =========================
   STATISTICS
========================= */

.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    padding: 22px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    gap: 17px;
    box-shadow: 0 5px 18px rgba(0,0,0,0.07);
    transition: 0.3s;
    border-left: 5px solid #087443;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}

.stat-icon {
    width: 52px;
    height: 52px;
    background: #e4f5ea;
    color: #087443;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
}

.stat-card h3 {
    font-size: 26px;
    color: #173c2b;
}

.stat-card span {
    color: #718079;
    font-size: 13px;
}

/* =========================
   SEARCH AREA
========================= */

.tools {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 5px 18px rgba(0,0,0,0.06);
    margin-bottom: 28px;

    display: flex;
    gap: 15px;
    align-items: center;
    justify-content: space-between;
}

.search-box {
    flex: 1;
    position: relative;
}

.search-box input {
    width: 100%;
    padding: 13px 18px;
    border: 1px solid #d7e5dc;
    border-radius: 10px;
    outline: none;
    font-size: 14px;
    background: #f8fbf9;
}

.search-box input:focus {
    border-color: #087443;
    box-shadow: 0 0 0 3px rgba(8,116,67,0.08);
}

.filter select {
    padding: 13px 20px;
    border: 1px solid #d7e5dc;
    border-radius: 10px;
    outline: none;
    background: #f8fbf9;
    color: #315044;
    font-size: 14px;
}

/* =========================
   REPORT GRID
========================= */

.report-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

/* =========================
   REPORT CARD
========================= */

.report-card {
    background: white;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 6px 22px rgba(0,0,0,0.08);
    transition: 0.3s;
    border: 1px solid #e4eee8;
}

.report-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 30px rgba(0,0,0,0.12);
}

/* Card top */

.card-top {
    padding: 18px 20px;
    border-bottom: 1px solid #edf2ee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.report-id {
    font-weight: bold;
    color: #557064;
    font-size: 13px;
}

.status {
    padding: 7px 13px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
}

.status.pending {
    background: #fff3cd;
    color: #856404;
}

.status.solved {
    background: #dff5e7;
    color: #16723e;
}

.status.verified {
    background: #dcecff;
    color: #1c5d9d;
}

/* Card body */

.card-body {
    padding: 20px;
}

.location {
    color: #087443;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 8px;
}

.card-body h3 {
    color: #173c2b;
    font-size: 20px;
    margin-bottom: 10px;
}

.description {
    color: #66756d;
    line-height: 1.6;
    font-size: 14px;
    min-height: 48px;
}

/* =========================
   IMAGE SECTION
========================= */

.images {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-top: 18px;
}

.image-box {
    background: #f2f6f3;
    border-radius: 12px;
    overflow: hidden;
}

.image-box span {
    display: block;
    padding: 8px 10px;
    font-size: 11px;
    font-weight: bold;
    color: #61736a;
    text-transform: uppercase;
}

.image-box img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    display: block;
    cursor: pointer;
    transition: 0.3s;
}

.image-box img:hover {
    transform: scale(1.03);
}

/* =========================
   FEEDBACK
========================= */

.feedback {
    background: #f3faf5;
    border-left: 4px solid #087443;
    padding: 13px;
    margin-top: 18px;
    border-radius: 8px;
}

.feedback-title {
    color: #087443;
    font-size: 12px;
    font-weight: bold;
    margin-bottom: 5px;
}

.feedback p {
    font-size: 13px;
    color: #53645b;
}

/* =========================
   ACTION
========================= */

.action {
    padding: 18px 20px;
    border-top: 1px solid #edf2ee;
}

.pending-text {
    color: #92701d;
    background: #fff8df;
    padding: 12px;
    border-radius: 9px;
    text-align: center;
    font-size: 13px;
}

.verify-btn {
    width: 100%;
    border: none;
    background: linear-gradient(135deg, #087443, #0b9255);
    color: white;
    padding: 13px;
    border-radius: 10px;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.verify-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 7px 18px rgba(8,116,67,0.25);
}

.verified-message {
    background: #e4f4ff;
    color: #1c5d9d;
    padding: 12px;
    border-radius: 9px;
    text-align: center;
    font-weight: 600;
}

/* =========================
   EMPTY
========================= */

.no-reports {
    background: white;
    padding: 60px;
    text-align: center;
    border-radius: 18px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.06);
}

.no-reports .icon {
    font-size: 50px;
    margin-bottom: 15px;
}

.no-reports h3 {
    color: #173c2b;
    margin-bottom: 8px;
}

.no-reports p {
    color: #74837b;
}

/* =========================
   FOOTER
========================= */

footer {
    background: #063d29;
    color: white;
    text-align: center;
    padding: 22px;
    margin-top: 50px;
}

footer p {
    font-size: 13px;
    opacity: 0.8;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width: 1000px) {

    .stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .report-grid {
        grid-template-columns: 1fr;
    }
}

@media(max-width: 650px) {

    .header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }

    .navbar {
        justify-content: center;
        flex-wrap: wrap;
    }

    .container {
        width: 94%;
    }

    .stats {
        grid-template-columns: 1fr;
    }

    .tools {
        flex-direction: column;
        align-items: stretch;
    }

    .images {
        grid-template-columns: 1fr;
    }

    .page-title h2 {
        font-size: 24px;
    }
}

</style>

</head>

<body>


<!-- =========================
     HEADER
========================= -->

<header class="header">

    <div class="logo-section">

        <img src="images/earth.gif" class="logo">

        <div>
            <h1>🌿 Green Watch</h1>
            <p>Nature Issue Reporting & Awareness Portal</p>
        </div>

    </div>

    <div class="user-badge">
        👤 Citizen Dashboard
    </div>

</header>


<!-- =========================
     NAVIGATION
========================= -->

<nav class="navbar">

    <a href="admin_login.php">
        Admin
    </a>

    <a href="report_form.php">
        Report Issue
    </a>

    <a href="user_dashboard.php" class="active">
        View Reports
    </a>

</nav>


<!-- =========================
     MAIN
========================= -->

<div class="container">


    <!-- TITLE -->

    <div class="page-title">

        <h2>Community Environmental Reports</h2>

        <p>
            Track reported environmental issues, monitor their progress
            and verify successfully resolved problems.
        </p>

    </div>


    <!-- =========================
         STATISTICS
    ========================= -->

    <div class="stats">

        <div class="stat-card">

            <div class="stat-icon">📋</div>

            <div>
                <h3><?= $total ?></h3>
                <span>Total Reports</span>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">⏳</div>

            <div>
                <h3><?= $pending ?></h3>
                <span>Pending Issues</span>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">✓</div>

            <div>
                <h3><?= $solved ?></h3>
                <span>Resolved Issues</span>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">🏆</div>

            <div>
                <h3><?= $verified ?></h3>
                <span>Verified Issues</span>
            </div>

        </div>

    </div>


    <!-- =========================
         SEARCH + FILTER
    ========================= -->

    <div class="tools">

        <div class="search-box">

            <input
                type="text"
                id="searchInput"
                placeholder="🔍 Search by location, description or issue ID..."
            >

        </div>


        <div class="filter">

            <select id="statusFilter">

                <option value="all">All Status</option>

                <option value="Pending">
                    Pending
                </option>

                <option value="Solved">
                    Solved
                </option>

                <option value="Verified">
                    Verified
                </option>

            </select>

        </div>

    </div>


    <!-- =========================
         REPORTS
    ========================= -->

    <div class="report-grid" id="reportGrid">


<?php if ($result->num_rows > 0): ?>


<?php while ($row = $result->fetch_assoc()): ?>


<div
    class="report-card"
    data-status="<?= htmlspecialchars($row['status']) ?>"
    data-search="<?= htmlspecialchars(
        strtolower(
            $row['id'] . ' ' .
            $row['location'] . ' ' .
            $row['description']
        )
    ) ?>"
>


    <!-- CARD TOP -->

    <div class="card-top">

        <span class="report-id">
            REPORT #<?= htmlspecialchars($row['id']) ?>
        </span>


        <?php if ($row['status'] == 'Pending'): ?>

            <span class="status pending">
                ⏳ Pending
            </span>

        <?php elseif ($row['status'] == 'Solved'): ?>

            <span class="status solved">
                ✓ Solved
            </span>

        <?php elseif ($row['status'] == 'Verified'): ?>

            <span class="status verified">
                🏆 Verified
            </span>

        <?php endif; ?>

    </div>


    <!-- CARD BODY -->

    <div class="card-body">


        <div class="location">
            📍 <?= htmlspecialchars($row['location']) ?>
        </div>


        <h3>
            Environmental Issue
        </h3>


        <p class="description">
            <?= htmlspecialchars($row['description']) ?>
        </p>


        <!-- IMAGES -->

        <div class="images">


            <!-- BEFORE -->

            <div class="image-box">

                <span>Before</span>

                <?php if (!empty($row['image_before'])): ?>

                    <img
                        src="<?= htmlspecialchars($row['image_before']) ?>"
                        alt="Before Issue"
                        onclick="openImage(this.src)"
                    >

                <?php else: ?>

                    <div style="padding:50px 10px;text-align:center;">
                        No Image
                    </div>

                <?php endif; ?>

            </div>


            <!-- AFTER -->

            <div class="image-box">

                <span>After Resolution</span>

                <?php if (!empty($row['image_after'])): ?>

                    <img
                        src="<?= htmlspecialchars($row['image_after']) ?>"
                        alt="After Issue"
                        onclick="openImage(this.src)"
                    >

                <?php else: ?>

                    <div style="padding:50px 10px;text-align:center;">
                        Not Available
                    </div>

                <?php endif; ?>

            </div>


        </div>


        <!-- FEEDBACK -->

        <?php if (!empty($row['feedback'])): ?>

            <div class="feedback">

                <div class="feedback-title">
                    💬 ADMIN FEEDBACK
                </div>

                <p>
                    <?= htmlspecialchars($row['feedback']) ?>
                </p>

            </div>

        <?php endif; ?>


    </div>


    <!-- =========================
         ACTION
    ========================= -->

    <div class="action">


        <?php if ($row['status'] == 'Pending'): ?>

            <div class="pending-text">
                 This issue is currently being reviewed.
            </div>


        <?php elseif ($row['status'] == 'Solved'): ?>

            <form method="POST" action="verify_issue.php">

                <input
                    type="hidden"
                    name="issue_id"
                    value="<?= htmlspecialchars($row['id']) ?>"
                >

                <button
                    type="submit"
                    name="verify"
                    class="verify-btn"
                >
                    ✓ Verify Issue as Solved
                </button>

            </form>


        <?php elseif ($row['status'] == 'Verified'): ?>

            <div class="verified-message">
                 Issue Successfully Verified
            </div>

        <?php endif; ?>


    </div>


</div>


<?php endwhile; ?>


<?php else: ?>


<div class="no-reports">

    <div class="icon">
        🌱
    </div>

    <h3>No Environmental Reports Yet</h3>

    <p>
        No issues have been reported by the community.
    </p>

</div>


<?php endif; ?>


    </div>

</div>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <p>
        🌿 Green Watch — Building a Cleaner & Greener Community
    </p>

    <p style="margin-top:6px;">
        Nature Issue Reporting & Awareness Portal
    </p>

</footer>


<!-- =========================
     IMAGE POPUP
========================= -->

<div
    id="imageModal"
    style="
        display:none;
        position:fixed;
        z-index:9999;
        left:0;
        top:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.88);
        align-items:center;
        justify-content:center;
        padding:30px;
    "
    onclick="closeImage()"
>

    <span
        style="
            position:absolute;
            top:20px;
            right:35px;
            color:white;
            font-size:40px;
            cursor:pointer;
        "
    >
        ×
    </span>

    <img
        id="popupImage"
        style="
            max-width:90%;
            max-height:85%;
            border-radius:15px;
            box-shadow:0 10px 40px rgba(0,0,0,0.5);
        "
    >

</div>


<script>

/* =========================
   SEARCH
========================= */

const searchInput = document.getElementById("searchInput");
const statusFilter = document.getElementById("statusFilter");

function filterReports() {

    const searchValue =
        searchInput.value.toLowerCase();

    const selectedStatus =
        statusFilter.value;

    const cards =
        document.querySelectorAll(".report-card");

    cards.forEach(function(card) {

        const searchData =
            card.getAttribute("data-search");

        const status =
            card.getAttribute("data-status");

        const searchMatch =
            searchData.includes(searchValue);

        const statusMatch =
            selectedStatus === "all" ||
            status === selectedStatus;

        if (searchMatch && statusMatch) {

            card.style.display = "block";

        } else {

            card.style.display = "none";

        }

    });

}

searchInput.addEventListener(
    "keyup",
    filterReports
);

statusFilter.addEventListener(
    "change",
    filterReports
);


/* =========================
   IMAGE POPUP
========================= */

function openImage(src) {

    document.getElementById("imageModal").style.display =
        "flex";

    document.getElementById("popupImage").src =
        src;
}


function closeImage() {

    document.getElementById("imageModal").style.display =
        "none";

}

</script>


</body>
</html>

