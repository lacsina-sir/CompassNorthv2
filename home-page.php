<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compass North Land Surveying Services</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(52, 73, 70, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 15px 0;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #4ade80, #22c55e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .logo-text {
            color: white;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 25px;
            padding: 8px;
            gap: 5px;
        }

        .nav-item {
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-item.active {
            background: #4ade80;
            color: white;
        }

        .nav-item:hover {
            background: #22c55e;
            color: white;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%234ade80" width="1200" height="600"/><path fill="%2322c55e" d="M0 400c200-50 400-100 600-80s400 60 600 20v260H0z"/><circle fill="%2316a34a" cx="200" cy="200" r="60"/><circle fill="%2316a34a" cx="400" cy="150" r="40"/><circle fill="%2316a34a" cx="600" cy="180" r="50"/><circle fill="%2316a34a" cx="800" cy="120" r="35"/><circle fill="%2316a34a" cx="1000" cy="160" r="45"/></svg>');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            text-align: right;
            color: white;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            color: #4ade80;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.4rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            line-height: 1.5;
        }

        .cta-button {
            background: linear-gradient(135deg, #4ade80, #22c55e);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(74, 222, 128, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(74, 222, 128, 0.4);
        }

        /* Projects Gallery */
        .projects-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            position: relative;
            overflow: hidden;
        }

        .projects-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            background-size: 50px 50px;
        }

        .projects-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .project-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }

        .project-card:hover::before {
            left: 100%;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .project-placeholder {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #e5e7eb, #d1d5db);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            position: relative;
            overflow: hidden;
        }

        .project-placeholder::after {
            content: '🏔️';
            font-size: 3rem;
            opacity: 0.6;
        }

        .silhouette {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 80px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 80"><path d="M30 10c-8 0-15 7-15 15v20c0 8 7 15 15 15s15-7 15-15V25c0-8-7-15-15-15z" fill="%23000"/><path d="M25 35h10v30h-10z" fill="%23000"/><path d="M20 55h20v5h-20z" fill="%23000"/></svg>') no-repeat center;
            background-size: contain;
            opacity: 0.8;
        }

        .project-text {
            text-align: center;
            color: #d97706;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Services Section */
        .services-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #1f2937, #374151);
            color: white;
        }

        .services-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 60px;
            color: #4ade80;
            font-weight: bold;
        }

        .services-list {
            display: grid;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .service-item {
            background: rgba(74, 222, 128, 0.1);
            padding: 25px;
            border-radius: 10px;
            border-left: 4px solid #4ade80;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .service-item:hover {
            background: rgba(74, 222, 128, 0.2);
            transform: translateX(10px);
        }

        .service-number {
            color: #4ade80;
            font-weight: bold;
            margin-right: 10px;
        }

        /* Tips Section */
        .tips-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #e5e7eb, #f3f4f6);
        }

        .tips-container {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .tips-card {
            background: white;
            padding: 60px 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .tips-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, #4ade80, #22c55e);
        }

        .tips-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #1f2937;
            font-weight: bold;
        }

        .tips-subtitle {
            font-size: 1.5rem;
            color: #374151;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .tips-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            text-align: left;
            margin-top: 30px;
        }

        .tip-item {
            padding: 10px;
            background: #f9fafb;
            border-radius: 8px;
            border-left: 3px solid #4ade80;
        }

        /* Contact Section */
        .contact-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #1f2937, #374151);
            color: white;
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 50px;
            color: #fbbf24;
            font-weight: bold;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #fbbf24;
        }

        input, textarea {
            padding: 15px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #fbbf24;
            background: rgba(255, 255, 255, 0.15);
        }

        input::placeholder, textarea::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        .social-link {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .facebook-btn {
            background: #1877f2;
            color: white;
            padding: 15px;
            border-radius: 50%;
            text-decoration: none;
            font-size: 20px;
            transition: all 0.3s ease;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .facebook-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(24, 119, 242, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                flex-wrap: wrap;
                gap: 3px;
            }
            
            .nav-item {
                padding: 6px 12px;
                font-size: 14px;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .tips-list {
                grid-template-columns: 1fr;
            }
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Animation classes */
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
        <div class="nav-container">
            <div class="logo">
                <div class="logo-icon">🧭</div>
                <div class="logo-text">COMPASS NORTH LAND SURVEYING SERVICES</div>
            </div>
            <nav class="nav-menu">
                <a href="#home" class="nav-item active">HOME</a>
                <a href="#about" class="nav-item">ABOUT</a>
                <a href="#projects" class="nav-item">PROJECTS</a>
                <a href="#services" class="nav-item">SERVICES</a>
                <a href="#tips" class="nav-item">TIPS</a>
                <a href="#contact" class="nav-item">CONTACT</a>
                <a href="#login" class="nav-item">LOG IN</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1 class="hero-title fade-in">Your Trusted Partner<br>in Land Surveying and<br>Property Solutions</h1>
            <p class="hero-subtitle fade-in">At Compass North, we specialize in providing accurate land surveys, clear boundary identification, and secure documentation through cutting-edge technology.</p>
            <a href="#services" class="cta-button fade-in">Read More</a>
        </div>
    </section>

    <!-- Projects Gallery -->
    <section id="projects" class="projects-section">
        <div class="projects-container">
            <div class="projects-grid fade-in">
                <div class="project-card">
                    <div class="project-placeholder">
                        <div class="silhouette"></div>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-placeholder">
                        <div class="silhouette"></div>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-placeholder">
                        <div class="silhouette"></div>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-placeholder">
                        <div class="silhouette"></div>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-placeholder">
                        <div class="silhouette"></div>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-placeholder">
                        <div class="silhouette"></div>
                    </div>
                </div>
            </div>
            <div class="project-text">THIS IS SOME TEXT<br>INSIDE OF A DIV BLOCK</div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="services-container">
            <h2 class="section-title fade-in">SERVICES OFFERED:</h2>
            <div class="services-list fade-in">
                <div class="service-item">
                    <span class="service-number">1.</span> Relocation Survey
                </div>
                <div class="service-item">
                    <span class="service-number">2.</span> Subdivision Survey
                </div>
                <div class="service-item">
                    <span class="service-number">3.</span> Topography Survey
                </div>
                <div class="service-item">
                    <span class="service-number">4.</span> Segregation Survey
                </div>
                <div class="service-item">
                    <span class="service-number">5.</span> Consolidation Survey
                </div>
                <div class="service-item">
                    <span class="service-number">6.</span> Sketch Plan, Vicinity Plan
                </div>
                <div class="service-item">
                    <span class="service-number">7.</span> Title Transfer / Titling
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <section id="tips" class="tips-section">
        <div class="tips-container">
            <div class="tips-card fade-in">
                <h2 class="tips-title">TIPS:</h2>
                <h3 class="tips-subtitle">BEFORE BUYING A LAND PROPERTY</h3>
                <div class="tips-list">
                    <div class="tip-item">1. Check property title and ownership documents</div>
                    <div class="tip-item">2. Verify property boundaries with a survey</div>
                    <div class="tip-item">3. Research zoning laws and restrictions</div>
                    <div class="tip-item">4. Inspect for easements and right-of-ways</div>
                    <div class="tip-item">5. Confirm access to utilities and roads</div>
                    <div class="tip-item">6. Review environmental and flood zone data</div>
                    <div class="tip-item">7. Check for liens and encumbrances</div>
                    <div class="tip-item">8. Consider future development potential</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="contact-container">
            <h2 class="contact-title fade-in">Contact Us Now!</h2>
            <form class="contact-form fade-in">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number *</label>
                        <input type="tel" id="mobile" name="mobile" required placeholder="Enter your mobile number">
                    </div>
                </div>
                <div class="form-group full-width">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" required placeholder="Enter your message here..."></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
            <div class="social-link">
                <a href="#" class="facebook-btn">f</a>
            </div>
        </div>
    </section>

    <script>
        // Smooth scrolling for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Active navigation highlighting
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section');
            const navItems = document.querySelectorAll('.nav-item');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navItems.forEach(item => {
                item.classList.remove('active');
                if (item.getAttribute('href') === '#' + current) {
                    item.classList.add('active');
                }
            });
        });

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

        // Form submission
        document.querySelector('.contact-form').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
        });

        // Initialize animations
        setTimeout(() => {
            document.querySelectorAll('.hero .fade-in').forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('visible');
                }, index * 200);
            });
        }, 300);
    </script>
</body>
</html>