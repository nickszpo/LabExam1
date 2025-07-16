@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<div x-data="{ showBookings: false }" class="min-h-screen bg-gradient-to-tr from-gray-900 via-blue-900 to-black text-white py-6 sm:py-10 px-4 sm:px-6 flex flex-col">
    <div class="w-full max-w-5xl mx-auto space-y-8 flex-grow">
        <!-- ✅ Success Message -->
        @if(session('success'))
            <div class="bg-green-200 text-green-900 px-4 py-3 rounded-md shadow text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- ✅ Welcome Card -->
        <div class="bg-white/10 shadow-xl rounded-2xl p-6 backdrop-blur">
            <h2 class="text-3xl font-bold text-blue-300">Welcome, {{ Auth::user()->name }} 👋</h2>
            <p class="text-blue-200 mt-2 text-base">This is your IT Dashboard. Keep track of your activities and data.</p>
        </div>

        <!-- ✅ Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- 🔁 Total Bookings -->
            <div 
                @click="showBookings = !showBookings"
                @keydown.enter.prevent="showBookings = !showBookings"
                @keydown.space.prevent="showBookings = !showBookings"
                class="cursor-pointer bg-white/10 shadow-md p-6 rounded-xl hover:bg-white/20 transition-all duration-300"
                tabindex="0"
                role="button"
                title="Click to show/hide your bookings"
            >
                <h4 class="text-blue-200 font-semibold text-lg">Total Bookings</h4>
                <p class="text-3xl font-bold text-blue-300 mt-1">{{ $totalBookings }}</p>
            </div>

            <!-- 👥 Total Users -->
            <a href="{{ route('users.index') }}" title="Go to Users" class="group">
                <div class="bg-white/10 shadow-md p-6 rounded-xl hover:bg-white/20 transition-all duration-300">
                    <h4 class="text-purple-200 font-semibold text-lg group-hover:text-purple-100">Total Users</h4>
                    <p class="text-3xl font-bold text-purple-300 group-hover:text-purple-200 mt-1">{{ $totalUsers }}</p>
                </div>
            </a>
        </div>

        <!-- ✅ Booking List -->
        <div x-show="showBookings" x-transition class="bg-white/10 p-6 rounded-2xl shadow-lg min-h-[300px]" style="display: none;">
            <h3 class="text-xl font-semibold text-blue-100 mb-4">📅 Your Bookings</h3>

            @if ($bookings->count())
                <div class="space-y-4">
                    @foreach ($bookings as $booking)
                        <div class="bg-white/10 p-4 rounded-lg shadow hover:shadow-lg transition">
                            <h4 class="text-lg font-bold text-blue-200">{{ $booking->title }}</h4>
                            <p class="text-sm text-blue-100 mt-1">{{ $booking->description }}</p>
                            <p class="text-xs text-blue-400 mt-2">
                                📆 {{ \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y h:i A') }}
                            </p>

                            <div class="mt-3 flex space-x-4">
                                <a href="{{ route('bookings.edit', $booking->id) }}"
                                   class="text-blue-400 hover:text-blue-300 font-semibold underline">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this booking?');"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-semibold underline">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-blue-300 italic py-10">You currently have no bookings.</p>
            @endif
        </div>
    </div>

 
</div>

@endsection