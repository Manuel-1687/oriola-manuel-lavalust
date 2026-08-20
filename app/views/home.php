<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Student Desk') ?></title>
    <style>
        :root {
            --bg-page: #dfe4ea;
            --panel-bg: #f3f4f6;
            --panel-dark: #111827;
            --line: #1d1d1d;
            --accent-red: #d93a2f;
            --accent-blue: #1c4d9c;
            --chrome: #c7ccd1;
            --dark: #101827;
            --text: #1e2430;
            --muted: #4f5a69;
            --chip-text: #f9fafb;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #dfe4ea 0%, #ccd5df 100%);
            color: var(--text);
        }
        .page-shell {
            width: min(1200px, calc(100% - 40px));
            margin: 30px auto;
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
        }
        .brand-mark {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2c2c2c, #5a5a5a);
            border: 2px solid #111;
        }
        .brand-name {
            font-size: 1.4rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .home-btn {
            border: 2px solid var(--line);
            background: #f7f5f2;
            padding: 9px 18px;
            font-weight: 700;
            cursor: pointer;
        }
        .content {
            padding: 30px;
        }
        .profile-header {
            text-align: center;
            font-size: clamp(3rem, 5vw, 6rem);
            margin: 0 0 24px;
        }
        .profile-body {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 34px;
            border: 2px solid var(--line);
            background: rgba(255,255,255,0.1);
            padding: 18px;
        }
        .student-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .avatar-wrap {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            margin-bottom: 18px;
            border: 3px solid var(--line);
            background: url('/oriola.image') center/cover no-repeat;
        }
        .student-name {
            margin: 0 0 14px;
            font-size: clamp(2rem, 2.8vw, 2.8rem);
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
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 16px;
        }
        .info-box {
            min-height: 80px;
            background: rgba(255,255,255,0.12);
            border: 2px solid var(--line);
            padding: 14px 18px;
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
            font-size: 1.05rem;
            font-weight: 700;
        }
        @media (max-width: 900px) {
            .profile-body {
                grid-template-columns: 1fr;
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
            <button class="home-btn" type="button" onclick="window.location.href='/'">Home</button>
        </header>

        <main class="content">
            <h2 class="profile-header">Student profile</h2>

            <div class="profile-body">
                <aside class="student-card">
                    <div class="avatar-wrap" aria-label="Student avatar"></div>
                    <h3 class="student-name"><?= htmlspecialchars($student_name ?? 'Student Name') ?></h3>
                    <div class="course-chip"><?= htmlspecialchars($student_data['course'] ?? 'BS Information Technology') ?></div>
                </aside>

                <div class="info-grid">
                    <div class="info-box">
                        <div class="info-label">Student ID</div>
                        <div class="info-value"><?= htmlspecialchars($student_data['student_id'] ?? 'MCC2024-00268') ?></div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Name</div>
                        <div class="info-value"><?= htmlspecialchars($student_name ?? 'Manuel R. Oriola') ?></div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Course</div>
                        <div class="info-value"><?= htmlspecialchars($student_data['course'] ?? 'BS Information Technology') ?></div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Year level</div>
                        <div class="info-value"><?= htmlspecialchars($student_data['year_level'] ?? '3rd Year') ?></div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Section</div>
                        <div class="info-value"><?= htmlspecialchars($student_data['section'] ?? '3F4') ?></div>
                    </div>
                    <div class="info-box">
                        <div class="info-label">Email</div>
                        <div class="info-value"><?= htmlspecialchars($student_data['email'] ?? 'Oriolapardz@gmail.com') ?></div>
                    </div>
                    <div class="info-box full">
                        <div class="info-label">Address</div>
                        <div class="info-value"><?= htmlspecialchars($student_data['address'] ?? 'Ibaba, East, Calapan City') ?></div>
                    </div>
                    <div class="info-box full">
                        <div class="info-label">Contact</div>
                        <div class="info-value"><?= htmlspecialchars($student_data['contact'] ?? '09120763768') ?></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
