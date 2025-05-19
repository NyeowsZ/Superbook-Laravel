<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <nav class="fixed top-0 left-0 w-full bg-white shadow z-10">
        <div class="max-w-2xl mx-auto flex justify-center space-x-6 py-3">
            <a href="/admin" class="text-blue-700 font-semibold hover:underline">Admin</a>
            <a href="/cashier" class="text-blue-700 font-semibold hover:underline">Cashier</a>
            <a href="/customer" class="text-blue-700 font-semibold hover:underline">Customer</a>
        </div>
    </nav>
    <div class="w-full max-w-md space-y-8 pt-24">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        @guest('customer')
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4 text-center">Register Customer</h1>
                <form action="{{ route('customer.register') }}" method="post" class="space-y-3">
                    @csrf
                    <input type="text" name="username" placeholder="Username" required class="w-full px-3 py-2 border rounded">
                    <input type="text" name="firstname" placeholder="First Name" required class="w-full px-3 py-2 border rounded">
                    <input type="text" name="middlename" placeholder="Middle Name (Optional)" class="w-full px-3 py-2 border rounded">
                    <input type="text" name="lastname" placeholder="Last Name" required class="w-full px-3 py-2 border rounded">
                    <input type="password" name="password" placeholder="Password" required class="w-full px-3 py-2 border rounded">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full px-3 py-2 border rounded">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Register</button>
                </form>
            </div>
        @else
            <div class="bg-white shadow-md rounded-lg p-6 text-center text-gray-500">
                <h1 class="text-2xl font-bold mb-4">Register Customer</h1>
                <p>You are already logged in as a customer.</p>
            </div>
        @endguest

        @if(!Auth::guard('customer')->check())
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4 text-center">Login Customer</h1>
                <form action="{{ route('customer.login') }}" method="post" class="space-y-3">
                    @csrf
                    <input type="text" name="username" placeholder="Username" required class="w-full px-3 py-2 border rounded">
                    <input type="password" name="password" placeholder="Password" required class="w-full px-3 py-2 border rounded">
                    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Login</button>
                </form>
            </div>
        @endif

        @auth('customer')
            <div class="bg-white shadow-md rounded-lg p-6 mt-4">
                <h2 class="text-xl font-semibold mb-2">Customer Info</h2>
                <div class="space-y-1">
                    <p><span class="font-semibold">Username:</span> {{ Auth::guard('customer')->user()->username }}</p>
                    <p><span class="font-semibold">First Name:</span> {{ Auth::guard('customer')->user()->firstname }}</p>
                    <p><span class="font-semibold">Middle Name:</span> {{ Auth::guard('customer')->user()->middlename }}</p>
                    <p><span class="font-semibold">Last Name:</span> {{ Auth::guard('customer')->user()->lastname }}</p>
                </div>
                <form action="{{ route('customer.logout') }}" method="post" class="mt-4"> @csrf <button class="w-full bg-gray-800 text-white py-2 rounded hover:bg-gray-900">Logout</button></form>
            </div>
        @endauth

        @guest('customer')
            <div class="text-center text-gray-500 mt-4">Customer is logged out.</div>
        @endguest
    </div>
</body>
</html>