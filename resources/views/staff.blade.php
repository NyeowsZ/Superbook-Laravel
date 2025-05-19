<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    @if (($errors->any()))
        @foreach ($errors->all() as $error)
            <p> {{ $error }}</p>
        @endforeach
    @endif

    @if (session('message'))
        <p> {{ session('message') }}</p>
    @endif


    <form action="{{ route('staff.register') }}" method="post">
        @csrf
        <h1 class="text-2xl font-bold">Register Staff</h1>
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="middlename" placeholder="Middle Name(Optional)">
        <input type="text" name="lastname" placeholder="Last Name" required>

        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <input type="submit" value="Submit">
    </form>

    <form action="{{ route('staff.login') }}" method="post">
        @csrf
        <h1 class="text-2xl font-bold">Login Staff</h1>
        <input type="text" name="username" placeholder="Name">
        <input type="text" name="password" placeholder="Password">
        <input type="submit" value="Submit">
    </form>

    @auth('staff')

        <p><span class="font-semibold pr-5">Username:</span> {{ Auth::guard('staff')->user()->username }}</p>
            <p><span class="font-semibold pr-5">First Name:</span> {{ Auth::guard('staff')->user()->firstname }}</p>
            <p><span class="font-semibold pr-5">Middle Name:</span> {{ Auth::guard('staff')->user()->middlename }}</p>
            <p><span class="font-semibold pr-5">Last Name:</span> {{ Auth::guard('staff')->user()->lastname }}</p>
            <p><span class="font-semibold pr-5">Password:</span> {{ Auth::guard('staff')->user()->password }}</p>
        <form action="{{ route('staff.logout') }}" method="post"> @csrf <button class="px-2 py-1 rounded-lg bg-gray-900 text-white">Logout</button></form>
        
    @endauth

    @guest('staff')
        <h1>Is logged out.</h1>   
    @endguest
</body>
</html>