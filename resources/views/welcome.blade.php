<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superbook</title>
  <link href="style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/31949a3546.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-neutral-800 text-white relative">
    <x-nav></x-nav>

    <!-- Status Messages -->
    @if ($errors->any())
    <div class="fixed top-20 inset-x-0 z-50 flex justify-center items-center animate-fade-in-down">
        <div class="bg-red-500/90 text-white px-6 py-3 rounded-lg shadow-lg max-w-lg border-l-4 border-red-700">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-2xl mr-3"></i>
                <div>
                    <h3 class="font-bold">Error</h3>
                    <ul class="list-disc pl-5 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-white/80 hover:text-white focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
    @endif

    @if (session('message'))
    <div class="fixed top-20 inset-x-0 z-50 flex justify-center items-center animate-fade-in-down">
        <div class="bg-green-500/90 text-white px-6 py-3 rounded-lg shadow-lg max-w-lg border-l-4 border-green-700">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-2xl mr-3"></i>
                <div>
                    <h3 class="font-bold">Success</h3>
                    <p>{{ session('message') }}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-white/80 hover:text-white focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="fixed top-20 inset-x-0 z-50 flex justify-center items-center animate-fade-in-down">
        <div class="bg-red-500/90 text-white px-6 py-3 rounded-lg shadow-lg max-w-lg border-l-4 border-red-700">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-2xl mr-3"></i>
                <div>
                    <h3 class="font-bold">Error</h3>
                    <p>{{ session('error') }}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-white/80 hover:text-white focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
    @endif

    <main class="">

        <!-- Intro -->
        <div 
            style="background: url('{{ asset('img/inpo-minimal.png') }}'); background-size: cover;"
            class="bg-cover bg-center grid grid-cols-2 justify-between items-center min-h-[100vh] shadow-md shadow-black">
            <div class="flex justify-center">
                <img src="{{ asset('/img/anime-image-hd.png') }}" class="object-contain max-w-[80%]">
            </div>
            <div class="flex flex-col gap-2 items-center justify-center">
                <h1 class="text-center font-bold text-4xl text-neutral-50 border-b-4 pb-1 border-accent">Worlds Beyond Wonders</h1>
                <h3 class="text-xl text-center">
                    <h3 class="text-xl text-center text-neutral-100">
                        <span class="font-bold">Superbook</span> has a great collection of <span class="text-accent font-medium">Mangas & Novels</span><br>
                        stories that spark imagination and build <span class="text-accent font-medium">worlds beyond words</span>.
                    </h3>
                    <!-- Books aren't mere text, it creates <span class="text-accent">worlds</span>. <br>
                    None can fathom the extent words can conquer. -->
                </h3>
                <a class="mt-10 bg-accent px-8 py-4 rounded-4xl flex items-center gap-1 shadow-[0_0_10px] shadow-accent font-semibold text-lg" href="#access">Learn More 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                      </svg>
                </a>
            </div>
        </div>

        <!-- Collection Info -->
        <div style="background-image: url('{{ asset('/img/inspo-right.jpg')}}')"
         class="bg-cover bg-center h-[100vh] relative flex" id="access"
        style="box-shadow: inset 0 0px 10px 5px rgba(0,0,0,1)">
             <div class="flex-[1] flex flex-col justify-center items-center text-xl text-center">
                <h3 class="text-center font-bold text-4xl border-accent border-b-4">Book Accessibility</h3>
                <ul class="list-disc mt-5 flex flex-col items-center gap-2">
                    <li><span class="font-semibold">400+</span> Books in store</li>
                    <li><span class="font-semibold">100+</span> Manga Collections</li>
                    <li><span class="font-semibold">200+</span> Novels favorite of the mass</li>
                </ul>
                
                <a class="mt-10 bg-accent px-8 py-4 rounded-4xl flex items-center gap-1 shadow-[0_0_10px] shadow-accent font-semibold text-lg" href="#featured">See Featured Books
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                      </svg>
                      
                </a>

             </div>

             <div class="flex-[1] flex justify-center items-center">
                <img src="./img/inspo-book-hd.png" class="drop-shadow-md drop-shadow-black" srcset="">

             </div>
        </div>

        <!-- Featured Book -->
        <div style="background: url('{{ asset('img/inspo-full.jpg') }}');"
         class="bg-cover bg-center min-h-[100vh] bg-neutral-900 relative border-y-neutral-900 text-neutral-900 px-10 p-5 shadow-[0_-5px_5px_black]" id="featured">
            <h1 class="text-white text-center text-3xl font-bold p-1 border-b-5 border-accent mb-5 mt-5 mx-auto w-fit">Featured Books</h1>

            <div class="relative overflow-hidden">
                <div class="animate-scroll py-5 flex whitespace-nowrap w-max">
                  <!-- Card Container - Reused for both rows -->
                  <div class="grid grid-cols-4 place-items-center px-10 gap-20 text-white">
                    <!-- Card Template - Yellow -->
                    <div class="card-template card-yellow">
                      <h3 class="card-title">Wotakoi</h3>
                      <p>Volume 1</p>
                      <div class="card-image mt-2">
                        <img src="{{ asset('uploads/wotakoi.jfif') }}" alt="Wotakoi">
                      </div>
                    </div>
              
                    <!-- Card Template - Skyblue -->
                    <div class="card-template card-skyblue">
                      <h3 class="card-title truncate">Frieren</h3>
                      <p>Volume 1</p>
                      <div class="card-image mt-2">
                        <img src="uploads/frieren.jfif" alt="Attack On Titan">
                      </div>
                    </div>
              
                    <!-- Card Template - Green -->
                    <div class="card-template card-green">
                      <h3 class="card-title">Harry Potter</h3>
                      <p>Chapter 1</p>
                      <div class="card-image mt-2">
                        <img src="{{ asset('/uploads/harrypotter.jfif') }}" alt="Harry Potter">
                      </div>
                    </div>
              
                    <!-- Card Template - Orange -->
                    <div class="card-template card-orange">
                      <h3 class="card-title">Heartstopper</h3>
                      <p>Volume 1</p>
                      <div class="card-image mt-2">
                        <img src="{{ asset('/uploads/heartstopper.jfif') }}" alt="Wotakoi">
                      </div>
                    </div>
                  </div>
              
                  <!-- Second Row (same structure) -->
                  <div class="grid grid-cols-4 place-items-center px-10 gap-20 text-white">
                    <!-- Card Template - Yellow -->
                    <div class="card-template card-yellow">
                      <h3 class="card-title">Wotakoi</h3>
                      <p>Volume 1</p>
                      <div class="card-image mt-2">
                        <img src="./{{ asset('uploads/wotakoi.jfif') }}" alt="Wotakoi">
                      </div>
                    </div>
              
                    <!-- Card Template - Skyblue -->
                    <div class="card-template card-skyblue">
                      <h3 class="card-title truncate">Attack On Titan</h3>
                      <p>Volume 1</p>
                      <div class="card-image mt-2">
                        <img src="{{ asset('/uploads/frieren.jfif') }}" alt="Attack On Titan">
                      </div>
                    </div>
              
                    <!-- Card Template - Green -->
                    <div class="card-template card-green">
                      <h3 class="card-title">Harry Potter</h3>
                      <p>Volume 1</p>
                      <div class="card-image mt-2">
                        <img src="{{ asset('/uploads/harrypotter.jfif') }}" alt="Harry Potter">
                      </div>
                    </div>
              
                    <!-- Card Template - Orange -->
                    <div class="card-template card-orange">
                      <h3 class="card-title">Wotakoi</h3>
                      <p>Volume 1</p>
                      <div class="card-image mt-2">
                        <img src="{{ asset('/uploads/heartstopper.jfif') }}" alt="Wotakoi">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
            <div class="flex justify-center items-center gap-5 mt-5">
                <a href="#review" class="border-accent border-2 bg-accent px-8 py-4 rounded-4xl flex items-center gap-1 shadow-[0_0_10px] shadow-accent font-semibold text-lg text-white">
                    Read Reviews
                </a>    
                <a href="products.html" class=" text-white px-8 py-4 rounded-4xl flex items-center gap-1 shadow-[0_0_10px] shadow-accent font-semibold text-lg bg-none border-2 border-accent">
                    See Products
                </a> 
            </div>
            
        </div>

        <!-- Review Container -->
        <div style="background: url('{{ asset('img/inspo-full.jpg') }}'); box-shadow: inset 0 0px 10px 5px rgba(0,0,0,1);"
         class="bg-cover bg-center py-5" id="review">
          <h1 class="mt-5 py-2 mb-10 text-white text-center text-3xl font-bold p-1 border-b-5 border-accent mx-auto w-fit">What our customers say</h1>

          <div class="grid grid-cols-4 px-10 gap-10">

            <!-- Revie Sample 1 -->
            <div class="w-full flex flex-col px-5">
              <h3 class="text-xl font-semibold flex items-center justify-center pb-1 gap-2 border-b-2 border-accent mb-3">
                <span class="block h-10 w-10 bg-amber-100 rounded-full"></span>
                John Vince Key</h3>
              <p class="text-accent text-3xl text-center">&#x2605;&#x2605;&#x2605;&#x2605;&#x2605;</p>
              <p>Superbook is a quality of life for me (a bookworm).
                There's no need for me to transfer store to store to find what i'm looking for.
                Overall its a big 5 stars for me.
              </p>
            </div>

            <div class="w-full flex flex-col px-5">
              <h3 class="text-xl font-semibold flex items-center justify-center pb-1 gap-2 border-b-2 border-accent mb-3">
                <span class="block h-10 w-10 bg-amber-100 rounded-full"></span>
                Lincoln</h3>
              <p class="text-accent text-3xl text-center">&#x2605;&#x2605;&#x2605;&#x2605;&#x2606;</p>
              <p>Had I not been shot at the back,
                Superbook would be my go to store. Minus 1 star for not establishing at
                my era.
              </p>
            </div>

            <div class="w-full flex flex-col">
              <h3 class="text-xl font-semibold flex items-center justify-center pb-1 gap-2 border-b-2 border-accent mb-3">
                <span class="block h-10 w-10 bg-amber-100 rounded-full"></span>
                Frieren</h3>
              <p class="text-accent text-3xl text-center">&#x2605;&#x2605;&#x2605;&#x2605;&#x2605;</p>
              <p>Superbook is rated 5 stars. Why?
                Because that's what Himmel would do.
              </p>
            </div>

            <div class="w-full flex flex-col">
              <h3 class="text-xl font-semibold flex items-center justify-center pb-1 gap-2 border-b-2 border-accent mb-3">
                <span class="block h-10 w-10 bg-amber-100 rounded-full"></span>
                Christopher</h3>
              <p class="text-accent text-3xl text-center">&#x2605;&#x2605;&#x2605;&#x2605;&#x2605;</p>
              <p>Superbook has the Attack On Titan Final Season - Final Chapter - Final Fight - Final Episode - Final Chapter
              </p>
            </div>


          </div>

        </div>
        
    </main>

    <footer class="text-center p-4 bg-neutral-800 mt-auto text-white">
  <div class="grid grid-cols-3 items-center">
    <h1 class="mr-auto pl-5">Holycoders</h1>

    <div class="flex justify-center items-center">
      <a href="" class="flex-[1] text-center border-r-1 border-neutral-900">DMCA</a>
      <a href="" class="flex-[1] text-center px-2">Terms of Service</a>
      <a href="" class="flex-[1] text-center border-l-1 border-neutral-900">Service Policy</a>
      
    </div>

    <div class="flex gap-2 ml-auto pr-5 text-3xl">
      <a href="https://github.com/yourusername" target="_blank" class="hover:text-gray-400">
        <i class="fab fa-github"></i>
      </a>
      <a href="https://instagram.com/yourusername" target="_blank" class="hover:text-pink-500">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://facebook.com/yourusername" target="_blank" class="hover:text-blue-500">
        <i class="fab fa-facebook"></i>
      </a>
      <a href="https://youtube.com/yourchannel" target="_blank" class="hover:text-red-500">
        <i class="fab fa-youtube"></i>
      </a>
    </div>

