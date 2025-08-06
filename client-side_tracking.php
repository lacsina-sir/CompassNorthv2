<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'compass_north';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Fetch client name 
$client_sql = "SELECT first_name FROM users WHERE id = ?";
$client_stmt = $conn->prepare($client_sql);
$client_stmt->bind_param("i", $user_id);
$client_stmt->execute();
$client_result = $client_stmt->get_result();
$client = $client_result->fetch_assoc();
$client_name = $client['first_name'] ?? 'Client';

// Fetch progress steps
$progress_sql = "SELECT step_name, status FROM progress_tracker WHERE client_id = ? ORDER BY step_order ASC";
$progress_stmt = $conn->prepare($progress_sql);
$progress_stmt->bind_param("i", $user_id);
$progress_stmt->execute();
$progress_result = $progress_stmt->get_result();

// Fetch milestone dates
$dates_sql = "SELECT request_date, site_visit_date, estimated_completion FROM milestone_dates WHERE client_id = ?";
$dates_stmt = $conn->prepare($dates_sql);
$dates_stmt->bind_param("i", $user_id);
$dates_stmt->execute();
$dates_result = $dates_stmt->get_result();
$dates = $dates_result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Progress Tracker - Compass North</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #2c3e50 100%);
            min-height: 100vh;
            color: #ecf0f1;
            line-height: 1.6;
            padding: 20px;
        }

        /* Header matching home-page.php */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.3);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 1000;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #00ff88, #00cc6a);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 24px;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .title-text {
            color: #ecf0f1;
            font-size: 28px;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-pills {
            display: flex;
            gap: 8px;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
        }

        .nav-pill {
            padding: 10px 18px;
            color: #bdc3c7;
            text-decoration: none;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            background: none;
        }

        .nav-pill:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
        }

        .nav-pill.active {
            background: linear-gradient(45deg, #00ff88, #00cc6a);
            color: white;
        }

        /* Main Content */
        .main-container {
            max-width: 1200px;
            margin: 120px auto 0;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            padding: 0 20px;
        }

        .left-section {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .welcome-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            padding: 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .welcome-text {
            font-size: 18px;
            color: #ecf0f1;
            font-weight: 300;
        }

        .client-name {
            color: #00ff88;
            font-weight: 500;
        }

        .progress-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .progress-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(45deg, #00ff88, #00cc6a);
        }

        .progress-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 40px;
            color: #ecf0f1;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .progress-item {
            background: rgba(0, 0, 0, 0.4);
            margin-bottom: 20px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .progress-item:hover {
            transform: translateX(5px);
            border-color: rgba(0, 255, 136, 0.3);
        }

        .progress-label {
            padding: 20px 25px;
            color: #ecf0f1;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            position: relative;
            z-index: 2;
        }

        .progress-item.completed {
            background: linear-gradient(45deg, #00ff88, #00cc6a);
            box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
        }

        .progress-item.completed .progress-label {
            color: white;
            font-weight: 600;
        }

        .progress-item.current {
            background: linear-gradient(45deg, #3498db, #2980b9);
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
            animation: pulse 2s infinite;
        }

        .progress-item.current .progress-label {
            color: white;
            font-weight: 600;
        }

        @keyframes pulse {
            0% { box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3); }
            50% { box-shadow: 0 8px 25px rgba(52, 152, 219, 0.5); }
            100% { box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3); }
        }

        .right-section {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .dates-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            padding: 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .dates-title {
            font-size: 20px;
            margin-bottom: 30px;
            color: #ecf0f1;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .date-item {
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .date-item:hover {
            background: rgba(0, 255, 136, 0.1);
            border-color: rgba(0, 255, 136, 0.3);
        }

        .date-label {
            color: #bdc3c7;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .date-value {
            color: #ecf0f1;
            font-size: 16px;
            font-weight: 500;
        }

        .current-date {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .current-date .date-label,
        .current-date .date-value {
            color: white;
        }

        /* Status indicators */
        .status-indicator {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
        }

        .progress-item.completed .status-indicator {
            background: #fff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .progress-item.current .status-indicator {
            background: #fff;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0.3; }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .header {
                flex-direction: column;
                gap: 20px;
                padding: 20px;
            }
            
            .nav-pills {
                order: -1;
            }
            
            .title-text {
                font-size: 24px;
            }

            .main-container {
                grid-template-columns: 1fr;
                margin-top: 160px;
            }
        }

        @media (max-width: 768px) {
            .title-text {
                font-size: 20px;
            }

            .nav-pills {
                flex-wrap: wrap;
                gap: 5px;
            }

            .nav-pill {
                padding: 8px 14px;
                font-size: 12px;
            }

            .main-container {
                padding: 0 15px;
                gap: 20px;
            }

            .progress-section,
            .dates-section,
            .welcome-section {
                padding: 25px 20px;
            }

            .progress-title {
                font-size: 20px;
            }
        }

        /* Smooth animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo-section">
            <div class="logo">C</div>
            <div class="title-text">TITULO</div>
        </div>
        <nav class="nav-pills">
            <a href="#" class="nav-pill">Home</a>
            <a href="#" class="nav-pill">About</a>
            <a href="#" class="nav-pill">Services</a>
            <a href="#" class="nav-pill">Tips</a>
            <a href="#" class="nav-pill">Contact</a>
            <a href="#" class="nav-pill active">Log In</a>
        </nav>
    </header>

   <!-- Main Content -->
    <div class="main-container">
        <div class="left-section">
            <!-- Welcome Section -->
            <div class="welcome-section fade-in">
                <div class="welcome-text">Welcome <span class="client-name"><?= htmlspecialchars($client_name) ?></span>
                </div>
            </div>

            <!-- Progress Tracker -->
            <div class="progress-section fade-in">
                <h2 class="progress-title">Progress Tracker</h2>

                <?php while ($row = $progress_result->fetch_assoc()): ?>
                    <div class="progress-item <?= htmlspecialchars($row['status']) ?>">
                        <div class="progress-label"><?= htmlspecialchars($row['step_name']) ?></div>
                        <div class="status-indicator"></div>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>

        <div class="dates-section fade-in">
            <h3 class="dates-title">Dates</h3>

            <?php if ($dates): ?>
                <div class="date-item">
                    <div class="date-label">Request Date</div>
                    <div class="date-value"><?= date("M j, Y", strtotime($dates['request_date'])) ?></div>
                </div>
                <div class="date-item current-date">
                    <div class="date-label">Site Visit</div>
                    <div class="date-value"><?= date("M j, Y", strtotime($dates['site_visit_date'])) ?></div>
                </div>
                <div class="date-item">
                    <div class="date-label">Est. Completion</div>
                    <div class="date-value"><?= date("M j, Y", strtotime($dates['estimated_completion'])) ?></div>
                </div>
            <?php else: ?>
                <p>No milestone dates found.</p>
            <?php endif; ?>
        </div>

    </div>

    <script>
        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Initialize animations
        setTimeout(() => {
            document.querySelectorAll('.fade-in').forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('visible');
                }, index * 200);
            });
        }, 300);

        // Interactive progress items
        document.querySelectorAll('.progress-item').forEach(item => {
            item.addEventListener('click', () => {
                // Add subtle interaction feedback
                item.style.transform = 'translateX(10px)';
                setTimeout(() => {
                    item.style.transform = 'translateX(5px)';
                }, 150);
            });
        });

        // Dynamic client name (can be replaced with actual data)
        function updateClientName(name) {
            document.querySelector('.client-name').textContent = name;
        }

        // You can call this function with actual client data
        // updateClientName('John Doe');
    </script>
</body>

</html>