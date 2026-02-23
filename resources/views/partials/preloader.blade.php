<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare University</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <style>
        /* ========================================
           CLEAN MINIMAL PRELOADER
           ======================================== */
        :root {
            --primary-color: #006d77; /* Your brand teal */
            --bg-color: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.loading {
            overflow: hidden;
        }

        /* Full-screen overlay */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--bg-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 99999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        /* Fade out class */
        .preloader.loaded {
            opacity: 0;
            visibility: hidden;
        }

        /* Three Dots Container */
        .dot-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        /* Dot Styling & Animation */
        .dot {
            width: 20px;
            height: 20px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: inline-block;
            animation: dotPulse 1.4s infinite ease-in-out both;
        }

        .dot:nth-child(1) { animation-delay: -0.32s; }
        .dot:nth-child(2) { animation-delay: -0.16s; }

        @keyframes dotPulse {
            0%, 80%, 100% { 
                transform: scale(0);
                opacity: 0.3;
            } 
            40% { 
                transform: scale(1.0);
                opacity: 1;
            }
        }

        /* Optional: Subtle Brand Text */
        .loading-brand {
            margin-top: 20px;
            font-family: 'Segoe UI', sans-serif;
            font-size: 0.85rem;
            color: #888;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 500;
        }
    </style>
</head>

<body class="loading">

    <div class="preloader" id="preloader">
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const preloader = document.getElementById('preloader');
            const body = document.body;

            // Simple Logic: Wait for the page to load + a minimum "grace period"
            // This ensures the user actually sees the clean animation for 2 seconds
            const minimumDisplayTime = 2000; 
            const startTime = Date.now();

            window.addEventListener('load', () => {
                const currentTime = Date.now();
                const timeElapsed = currentTime - startTime;
                const remainingTime = Math.max(0, minimumDisplayTime - timeElapsed);

               setTimeout(() => {
                preloader.classList.add('loaded');
                body.classList.remove('loading');
    
                // ADD THIS LINE to trigger hero animations
                document.documentElement.classList.add('page-loaded'); 
    
                setTimeout(() => {
                preloader.style.display = 'none';
                 }, 500);
                    }, remainingTime);
            });
        });
    </script>
</body>
</html>