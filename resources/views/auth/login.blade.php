<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login — IT Booking System</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#0ea5e9',   // Sky blue
            secondary: '#0f172a', // Slate-900
            accent: '#a855f7',    // Purple
            neon: '#22d3ee',      // Cyan
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui']
          },
          boxShadow: {
            glow: '0 0 20px rgba(14, 165, 233, 0.5)',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-15px)' },
            }
          },
          animation: {
            float: 'float 8s ease-in-out infinite',
          }
        }
      }
    };
  </script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0f172a, #1e3a8a, #0ea5e9);
      min-height: 100vh;
      overflow-x: hidden;
    }

    .blur-circle {
      position: absolute;
      border-radius: 9999px;
      filter: blur(100px);
      opacity: 0.3;
      z-index: 0;
    }
  </style>
</head>
<body class="relative flex items-center justify-center py-20 px-4">

  <!-- Floating Background Blur Effects -->
  <div class="blur-circle w-96 h-96 bg-cyan-500 top-0 left-0 animate-float"></div>
  <div class="blur-circle w-72 h-72 bg-purple-400 top-40 right-0 animate-float"></div>
  <div class="blur-circle w-80 h-80 bg-pink-500 bottom-0 left-1/2 -translate-x-1/2 animate-float"></div>

  <!-- Login Card -->
  <div class="relative z-10 w-full max-w-md bg-white/10 backdrop-blur-lg border border-white/20 shadow-2xl rounded-2xl p-8">

    <!-- Logo -->
    <div class="flex justify-center mb-4">
      <svg class="w-10 h-10 text-neon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M12 4v16m8-8H4" />
      </svg>
    </div>

    <h2 class="text-3xl font-bold text-center text-white mb-2">IT Portal Login</h2>
    <p class="text-center text-gray-300 mb-6">Access your tech-powered booking system</p>

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-white mb-1">Email</label>
        <input id="email" type="email" name="email" required autofocus
               class="w-full px-4 py-3 border border-white/20 bg-white/10 text-white rounded-lg placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-400" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-white mb-1">Password</label>
        <input id="password" type="password" name="password" required
               class="w-full px-4 py-3 border border-white/20 bg-white/10 text-white rounded-lg placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-400" />
      </div>

      <div class="flex items-center">
        <input id="remember_me" type="checkbox" name="remember"
               class="h-4 w-4 text-accent bg-white/10 border-white/20 rounded focus:ring-accent" />
        <label for="remember_me" class="ml-2 text-sm text-gray-300">Remember me</label>
      </div>

      <div>
        <button type="submit"
                class="w-full bg-gradient-to-r from-sky-400 to-blue-600 text-white font-semibold py-3 rounded-lg hover:from-sky-500 hover:to-blue-700 transition shadow-glow">
          Sign In
        </button>
      </div>
    </form>

    <!-- Footer -->
    <div class="text-center text-sm text-gray-400 mt-6 space-y-2">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-sky-300 hover:underline">Forgot Password?</a><br>
      @endif
      <span>New here? 
        <a href="{{ route('register') }}" class="text-pink-400 font-semibold hover:underline">Create an account</a>
      </span>
    </div>
  </div>
</body>
</html>
