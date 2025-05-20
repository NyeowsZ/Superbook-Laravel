@auth('customer')
    <script>
        window.location.href = "\\";
    </script>
@endauth

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superbook - Login/Register</title>
    <script src="https://kit.fontawesome.com/31949a3546.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-neutral-900 font-[Poppins] h-screen">
    <div class="flex h-full">
        <!-- Left Column - Image and branding -->
        <div class="hidden lg:flex w-1/2 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-black/40 to-black/70 z-10"></div>
            <img src="{{ asset('img/inspo-full.jpg') }}" alt="Book collection" class="absolute inset-0 w-full h-full object-cover">
            
            <div class="relative z-20 flex flex-col items-center justify-center w-full p-12">
                <img src="{{ asset('/img/anime-image-hd.png') }}" class="object-contain max-w-md mb-10">
                <h1 class="text-5xl font-bold text-white mb-6 text-center">
                    Superbook
                </h1>
                <div class="h-1 w-24 bg-accent mb-6"></div>
                <p class="text-xl text-white/90 text-center max-w-lg">
                    Explore our collection of <span class="text-accent font-semibold">Mangas & Novels</span> 
                    that spark imagination and build worlds beyond words.
                </p>
            </div>
        </div>

        <!-- Right Column - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-4 sm:p-6 md:p-10 bg-neutral-900 overflow-auto">
            <div class="w-full max-w-xl">
                <!-- Logo for mobile -->
                <div class="lg:hidden flex flex-col items-center mb-8">
                    <img src="{{ asset('/img/anime-image-hd.png') }}" class="h-16 object-contain mb-4">
                    <h2 class="text-3xl font-bold text-white">Superbook</h2>
                </div>

                <!-- Status Messages -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-500/10 border border-red-500/20 text-red-500 px-4 py-3 rounded-xl">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-6 bg-green-500/10 border border-green-500/20 text-green-500 px-4 py-3 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 bg-red-500/10 border border-red-500/20 text-red-500 px-4 py-3 rounded-xl">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form Container -->
                <div class="bg-neutral-800 rounded-2xl shadow-xl shadow-black/30 p-6 sm:p-8">
                    <!-- Form Header and Tabs -->
                    <div class="mb-6">
                        <h2 class="text-2xl sm:text-3xl font-semibold text-white text-center mb-5">Welcome Back</h2>
                        <div class="flex justify-center">
                            <div class="bg-neutral-900/80 rounded-xl p-1 w-full max-w-sm flex">
                                <button id="login-toggle" class="flex-1 py-3 px-6 rounded-lg font-medium transition-all text-center">
                                    Login
                                </button>
                                <button id="register-toggle" class="flex-1 py-3 px-6 rounded-lg font-medium transition-all text-center">
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Form Panels Container -->
                    <div class="relative overflow-hidden" style="min-height: 430px">
                        <!-- Login Form -->
                        <div id="login-form" class="form-panel absolute w-full transition-all duration-500">
                            <form action="{{ route('customer.login') }}" method="POST" class="px-5">
                                @csrf
                                <div class="space-y-5">
                                    <div>
                                        <label for="username" class="block text-sm font-medium text-white/80 mb-2">Username</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-neutral-400">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input type="text" id="username" name="username" class="block w-full rounded-xl border-0 bg-neutral-900/80 py-3.5 pl-12 pr-4 text-white ring-1 ring-inset ring-neutral-700 focus:ring-2 focus:ring-accent" required>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="password" class="block text-sm font-medium text-white/80 mb-2">Password</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-neutral-400">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            <input type="password" id="password" name="password" class="block w-full rounded-xl border-0 bg-neutral-900/80 py-3.5 pl-12 pr-4 text-white ring-1 ring-inset ring-neutral-700 focus:ring-2 focus:ring-accent" required>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center">
                                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-accent border-neutral-700 rounded focus:ring-accent bg-neutral-900">
                                        <label for="remember" class="ml-2 block text-sm text-white/80">Remember me</label>
                                    </div>
                                    
                                    <button type="submit" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 rounded-xl font-medium transition-all bg-accent hover:bg-accent/90 text-white shadow-lg shadow-accent/40">
                                        <span>Sign in</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                            
                            <p class="mt-6 text-center text-sm text-white/70">
                                Don't have an account? 
                                <button type="button" id="go-to-register" class="text-accent hover:underline font-medium">
                                    Create account
                                </button>
                            </p>
                        </div>
                        
                        <!-- Register Form -->
                        <div id="register-form" class="form-panel absolute w-full transition-all duration-500" style="transform: translateY(100%)">
                            <form action="{{ route('customer.register') }}" method="POST" class="px-5">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label for="reg-username" class="block text-sm font-medium text-white/80 mb-2">Username</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-neutral-400">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input type="text" id="reg-username" name="username" class="block w-full rounded-xl border-0 bg-neutral-900/80 py-3 pl-12 pr-4 text-white ring-1 ring-inset ring-neutral-700 focus:ring-2 focus:ring-accent" required>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="firstname" class="block text-sm font-medium text-white/80 mb-2">First Name</label>
                                            <input type="text" id="firstname" name="firstname" class="block w-full rounded-xl border-0 bg-neutral-900/80 py-3 px-4 text-white ring-1 ring-inset ring-neutral-700 focus:ring-2 focus:ring-accent" required>
                                        </div>
                                        
                                        <div>
                                            <label for="lastname" class="block text-sm font-medium text-white/80 mb-2">Last Name</label>
                                            <input type="text" id="lastname" name="lastname" class="block w-full rounded-xl border-0 bg-neutral-900/80 py-3 px-4 text-white ring-1 ring-inset ring-neutral-700 focus:ring-2 focus:ring-accent" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="middlename" class="block text-sm font-medium text-white/80 mb-2">Middle Name <span class="text-white/50">(Optional)</span></label>
                                        <input type="text" id="middlename" name="middlename" class="block w-full rounded-xl border-0 bg-neutral-900/80 py-3 px-4 text-white ring-1 ring-inset ring-neutral-700 focus:ring-2 focus:ring-accent">
                                    </div>
                                    
                                    <!-- Password fields in a single row -->
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="reg-password" class="block text-sm font-medium text-white/80 mb-2">Password</label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-neutral-400">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <input type="password" id="reg-password" name="password" class="block w-full rounded-xl border-0 bg-neutral-900/80 py-3 pl-10 pr-3 text-white ring-1 ring-inset ring-neutral-700 focus:ring-2 focus:ring-accent" required>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="password_confirmation" class="block text-sm font-medium text-white/80 mb-2">Confirm Password</label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-neutral-400">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="block w-full rounded-xl border-0 bg-neutral-900/80 py-3 pl-10 pr-3 text-white ring-1 ring-inset ring-neutral-700 focus:ring-2 focus:ring-accent" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="w-full flex justify-center items-center gap-2 py-3 px-4 rounded-xl font-medium transition-all bg-accent hover:bg-accent/90 text-white shadow-lg shadow-accent/40">
                                        <span>Create Account</span>
                                    </button>
                                </div>
                            </form>
                            
                            <p class="mt-6 text-center text-sm text-white/70">
                                Already have an account? 
                                <button type="button" id="go-to-login" class="text-accent hover:underline font-medium">
                                    Sign in
                                </button>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-white/50">&copy; Superbook 2025 | All Rights Reserved</p>
                    <div class="flex justify-center mt-3 space-x-4 text-white/60">
                        <a href="#" class="hover:text-accent transition-colors"><i class="fab fa-github"></i></a>
                        <a href="#" class="hover:text-accent transition-colors"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-accent transition-colors"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="hover:text-accent transition-colors"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get DOM elements
        const loginToggle = document.getElementById('login-toggle');
        const registerToggle = document.getElementById('register-toggle');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const goToRegister = document.getElementById('go-to-register');
        const goToLogin = document.getElementById('go-to-login');

        // Apply active tab styling
        function setActiveTab(isLogin) {
            if (isLogin) {
                loginToggle.classList.add('bg-accent', 'text-white');
                registerToggle.classList.remove('bg-accent', 'text-white');
                registerToggle.classList.add('text-white/70');
            } else {
                registerToggle.classList.add('bg-accent', 'text-white');
                loginToggle.classList.remove('bg-accent', 'text-white');
                loginToggle.classList.add('text-white/70');
            }
        }

        // Function to show login form
        function showLogin() {
            setActiveTab(true);
            loginForm.style.transform = 'translateY(0)';
            registerForm.style.transform = 'translateY(100%)';
        }

        // Function to show register form
        function showRegister() {
            setActiveTab(false);
            loginForm.style.transform = 'translateY(-100%)';
            registerForm.style.transform = 'translateY(0)';
        }

        // Add event listeners
        loginToggle.addEventListener('click', showLogin);
        registerToggle.addEventListener('click', showRegister);
        goToRegister.addEventListener('click', showRegister);
        goToLogin.addEventListener('click', showLogin);

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            showLogin();
        });
    </script>
</body>
</html> 