</div>

<p class="text-neutral-500 mt-2.5">&copy; Superbook 2025 | All Rights Reserved </p>
</footer>

</body>
</html>


<script>
    fetch('extension/nav.html')
      .then(res => res.text())
      .then(data => {
        document.getElementById('navbar').innerHTML = data;
        document.getElementById('nav-home').classList.add('active');

      })
      .catch(err => console.error('Error loading nav:', err));

    fetch('extension/footer.html')
      .then(res => res.text())
      .then(data => {
        document.getElementById('footer').innerHTML = data;
      })
      .catch(err => console.error('Error loading footer:', err));
</script>

<style type="text/tailwindcss">
	@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
@import 'tailwindcss';
/* In your global CSS file (e.g., styles.css) */
@tailwind utilities;



*{
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
}

.active{
  @apply font-bold;
}

button{
    @apply cursor-pointer;
}

.btn-nav{
    @apply px-4 py-2 cursor-pointer border-b-3 border-b-transparent hover:border-b-accent transition-all duration-300;
}

/* .card-template::after{
    content: '';
    position: absolute;
    border-radius: 20px;
    height: 100%;
    width: 100%;
    top: 15px;
    right: -15px;
    z-index: -1;

} */

/* Reusable card styles */
.card-template {
    @apply w-[250px] text-center px-5 py-1 rounded-2xl bg-none relative;
  }

  .card-template p{
    @apply text-accent font-semibold text-xl;
  }

  .card-title {
    @apply font-semibold text-2xl border-b-1 border-accent;
  }
  .card-image {
    @apply  shadow-[2px_2px_10px_black,2px_2px_10px_black,2px_2px_10px_black];
  }
  .card-image img {
    @apply object-cover h-[300px] w-full;
  }


