<header class="bg-black text-white sticky top-0 z-50" x-data="{ menuOpen: false }">
    <div class="container mx-auto flex justify-between items-center p-2 sm:p-4">
    <!-- Logo -->
        <div>
            <a href="/">
                <img src="/assets/logo.png" alt="Logo" class="h-8 sm:h-10" />
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-6">
            <ul class="flex items-center space-x-6">
                <li><a href="/" class="hover:text-gray-300 transition">Home</a></li>
                <li><a href="/films" class="hover:text-gray-300 transition">Films</a></li>
                <li><a href="/games" class="hover:text-gray-300 transition">Games</a></li>
            </ul>
        </nav>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button
                @click="menuOpen = !menuOpen"
                class="text-white focus:outline-none">
                <!-- Icono de hamburguesa -->
                <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <!-- Icono de cerrar (X) -->
                <svg x-show="menuOpen" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div
        x-show="menuOpen"
        @click.away="menuOpen = false"
        @keydown.escape="menuOpen = false"
        class="md:hidden bg-gray-800 text-white transition-all duration-300"
        :class="{ 'max-h-screen': menuOpen, 'max-h-0': !menuOpen }">
        <nav class="flex flex-col space-y-4 p-4">
            <a href="/" class="hover:text-gray-300 transition">Home</a>
            <a href="/films" class="hover:text-gray-300 transition">Films</a>
            <a href="/games" class="hover:text-gray-300 transition">Games</a>
        </nav>
    </div>
</header>
