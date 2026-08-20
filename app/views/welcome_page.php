<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANUEL STUDENT DESK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700;800;900&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-page: #dfe4ea;
            --panel-bg: #f3f4f6;
            --panel-dark: #111827;
            --line: #1d1d1d;
            --soft-line: #c7ced8;
            --accent-red: #d93a2f;
            --accent-blue: #1c4d9c;
            --chrome: #c7ccd1;
            --chrome-dark: #8b939b;
            --dark: #101827;
            --text: #1e2430;
            --muted: #4f5a69;
            --chip-text: #f9fafb;
            --shadow: rgba(17, 24, 39, 0.18);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, #dfe4ea 0%, #ccd5df 100%);
            color: var(--text);
            position: relative;
            overflow-x: hidden;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            border-radius: 50%;
            z-index: 0;
            pointer-events: none;
        }

        body::before {
            width: 280px;
            height: 280px;
            background: rgba(28, 77, 156, 0.12);
            left: -60px;
            top: 30px;
        }

        body::after {
            width: 260px;
            height: 260px;
            background: rgba(217, 58, 47, 0.10);
            right: -70px;
            bottom: 30px;
        }

        .page-shell {
            position: relative;
            z-index: 1;
            width: min(1200px, calc(100% - 40px));
            margin: 30px auto 40px;
            border: 2px solid var(--line);
            background: #eff2f5;
            box-shadow: 12px 12px 0 rgba(28, 77, 156, 0.36);
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 20px;
            border-bottom: 2px solid var(--line);
            background: rgba(255,255,255,0.08);
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: 10px;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2c2c2c, #5a5a5a);
            border: 2px solid #111;
            position: relative;
            overflow: hidden;
        }

        .brand-mark::before {
            content: "";
            position: absolute;
            inset: 9px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f0c944, #d7a108);
            box-shadow: inset 0 0 0 3px #111;
        }

        .brand-name {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(1.2rem, 2vw, 2rem);
            line-height: 1.2;
            letter-spacing: 0.02em;
            font-weight: 700;
            text-transform: uppercase;
        }

        .home-btn {
            border: 2px solid var(--line);
            background: #f7f5f2;
            padding: 9px 18px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            color: var(--text);
        }

        .home-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 0 var(--yellow);
        }

        .content {
            padding: 34px 42px 42px;
            min-height: 700px;
            display: flex;
            align-items: stretch;
            justify-content: center;
        }

        .screen {
            width: 100%;
            display: none;
        }

        .screen.active {
            display: block;
        }

        .welcome-grid {
            display: grid;
            grid-template-columns: 1.4fr 0.95fr;
            gap: 40px;
            align-items: center;
            min-height: 600px;
        }

        .student-info {
            padding-top: 32px;
        }

        .tag {
            display: inline-block;
            background: linear-gradient(135deg, var(--accent-red), #f35d4d);
            color: #fff;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.82rem;
            padding: 8px 14px;
            border: 2px solid var(--line);
            box-shadow: 4px 4px 0 rgba(0,0,0,0.18);
            margin-bottom: 18px;
        }

        .hero-title {
            font-family: 'Libre Baskerville', serif;
            font-weight: 700;
            font-size: clamp(4rem, 7vw, 8rem);
            line-height: 0.87;
            letter-spacing: -0.08em;
            margin: 0 0 26px;
            max-width: 530px;
        }

        .tagline {
            max-width: 520px;
            font-size: clamp(1.1rem, 1.8vw, 1.6rem);
            line-height: 1.5;
            color: var(--muted);
            margin-bottom: 32px;
            font-family: 'DM Sans', sans-serif;
        }

        .status-row {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--text);
            font-weight: 700;
        }

        .status-dot {
            width: 12px;
            height: 12px;
            background: var(--accent-blue);
            border-radius: 50%;
            box-shadow: 0 0 0 3px rgba(28, 77, 156, 0.12);
        }

        .profile-card {
            align-self: center;
            background: linear-gradient(180deg, #f5f5f5 0%, #e9edf3 100%);
            border: 2px solid var(--line);
            padding: 26px 22px 24px;
            box-shadow: 8px 8px 0 rgba(217, 58, 47, 0.38);
            margin-top: 22px;
        }

        .profile-card .step {
            display: inline-flex;
            width: 30px;
            height: 30px;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--accent-red), #f04b42);
            color: #fff;
            font-weight: 800;
            border-radius: 6px;
            font-size: 0.8rem;
            margin-bottom: 10px;
        }

        .profile-card h3 {
            font-family: 'Libre Baskerville', serif;
            margin: 0 0 16px;
            font-size: clamp(2.2rem, 3vw, 3.5rem);
            line-height: 1.1;
            color: var(--dark);
        }

        .profile-card p {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.5;
        }

        label {
            display: block;
            font-size: 0.8rem;
            letter-spacing: 0.15em;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 8px;
            color: var(--dark);
        }

        input[type="text"] {
            width: 100%;
            border: 2px solid #2d2d2d;
            background: rgba(255,255,255,0.25);
            min-height: 54px;
            padding: 12px 14px;
            font-size: 1.08rem;
            color: var(--text);
            outline: none;
            margin-bottom: 18px;
            font-family: 'DM Sans', sans-serif;
        }

        input[type="text"]:focus {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(28, 77, 156, 0.18);
        }

        .form-error {
            display: none;
            margin: 0 0 14px;
            padding: 10px 12px;
            border: 2px solid var(--accent-red);
            background: rgba(217, 58, 47, 0.08);
            color: var(--accent-red);
            font-size: 0.9rem;
            font-weight: 700;
        }

        .form-error.show {
            display: block;
        }

        .open-btn {
            width: 100%;
            border: 2px solid var(--line);
            background: linear-gradient(135deg, var(--accent-blue), #4d78c8);
            color: #fff;
            padding: 16px 18px;
            min-height: 56px;
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .open-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 0 rgba(17,17,17,0.15);
        }

        .profile-screen {
            padding-top: 18px;
        }

        .profile-header {
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(3rem, 5vw, 6rem);
            line-height: 0.92;
            margin: 0 0 34px;
            text-align: center;
            letter-spacing: -0.06em;
        }

        .profile-body {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 34px;
            align-items: start;
            padding: 18px 18px 12px;
            border: 2px solid var(--line);
            background: rgba(255,255,255,0.1);
        }

        .student-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-top: 10px;
        }

        .avatar-wrap {
            position: relative;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            margin-bottom: 18px;
            border: 3px solid var(--line);
            background: #d8d0c7;
            overflow: hidden;
            box-shadow: 0 0 0 8px rgba(0,0,0,0.02);
        }

        .avatar-wrap::before {
            content: "";
            position: absolute;
            inset: 0;
            background: url('/oriola.image') center/cover no-repeat;
            filter: saturate(0.9) contrast(1.05);
        }

        .avatar-wrap::after {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--accent-blue);
            right: 18px;
            top: 18px;
            border: 3px solid #1f1f1f;
        }

        .student-name {
            margin: 0 0 14px;
            font-family: 'Libre Baskerville', serif;
            font-size: clamp(2rem, 2.8vw, 2.8rem);
            line-height: 1.1;
            letter-spacing: -0.04em;
        }

        .course-chip {
            display: inline-block;
            padding: 8px 12px;
            background: linear-gradient(135deg, var(--accent-red), #ef5f52);
            color: var(--chip-text);
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            font-weight: 800;
            border: 2px solid var(--line);
        }

        .info-grid {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            padding: 6px 0 0;
        }

        .info-box {
            min-height: 80px;
            background: rgba(255,255,255,0.12);
            border: 2px solid var(--line);
            padding: 14px 18px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-size: 1.05rem;
        }

        .info-box.full {
            grid-column: 1 / -1;
        }

        .info-label {
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .info-value {
            font-size: clamp(1rem, 1.4vw, 1.15rem);
            font-weight: 700;
            color: var(--dark);
            line-height: 1.4;
        }

        @media (max-width: 900px) {
            .welcome-grid,
            .profile-body {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 24px 18px 28px;
            }

            .page-shell {
                width: min(100% - 16px, 1200px);
                margin-top: 14px;
            }

            .brand-name {
                font-size: 1rem;
            }

            .welcome-grid {
                gap: 12px;
            }

            .profile-card {
                margin-top: 0;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <header class="topbar">
            <div class="brand-wrap">
                <div class="brand-mark" aria-hidden="true"></div>
                <div class="brand-name">MANUEL STUDENT DESK</div>
            </div>
            <button class="home-btn" type="button" id="backHome">Home</button>
        </header>

        <main class="content">
            <section id="welcomeScreen" class="screen active">
                <div class="welcome-grid">
                    <div class="student-info">
                        <div class="tag">Student Information</div>
                        <h1 class="hero-title">Welcome,<br>Student<br>User.</h1>
                        <p class="tagline">A bright little corner for the essential details of a BS Information Technology student.</p>
                        <div class="status-row"><span class="status-dot"></span><span>MCC / 3F4 / 3RD YEAR</span></div>
                    </div>

                    <div class="profile-card">
                        <div class="step">01</div>
                        <h3>Profile access</h3>
                        <p>Verify the student name to open the full profile.</p>
                        <form id="studentForm">
                            <div id="formError" class="form-error" aria-live="polite"></div>
                            <label for="studentName">Student Name</label>
                            <input id="studentName" name="studentName" type="text" value="" placeholder="Enter student name" autocomplete="off">
                            <button type="submit" class="open-btn">Open student profile</button>
                        </form>
                    </div>
                </div>
            </section>

            <section id="profileScreen" class="screen profile-screen">
                <h2 class="profile-header">Student profile</h2>

                <div class="profile-body">
                    <aside class="student-card">
                        <div class="avatar-wrap" aria-label="Student avatar"></div>
                        <h3 class="student-name" id="profileName">Manuel R. Oriola</h3>
                        <div class="course-chip" id="profileCourse">BS Information Technology</div>
                    </aside>

                    <div class="info-grid">
                        <div class="info-box">
                            <div class="info-label">Student ID</div>
                            <div class="info-value" id="studentId">MCC2024-00268</div>
                        </div>
                        <div class="info-box">
                            <div class="info-label">Name</div>
                            <div class="info-value" id="nameValue">Manuel R. Oriola</div>
                        </div>

                        <div class="info-box">
                            <div class="info-label">Course</div>
                            <div class="info-value" id="courseValue">BS Information Technology</div>
                        </div>
                        <div class="info-box">
                            <div class="info-label">Year level</div>
                            <div class="info-value" id="yearValue">3rd Year</div>
                        </div>

                        <div class="info-box">
                            <div class="info-label">Section</div>
                            <div class="info-value" id="sectionValue">3F4</div>
                        </div>
                        <div class="info-box">
                            <div class="info-label">Email</div>
                            <div class="info-value" id="emailValue">Oriolapardz@gmail.com</div>
                        </div>

                        <div class="info-box full">
                            <div class="info-label">Address</div>
                            <div class="info-value" id="addressValue">Ibaba, East, Calapan City</div>
                        </div>

                        <div class="info-box full">
                            <div class="info-label">Contact</div>
                            <div class="info-value" id="contactValue">09120763768</div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        const welcomeScreen = document.getElementById('welcomeScreen');
        const profileScreen = document.getElementById('profileScreen');
        const studentForm = document.getElementById('studentForm');
        const studentNameInput = document.getElementById('studentName');
        const backHomeBtn = document.getElementById('backHome');

        const profileName = document.getElementById('profileName');
        const profileCourse = document.getElementById('profileCourse');
        const nameValue = document.getElementById('nameValue');
        const courseValue = document.getElementById('courseValue');
        const yearValue = document.getElementById('yearValue');
        const sectionValue = document.getElementById('sectionValue');
        const emailValue = document.getElementById('emailValue');
        const addressValue = document.getElementById('addressValue');
        const contactValue = document.getElementById('contactValue');

        const defaultStudent = {
            name: 'Manuel R. Oriola',
            course: 'BS Information Technology',
            year: '3rd Year',
            section: '3F4',
            email: 'Oriolapardz@gmail.com',
            address: 'Ibaba, East, Calapan City',
            contact: '09120763768'
        };

        const formError = document.getElementById('formError');

        function showProfile(name) {
            const student = name && name.trim() ? name.trim() : defaultStudent.name;
            profileName.textContent = student;
            nameValue.textContent = student;
            profileCourse.textContent = defaultStudent.course;
            courseValue.textContent = defaultStudent.course;
            yearValue.textContent = defaultStudent.year;
            sectionValue.textContent = defaultStudent.section;
            emailValue.textContent = defaultStudent.email;
            addressValue.textContent = defaultStudent.address;
            contactValue.textContent = defaultStudent.contact;

            welcomeScreen.classList.remove('active');
            profileScreen.classList.add('active');
        }

        function showHome() {
            profileScreen.classList.remove('active');
            welcomeScreen.classList.add('active');
        }

        function showError(message) {
            formError.textContent = message;
            formError.classList.add('show');
            studentNameInput.focus();
        }

        studentForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const value = studentNameInput.value.trim();

            if (!value) {
                showError('Please enter the student name to access the profile.');
                return;
            }

            formError.textContent = '';
            formError.classList.remove('show');
            showProfile(value);
        });

        backHomeBtn.addEventListener('click', showHome);
    </script>
</body>
</html>
            margin: 0 auto 2.5rem;
            line-height: 1.7;
            font-weight: 400;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-family: var(--sans);
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--lava);
            color: #fff;
            box-shadow: 0 0 0 0 var(--lava-glow);
        }

        .btn-primary:hover {
            background: var(--lava-dim);
            box-shadow: 0 0 30px var(--lava-glow-strong), 0 4px 15px rgba(0,0,0,0.3);
            transform: translateY(-1px);
        }

        .btn-ghost {
            background: transparent;
            color: var(--text-muted);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            color: var(--text);
            border-color: rgba(255,255,255,0.2);
            background: var(--bg3);
        }

        /* ── STAT BAR ── */
        .stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex-wrap: wrap;
            padding: 3rem 2rem;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            position: relative;
            z-index: 1;
        }

        .stat { text-align: center; }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -0.03em;
            line-height: 1;
        }

        .stat-value span { color: var(--lava); }

        .stat-label {
            font-size: 0.78rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-top: 0.3rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* ── SECTION ── */
        section {
            padding: 5rem 2rem;
            position: relative;
            z-index: 1;
        }

        .section-label {
            font-family: var(--mono);
            font-size: 0.72rem;
            font-weight: 500;
            color: var(--lava);
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .section-desc {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.7;
            max-width: 480px;
        }

        /* ── FEATURES GRID ── */
        .features-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            margin-top: 3rem;
        }

        .feature {
            background: var(--bg);
            padding: 2rem;
            transition: background 0.2s;
            position: relative;
        }

        .feature:hover { background: var(--bg2); }

        .feature::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--lava-glow-strong), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .feature:hover::before { opacity: 1; }

        .feature-icon {
            width: 40px; height: 40px;
            background: rgba(221,72,20,0.1);
            border: 1px solid var(--border-hot);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 1rem;
        }

        .feature h3 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            letter-spacing: -0.01em;
        }

        .feature p {
            font-size: 0.875rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* ── CODE SECTION ── */
        .code-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .code-block {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        .code-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
            background: var(--bg3);
        }

        .dot { width: 10px; height: 10px; border-radius: 50%; }
        .dot-r { background: #ff5f57; }
        .dot-y { background: #febc2e; }
        .dot-g { background: #28c840; }

        .code-filename {
            font-family: var(--mono);
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-left: 0.5rem;
        }

        .code-body {
            padding: 1.5rem;
            font-family: var(--mono);
            font-size: 0.82rem;
            line-height: 1.8;
            color: #a1a1aa;
            overflow-x: auto;
        }

        .code-body .kw { color: #f97316; }
        .code-body .fn { color: #60a5fa; }
        .code-body .str { color: #86efac; }
        .code-body .cm { color: #3f3f46; }
        .code-body .cl { color: #fde68a; }
        .code-body .var { color: #c4b5fd; }

        /* ── STRUCTURE ── */
        .structure-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .dir-item {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 0.875rem 1rem;
            font-family: var(--mono);
            font-size: 0.8rem;
            color: var(--text-muted);
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dir-item:hover {
            border-color: var(--border-hot);
            color: var(--text);
            background: rgba(221,72,20,0.05);
        }

        .dir-item .dir-icon { color: var(--lava); font-size: 0.9rem; }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--border);
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-meta {
            font-family: var(--mono);
            font-size: 0.75rem;
            color: var(--text-dim);
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-meta span { color: var(--text-muted); }

        .footer-links {
            display: flex;
            gap: 1rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.82rem;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: var(--lava); }

        /* ── DIVIDER ── */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--border), transparent);
            margin: 0 2rem;
            position: relative;
            z-index: 1;
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .hero > * {
            animation: fadeUp 0.6s ease both;
        }

        .hero .badge         { animation-delay: 0.05s; }
        .hero h1             { animation-delay: 0.15s; }
        .hero .hero-sub      { animation-delay: 0.25s; }
        .hero .hero-actions  { animation-delay: 0.35s; }

        @media (max-width: 768px) {
            .features-layout { grid-template-columns: 1fr; }
            .code-section { grid-template-columns: 1fr; }
            nav { padding: 1rem 1.5rem; }
            .nav-links a:not(.btn-nav) { display: none; }
            section { padding: 3rem 1.5rem; }
        }
    </style>
</head>
<body>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<!-- NAV -->
<nav>
    <a class="nav-logo" href="#">
        <div class="flame">🔥</div>
        LavaLust
    </a>
    <div class="nav-links">
        <a href="https://lavalust.netlify.app/docs/" target="_blank">Docs</a>
        <a href="https://github.com/ronmarasigan/LavaLust" target="_blank">GitHub</a>
        <a href="https://lavalust.netlify.app/docs/" target="_blank" class="btn-nav">Get Started →</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero wrap">
    <div class="badge">v<?php echo config_item('VERSION') ?? '4.x'; ?> — Now Available</div>
    <h1>
        <span class="word-lava">Lava</span><span class="word-lust">Lust</span><br>Framework
    </h1>
    <p class="hero-sub">
        A lightweight, expressive PHP MVC framework built for developers who want structure without the bloat.
    </p>
    <div class="hero-actions">
        <a href="https://lavalust.netlify.app/docs/" target="_blank" class="btn btn-primary">
            Read the Docs
        </a>
        <a href="https://github.com/ronmarasigan/LavaLust" target="_blank" class="btn btn-ghost">
            View on GitHub
        </a>
    </div>
</div>

<!-- STATS -->
<div class="stats">
    <div class="stat">
        <div class="stat-value">MVC<span>+</span></div>
        <div class="stat-label">Architecture</div>
    </div>
    <div class="stat">
        <div class="stat-value"><span>4</span> DB</div>
        <div class="stat-label">Drivers</div>
    </div>
    <div class="stat">
        <div class="stat-value">HMVC<span>✓</span></div>
        <div class="stat-label">Module Support</div>
    </div>
    <div class="stat">
        <div class="stat-value">REST<span>*</span></div>
        <div class="stat-label">API Ready</div>
    </div>
</div>

<div class="divider"></div>

<!-- FEATURES -->
<section>
    <div class="wrap">
        <div class="section-label">// features</div>
        <h2 class="section-title">Everything you need.<br>Nothing you don't.</h2>
        <p class="section-desc">LavaLust gives you a clean, consistent structure so you can focus on building — not configuring.</p>

        <div class="features-layout">
            <div class="feature">
                <div class="feature-icon">🧠</div>
                <h3>MVC Architecture</h3>
                <p>Clean separation between Models, Views, and Controllers keeps your codebase maintainable as it grows.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">⚙️</div>
                <h3>Flexible Routing</h3>
                <p>Define routes with GET, POST, PUT, DELETE and more. Supports named routes, closures, and grouped prefixes.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🗄️</div>
                <h3>ORM-style Models</h3>
                <p>Fluent query builder with relationships, soft deletes, timestamps, mass assignment protection, and eager loading.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">📦</div>
                <h3>HMVC Modules</h3>
                <p>Scale your app with self-contained modules. Each module owns its controllers, models, and views.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🔗</div>
                <h3>REST API Support</h3>
                <p>Build JSON APIs out of the box using built-in conventions, response helpers, and content negotiation.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🛡️</div>
                <h3>Libraries & Helpers</h3>
                <p>Sessions, form validation, file uploads, pagination, encryption — batteries included where it counts.</p>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- CODE EXAMPLE -->
<section>
    <div class="wrap">
        <div class="code-section">
            <div>
                <div class="section-label">// quick start</div>
                <h2 class="section-title">Up and running in minutes.</h2>
                <p class="section-desc">Define a route, write a controller method, render a view. That's the whole loop.</p>
            </div>

            <div>
                <div class="code-block" style="margin-bottom:1rem;">
                    <div class="code-header">
                        <div class="dot dot-r"></div>
                        <div class="dot dot-y"></div>
                        <div class="dot dot-g"></div>
                        <span class="code-filename">app/config/routes.php</span>
                    </div>
                    <div class="code-body">
<span class="var">$router</span>-><span class="fn">get</span>(<span class="str">'/'</span>, <span class="str">'Welcome::index'</span>);<br>
<span class="var">$router</span>-><span class="fn">get</span>(<span class="str">'/users'</span>, <span class="str">'Users::index'</span>);<br>
<span class="var">$router</span>-><span class="fn">post</span>(<span class="str">'/users/store'</span>, <span class="str">'Users::store'</span>);
                    </div>
                </div>

                <div class="code-block">
                    <div class="code-header">
                        <div class="dot dot-r"></div>
                        <div class="dot dot-y"></div>
                        <div class="dot dot-g"></div>
                        <span class="code-filename">app/controllers/Welcome.php</span>
                    </div>
                    <div class="code-body">
<span class="kw">class</span> <span class="cl">Welcome</span> <span class="kw">extends</span> <span class="cl">Controller</span> {<br>
&nbsp;&nbsp;<span class="kw">public function</span> <span class="fn">index</span>() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$this</span>-><span class="fn">call</span>-><span class="fn">model</span>(<span class="str">'UserModel'</span>);<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$data</span>[<span class="str">'users'</span>] = <span class="var">$this</span>-><span class="cl">UserModel</span>-><span class="fn">all</span>();<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="var">$this</span>-><span class="fn">call</span>-><span class="fn">view</span>(<span class="str">'welcome'</span>, <span class="var">$data</span>);<br>
&nbsp;&nbsp;}<br>
}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

<!-- STRUCTURE -->
<section>
    <div class="wrap">
        <div class="section-label">// project structure</div>
        <h2 class="section-title">Organized by default.</h2>
        <p class="section-desc">A predictable directory layout so every file has a logical home from day one.</p>

        <div class="structure-grid">
            <?php
            $dirs = [
                ['app/config',      '⚙'],
                ['app/controllers', '🎮'],
                ['app/helpers',     '🔧'],
                ['app/libraries',   '📚'],
                ['app/language',    '🌐'],
                ['app/middlewares', '🛡️'],
                ['app/migrations',  '🔄'],
                ['app/models',      '🗄'],
                ['app/modules',     '📦'],
                ['app/views',       '🖼'],
                ['public/',         '🌍'],
                ['runtime/',        '⚡'],
                ['console/',        '💻'],
                ['scheme/',         '📐'],
            ];
            foreach ($dirs as [$name, $icon]): ?>
            <div class="dir-item">
                <span class="dir-icon"><?php echo $icon; ?></span>
                <?php echo $name; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-inner">
        <div class="footer-meta">
            <span>rendered in <span><?php echo lava_instance()->performance->elapsed_time('lavalust'); ?>s</span></span>
            <span>memory <span><?php echo lava_instance()->performance->memory_usage(); ?></span></span>
            <?php if(config_item('environment') === 'development'): ?>
            <span>version <span><?php echo config_item('version'); ?></span></span>
            <span style="color: #dd4814;">● development</span>
            <?php endif; ?>
        </div>
        <div class="footer-links">
            <a href="https://github.com/ronmarasigan/LavaLust" target="_blank">GitHub</a>
            <a href="https://lavalust.netlify.app/docs/" target="_blank">Docs</a>
            <a href="https://opensource.org/licenses/MIT" target="_blank">MIT License</a>
        </div>
    </div>
</footer>

</body>
</html>