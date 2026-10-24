
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#11102b">

    <title>Dashboard Admin | Ticketify</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple: #7655f6;
            --purple-dark: #5535dc;
            --navy: #11102b;
            --text: #242341;
            --muted: #8589a7;
            --surface: #ffffff;
            --page: #f5f5fc;
            --line: #eeedf7;
            --pink: #ff5799;
            --blue: #438bff;
            --orange: #ffad42;
            --green: #19b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background:
                radial-gradient(ellipse at 80% 0%, #e7e0ff 0, transparent 28%),
                radial-gradient(ellipse at 0% 65%, #e8f0ff 0, transparent 25%),
                var(--page);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input {
            font: inherit;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 27px 17px 18px;
            display: flex;
            flex-direction: column;
            color: #c9c9e4;
            background:
                radial-gradient(ellipse at 0% 100%, #4126a9 0, transparent 37%),
                linear-gradient(165deg, #171632, #100f26 75%);
            z-index: 100;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border: 30px solid #ffffff06;
            border-radius: 50%;
            bottom: 110px;
            left: -105px;
            pointer-events: none;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 10px;
            margin-bottom: 38px;
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 43px;
            height: 43px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            color: white;
            font-size: 23px;
            background: linear-gradient(140deg, #b69bff, #7046ff 65%, #4930cb);
            box-shadow: 0 8px 23px #8059ff65;
            transform: rotate(-5deg);
        }

        .brand-name {
            font-size: 23px;
            font-weight: 900;
            color: white;
            letter-spacing: -1.1px;
        }

        .brand-name span {
            color: #a997ff;
        }

        .nav-caption {
            padding: 0 12px;
            margin: 0 0 12px;
            color: #747493;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .nav-list {
            display: flex;
            flex-direction: column;
            gap: 7px;
            position: relative;
            z-index: 1;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 12px;
            border: 1px solid transparent;
            border-radius: 12px;
            color: #b9b9d4;
            font-size: 12px;
            font-weight: 600;
            transition: background .25s, color .25s, transform .25s;
        }

        .nav-link:hover {
            color: white;
            background: #ffffff0c;
            transform: translateX(3px);
        }

        .nav-link.active {
            color: white;
            background: linear-gradient(110deg, #7655f6, #603be7);
            box-shadow: 0 7px 23px #7655f64c;
        }

        .nav-icon {
            width: 23px;
            text-align: center;
            font-size: 17px;
        }

        .nav-arrow {
            margin-left: auto;
            opacity: 0;
            transition: opacity .2s;
        }

        .nav-link.active .nav-arrow,
        .nav-link:hover .nav-arrow {
            opacity: .8;
        }

        .sidebar-promo {
            position: relative;
            overflow: hidden;
            margin-top: 32px;
            padding: 18px 15px;
            border: 1px solid #ffffff1c;
            border-radius: 17px;
            background: linear-gradient(145deg, #ffffff0e, #ffffff04);
            z-index: 1;
        }

        .promo-art {
            font-size: 38px;
            display: inline-block;
            margin-bottom: 12px;
            filter: drop-shadow(0 7px 13px #976aff77);
            animation: float 3.5s ease-in-out infinite;
        }

        .sidebar-promo h3 {
            color: white;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 7px;
        }

        .sidebar-promo p {
            font-size: 10px;
            line-height: 1.8;
            color: #b4b2d6;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 23px;
            position: relative;
            z-index: 1;
        }

        .profile {
            border-top: 1px solid #ffffff18;
            padding: 17px 5px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 39px;
            height: 39px;
            border-radius: 13px;
            background: linear-gradient(135deg, #9f8bff, #6045ef);
            display: grid;
            place-items: center;
            color: white;
            font-size: 16px;
            font-weight: 800;
            flex-shrink: 0;
            box-shadow: 0 5px 15px #7655f633;
        }

        .profile-info {
            min-width: 0;
            flex: 1;
        }

        .profile-info strong {
            display: block;
            color: white;
            font-size: 11px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .profile-info span {
            display: block;
            margin-top: 5px;
            color: #9291b7;
            font-size: 10px;
        }

        /* MAIN & TOPBAR */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            min-height: 78px;
            padding: 12px 31px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            background: #ffffffdc;
            border-bottom: 1px solid #eae9f4;
            backdrop-filter: blur(18px);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .search-box {
            max-width: 480px;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 11px;
            background: #f5f5fc;
            border: 1px solid #eeedf8;
            padding: 12px 15px;
            border-radius: 12px;
        }

        .search-box span {
            font-size: 17px;
            color: var(--purple);
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            background: transparent;
            color: var(--text);
            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #a0a1b9;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .top-date {
            text-align: right;
        }

        .top-date strong {
            display: block;
            font-size: 10px;
            color: #454461;
        }

        .top-date span {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 9px;
        }

        .admin-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 13px;
        }

        .admin-chip .avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
        }

        .admin-chip strong {
            display: block;
            font-size: 11px;
        }

        .admin-chip span {
            display: block;
            color: var(--muted);
            font-size: 9px;
            margin-top: 3px;
        }

        .content {
            max-width: 1650px;
            padding: 28px 31px 35px;
            margin: auto;
        }

        /* HERO */

        .hero {
            min-height: 220px;
            overflow: hidden;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
            padding: 31px 34px;
            margin-bottom: 27px;
            border-radius: 23px;
            color: white;
            background:
                radial-gradient(ellipse at 80% 20%, #8d55ff69 0, transparent 32%),
                radial-gradient(ellipse at 95% 105%, #fa52c64c 0, transparent 35%),
                linear-gradient(112deg, #302078, #211354 50%, #34218a);
            box-shadow: 0 15px 40px #4431a526;
            isolation: isolate;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 310px;
            height: 310px;
            border-radius: 50%;
            border: 1px solid #ffffff20;
            right: 8%;
            top: -190px;
            box-shadow: 0 0 0 25px #ffffff05, 0 0 0 55px #ffffff04;
            animation: orbit 24s linear infinite;
            pointer-events: none;
        }

        .hero::after {
            content: "";
            position: absolute;
            right: 24%;
            bottom: -120px;
            width: 250px;
            height: 190px;
            border-radius: 50%;
            background: #9c62ff24;
            filter: blur(20px);
            pointer-events: none;
        }

        .hero-copy {
            max-width: 580px;
            position: relative;
            z-index: 2;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.8px;
            color: #d3c8ff;
            margin-bottom: 14px;
        }

        .live-dot {
            width: 7px;
            height: 7px;
            background: #58f0bd;
            border-radius: 50%;
            box-shadow: 0 0 11px #58f0bd;
            animation: pulse 1.8s infinite;
        }

        .hero h1 {
            font-size: clamp(29px, 3vw, 43px);
            line-height: 1.14;
            letter-spacing: -1.8px;
            font-weight: 900;
            margin-bottom: 13px;
        }

        .hero h1 span {
            color: #c3a9ff;
        }

        .hero p {
            max-width: 470px;
            color: #d2c9f7;
            font-size: 12px;
            line-height: 1.9;
        }

        .hero-actions {
            display: flex;
            gap: 11px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .btn-primary,
        .btn-outline {
            min-height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 0 17px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            transition: transform .2s, box-shadow .2s, background .2s;
        }

        .btn-primary {
            background: linear-gradient(110deg, #a58aff, #7655f6);
            color: white;
            box-shadow: 0 8px 19px #7b5aff50;
        }

        .btn-outline {
            border: 1px solid #ffffff6b;
            color: white;
            background: #ffffff0b;
        }

        .btn-primary:hover,
        .btn-outline:hover {
            transform: translateY(-3px);
        }

        .btn-primary:hover {
            box-shadow: 0 12px 26px #7b5aff65;
        }

        .hero-art {
            position: relative;
            z-index: 2;
            width: 215px;
            min-width: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-art .stage {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 76px;
            background: radial-gradient(circle, #b18aff39, #b18aff07 68%, transparent 70%);
            animation: float 4s ease-in-out infinite;
            filter: drop-shadow(0 13px 20px #07051c60);
        }

        .floating-ticket {
            position: absolute;
            right: 1px;
            bottom: 14px;
            padding: 12px;
            border: 1px solid #ffffff55;
            border-radius: 13px;
            background: linear-gradient(135deg, #ffffff35, #ffffff12);
            backdrop-filter: blur(12px);
            box-shadow: 0 12px 25px #0d082c4d;
            font-size: 27px;
            transform: rotate(12deg);
            animation: float 3.2s ease-in-out infinite reverse;
        }

        .sparkle {
            position: absolute;
            font-size: 22px;
            animation: sparkle 3s ease-in-out infinite;
        }

        .sparkle.one {
            top: 12px;
            right: 27px;
            color: #ffd66f;
        }

        .sparkle.two {
            left: 4px;
            bottom: 22px;
            color: #ff8ad2;
            animation-delay: 1s;
        }

        /* SECTION */

        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 17px;
        }

        .section-title {
            font-size: 15px;
            font-weight: 800;
            letter-spacing: -.4px;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: 10px;
            margin-top: 6px;
            line-height: 1.6;
        }

        .section-badge {
            padding: 8px 11px;
            background: #eeeaff;
            color: #7655f6;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .8px;
            border-radius: 8px;
        }

        /* STATISTICS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 29px;
        }

        .stat-card {
            --accent: #7655f6;
            --tint: #f1edff;
            position: relative;
            overflow: hidden;
            min-width: 0;
            padding: 21px;
            border: 1px solid #eeedf7;
            border-radius: 18px;
            background: #ffffffed;
            box-shadow: 0 7px 23px #28215b07;
            transition: transform .25s, box-shadow .25s, border-color .25s;
            animation: enter .55s both;
        }

        .stat-card:nth-child(2) { animation-delay: .08s; }
        .stat-card:nth-child(3) { animation-delay: .16s; }
        .stat-card:nth-child(4) { animation-delay: .24s; }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            right: -45px;
            bottom: -53px;
            border-radius: 50%;
            background: var(--tint);
            opacity: .85;
            transition: transform .3s;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            border-color: var(--tint);
            box-shadow: 0 16px 35px #28215b12;
        }

        .stat-card:hover::after { transform: scale(1.5); }

        .stat-card.purple { --accent: #7655f6; --tint: #eee8ff; }
        .stat-card.blue { --accent: #3988ff; --tint: #e5f0ff; }
        .stat-card.orange { --accent: #f69c2d; --tint: #fff0dc; }
        .stat-card.pink { --accent: #f34d9a; --tint: #ffe5f1; }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: white;
            background: linear-gradient(145deg, color-mix(in srgb, var(--accent), white 15%), var(--accent));
            font-size: 21px;
            box-shadow: 0 6px 14px color-mix(in srgb, var(--accent), transparent 72%);
            transition: transform .25s;
        }

        .stat-card:hover .stat-icon { transform: rotate(-8deg) scale(1.08); }

        .stat-mini {
            color: var(--accent);
            background: var(--tint);
            border-radius: 8px;
            padding: 6px 8px;
            font-size: 9px;
            font-weight: 800;
        }

        .stat-label {
            color: #8587a3;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 9px;
            position: relative;
            z-index: 1;
        }

        .stat-number {
            color: #252343;
            font-size: clamp(27px, 2.4vw, 35px);
            font-weight: 900;
            letter-spacing: -1.5px;
            overflow-wrap: anywhere;
            position: relative;
            z-index: 1;
        }

        .stat-foot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
            position: relative;
            z-index: 1;
        }

        .stat-foot span {
            color: #999bb2;
            font-size: 9px;
            line-height: 1.6;
        }

        .stat-foot strong {
            color: var(--accent);
            font-size: 9px;
        }

        .mini-wave {
            display: block;
            width: 100%;
            height: 25px;
            margin-top: 10px;
            overflow: visible;
            position: relative;
            z-index: 1;
        }

        .mini-wave path {
            stroke: var(--accent);
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-dasharray: 300;
            stroke-dashoffset: 300;
            animation: draw 2s .4s forwards ease-out;
        }

        /* LOWER GRID */

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(280px, .9fr);
            gap: 19px;
            align-items: start;
        }

        .left-column,
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 19px;
            min-width: 0;
        }

        .panel {
            min-width: 0;
            background: #ffffffed;
            border: 1px solid #eeedf7;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 7px 23px #28215b06;
        }

        .panel-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #eeeaff;
            color: #7655f6;
            font-size: 18px;
            flex-shrink: 0;
        }

        .heading-with-icon {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 0;
        }

        .heading-with-icon > div:last-child { min-width: 0; }

        /* ANALYTICS */

        .chart-panel { overflow: hidden; }

        .chart-summary {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #8587a3;
            font-size: 10px;
        }

        .chart-legend {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #797c9a;
            font-size: 10px;
        }

        .legend-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #7655f6;
            box-shadow: 0 0 0 4px #eee8ff;
        }

        .chart-area {
            position: relative;
            width: 100%;
            margin-top: 25px;
            padding-left: 30px;
        }

        .chart-y-labels {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 23px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #a0a2b8;
            font-size: 9px;
        }

        .chart-visual {
            position: relative;
            height: 185px;
            border-bottom: 1px solid #eae8f6;
            background-image: linear-gradient(#eeedf7 1px, transparent 1px);
            background-size: 100% 25%;
            overflow: hidden;
        }

        .chart-visual svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .chart-fill {
            fill: url(#areaGradient);
            opacity: .75;
        }

        .chart-line {
            fill: none;
            stroke: #7655f6;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: draw 2s .3s forwards ease-out;
        }

        .chart-point {
            fill: white;
            stroke: #7655f6;
            stroke-width: 3;
        }

        .chart-x-labels {
            display: flex;
            justify-content: space-between;
            gap: 5px;
            margin-top: 11px;
            color: #9395ae;
            font-size: 9px;
        }

        .chart-note {
            margin-top: 18px;
            padding: 11px 12px;
            border-radius: 10px;
            background: #f7f5ff;
            color: #7f789e;
            font-size: 10px;
            line-height: 1.7;
        }

        /* CATEGORY */

        .category-layout {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 22px;
            padding: 22px 0 10px;
        }

        .donut {
            width: 145px;
            height: 145px;
            flex-shrink: 0;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: conic-gradient(
                #7655f6 0deg 112deg,
                #438bff 112deg 205deg,
                #ff5799 205deg 280deg,
                #ffb443 280deg 330deg,
                #24c9a0 330deg 360deg
            );
            box-shadow: 0 9px 25px #7655f61b;
            animation: spinIn 1s ease-out both;
            position: relative;
        }

        .donut::before {
            content: "";
            position: absolute;
            inset: 17px;
            border-radius: 50%;
            background: white;
        }

        .donut-center {
            position: relative;
            text-align: center;
            z-index: 1;
        }

        .donut-center span {
            display: block;
            font-size: 9px;
            color: #999bb1;
        }

        .donut-center strong {
            display: block;
            margin-top: 5px;
            font-size: 24px;
            font-weight: 900;
        }

        .category-legend {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .category-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 10px;
            color: #777995;
        }

        .category-dot {
            width: 9px;
            height: 9px;
            border-radius: 4px;
            flex-shrink: 0;
        }

        .category-dot.purple { background: #7655f6; }
        .category-dot.blue { background: #438bff; }
        .category-dot.pink { background: #ff5799; }
        .category-dot.orange { background: #ffb443; }
        .category-dot.green { background: #24c9a0; }

        .category-note {
            padding: 11px;
            background: #f8f6ff;
            border-radius: 10px;
            font-size: 10px;
            line-height: 1.7;
            color: #8580a2;
            margin-top: 15px;
        }

        /* QUICK ACTIONS */

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 13px;
            margin-top: 19px;
        }

        .quick-card {
            --quick: #7655f6;
            --quick-bg: #f0ebff;
            position: relative;
            min-width: 0;
            min-height: 135px;
            padding: 16px;
            overflow: hidden;
            border-radius: 15px;
            border: 1px solid transparent;
            background: linear-gradient(145deg, var(--quick-bg), #ffffff 90%);
            transition: transform .25s, box-shadow .25s, border-color .25s;
        }

        .quick-card::after {
            content: "";
            position: absolute;
            right: -26px;
            bottom: -35px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            background: var(--quick);
            opacity: .07;
            transition: transform .3s;
        }

        .quick-card:hover {
            transform: translateY(-4px);
            border-color: color-mix(in srgb, var(--quick), white 72%);
            box-shadow: 0 12px 24px #29234b0b;
        }

        .quick-card:hover::after { transform: scale(1.4); }

        .quick-card.blue { --quick: #438bff; --quick-bg: #eaf3ff; }
        .quick-card.pink { --quick: #f34d9a; --quick-bg: #ffebf4; }
        .quick-card.orange { --quick: #f39b2f; --quick-bg: #fff3e2; }

        .quick-icon {
            width: 41px;
            height: 41px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            color: white;
            font-size: 20px;
            background: linear-gradient(140deg, color-mix(in srgb, var(--quick), white 12%), var(--quick));
            box-shadow: 0 5px 13px color-mix(in srgb, var(--quick), transparent 78%);
            margin-bottom: 13px;
            position: relative;
            z-index: 1;
        }

        .quick-card h3 {
            font-size: 11px;
            font-weight: 800;
            margin-bottom: 6px;
            position: relative;
            z-index: 1;
        }

        .quick-card p {
            font-size: 9px;
            line-height: 1.7;
            color: #8789a5;
            max-width: 210px;
            position: relative;
            z-index: 1;
        }

        .quick-arrow {
            position: absolute;
            right: 14px;
            top: 16px;
            font-size: 15px;
            color: var(--quick);
            z-index: 1;
        }

        /* SYSTEM INFORMATION */

        .activity-list { margin-top: 18px; }

        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid var(--line);
        }

        .activity-item:last-child {
            border-bottom: 0;
            padding-bottom: 2px;
        }

        .activity-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            font-size: 17px;
        }

        .activity-icon.purple { background: #eee8ff; }
        .activity-icon.blue { background: #e8f2ff; }
        .activity-icon.pink { background: #ffe8f2; }
        .activity-icon.orange { background: #fff1de; }

        .activity-copy { min-width: 0; flex: 1; }

        .activity-copy strong {
            display: block;
            font-size: 10px;
            line-height: 1.6;
        }

        .activity-copy p {
            color: #8c8ea9;
            font-size: 9px;
            line-height: 1.7;
            margin-top: 4px;
        }

        .activity-time {
            color: #a0a2b8;
            font-size: 9px;
            white-space: nowrap;
            margin-top: 3px;
        }

        /* PROMO */

        .promo-banner {
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            padding: 23px;
            color: white;
            background:
                radial-gradient(circle at 90% 10%, #ff8bc04d, transparent 32%),
                linear-gradient(130deg, #4e31bf, #7655f6 75%, #9d63f3);
            box-shadow: 0 12px 26px #7655f625;
        }

        .promo-banner::after {
            content: "✦";
            position: absolute;
            right: 18px;
            top: 15px;
            font-size: 24px;
            color: #ffe39a;
            animation: sparkle 2.7s infinite;
        }

        .promo-banner h3 {
            max-width: 240px;
            font-size: 17px;
            line-height: 1.5;
            font-weight: 800;
            position: relative;
            z-index: 1;
        }

        .promo-banner p {
            max-width: 250px;
            color: #e5dcff;
            font-size: 10px;
            line-height: 1.8;
            margin-top: 9px;
            position: relative;
            z-index: 1;
        }

        .promo-emoji {
            font-size: 34px;
            margin: 14px 0;
            display: inline-block;
            filter: drop-shadow(0 5px 12px #24115b50);
            animation: float 3s ease-in-out infinite;
        }

        .promo-banner .btn-primary {
            color: #6545df;
            background: white;
            box-shadow: none;
            position: relative;
            z-index: 1;
        }

        /* FOOTER */

        .footer {
            padding: 25px 0 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            color: #a0a2b6;
            font-size: 9px;
        }

        .footer strong { color: #7655f6; }

        /* ANIMATIONS */

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; box-shadow: 0 0 0 0 #58f0bd55; }
            50% { opacity: .7; box-shadow: 0 0 0 6px #58f0bd00; }
        }

        @keyframes sparkle {
            0%, 100% { opacity: .6; transform: scale(.9) rotate(-8deg); }
            50% { opacity: 1; transform: scale(1.18) rotate(12deg); }
        }

        @keyframes orbit {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes enter {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes draw { to { stroke-dashoffset: 0; } }

        @keyframes spinIn {
            from { opacity: 0; transform: rotate(-35deg) scale(.8); }
            to { opacity: 1; transform: rotate(0) scale(1); }
        }

        /* RESPONSIVE */

        @media (min-width: 1600px) {
            .content {
                padding-left: 38px;
                padding-right: 38px;
            }
        }

        @media (max-width: 1250px) {
            .sidebar { width: 225px; }
            .main { margin-left: 225px; }

            .content { padding: 24px 21px 30px; }
            .topbar { padding: 12px 21px; }
            .stats-grid { gap: 12px; }
            .stat-card { padding: 17px; }

            .dashboard-grid {
                grid-template-columns: minmax(0, 1.35fr) minmax(250px, .9fr);
                gap: 14px;
            }

            .panel { padding: 18px; }
            .hero { padding: 27px; }
            .hero-art { width: 160px; }
        }

        @media (max-width: 980px) {
            .dashboard-grid { grid-template-columns: 1fr; }

            .right-column {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                align-items: start;
            }

            .right-column .promo-banner { grid-column: 1 / -1; }
            .hero-art { width: 140px; }
            .hero-art .stage { font-size: 62px; }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding: 17px;
                overflow: visible;
            }

            .brand { margin-bottom: 20px; }

            .nav-list {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 6px;
            }

            .nav-link {
                min-height: 43px;
                padding: 10px;
                font-size: 10px;
                gap: 7px;
            }

            .nav-icon { font-size: 15px; width: 19px; }
            .nav-caption { margin-bottom: 9px; }
            .sidebar-promo { display: none; }

            .sidebar-bottom {
                margin-top: 17px;
                padding-top: 12px;
            }

            .profile { padding-top: 12px; }
            .main { margin-left: 0; }

            .topbar {
                min-height: 67px;
                padding: 12px 16px;
            }

            .search-box {
                padding: 10px;
                gap: 7px;
            }

            .search-box input { font-size: 10px; }
            .top-date { display: none; }
            .admin-chip { padding: 6px; }

            .admin-chip .avatar {
                width: 30px;
                height: 30px;
            }

            .admin-chip > div:nth-child(2) { display: none; }
            .content { padding: 19px 14px 25px; }

            .hero {
                min-height: 0;
                padding: 25px 20px;
                border-radius: 19px;
                gap: 5px;
            }

            .hero h1 { font-size: 29px; }
            .hero p { font-size: 11px; }

            .hero-art {
                width: 75px;
                min-width: 75px;
            }

            .hero-art .stage {
                width: 75px;
                height: 75px;
                font-size: 39px;
            }

            .floating-ticket {
                right: -5px;
                bottom: -4px;
                padding: 6px;
                font-size: 16px;
            }

            .sparkle { font-size: 15px; }

            .hero-actions {
                margin-top: 17px;
                gap: 8px;
            }

            .btn-primary, .btn-outline {
                min-height: 39px;
                padding: 0 12px;
                font-size: 10px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
                border-radius: 15px;
            }

            .stat-icon {
                width: 38px;
                height: 38px;
                border-radius: 12px;
                font-size: 18px;
            }

            .stat-number { font-size: 28px; }
            .stat-top { margin-bottom: 17px; }

            .stat-mini {
                padding: 5px 6px;
                font-size: 8px;
            }

            .right-column { display: flex; }

            .panel {
                padding: 16px;
                border-radius: 15px;
            }

            .quick-grid { gap: 9px; }

            .quick-card {
                padding: 13px;
                min-height: 130px;
            }

            .category-layout { gap: 16px; }
            .donut { width: 125px; height: 125px; }
            .donut::before { inset: 15px; }
            .chart-visual { height: 145px; }
            .footer { line-height: 1.8; }
        }

        @media (max-width: 380px) {
            .hero-art { display: none; }
            .quick-grid { grid-template-columns: 1fr; }
            .quick-card { min-height: 0; }
            .category-layout { flex-direction: column; }

            .category-legend {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .section-title { font-size: 13px; }
            .chart-summary { display: none; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>

<body>

@php
    /*
    |--------------------------------------------------------------------------
    | PROFIL DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    | Nama tampilan dibuat tetap menjadi Administrator.
    | Akun dan data user di database tidak diubah.
    */

    $adminName = 'Administrator';
    $adminInitial = 'A';
@endphp

<!-- SIDEBAR -->
<aside class="sidebar">

    <a href="{{ route('admin.dashboard') }}" class="brand">
        <div class="brand-logo">🎟</div>
        <div class="brand-name">Ticket<span>ify</span></div>
    </a>

    <div class="nav-caption">MENU UTAMA</div>

    <nav class="nav-list">

        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
            <span class="nav-icon">⌂</span>
            <span>Dashboard</span>
            <span class="nav-arrow">›</span>
        </a>

        <a href="{{ route('admin.events.index') }}" class="nav-link">
            <span class="nav-icon">🎪</span>
            <span>Kelola Event</span>
            <span class="nav-arrow">›</span>
        </a>

        <a href="{{ route('admin.ticket-types.index') }}" class="nav-link">
            <span class="nav-icon">🎟</span>
            <span>Jenis Tiket</span>
            <span class="nav-arrow">›</span>
        </a>

        <a href="{{ route('admin.tickets.index') }}" class="nav-link">
            <span class="nav-icon">▤</span>
            <span>Tiket Terjual</span>
            <span class="nav-arrow">›</span>
        </a>

        <a href="{{ route('admin.orders.index') }}" class="nav-link">
            <span class="nav-icon">🛒</span>
            <span>Kelola Order</span>
            <span class="nav-arrow">›</span>
        </a>

    </nav>

    <div class="sidebar-promo">
        <div class="promo-art">🎭</div>
        <h3>Setiap event punya cerita.</h3>
        <p>Buat pengalaman yang berkesan bersama Ticketify.</p>
    </div>

    <div class="sidebar-bottom">
        <div class="profile">
            <div class="avatar">{{ $adminInitial }}</div>

            <div class="profile-info">
                <strong>{{ $adminName }}</strong>
                <span>Administrator</span>
            </div>

            <span>✦</span>
        </div>
    </div>

</aside>

<!-- MAIN -->
<main class="main">

    <!-- TOPBAR -->
    <header class="topbar">

        <label class="search-box">
            <span>⌕</span>
            <input
                type="search"
                id="menuSearch"
                placeholder="Cari menu pengelolaan..."
                aria-label="Cari menu dashboard"
            >
        </label>

        <div class="topbar-right">

            <div class="top-date">
                <strong>{{ now()->translatedFormat('l, d F Y') }}</strong>
                <span>Panel administrasi Ticketify</span>
            </div>

            <div class="admin-chip">
                <div class="avatar">{{ $adminInitial }}</div>

                <div>
                    <strong>{{ $adminName }}</strong>
                    <span>Administrator</span>
                </div>

                <span>⌄</span>
            </div>

        </div>
    </header>

    <div class="content">

        <!-- HERO -->
        <section class="hero">

            <div class="hero-copy">

                <div class="hero-eyebrow">
                    <span class="live-dot"></span>
                    TICKETIFY MANAGEMENT SYSTEM
                </div>

                <h1>
                    Selamat datang,<br>
                    <span>{{ $adminName }}!</span> 👋
                </h1>

                <p>
                    Semua event, tiket, dan pesanan dalam satu tempat.
                    Kelola pengalaman event yang luar biasa bersama Ticketify.
                </p>

                <div class="hero-actions">

                    <a href="{{ route('admin.events.index') }}" class="btn-primary">
                        ✦ &nbsp; Kelola Event &nbsp; →
                    </a>

                    <a href="{{ route('admin.orders.index') }}" class="btn-outline">
                        ▤ &nbsp; Lihat Pesanan
                    </a>

                </div>
            </div>

            <div class="hero-art" aria-hidden="true">
                <span class="sparkle one">✦</span>
                <span class="sparkle two">✧</span>
                <div class="stage">🎤</div>
                <div class="floating-ticket">🎟️</div>
            </div>

        </section>

        <!-- STATISTIK -->
        <section>

            <div class="section-head">
                <div>
                    <h2 class="section-title">Ringkasan Dashboard</h2>
                    <p class="section-subtitle">
                        Gambaran data yang tercatat di Ticketify.
                    </p>
                </div>

                <span class="section-badge">OVERVIEW</span>
            </div>

            <div class="stats-grid">

                <article class="stat-card purple">
                    <div class="stat-top">
                        <div class="stat-icon">🎪</div>
                        <span class="stat-mini">EVENT</span>
                    </div>

                    <div class="stat-label">Total Event</div>
                    <div class="stat-number">{{ $totalEvents }}</div>

                    <div class="stat-foot">
                        <span>Event terdaftar</span>
                        <strong>✦ Event</strong>
                    </div>

                    <svg class="mini-wave" viewBox="0 0 200 28" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M0 21 C15 21 16 7 32 13 S52 26 68 13 S91 5 105 15 S128 22 144 9 S166 5 181 13 S193 15 200 8"/>
                    </svg>
                </article>

                <article class="stat-card blue">
                    <div class="stat-top">
                        <div class="stat-icon">👥</div>
                        <span class="stat-mini">USER</span>
                    </div>

                    <div class="stat-label">Total Pengguna</div>
                    <div class="stat-number">{{ $totalUsers }}</div>

                    <div class="stat-foot">
                        <span>Akun terdaftar</span>
                        <strong>✦ User</strong>
                    </div>

                    <svg class="mini-wave" viewBox="0 0 200 28" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M0 19 C15 19 20 9 34 14 S54 25 70 14 S94 7 109 15 S129 23 145 12 S168 6 183 14 S194 13 200 9"/>
                    </svg>
                </article>

                <article class="stat-card orange">
                    <div class="stat-top">
                        <div class="stat-icon">🛒</div>
                        <span class="stat-mini">ORDER</span>
                    </div>

                    <div class="stat-label">Total Order</div>
                    <div class="stat-number">{{ $totalOrders }}</div>

                    <div class="stat-foot">
                        <span>Pesanan tercatat</span>
                        <strong>✦ Order</strong>
                    </div>

                    <svg class="mini-wave" viewBox="0 0 200 28" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M0 22 C18 22 18 8 34 14 S54 23 71 12 S91 8 106 17 S130 22 145 11 S168 7 183 14 S195 11 200 7"/>
                    </svg>
                </article>

                <article class="stat-card pink">
                    <div class="stat-top">
                        <div class="stat-icon">🎟️</div>
                        <span class="stat-mini">TIKET</span>
                    </div>

                    <div class="stat-label">Total Tiket Tercatat</div>
                    <div class="stat-number">{{ $totalTickets }}</div>

                    <div class="stat-foot">
                        <span>Data tiket di sistem</span>
                        <strong>✦ Tiket</strong>
                    </div>

                    <svg class="mini-wave" viewBox="0 0 200 28" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M0 20 C15 20 17 6 33 13 S53 24 69 13 S91 5 106 15 S128 22 144 10 S165 6 182 13 S193 14 200 8"/>
                    </svg>
                </article>

            </div>
        </section>

        <!-- GRID BAWAH -->
        <section class="dashboard-grid">

            <div class="left-column">

                <!-- GRAFIK VISUAL -->
                <div class="panel chart-panel">

                    <div class="section-head">

                        <div class="heading-with-icon">
                            <div class="panel-icon">▥</div>

                            <div>
                                <h2 class="section-title">Visual Analitik</h2>
                                <p class="section-subtitle">
                                    Pratinjau grafik untuk dashboard Ticketify.
                                </p>
                            </div>
                        </div>

                        <div class="chart-summary">
                            <span class="legend-dot"></span>
                            Grafik dekoratif
                        </div>

                    </div>

                    <div class="chart-area">

                        <div class="chart-y-labels" aria-hidden="true">
                            <span>100</span>
                            <span>75</span>
                            <span>50</span>
                            <span>25</span>
                            <span>0</span>
                        </div>

                        <div class="chart-visual">

                            <svg viewBox="0 0 600 190" preserveAspectRatio="none" role="img" aria-label="Ilustrasi grafik visual analitik">

                                <defs>
                                    <linearGradient id="areaGradient" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#8b6bff" stop-opacity=".38"/>
                                        <stop offset="100%" stop-color="#8b6bff" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>

                                <path class="chart-fill"
                                    d="M0 153 C40 147 49 116 90 124 S150 155 190 105 S250 82 290 112 S350 133 390 76 S450 96 490 58 S550 71 600 20 L600 190 L0 190 Z"/>

                                <path class="chart-line"
                                    d="M0 153 C40 147 49 116 90 124 S150 155 190 105 S250 82 290 112 S350 133 390 76 S450 96 490 58 S550 71 600 20"/>

                                <circle class="chart-point" cx="90" cy="124" r="4"/>
                                <circle class="chart-point" cx="190" cy="105" r="4"/>
                                <circle class="chart-point" cx="290" cy="112" r="4"/>
                                <circle class="chart-point" cx="390" cy="76" r="4"/>
                                <circle class="chart-point" cx="490" cy="58" r="4"/>
                                <circle class="chart-point" cx="600" cy="20" r="5"/>

                            </svg>

                        </div>

                        <div class="chart-x-labels" aria-hidden="true">
                            <span>Sen</span>
                            <span>Sel</span>
                            <span>Rab</span>
                            <span>Kam</span>
                            <span>Jum</span>
                            <span>Sab</span>
                            <span>Min</span>
                        </div>

                    </div>

                    <div class="chart-note">
                        ✨ <strong>Catatan:</strong> Grafik ini masih berupa ilustrasi visual,
                        belum menggunakan data penjualan aktual. Kita bisa menghubungkannya
                        ke database pada tahap berikutnya.
                    </div>

                </div>

                <!-- AKSES CEPAT -->
                <div class="panel">

                    <div class="section-head">
                        <div>
                            <h2 class="section-title">Akses Cepat</h2>
                            <p class="section-subtitle">
                                Semua kebutuhan pengelolaan event dalam satu tempat.
                            </p>
                        </div>

                        <span class="section-badge">MENU</span>
                    </div>

                    <div class="quick-grid">

                        <a href="{{ route('admin.events.index') }}" class="quick-card">
                            <span class="quick-arrow">↗</span>
                            <div class="quick-icon">🎪</div>
                            <h3>Kelola Event</h3>
                            <p>Tambah, edit, hapus, dan atur informasi event.</p>
                        </a>

                        <a href="{{ route('admin.ticket-types.index') }}" class="quick-card blue">
                            <span class="quick-arrow">↗</span>
                            <div class="quick-icon">🎟️</div>
                            <h3>Jenis Tiket</h3>
                            <p>Atur harga, stok, dan kategori tiket.</p>
                        </a>

                        <a href="{{ route('admin.tickets.index') }}" class="quick-card pink">
                            <span class="quick-arrow">↗</span>
                            <div class="quick-icon">🎫</div>
                            <h3>Tiket Terjual</h3>
                            <p>Lihat tiket yang tercatat dan pemiliknya.</p>
                        </a>

                        <a href="{{ route('admin.orders.index') }}" class="quick-card orange">
                            <span class="quick-arrow">↗</span>
                            <div class="quick-icon">🛒</div>
                            <h3>Kelola Order</h3>
                            <p>Periksa pesanan dan transaksi pembelian.</p>
                        </a>

                    </div>
                </div>

            </div>

            <div class="right-column">

                <!-- KATEGORI EVENT -->
                <div class="panel">

                    <div class="section-head">

                        <div class="heading-with-icon">
                            <div class="panel-icon">✺</div>

                            <div>
                                <h2 class="section-title">Event Explorer</h2>
                                <p class="section-subtitle">
                                    Inspirasi kategori event.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="category-layout">

                        <div class="donut" aria-label="Ilustrasi warna kategori event">
                            <div class="donut-center">
                                <span>Total Event</span>
                                <strong>{{ $totalEvents }}</strong>
                            </div>
                        </div>

                        <div class="category-legend">

                            <div class="category-item">
                                <span class="category-dot purple"></span>
                                <span>Konser</span>
                            </div>

                            <div class="category-item">
                                <span class="category-dot blue"></span>
                                <span>Seminar</span>
                            </div>

                            <div class="category-item">
                                <span class="category-dot pink"></span>
                                <span>Festival</span>
                            </div>

                            <div class="category-item">
                                <span class="category-dot orange"></span>
                                <span>Workshop</span>
                            </div>

                            <div class="category-item">
                                <span class="category-dot green"></span>
                                <span>Lainnya</span>
                            </div>

                        </div>
                    </div>

                    <div class="category-note">
                        🎨 Visual kategori ini masih berupa dekorasi.
                        Komposisi kategori aktual dapat ditampilkan setelah
                        data kategori event dihubungkan.
                    </div>

                </div>

                <!-- INFORMASI SISTEM -->
                <div class="panel">

                    <div class="section-head">

                        <div class="heading-with-icon">
                            <div class="panel-icon">✦</div>

                            <div>
                                <h2 class="section-title">Informasi Sistem</h2>
                                <p class="section-subtitle">
                                    Ringkasan panel administrasi.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="activity-list">

                        <div class="activity-item">
                            <div class="activity-icon purple">🎪</div>

                            <div class="activity-copy">
                                <strong>Manajemen Event</strong>
                                <p>Kelola informasi dan jadwal event.</p>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon blue">🎟️</div>

                            <div class="activity-copy">
                                <strong>Manajemen Tiket</strong>
                                <p>Perbarui jenis tiket, harga, dan stok.</p>
                            </div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon orange">🛒</div>

                            <div class="activity-copy">
                                <strong>Manajemen Order</strong>
                                <p>Pantau pesanan yang masuk.</p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- PROMO -->
                <div class="promo-banner">

                    <h3>Event Hebat,<br>Pengalaman Tak Terlupakan!</h3>

                    <p>
                        Wujudkan event yang menarik dan berikan pengalaman terbaik
                        untuk setiap pengunjung.
                    </p>

                    <div class="promo-emoji">🎫 ✨</div>

                    <div>
                        <a href="{{ route('admin.events.index') }}" class="btn-primary">
                            Kelola Event &nbsp; →
                        </a>
                    </div>

                </div>

            </div>

        </section>

        <footer class="footer">
            <span>
                © {{ date('Y') }} <strong>Ticketify</strong>. All rights reserved.
            </span>

            <span>
                Dibuat dengan 💜 untuk pengalaman event yang lebih baik.
            </span>
        </footer>

    </div>
</main>

<script>
    // Pencarian menu sidebar dan akses cepat.
    const menuSearch = document.getElementById('menuSearch');

    menuSearch.addEventListener('input', function () {
        const keyword = this.value.trim().toLowerCase();

        document.querySelectorAll('.nav-link, .quick-card').forEach(function (item) {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(keyword) ? '' : 'none';
        });
    });
</script>

</body>
</html>
