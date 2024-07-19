<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MyApp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #004d40;
            padding: 1rem 2rem;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-nav .nav-link.active {
            color: #00e676;
        }

        .hero-section {
            background: url('https://source.unsplash.com/random/1600x900') no-repeat center center/cover;
            color: white;
            padding: 120px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            background-attachment: fixed;
        }

        .hero-section::before {
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
            font-size: 4.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-out;
        }

        .hero-section .highlight {
            color: #00e676;
        }

        .hero-section p {
            font-size: 1.6rem;
            margin: 20px 0;
            animation: fadeIn 2s ease-out 1s;
        }

        .hero-section .btn-primary {
            border-radius: 50px;
            padding: 12px 36px;
            font-size: 1.2rem;
            background-color: #00e676;
            border: none;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .hero-section .btn-primary:hover {
            background-color: #00c853;
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .moving-text {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 10s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .features-section,
        .blog-section,
        .agenda-section,
        .comments-section {
            padding: 80px 0;
        }

        .features-section {
            background: #ffffff;
            text-align: center;
        }

        .features-section .card {
            border: none;
            border-radius: 0.75rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .features-section .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .blog-section {
            background: #f9f9f9;
        }

        .blog-section .card {
            border: none;
            border-radius: 0.75rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .blog-section .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .agenda-section {
            background: #ffffff;
        }

        .agenda-section .card {
            border: none;
            border-radius: 0.75rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .agenda-section .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .comments-section {
            background: #f9f9f9;
        }

        .comments-section .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s;
        }

        .comments-section .card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        footer {
            background: #004d40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        footer .social-icons a {
            font-size: 1.5rem;
            margin: 0 15px;
            color: #ffffff;
            transition: color 0.3s;
        }

        footer .social-icons a:hover {
            color: #00e676;
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #00e676;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            cursor: pointer;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: opacity 0.3s, background 0.3s;
        }

        .back-to-top:hover {
            background: #00c853;
        }

        .back-to-top.show {
            opacity: 1;
        }

        .typewriter-text {
            display: inline-block;
            font-size: 1.6rem;
            font-weight: bold;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            border-right: 0.15em solid #00e676;
            animation: typing 3.5s steps(30, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink-caret {
            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: #00e676
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
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
                        <a class="nav-link" href="./dokter/dokter.php">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pasien/pasien.php">Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./kunjungan/kunjungan.php">Visits</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">Welcome to <span class="highlight">MyApp</span></h1>
            <p class="moving-text">Your ultimate health management solution</p>
            <br>
            <a href="#features" class="btn btn-primary">Discover More</a>
        </div>
    </section>

    <section id="features" class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <i class="fas fa-user-md fa-2x mb-3 text-primary"></i>
                        <h4>Professional Doctors</h4>
                        <p>Our team of experienced and dedicated doctors is here to provide you with the best care.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <i class="fas fa-notes-medical fa-2x mb-3 text-primary"></i>
                        <h4>Patient Management</h4>
                        <p>Efficiently manage patient information and medical records with our intuitive system.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <i class="fas fa-calendar-check fa-2x mb-3 text-primary"></i>
                        <h4>Visit Scheduling</h4>
                        <p>Seamlessly schedule and manage appointments to ensure timely medical care.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog" class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <img src="https://source.unsplash.com/random/300x200" class="card-img-top" alt="Blog 1">
                        <div class="card-body">
                            <h5 class="card-title">Healthcare Tips</h5>
                            <p class="card-text">Stay updated with the latest healthcare tips and wellness advice.</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <img src="https://source.unsplash.com/random/301x200" class="card-img-top" alt="Blog 2">
                        <div class="card-body">
                            <h5 class="card-title">Medical News</h5>
                            <p class="card-text">Get the latest updates on medical breakthroughs and health news.</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <img src="https://source.unsplash.com/random/302x200" class="card-img-top" alt="Blog 3">
                        <div class="card-body">
                            <h5 class="card-title">Healthy Living</h5>
                            <p class="card-text">Learn how to live a healthier and more balanced lifestyle.</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="agenda" class="agenda-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <i class="fas fa-calendar-alt fa-2x mb-3 text-primary"></i>
                        <h4>Upcoming Events</h4>
                        <p>Stay informed about our upcoming health seminars and events.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <i class="fas fa-calendar-check fa-2x mb-3 text-primary"></i>
                        <h4>Appointment Scheduling</h4>
                        <p>Effortlessly book and manage your medical appointments with ease.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-4 mb-4 bg-white">
                        <i class="fas fa-heartbeat fa-2x mb-3 text-primary"></i>
                        <h4>Health Programs</h4>
                        <p>Join our health programs and take the first step towards a healthier life.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="comments" class="comments-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card p-4 mb-4 bg-white">
                        <div class="card-body">
                            <h5 class="card-title">User Feedback</h5>
                            <p class="card-text">"MyApp has transformed the way I manage my health. The platform is user-friendly and the support is fantastic!"</p>
                            <footer class="blockquote-footer">Jane Doe, <cite title="Source Title">Regular User</cite></footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-4 mb-4 bg-white">
                        <div class="card-body">
                            <h5 class="card-title">User Feedback</h5>
                            <p class="card-text">"I highly recommend MyApp to anyone looking for a comprehensive health management solution."</p>
                            <footer class="blockquote-footer">John Smith, <cite title="Source Title">Satisfied Client</cite></footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2023 MyApp. All rights reserved.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <button class="back-to-top" id="back-to-top"><i class="fas fa-arrow-up"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        const backToTopButton = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>
