<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Search</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="logo">DocFinder</div>
    <nav>
        <a href="#about">About Us</a>
       <?php if (isset($_SESSION['user_id'])): ?>
    <a href="#search">Search</a>
<?php else: ?>
    <a href="auth/login.php">Search</a>
<?php endif; ?>

        <a href="auth/register.php">Register</a>
        <a href="auth/login.php">Login</a>
        <a href="admin/admin_login.php" class="admin-link">Admin</a>
    </nav>
</header>

<!-- HERO / ABOUT -->
<section id="about" class="hero">
    <h1>Find The Right Doctor, Anytime</h1>
    <p>Search trusted doctors by specialization and location.</p>
</section>

<section id="search" class="search-section">
    <h2>Search Doctors</h2>

    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- USER IS LOGGED IN -->
        <form class="search-box" method="GET" action="search/search.php">
            <select name="specialization" required>
                <option value="">Select Specialization</option>
                <option value="Cardiologist">Cardiologist</option>
                <option value="Dermatologist">Dermatologist</option>
                <option value="Pediatrician">Pediatrician</option>
                <option value="Neurologist">Neurologist</option>
                <option value="Orthopedic">Orthopedic</option>
            </select>

            <select name="location" required>
                <option value="">Select Location</option>
                <option value="New York">New York</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Chicago">Chicago</option>
                <option value="Houston">Houston</option>
            </select>

            <button type="submit">Search</button>
        </form>

    <?php else: ?>
        <!-- USER NOT LOGGED IN -->
        <p style="text-align:center; font-weight:bold;">
            Please <a href="auth/login.php">login</a> to search for doctors.
        </p>
    <?php endif; ?>
</section>

     <!-- RESULTS SECTION -->
    <section class="results">
        <h2>Available Doctors</h2>
        <div class="doctor-cards">

            <div class="card">
                <h3>Dr. John Smith</h3>
                <p>Cardiologist</p>
                <p>New York</p>
                <button>View Profile</button>
            </div>

            <div class="card">
                <h3>Dr. Emily Brown</h3>
                <p>Dermatologist</p>
                <p>Los Angeles</p>
                <button>View Profile</button>
            </div>

            <div class="card">
                <h3>Dr. Alex Johnson</h3>
                <p>Pediatrician</p>
                <p>Chicago</p>
                <button>View Profile</button>
            </div>

        </div>
    </section>

<!-- FOOTER -->
<footer>
    <p>© 2025 DocFinder. All Rights Reserved.</p>
</footer>

<!-- INTERACTIVE SCRIPT -->
<script src="script.js"></script>

</body>
</html>