.intro-container{
    background-image: url("img/inpo-minimal.png");
    background-position: center;
    background-size: cover;
}



.company-container{
    background-image: url("img/inspo-right.jpg");
    background-size: cover;
    background-position: center;
}

.review-container{
  background-image: url("img/inspo-full.jpg");
  background-size: cover;
  background-position: center;
}

@keyframes scroll {
    0% {
      transform: translateX(0%);
    }
    100% {
      transform: translateX(-50%);
    }
  }
  
  .animate-scroll {
    animation: scroll 60s linear infinite;
  }

  /* Products */

  .product-container{
    background-image: url("img/inspo-full.jpg");
    background-size: cover;
    background-position: center;
  }

  .sidebar{
    background-image: url("img/inspo-full.jpg");
    background-size: cover;
    background-position: center;
  }

  .scrollable::-webkit-scrollbar {
    width: 8px;
  }
  
  .scrollable::-webkit-scrollbar-track {
    background: transparent; /* Tailwind gray-200 */
  }
  
  .scrollable::-webkit-scrollbar-thumb {
    background-color: #fb2c36; /* Tailwind accent */
    border-radius: 6px;
  }

  /* Optional: Firefox support */
.scrollable {
  scrollbar-width: thin;
  scrollbar-color: #fb2c36 transparent; /* thumb track */
}

/* Animation for messages */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-down {
    animation: fadeInDown 0.5s ease-out forwards;
}

</style>