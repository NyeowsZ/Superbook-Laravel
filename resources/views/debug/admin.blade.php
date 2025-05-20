<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-900 min-h-screen text-white">
    <!-- Navigation -->
    <nav class="w-full bg-neutral-800 border-b border-neutral-700">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-center space-x-8 py-4">
                <a href="/admin" class="text-red-500 font-semibold hover:text-red-400 transition">Admin</a>
                <a href="/cashier" class="text-white/80 font-semibold hover:text-white transition">Cashier</a>
                <a href="/customer" class="text-white/80 font-semibold hover:text-white transition">Customer</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Status Messages -->
        @if ($errors->any())
            <div class="mb-4 bg-red-500/10 border border-red-500/20 text-red-500 px-4 py-3 rounded-lg">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('message'))
            <div class="mb-4 bg-green-500/10 border border-green-500/20 text-green-500 px-4 py-3 rounded-lg">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <!-- Login Status -->
        @auth('admin')
            <div class="mb-6 bg-red-500/10 border border-red-500/20 text-red-500 px-4 py-3 rounded-lg text-center font-medium">
                Admin is logged in
            </div>
        @endauth
        @guest('admin')
            <div class="mb-6 bg-neutral-800/50 border border-neutral-700 text-white/70 px-4 py-3 rounded-lg text-center font-medium">
                Admin is logged out
            </div>
        @endguest

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                @if(Auth::guard('admin')->check())
                    <div class="bg-neutral-800 border border-neutral-700 shadow-lg rounded-lg p-6">
                        <h1 class="text-2xl font-bold mb-6 text-center text-white">Register Admin</h1>
                        <form action="{{ route('admin.register') }}" method="post" class="space-y-4">
                            @csrf
                            <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="text" name="firstname" placeholder="First Name" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="text" name="middlename" placeholder="Middle Name (Optional)" class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="text" name="lastname" placeholder="Last Name" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-lg hover:bg-red-600 transition duration-200 font-medium">Register</button>
                        </form>
                    </div>

                    <div class="bg-neutral-800 border border-neutral-700 shadow-lg rounded-lg p-6">
                        <h1 class="text-2xl font-bold mb-6 text-center text-white">Register Cashier</h1>
                        <form action="{{ route('cashier.register') }}" method="post" class="space-y-4">
                            @csrf
                            <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="text" name="firstname" placeholder="First Name" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="text" name="middlename" placeholder="Middle Name (Optional)" class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="text" name="lastname" placeholder="Last Name" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-lg hover:bg-red-600 transition duration-200 font-medium">Register</button>
                        </form>
                    </div>
                @else
                    <div class="bg-neutral-800 border border-neutral-700 shadow-lg rounded-lg p-6 text-center">
                        <h1 class="text-2xl font-bold mb-4 text-white">Register Admin</h1>
                        <p class="text-white/70">Login as Admin to Register a New Admin.</p>
                    </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                @if(!Auth::guard('admin')->check())
                    <div class="bg-neutral-800 border border-neutral-700 shadow-lg rounded-lg p-6">
                        <h1 class="text-2xl font-bold mb-6 text-center text-white">Login Admin</h1>
                        <form action="{{ route('admin.login') }}" method="post" class="space-y-4">
                            @csrf
                            <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 bg-neutral-700/50 border border-neutral-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-white placeholder-white/50">
                            <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-lg hover:bg-red-600 transition duration-200 font-medium">Login</button>
                        </form>
                    </div>
                @endif

                @auth('admin')
                    <div class="bg-neutral-800 border border-neutral-700 shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4 text-white">Admin Info</h2>
                        <div class="space-y-2">
                            <p><span class="font-medium text-white/70">Username:</span> <span class="text-white">{{ Auth::guard('admin')->user()->username }}</span></p>
                            <p><span class="font-medium text-white/70">First Name:</span> <span class="text-white">{{ Auth::guard('admin')->user()->firstname }}</span></p>
                            <p><span class="font-medium text-white/70">Middle Name:</span> <span class="text-white">{{ Auth::guard('admin')->user()->middlename }}</span></p>
                            <p><span class="font-medium text-white/70">Last Name:</span> <span class="text-white">{{ Auth::guard('admin')->user()->lastname }}</span></p>
                        </div>
                        <form action="{{ route('admin.logout') }}" method="post" class="mt-6">
                            @csrf
                            <button class="w-full bg-neutral-700 text-white py-3 rounded-lg hover:bg-neutral-600 transition duration-200 font-medium">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>