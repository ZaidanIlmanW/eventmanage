<header class="bg-gray-100 text-gray-800 shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo/Title -->
        <h1 class="text-2xl font-bold">Smecone</h1>
        
        <!-- Navbar -->
        <nav class="hidden md:flex space-x-6">
            <a href="{{ url('/home') }}" class="text-gray-800 hover:text-gray-500 transition">Home</a>
            <a href="{{ url('/acara') }}" class="text-gray-800 hover:text-gray-500 transition">Events</a>
            <a href="{{ url('/about') }}" class="text-gray-800 hover:text-gray-500 transition">About</a>
            <a href="{{ url('/contact') }}" class="text-gray-800 hover:text-gray-500 transition">Contact</a>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="md:hidden text-gray-800 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-200">
        <nav class="flex flex-col space-y-2 p-4">
            <a href="{{ url('/home') }}" class="text-gray-800 hover:bg-gray-300 rounded-md p-2 transition">Home</a>
            <a href="{{ url('/events') }}" class="text-gray-800 hover:bg-gray-300 rounded-md p-2 transition">Events</a>
            <a href="{{ url('/about') }}" class="text-gray-800 hover:bg-gray-300 rounded-md p-2 transition">About</a>
            <a href="{{ url('/contact') }}" class="text-gray-800 hover:bg-gray-300 rounded-md p-2 transition">Contact</a>
        </nav>
    </div>
</header>

<script>
    // Toggle mobile menu
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
