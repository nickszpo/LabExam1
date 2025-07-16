<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Booking System - IT Style</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Roboto+Mono&display=swap" rel="stylesheet" />

  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#0ea5e9',     // sky-500
            secondary: '#1e293b',   // slate-800
            accent: '#8b5cf6',      // violet-500
            darkbg: '#0f172a',      // slate-900
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif'],
            mono: ['Roboto Mono', 'monospace']
          }
        }
      }
    };
  </script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: radial-gradient(circle at top left, #1e3a8a, #0f172a);
      color: #f1f5f9;
      position: relative;
    }

    .circuit-bg::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
      width: 100%;
      height: 100%;
      background: url('https://www.transparenttextures.com/patterns/circuits.png');
      opacity: 0.05;
    }

    .glass-box {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hover-glow:hover {
      box-shadow: 0 0 15px rgba(14, 165, 233, 0.5);
    }
  </style>
</head>
<body class="min-h-screen circuit-bg">

  <div class="min-h-screen px-4 py-10">
    <div class="w-full max-w-5xl mx-auto glass-box rounded-2xl p-10 shadow-xl">

      <!-- Header -->
      <div class="text-center mb-10">
        <h1 class="text-5xl font-extrabold text-primary mb-3 tracking-tight font-mono">Teyvat Booking System</h1>
        <p class="text-slate-300 text-lg font-light">Smarter, faster, tech-powered bookings built for the future.</p>
      </div>

      <!-- CTA Buttons -->
      <div class="flex flex-col sm:flex-row justify-center gap-6 mb-14">
        <a href="{{ route('register') }}"
           class="bg-gradient-to-r from-primary to-accent text-white px-8 py-4 rounded-xl text-lg font-semibold flex items-center justify-center gap-2 transition duration-300 hover:scale-105 hover-glow">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 00-3-3.87M5 19v2m11-11a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
          Register
        </a>
        <a href="{{ route('login') }}"
           class="border-2 border-primary text-primary hover:bg-primary hover:text-white px-8 py-4 rounded-xl text-lg font-semibold flex items-center justify-center gap-2 transition duration-300 hover:scale-105 hover-glow">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24"><path d="M15 12H3m0 0l4-4m-4 4l4 4m13 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V5a3 3 0 013-3h7" /></svg>
          Login
        </a>
      </div>

      <!-- Features -->
      <div class="mb-16">
        <h2 class="text-3xl font-bold text-center text-accent mb-8">Explore Our Services</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
          <div class="bg-slate-800 p-6 rounded-xl border border-slate-600 shadow hover:shadow-xl transition hover:scale-105">
            <h3 class="font-semibold text-lg text-primary mb-2">Real-Time Booking</h3>
            <p class="text-slate-400 text-sm">Instant reservations, accurate time tracking, and automated alerts.</p>
          </div>
          <div class="bg-slate-800 p-6 rounded-xl border border-slate-600 shadow hover:shadow-xl transition hover:scale-105">
            <h3 class="font-semibold text-lg text-primary mb-2">Secure User Portal</h3>
            <p class="text-slate-400 text-sm">Encrypted access to your profile, settings, and booking history.</p>
          </div>
          <div class="bg-slate-800 p-6 rounded-xl border border-slate-600 shadow hover:shadow-xl transition hover:scale-105">
            <h3 class="font-semibold text-lg text-primary mb-2">Admin Dashboard</h3>
            <p class="text-slate-400 text-sm">Visualize data, manage users, and monitor performance metrics.</p>
          </div>
        </div>
      </div>

      <!-- CTA Banner -->
      <div class="mt-16 bg-gradient-to-r from-primary/20 to-accent/10 border border-blue-500/30 rounded-xl p-8 text-center">
        <h2 class="text-2xl font-bold mb-4 text-primary">Start Your Tech-Driven Journey</h2>
        <p class="text-slate-300 mb-6 max-w-2xl mx-auto">
          Teyvat Booking System is designed with modern IT solutions — optimized for reliability, security, and automation.
        </p>
        <a href="{{ route('register') }}"
           class="px-6 py-3 bg-accent text-white rounded-lg font-semibold text-lg transition hover:bg-violet-700 hover-glow">
          Create Account
        </a>
      </div>

      <!-- Footer -->
      <footer class="text-center mt-12 pt-6 text-sm text-slate-500 border-t border-slate-700">
        &copy; 2025 Teyvat Booking System. Built with ❤️ for developers and tech teams.
      </footer>

    </div>
  </div>

</body>
</html>
