<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }
        .hero-section {
            background: url('https://source.unsplash.com/random/1600x900') no-repeat center center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
            z-index: 1;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }
        .hero-section h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: moveText 10s linear infinite;
        }
        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .hero-section .btn-primary {
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 1.1rem;
            transition: background-color 0.3s, transform 0.2s;
        }
        .hero-section .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .card {
            border: none;
            border-radius: 0.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .features-section, .blog-section, .agenda-section {
            padding: 60px 0;
            background: #ffffff;
        }
        .agenda-section {
            background: #f8f9fa;
        }
        .blog-section .blog-card, .agenda-section .agenda-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .blog-section .blog-card:hover, .agenda-section .agenda-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
        }
        footer .social-icons {
            margin-top: 10px;
        }
        footer .social-icons a {
            font-size: 1.5rem;
            margin: 0 10px;
            color: white;
            transition: color 0.3s;
        }
        footer .social-icons a:hover {
            color: #007bff;
        }
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .back-to-top:hover {
            background: #0056b3;
        }
        .back-to-top.show {
            opacity: 1;
        }

        @keyframes moveText {
            0% { transform: translateX(100%); }
            50% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .animated-text {
            display: inline-block;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MyApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./dokter/dokter.php">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pasien/pasien.php">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./kunjungan/kunjungan.php">Kunjungan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="hero-section">
    <div class="container">
        <h1 class="animated-text">Welcome to MyApp</h1>
        <p>Your one-stop solution for managing doctors, patients, and visits</p>
        <a href="#features" class="btn btn-primary">Learn More</a>
    </div>
</section>

<section class="features-section text-center">
    <div class="container">
        <h2 id="features">Our Features</h2>
        <p class="lead">Manage doctors, patients, and visits efficiently</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card feature-card mb-4 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-user-md fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Doctor Management</h5>
                        <p class="card-text">Add, edit, and delete doctor information.</p>
                        <a href="./dokter/dokter.php" class="btn btn-primary">Manage Doctors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card mb-4 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-user-injured fa-3x mb-3 text-success"></i>
                        <h5 class="card-title">Patient Management</h5>
                        <p class="card-text">Add, edit, and delete patient information.</p>
                        <a href="./pasien/pasien.php" class="btn btn-primary">Manage Patients</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card mb-4 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-notes-medical fa-3x mb-3 text-warning"></i>
                        <h5 class="card-title">Visit Management</h5>
                        <p class="card-text">Add, edit, and delete visit information.</p>
                        <a href="./kunjungan/kunjungan.php" class="btn btn-primary">Manage Visits</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="agenda-section text-center">
    <div class="container">
        <h2>Upcoming Agenda</h2>
        <p class="lead">Check out our upcoming events and important dates</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card agenda-card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Event Title 1</h5>
                        <p class="card-text">Date: August 1, 2024</p>
                        <p class="card-text">Description of the event. Details about what to expect and who will be involved.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card agenda-card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Event Title 2</h5>
                        <p class="card-text">Date: August 15, 2024</p>
                        <p class="card-text">Description of the event. Details about what to expect and who will be involved.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card agenda-card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Event Title 3</h5>
                        <p class="card-text">Date: September 1, 2024</p>
                        <p class="card-text">Description of the event. Details about what to expect and who will be involved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-section text-center">
    <div class="container">
        <h2>Latest Blog Posts</h2>
        <p class="lead">Stay updated with the latest news and insights</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card blog-card mb-4 shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Blog Post 1">
                    <div class="card-body">
                        <h5 class="card-title">Blog Post Title 1</h5>
                        <p class="card-text">A brief description of the blog post content. This is a summary of the post.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card blog-card mb-4 shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Blog Post 2">
                    <div class="card-body">
                        <h5 class="card-title">Blog Post Title 2</h5>
                        <p class="card-text">A brief description of the blog post content. This is a summary of the post.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card blog-card mb-4 shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Blog Post 3">
                    <div class="card-body">
                        <h5 class="card-title">Blog Post Title 3</h5>
                        <p class="card-text">A brief description of the blog post content. This is a summary of the post.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="text-center">
    <div class="container">
        <p>&copy; 2024 MyApp. All rights reserved.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>

<button class="back-to-top" onclick="scrollToTop()"><i class="fas fa-chevron-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Smooth scroll to top
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Add scroll to top button visibility
    window.addEventListener('scroll', function() {
        const backToTopButton = document.querySelector('.back-to-top');
        if (window.scrollY > 200) {
            backToTopButton.classList.add('show');
        } else {
            backToTopButton.classList.remove('show');
        }
    });
</script>
</body>
</html>
