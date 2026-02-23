<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Medicare University</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
   <link rel="stylesheet" href="{{asset('css/login.css')}}">
<style>
        <style>
        /* ========================================
           PRELOADER STYLES - MEDICAL THEME
           ======================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
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
        /* ========== DEMO PAGE CONTENT ========== */
        .demo-content {
            min-height: 100vh;
            background: linear-gradient(135deg, #f0f9fa 0%, #e0f4f5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .demo-card {
            background: white;
            border-radius: 30px;
            padding: 60px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 109, 119, 0.15);
            max-width: 600px;
        }

        .demo-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            margin: 0 auto 30px;
        }

        .demo-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #006d77;
            margin-bottom: 15px;
        }

        .demo-text {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .demo-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #006d77, #00b4d8);
            color: white;
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .demo-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 109, 119, 0.3);
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

<a href="{{url('/')}}" class="back-to-home">
        <i class="fas fa-arrow-left"></i>
        Back to Home
    </a>
    
    <div class="bg-decoration">
        <div class="bg-circle"></div>
        <div class="bg-circle"></div>
        <div class="bg-circle"></div>
        <i class="fas fa-heartbeat floating-icon"></i>
        <i class="fas fa-stethoscope floating-icon"></i>
        <i class="fas fa-pills floating-icon"></i>
        <i class="fas fa-user-md floating-icon"></i>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="card-header">
                <div class="logo-container">
                    <img src="{{asset('images/favicon.png')}}" alt="" style="width: 65px">
                </div>
                <h1>Welcome Back</h1>
                <p>Sign in to your medical portal</p>
            </div>

            <div class="card-body">
                @if ($errors->any())
    <div style="background: #ffe6e6; color: #cc0000; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form id="loginForm" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group">
    <label for="email">Email Address</label>
    <div class="input-wrapper">
        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
        <i class="fas fa-envelope"></i>
    </div>
    @if ($errors->has('email'))
        <span class="text-danger" style="color: #ff4d4d; font-size: 0.8rem;">
            {{ $errors->first('email') }}
        </span>
    @endif
</div>

<div class="form-group">
    <label for="password">Password</label>
    <div class="input-wrapper">
        <i class="fas fa-lock lock-icon"></i>
        <input type="password" name="password" id="password" placeholder="Enter your password" required autocomplete="current-password">
        <button type="button" class="toggle-password" onclick="togglePassword()">
            <i class="fas fa-eye" id="toggleIcon"></i>
        </button>
    </div>
    @if ($errors->has('password'))
        <span class="text-danger" style="color: #ff4d4d; font-size: 0.8rem;">
            {{ $errors->first('password') }}
        </span>
    @endif
</div>

<div class="form-options">
    <label class="remember-me">
        <input type="checkbox" name="remember" id="remember">
        <span class="checkmark"><i class="fas fa-check"></i></span>
        <span>Remember me</span>
    </label>
    <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
</div>

                    <button type="submit" class="login-btn" id="loginBtn" onclick="this.form.submit()">
    <span class="btn-text">Sign In</span>
    <i class="fas fa-arrow-right btn-text"></i>
</button>

                    <div class="divider">
                        <span></span>
                    </div>
                    
                    
                  
                </form>

                
            </div>
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