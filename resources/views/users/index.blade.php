@extends('layouts.app')

@section('title', 'Users List')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gradient-to-tr from-gray-900 via-blue-900 to-black text-white py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-xl p-8 space-y-8">

        <!-- Title -->
        <h1 class="text-3xl font-bold text-blue-300 text-center">👥 Registered Users</h1>

        <!-- Back Button -->
        <div>
            <a href="{{ route('dashboard') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-lg transition duration-200">
                ← Back to Dashboard
            </a>
        </div>

        @if($users->count())
            <!-- Table -->
            <div class="overflow-x-auto rounded-lg border border-white/20">
                <table class="min-w-full bg-white/5 text-white text-sm table-auto">
                    <thead class="bg-blue-800/60 text-blue-200">
                        <tr>
                            <th class="text-left px-6 py-4 border-b border-white/10">Name</th>
                            <th class="text-left px-6 py-4 border-b border-white/10">Email</th>
                            <th class="text-left px-6 py-4 border-b border-white/10">Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="hover:bg-white/10 transition">
                                <td class="px-6 py-4 border-b border-white/10 text-blue-100">{{ $user->name }}</td>
                                <td class="px-6 py-4 border-b border-white/10 text-blue-200">{{ $user->email }}</td>
                                <td class="px-6 py-4 border-b border-white/10 text-blue-400 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 text-center">
                {{ $users->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-center text-blue-300 italic">No users found.</p>
        @endif
    </div>
</div>
@endsection
