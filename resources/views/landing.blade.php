
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#100c29">
    <title>Ticketify — Every Event, Your Moment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #100c29;
            --purple: #8664ff;
            --pink: #ff5db1;
            --white: #ffffff;
            --muted: #a7a2c5;
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: #20183e;
            background: #f8f7ff;
            overflow-x: hidden;
        }

        a { text-decoration: none; }

        .site-nav {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 20;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand:hover { color: white; }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: linear-gradient(135deg,#a38aff,#7146f5);
            box-shadow: 0 7px 25px rgba(134,100,255,.4);
            font-size: 22px;
        }

        .brand-name span { color: #a993ff; }

        .nav-links, .nav-actions {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .nav-links a {
            color: #d2cde8;
            font-size: 13px;
            font-weight: 700;
        }

        .nav-links a:hover { color: white; }

        .nav-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 11px 17px;
            border-radius: 12px;
            color: white;
            font-size: 13px;
            font-weight: 800;
            transition: .25s;
        }

        .nav-login {
            border: 1px solid rgba(255,255,255,.25);
            background: rgba(255,255,255,.05);
        }

        .nav-register {
            background: linear-gradient(135deg,#9b7bff,#6943ee);
            box-shadow: 0 6px 20px rgba(120,85,255,.28);
        }

        .nav-btn:hover {
            transform: translateY(-2px);
            color: white;
        }

        /* HERO */

        .hero {
            position: relative;
            min-height: 680px;
            padding: 150px 0 90px;
            overflow: hidden;
            isolation: isolate;
            color: white;
            background:
                radial-gradient(ellipse at 75% 45%,rgba(115,65,255,.28),transparent 35%),
                radial-gradient(ellipse at 10% 85%,rgba(255,75,180,.13),transparent 30%),
                linear-gradient(135deg,#100c29,#17103b 52%,#100c29);
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            opacity: .18;
            background-image:
                linear-gradient(rgba(255,255,255,.06) 1px,transparent 1px),
                linear-gradient(90deg,rgba(255,255,255,.06) 1px,transparent 1px);
            background-size: 48px 48px;
        }

        .orb {
            position: absolute;
            z-index: -1;
            border-radius: 50%;
            pointer-events: none;
            animation: drift 7s ease-in-out infinite;
        }

        .orb-one {
            width: 240px;
            height: 240px;
            top: 150px;
            right: -90px;
            background: rgba(255,82,184,.13);
        }

        .orb-two {
            width: 170px;
            height: 170px;
            bottom: 35px;
            left: 28%;
            background: rgba(79,207,255,.09);
            animation-delay: -3s;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.03fr .97fr;
            gap: 30px;
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 9px 14px;
            border: 1px solid rgba(173,150,255,.3);
            border-radius: 50px;
            background: rgba(137,105,255,.1);
            color: #d5c8ff;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.4px;
        }

        .live-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #71f6bf;
            box-shadow: 0 0 12px #71f6bf;
        }

        .hero h1 {
            margin: 27px 0 22px;
            max-width: 660px;
            font-family: 'Plus Jakarta Sans',sans-serif;
            font-size: clamp(42px,5.1vw,69px);
            font-weight: 800;
            line-height: 1.12;
            letter-spacing: -3px;
        }

        .gradient-text {
            background: linear-gradient(100deg,#b9a4ff,#ff82c8 65%,#ffc4a0);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-description {
            max-width: 510px;
            color: #b5afce;
            font-size: 15px;
            line-height: 1.9;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            margin-top: 28px;
        }

        .btn-main, .btn-outline-main {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            min-height: 50px;
            padding: 0 22px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 800;
            transition: .3s;
        }

        .btn-main {
            color: white;
            background: linear-gradient(120deg,#987aff,#6942ee);
            box-shadow: 0 10px 30px rgba(114,72,255,.3);
        }

        .btn-outline-main {
            color: white;
            border: 1px solid rgba(255,255,255,.2);
            background: rgba(255,255,255,.045);
        }

        .btn-main:hover, .btn-outline-main:hover {
            color: white;
            transform: translateY(-4px);
        }

        .hero-note {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 27px;
            color: #aaa4c5;
            font-size: 12px;
        }

        .note-icon {
            width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: rgba(255,255,255,.08);
            font-size: 18px;
        }

        .hero-note strong {
            display: block;
            margin-bottom: 3px;
            color: white;
            font-size: 13px;
        }

        /* TIKET 3D */

        .visual-stage {
            position: relative;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1100px;
        }

        .visual-glow {
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(120,85,255,.23);
            filter: blur(65px);
        }

        .orbit {
            position: absolute;
            width: 340px;
            height: 340px;
            border: 1px solid rgba(190,170,255,.19);
            border-radius: 50%;
            transform: rotateX(65deg) rotate(-25deg);
        }

        .orbit::before, .orbit::after {
            content: "";
            position: absolute;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #b6a0ff;
            box-shadow: 0 0 20px #9c79ff;
        }

        .orbit::before { top: 35px; left: 45px; }

        .orbit::after {
            right: 35px;
            bottom: 65px;
            background: #ff80c9;
            box-shadow: 0 0 20px #ff80c9;
        }

        .ticket-3d {
            position: relative;
            z-index: 2;
            width: min(100%,365px);
            padding: 25px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.26);
            border-radius: 27px;
            background:
                radial-gradient(circle at 90% 10%,rgba(255,255,255,.19),transparent 30%),
                linear-gradient(145deg,rgba(145,112,255,.92),rgba(81,44,183,.97) 52%,rgba(43,25,97,.98));
            box-shadow: 0 35px 70px rgba(0,0,0,.38),inset 0 1px 1px rgba(255,255,255,.28);
            transform: rotateY(-10deg) rotateX(5deg);
            animation: ticketFloat 5s ease-in-out infinite;
        }

        .ticket-top, .ticket-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .ticket-brand {
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .ticket-chip {
            padding: 7px 10px;
            border-radius: 30px;
            background: rgba(255,255,255,.14);
            font-size: 10px;
            font-weight: 800;
        }

        .ticket-art {
            display: grid;
            place-items: center;
            height: 145px;
            margin: 24px 0 20px;
            border-radius: 18px;
            background:
                radial-gradient(circle at 30% 35%,rgba(255,213,140,.7),transparent 20%),
                radial-gradient(circle at 70% 60%,rgba(255,82,186,.8),transparent 32%),
                linear-gradient(135deg,#29205c,#7043bd 55%,#f36ca9);
        }

        .ticket-art span {
            font-size: 78px;
            filter: drop-shadow(0 14px 15px rgba(0,0,0,.3));
            animation: miniFloat 4s ease-in-out infinite;
        }

        .ticket-caption {
            color: #ded5ff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .ticket-3d h3 {
            margin: 7px 0 5px;
            font-family: 'Plus Jakarta Sans',sans-serif;
            font-size: 24px;
            font-weight: 800;
        }

        .ticket-sub { color: #d3c8fa; font-size: 12px; }

        .ticket-divider {
            margin: 20px 0 15px;
            border-top: 1px dashed rgba(255,255,255,.38);
        }

        .ticket-bottom small {
            display: block;
            margin-bottom: 5px;
            color: #d3c8fa;
            font-size: 10px;
        }

        .ticket-bottom strong { font-size: 13px; }

        .fake-qr {
            display: grid;
            grid-template-columns: repeat(5,5px);
            gap: 2px;
            padding: 7px;
            border-radius: 7px;
            background: white;
        }

        .fake-qr i {
            width: 5px;
            height: 5px;
            background: #24164f;
        }

        .fake-qr i:nth-child(2n), .fake-qr i:nth-child(5n) {
            background: #a8a0c8;
        }

        .float-card {
            position: absolute;
            z-index: 4;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 15px;
            border: 1px solid rgba(255,255,255,.16);
            border-radius: 17px;
            background: rgba(33,25,71,.83);
            box-shadow: 0 15px 40px rgba(0,0,0,.2);
            backdrop-filter: blur(18px);
            animation: drift 5s ease-in-out infinite;
        }

        .float-card-one { top: 35px; right: -5px; }

        .float-card-two {
            bottom: 30px;
            left: -8px;
            animation-delay: -2s;
        }

        .float-icon {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border-radius: 13px;
            background: rgba(142,111,255,.2);
            font-size: 19px;
        }

        .float-card strong {
            display: block;
            color: white;
            font-size: 12px;
        }

        .float-card small {
            display: block;
            margin-top: 4px;
            color: #b9b2d6;
            font-size: 10px;
        }

        /* STATS */

        .stats-wrap {
            padding: 0 0 50px;
            background: var(--bg);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 22px;
            background: rgba(255,255,255,.045);
        }

        .stat-item {
            padding: 24px 15px;
            text-align: center;
        }

        .stat-item + .stat-item {
            border-left: 1px solid rgba(255,255,255,.1);
        }

        .stat-item strong {
            display: block;
            color: white;
            font-family: 'Plus Jakarta Sans',sans-serif;
            font-size: 22px;
            font-weight: 800;
        }

        .stat-item span {
            display: block;
            margin-top: 5px;
            color: #a9a2c7;
            font-size: 11px;
        }

        /* SECTION */

        .section { padding: 80px 0; }

        .section-heading {
            max-width: 640px;
            margin: 0 auto 40px;
            text-align: center;
        }

        .section-label {
            display: inline-block;
            margin-bottom: 12px;
            color: #7958ed;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .section-heading h2 {
            margin: 0 0 14px;
            font-family: 'Plus Jakarta Sans',sans-serif;
            font-size: clamp(28px,4vw,40px);
            font-weight: 800;
            letter-spacing: -1.2px;
        }

        .section-heading p {
            margin: 0;
            color: #77728f;
            line-height: 1.8;
            font-size: 14px;
        }

        /* KATEGORI */

        .category-card {
            position: relative;
            height: 100%;
            padding: 26px;
            overflow: hidden;
            border: 1px solid #eeebfa;
            border-radius: 24px;
            background: white;
            box-shadow: 0 10px 35px rgba(37,25,78,.035);
            transition: transform .3s,box-shadow .3s;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 22px 45px rgba(65,40,135,.1);
        }

        .category-card:focus-visible {
            outline: 3px solid #8664ff;
            outline-offset: 4px;
        }

        .category-card::after {
            content: "";
            position: absolute;
            right: -45px;
            bottom: -65px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: var(--tint);
            opacity: .65;
            pointer-events: none;
        }

        .category-icon {
            position: relative;
            z-index: 2;
            display: grid;
            place-items: center;
            width: 58px;
            height: 58px;
            margin-bottom: 20px;
            border-radius: 18px;
            background: var(--tint);
            font-size: 27px;
        }

        .category-card h3 {
            position: relative;
            z-index: 2;
            margin-bottom: 9px;
            color: #241b43;
            font-size: 18px;
            font-weight: 800;
        }

        .category-description {
            position: relative;
            z-index: 2;
            min-height: 45px;
            margin: 0;
            color: #85809c;
            font-size: 12px;
            line-height: 1.8;
        }

        .category-count {
            position: relative;
            z-index: 2;
            display: inline-block;
            margin-top: 15px;
            color: #7958ed;
            font-size: 11px;
            font-weight: 800;
        }

        .category-events {
            position: relative;
            z-index: 3;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 18px;
        }

        .mini-event {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 1px solid #eeeaf8;
            border-radius: 15px;
            background: #faf9ff;
            transition: .25s;
        }

        .mini-event:hover {
            transform: translateY(-2px);
            border-color: #d9ceff;
            background: white;
            box-shadow: 0 8px 20px rgba(67,43,135,.07);
        }

        .mini-event-image {
            flex-shrink: 0;
            width: 58px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 9px;
            background: #17103b;
        }

        .mini-event-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .mini-event-image span { font-size: 24px; }

        .mini-event-info {
            flex: 1;
            min-width: 0;
        }

        .mini-event-title {
            display: block;
            overflow-wrap: anywhere;
            color: #241b43;
            font-size: 11px;
            font-weight: 800;
            line-height: 1.5;
        }

        .mini-event-meta {
            display: block;
            margin-top: 5px;
            color: #85809c;
            font-size: 10px;
            line-height: 1.4;
        }

        .mini-event-btn {
            flex-shrink: 0;
            padding: 8px 10px;
            border-radius: 9px;
            background: #7653ee;
            color: white;
            font-size: 10px;
            font-weight: 800;
        }

        .mini-event-btn:hover {
            color: white;
            background: #5d3bd0;
        }

        .no-category-event {
            position: relative;
            z-index: 2;
            margin-top: 18px;
            padding: 17px 10px;
            border: 1px dashed #d8d0ee;
            border-radius: 15px;
            color: #928ba9;
            background: #faf9ff;
            text-align: center;
            font-size: 11px;
        }

        /* SEMUA EVENT */

        .events-section {
            padding: 80px 0 90px;
            background: #f0edff;
        }

        .event-topline {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .event-topline .section-heading {
            margin: 0;
            text-align: left;
        }

        .event-topline .section-heading h2 { font-size: 32px; }

        .view-all {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            border: 1px solid #ddd5ff;
            border-radius: 12px;
            background: white;
            color: #6947dd;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
            transition: .25s;
        }

        .view-all:hover {
            color: white;
            background: #7653ee;
        }

        .event-card {
            height: 100%;
            overflow: hidden;
            border: 1px solid rgba(99,73,170,.1);
            border-radius: 22px;
            background: white;
            box-shadow: 0 12px 35px rgba(40,26,90,.055);
            transition: transform .3s,box-shadow .3s;
        }

        .event-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 45px rgba(40,26,90,.12);
        }

        .event-image {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 250px;
            max-height: 470px;
            overflow: hidden;
            background: #17103b;
        }

        .event-image img {
            display: block;
            width: 100%;
            height: auto;
            max-height: 470px;
            object-fit: contain;
            transition: transform .5s;
        }

        .event-card:hover .event-image img { transform: scale(1.025); }

        .event-emoji { font-size: 65px; }

        .event-category {
            position: absolute;
            top: 13px;
            left: 13px;
            max-width: calc(100% - 26px);
            padding: 7px 10px;
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 30px;
            background: rgba(24,15,61,.78);
            color: white;
            font-size: 10px;
            font-weight: 800;
            backdrop-filter: blur(10px);
        }

        .event-content { padding: 20px; }

        .event-content h3 {
            min-height: 48px;
            margin: 0 0 14px;
            color: #241b43;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.5;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
            color: #77718d;
            font-size: 12px;
        }

        .event-meta span { overflow-wrap: anywhere; }

        .event-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid #f0edf8;
        }

        .event-footer small {
            display: block;
            margin-bottom: 4px;
            color: #89839e;
            font-size: 10px;
        }

        .event-footer strong {
            color: #714fe7;
            font-size: 12px;
        }

        .event-buy {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 12px;
            border-radius: 10px;
            background: #7653ee;
            color: white;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
            transition: .25s;
        }

        .event-buy:hover {
            color: white;
            background: #5d3bd0;
        }

        .empty-events {
            padding: 40px 20px;
            border: 1px dashed #c9bdf9;
            border-radius: 22px;
            background: rgba(255,255,255,.65);
            text-align: center;
        }

        .empty-icon { margin-bottom: 13px; font-size: 43px; }

        .empty-events h3 {
            font-size: 19px;
            font-weight: 800;
        }

        .empty-events p {
            color: #77718d;
            font-size: 13px;
        }

        /* TENTANG TICKETIFY */

        .benefits-section {
            padding: 80px 0;
            background: white;
        }

        .benefit-panel {
            padding: 40px;
            overflow: hidden;
            border-radius: 30px;
            color: white;
            background:
                radial-gradient(circle at 90% 0%,rgba(255,111,197,.22),transparent 30%),
                linear-gradient(125deg,#21154d,#392071 60%,#5731a6);
        }

        .benefit-panel h2 {
            max-width: 480px;
            margin-bottom: 13px;
            font-family: 'Plus Jakarta Sans',sans-serif;
            font-size: 30px;
            font-weight: 800;
            line-height: 1.3;
        }

        .benefit-panel > p {
            max-width: 510px;
            margin-bottom: 27px;
            color: #c6bce8;
            font-size: 13px;
            line-height: 1.9;
        }

        .benefit-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #f3eeff;
            font-size: 12px;
            font-weight: 600;
        }

        .benefit-check {
            display: grid;
            flex-shrink: 0;
            place-items: center;
            width: 27px;
            height: 27px;
            border-radius: 9px;
            background: rgba(122,255,198,.13);
            color: #8cffce;
        }

        .benefit-art {
            display: grid;
            place-items: center;
            min-height: 200px;
            height: 100%;
            font-size: clamp(95px,14vw,155px);
            filter: drop-shadow(0 22px 22px rgba(0,0,0,.25));
            animation: ticketFloat 5s ease-in-out infinite;
        }

        /* CTA */

        .cta-section {
            padding: 0 0 80px;
            background: white;
        }

        .cta-card {
            position: relative;
            padding: 48px 22px;
            overflow: hidden;
            border-radius: 27px;
            background: linear-gradient(120deg,#e7ddff,#f9e5f4 52%,#e0f5ff);
            text-align: center;
        }

        .cta-card h2 {
            position: relative;
            z-index: 1;
            margin-bottom: 12px;
            font-family: 'Plus Jakarta Sans',sans-serif;
            font-size: clamp(25px,4vw,36px);
            font-weight: 800;
        }

        .cta-card p {
            position: relative;
            z-index: 1;
            margin-bottom: 23px;
            color: #6e6487;
            font-size: 13px;
        }

        .cta-card .btn-main {
            position: relative;
            z-index: 1;
        }

        /* FOOTER */

        .footer {
            padding: 34px 0;
            color: #c1bad9;
            background: #100c29;
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .footer .brand { font-size: 21px; }

        .footer .brand-icon {
            width: 36px;
            height: 36px;
            border-radius: 12px;
            font-size: 18px;
        }

        .footer p {
            margin: 12px 0 0;
            font-size: 12px;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-links a {
            color: #c1bad9;
            font-size: 12px;
        }

        .footer-links a:hover { color: white; }

        /* ANIMASI */

        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity .7s ease,transform .7s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes ticketFloat {
            0%,100% {
                transform: translateY(0) rotateY(-10deg) rotateX(5deg);
            }
            50% {
                transform: translateY(-12px) rotateY(-6deg) rotateX(3deg);
            }
        }

        @keyframes miniFloat {
            0%,100% { transform: translateY(0) rotate(-4deg); }
            50% { transform: translateY(-8px) rotate(4deg); }
        }

        @keyframes drift {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        /* RESPONSIVE */

        @media (max-width: 991px) {
            .hero-grid { grid-template-columns: 1fr; gap: 15px; }
            .hero-copy { max-width: 700px; }
            .visual-stage { min-height: 400px; }
            .float-card-one { right: 5%; }
            .float-card-two { left: 5%; }
            .nav-links { gap: 13px; }
        }

        @media (max-width: 767px) {
            .site-nav { padding: 14px 0; }
            .brand { gap: 8px; font-size: 21px; }
            .brand-icon { width: 38px; height: 38px; border-radius: 12px; }
            .nav-links { display: none; }
            .nav-actions { gap: 7px; }
            .nav-btn { padding: 10px 12px; font-size: 11px; }
            .hero { min-height: unset; padding: 120px 0 55px; }
            .hero h1 { font-size: clamp(40px,10vw,57px); letter-spacing: -2px; }
            .hero-description { font-size: 14px; }
            .visual-stage { min-height: 370px; margin-top: 10px; }
            .ticket-3d { width: min(82%,350px); padding: 20px; }
            .ticket-art { height: 125px; }
            .orbit { width: 280px; height: 280px; }
            .float-card { padding: 10px 12px; }
            .float-card-one { top: 20px; right: 0; }
            .float-card-two { bottom: 18px; left: 0; }
            .float-icon { width: 33px; height: 33px; }
            .stat-item { padding: 18px 7px; }
            .stat-item strong { font-size: 18px; }
            .stat-item span { font-size: 9px; }
            .section,.events-section,.benefits-section { padding: 60px 0; }
            .event-topline { align-items: flex-start; flex-direction: column; }
            .event-topline .section-heading h2 { font-size: 28px; }
            .event-image { min-height: 0; }
            .event-image img { max-height: 500px; }
            .benefit-panel { padding: 27px 22px; }
            .benefit-panel h2 { font-size: 25px; }
            .benefit-art { min-height: 130px; font-size: 100px; }
            .cta-section { padding-bottom: 60px; }
            .cta-card { padding: 35px 18px; }
            .footer-inner { align-items: flex-start; flex-direction: column; }
            .mini-event-btn { display: none; }
        }

        @media (max-width: 420px) {
            .nav-actions { gap: 5px; }
            .nav-btn { padding: 9px 10px; }
            .hero h1 { font-size: 39px; }
            .hero-buttons a { width: 100%; }
            .visual-stage { min-height: 340px; }
            .ticket-3d { width: 84%; }
            .float-card strong { font-size: 10px; }
            .float-card small { font-size: 9px; }
            .benefit-list { grid-template-columns: 1fr; }
            .category-card { padding: 21px; }
        }

        @media (prefers-reduced-motion: reduce) {
            *,*::before,*::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
            .reveal { opacity: 1; transform: none; }
        }
    </style>
</head>

<body>

@php
    $allEvents = collect($events ?? []);

    $concertKeywords = [
        'konser', 'concert', 'musik', 'music', 'pop', 'jazz',
        'rock', 'indie', 'k-pop', 'kpop', 'edm', 'dj',
        'orchestra', 'live music', 'soundwave'
    ];

    $concertEvents = $allEvents->filter(function ($event) use ($concertKeywords) {
        $category = strtolower(trim((string) ($event->category ?? '')));
        $title = strtolower(trim((string) ($event->title ?? '')));

        foreach ($concertKeywords as $keyword) {
            if (str_contains($category, $keyword) || str_contains($title, $keyword)) {
                return true;
            }
        }

        return false;
    });

    $seminarEvents = $allEvents->filter(function ($event) {
        $category = strtolower(trim((string) ($event->category ?? '')));

        return str_contains($category, 'seminar')
            || str_contains($category, 'workshop');
    });

    $festivalEvents = $allEvents->filter(function ($event) {
        $category = strtolower(trim((string) ($event->category ?? '')));

        return str_contains($category, 'festival')
            || str_contains($category, 'lifestyle');
    });
@endphp

<!-- NAVBAR -->

<nav class="site-nav">
    <div class="container nav-inner">
        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">🎟</span>
            <span class="brand-name">Ticket<span>ify</span></span>
        </a>

        <div class="nav-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#kategori">Kategori</a>
            <a href="#event">Explore Events</a>
            <a href="#tentang">Tentang Kami</a>
        </div>

        <div class="nav-actions">
            <a href="{{ url('/login') }}" class="nav-btn nav-login">Login</a>
            <a href="{{ url('/register') }}" class="nav-btn nav-register">Daftar Sekarang ↗</a>
        </div>
    </div>
</nav>

<!-- HERO -->

<section class="hero">
    <div class="orb orb-one"></div>
    <div class="orb orb-two"></div>

    <div class="container hero-grid">
        <div class="hero-copy">
            <div class="eyebrow">
                <span class="live-dot"></span>
                YOUR GATEWAY TO AMAZING EXPERIENCES
            </div>

            <h1>
                Your Event.<br>
                <span class="gradient-text">Your Moment.</span>
            </h1>

            <p class="hero-description">
                Satu tiket, sejuta cerita. Temukan konser, festival,
                seminar, dan pengalaman seru lainnya.
                Semua event favoritmu dimulai dari Ticketify.
            </p>

            <div class="hero-buttons">
                <a href="{{ url('/events') }}" class="btn-main">
                    Explore Events ↗
                </a>
                <a href="#tentang" class="btn-outline-main">
                    ✦ Kenali Ticketify
                </a>
            </div>

            <div class="hero-note">
                <div class="note-icon">⚡</div>
                <div>
                    <strong>Temukan. Pesan. Nikmati.</strong>
                    Pengalaman event dalam satu platform.
                </div>
            </div>
        </div>

        <div class="visual-stage">
            <div class="visual-glow"></div>
            <div class="orbit"></div>

            <div class="ticket-3d">
                <div class="ticket-top">
                    <div class="ticket-brand">✦ TICKETIFY</div>
                    <div class="ticket-chip">SPECIAL PASS</div>
                </div>

                <div class="ticket-art"><span>🎤</span></div>

                <div class="ticket-caption">YOUR NEXT EXPERIENCE</div>
                <h3>Make It Memorable.</h3>
                <div class="ticket-sub">
                    Good music. Great people. Unforgettable moments.
                </div>

                <div class="ticket-divider"></div>

                <div class="ticket-bottom">
                    <div>
                        <small>YOUR NEXT ADVENTURE</small>
                        <strong>Starts With A Ticket ✨</strong>
                    </div>
                    <div class="fake-qr" aria-hidden="true">
                        @for($i = 0; $i < 25; $i++)
                            <i></i>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="float-card float-card-one">
                <div class="float-icon">✨</div>
                <div>
                    <strong>Find Your Moment</strong>
                    <small>Discover something amazing</small>
                </div>
            </div>

            <div class="float-card float-card-two">
                <div class="float-icon">🎫</div>
                <div>
                    <strong>Your Ticket Awaits</strong>
                    <small>Start your next adventure</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS -->

<section class="stats-wrap">
    <div class="container">
        <div class="stats reveal">
            <div class="stat-item">
                <strong>01 Platform</strong>
                <span>Satu tempat untuk event favoritmu</span>
            </div>
            <div class="stat-item">
                <strong>Easy Booking</strong>
                <span>Proses pemesanan praktis</span>
            </div>
            <div class="stat-item">
                <strong>More Memories</strong>
                <span>Lebih banyak momen berharga</span>
            </div>
        </div>
    </div>
</section>

<!-- KATEGORI EVENT -->

<section class="section" id="kategori">
    <div class="container">
        <div class="section-heading reveal">
            <span class="section-label">✦ DISCOVER YOUR PASSION</span>
            <h2>
                Find Your Next
                <span class="gradient-text">Experience.</span>
            </h2>
            <p>
                Pilih kategori event yang ingin kamu jelajahi
                dan temukan pengalaman berikutnya.
            </p>
        </div>

        <div class="row g-4">

            <!-- CONCERT & MUSIC -->

            <div class="col-md-4 reveal">
                <div class="category-card"
                     style="--tint:#eee8ff"
                     data-category-url="{{ url('/events?category=music') }}"
                     role="link"
                     tabindex="0"
                     aria-label="Lihat event Concert dan Music">

                    <div class="category-icon">🎵</div>

                    <h3>Concert &amp; Music</h3>

                    <p class="category-description">
                        Rasakan energi musik secara langsung dan
                        ciptakan kenangan bersama.
                    </p>

                    <span class="category-count">
                        {{ $concertEvents->count() }} event tersedia
                    </span>

                    <div class="category-events">
                        @forelse($concertEvents as $event)
                            <div class="mini-event">
                                <div class="mini-event-image">
                                    @if($event->banner)
                                        <img
                                            src="{{ \Illuminate\Support\Facades\Storage::url($event->banner) }}"
                                            alt="{{ $event->title }}"
                                            loading="lazy"
                                        >
                                    @else
                                        <span>🎤</span>
                                    @endif
                                </div>

                                <div class="mini-event-info">
                                    <span class="mini-event-title">
                                        {{ $event->title }}
                                    </span>

                                    <span class="mini-event-meta">
                                        📅
                                        {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                                    </span>

                                    <span class="mini-event-meta">
                                        📍 {{ $event->location ?: 'Lokasi menyusul' }}
                                    </span>
                                </div>

                                <a
                                    href="{{ route('events.show', $event->id) }}"
                                    class="mini-event-btn"
                                >Lihat</a>
                            </div>
                        @empty
                            <div class="no-category-event">
                                🎵<br>
                                Belum ada event konser.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- SEMINAR & WORKSHOP -->

            <div class="col-md-4 reveal">
                <div class="category-card"
                     style="--tint:#fff0d9"
                     data-category-url="{{ url('/events?category=seminar') }}"
                     role="link"
                     tabindex="0"
                     aria-label="Lihat event Seminar dan Workshop">

                    <div class="category-icon">💡</div>

                    <h3>Seminar &amp; Workshop</h3>

                    <p class="category-description">
                        Perluas wawasan, belajar hal baru, dan temui
                        inspirasi berikutnya.
                    </p>

                    <span class="category-count">
                        {{ $seminarEvents->count() }} event tersedia
                    </span>

                    <div class="category-events">
                        @forelse($seminarEvents as $event)
                            <div class="mini-event">
                                <div class="mini-event-image">
                                    @if($event->banner)
                                        <img
                                            src="{{ \Illuminate\Support\Facades\Storage::url($event->banner) }}"
                                            alt="{{ $event->title }}"
                                            loading="lazy"
                                        >
                                    @else
                                        <span>💡</span>
                                    @endif
                                </div>

                                <div class="mini-event-info">
                                    <span class="mini-event-title">
                                        {{ $event->title }}
                                    </span>

                                    <span class="mini-event-meta">
                                        📅
                                        {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                                    </span>

                                    <span class="mini-event-meta">
                                        📍 {{ $event->location ?: 'Lokasi menyusul' }}
                                    </span>
                                </div>

                                <a
                                    href="{{ route('events.show', $event->id) }}"
                                    class="mini-event-btn"
                                >Lihat</a>
                            </div>
                        @empty
                            <div class="no-category-event">
                                💡<br>
                                Belum ada event seminar.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- FESTIVAL & LIFESTYLE -->

            <div class="col-md-4 reveal">
                <div class="category-card"
                     style="--tint:#ffe5f2"
                     data-category-url="{{ url('/events?category=festival') }}"
                     role="link"
                     tabindex="0"
                     aria-label="Lihat event Festival dan Lifestyle">

                    <div class="category-icon">🎨</div>

                    <h3>Festival &amp; Lifestyle</h3>

                    <p class="category-description">
                        Jelajahi suasana seru, komunitas baru, dan
                        pengalaman yang berbeda.
                    </p>

                    <span class="category-count">
                        {{ $festivalEvents->count() }} event tersedia
                    </span>

                    <div class="category-events">
                        @forelse($festivalEvents as $event)
                            <div class="mini-event">
                                <div class="mini-event-image">
                                    @if($event->banner)
                                        <img
                                            src="{{ \Illuminate\Support\Facades\Storage::url($event->banner) }}"
                                            alt="{{ $event->title }}"
                                            loading="lazy"
                                        >
                                    @else
                                        <span>🎨</span>
                                    @endif
                                </div>

                                <div class="mini-event-info">
                                    <span class="mini-event-title">
                                        {{ $event->title }}
                                    </span>

                                    <span class="mini-event-meta">
                                        📅
                                        {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                                    </span>

                                    <span class="mini-event-meta">
                                        📍 {{ $event->location ?: 'Lokasi menyusul' }}
                                    </span>
                                </div>

                                <a
                                    href="{{ route('events.show', $event->id) }}"
                                    class="mini-event-btn"
                                >Lihat</a>
                            </div>
                        @empty
                            <div class="no-category-event">
                                🎨<br>
                                Belum ada event festival.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SEMUA EVENT -->

<section class="events-section" id="event">
    <div class="container">

        <div class="event-topline">
            <div class="section-heading reveal">
                <span class="section-label">✦ HANDPICKED FOR YOU</span>
                <h2>Event yang Menarik.</h2>
                <p>Jelajahi semua event yang tersedia di Ticketify.</p>
            </div>

            <a href="{{ url('/events') }}" class="view-all">
                Lihat Semua Event →
            </a>
        </div>

        @if($allEvents->count() > 0)
            <div class="row g-4">
                @foreach($allEvents->take(6) as $event)
                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="event-card">

                            <div class="event-image">
                                @if($event->banner)
                                    <img
                                        src="{{ \Illuminate\Support\Facades\Storage::url($event->banner) }}"
                                        alt="{{ $event->title }}"
                                        loading="lazy"
                                    >
                                @else
                                    <span class="event-emoji">🎪</span>
                                @endif

                                <span class="event-category">
                                    {{ $event->category ?: 'EVENT' }}
                                </span>
                            </div>

                            <div class="event-content">
                                <h3>{{ $event->title }}</h3>

                                <div class="event-meta">
                                    <span>
                                        📅
                                        {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                                    </span>

                                    @if($event->event_time)
                                        <span>🕐 {{ $event->event_time }}</span>
                                    @endif

                                    <span>
                                        📍 {{ $event->location ?: 'Lokasi menyusul' }}
                                    </span>
                                </div>

                                <div class="event-footer">
                                    <div>
                                        <small>Kategori</small>
                                        <strong>{{ $event->category ?: 'Event' }}</strong>
                                    </div>

                                    <a
                                        href="{{ route('events.show', $event->id) }}"
                                        class="event-buy"
                                    >Lihat Event ↗</a>
                                </div>
                            </div>

                        </article>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-events reveal">
                <div class="empty-icon">🎟️</div>
                <h3>Petualanganmu Dimulai di Sini</h3>
                <p>Belum ada event yang tersedia.</p>
                <a href="{{ url('/events') }}" class="btn-main">
                    Jelajahi Semua Event →
                </a>
            </div>
        @endif
    </div>
</section>

<!-- TENTANG TICKETIFY -->

<section class="benefits-section" id="tentang">
    <div class="container">
        <div class="benefit-panel reveal">
            <div class="row align-items-center g-4">

                <div class="col-lg-7">
                    <span class="section-label" style="color:#c8b8ff">
                        ✦ WHY TICKETIFY?
                    </span>

                    <h2>Semua Momen Hebat Berawal dari Satu Tiket.</h2>

                    <p>
                        Ticketify membantumu menemukan event, menjelajahi
                        pilihan acara, dan memulai pengalaman seru
                        berikutnya dengan lebih mudah.
                    </p>

                    <div class="benefit-list">
                        <div class="benefit">
                            <span class="benefit-check">✓</span>
                            Temukan berbagai event
                        </div>
                        <div class="benefit">
                            <span class="benefit-check">✓</span>
                            Pilihan tiket sesuai kebutuhan
                        </div>
                        <div class="benefit">
                            <span class="benefit-check">✓</span>
                            Pemesanan melalui akunmu
                        </div>
                        <div class="benefit">
                            <span class="benefit-check">✓</span>
                            Akses tiket setelah pembelian
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="benefit-art">🎟️</div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- CTA -->

<section class="cta-section">
    <div class="container">
        <div class="cta-card reveal">
            <h2>Ready for Your Next Moment? ✨</h2>
            <p>
                Jangan lewatkan pengalaman seru berikutnya.
                Temukan event favoritmu sekarang.
            </p>
            <a href="{{ url('/events') }}" class="btn-main">
                Explore Events Now ↗
            </a>
        </div>
    </div>
</section>

<!-- FOOTER -->

<footer class="footer">
    <div class="container footer-inner">
        <div>
            <a href="{{ url('/') }}" class="brand">
                <span class="brand-icon">🎟</span>
                <span class="brand-name">Ticket<span>ify</span></span>
            </a>
            <p>Every event. Every moment. Every memory.</p>
        </div>

        <div class="footer-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ url('/events') }}">Explore Events</a>
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
    </div>
</footer>

<script>
    // Animasi saat bagian halaman mulai terlihat.
    (function () {
        const elements = document.querySelectorAll('.reveal');

        if (!('IntersectionObserver' in window)) {
            elements.forEach(function (element) {
                element.classList.add('visible');
            });
            return;
        }

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12
        });

        elements.forEach(function (element) {
            observer.observe(element);
        });
    })();

    // Membuat seluruh kartu kategori dapat diklik.
    // Tombol/link di dalam kartu tetap menjalankan fungsinya sendiri.
    (function () {
        const categoryCards = document.querySelectorAll('[data-category-url]');

        categoryCards.forEach(function (card) {
            card.addEventListener('click', function (event) {
                if (event.target.closest('a, button')) {
                    return;
                }

                window.location.href = card.dataset.categoryUrl;
            });

            card.addEventListener('keydown', function (event) {
                if (event.target !== card) {
                    return;
                }

                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    window.location.href = card.dataset.categoryUrl;
                }
            });
        });
    })();
</script>

</body>
</html>
