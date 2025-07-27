<!-- header.php -->
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Midnight Cafe</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Your custom CSS -->
    <link rel="stylesheet" href="css/styles.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
</head>

<body class="bg-neutral-950 text-white select-none">
    <!-- Desktop Header -->
    <header data-aos="fade-in" data-aos-delay="500" class="sticky top-5 mx-20 z-50 rounded-3xl bg-neutral-950/70 backdrop-blur-xl hidden md:block">
        <div class="container mx-auto flex flex-wrap items-center justify-between px-6 md:px-10 py-6">
            <!-- Logo -->
            <a href="index.php" class="mb-4 md:mb-0">
                <h1 class="text-2xl md:text-3xl font-semibold playfair text-gray-300">MidnightCafe.</h1>
            </a>

            <!-- Navigation -->
            <nav class="flex flex-wrap gap-4 md:gap-6 text-sm md:text-base font-medium text-neutral-100">
                <a href="index.php" class="<?= $currentPage === 'index.php' ? 'text-red-500' : 'hover:text-neutral-100' ?> transition duration-200 ease-in-out">Home</a>
                <a href="about.php" class="<?= $currentPage === 'about.php' ? 'text-red-500' : 'hover:text-neutral-100' ?> transition duration-200 ease-in-out">About</a>
                <a href="menu.php" class="<?= $currentPage === 'menu.php' ? 'text-red-500' : 'hover:text-neutral-100' ?> transition duration-200 ease-in-out">Menu</a>
                <a href="gallery.php" class="<?= $currentPage === 'gallery.php' ? 'text-red-500' : 'hover:text-neutral-100' ?> transition duration-200 ease-in-out">Gallery</a>
                <a href="contact.php" class="<?= $currentPage === 'contact.php' ? 'text-red-500' : 'hover:text-neutral-100' ?> transition duration-200 ease-in-out">Contact</a>
            </nav>

            <!-- Call Button -->
            <a href="tel:0765567866"
                class="mt-4 sm:mt-0 ml-auto sm:ml-8 bg-gradient-to-r from-red-600 to-red-500 bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-500 ease-in-out px-4 sm:px-6 py-2 sm:py-2.5 rounded-full text-sm sm:text-base flex items-center gap-2 text-white shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 5a2 2 0 012-2h1.58a1 1 0 01.94.66l1.25 3.32a1 1 0 01-.21 1.05l-1.23 1.23a16 16 0 006.36 6.36l1.23-1.23a1 1 0 011.05-.21l3.32 1.25a1 1 0 01.66.94V19a2 2 0 01-2 2h-1c-9.39 0-17-7.61-17-17V5z" />
                </svg>
                <span class="hidden sm:inline">076-556-7866</span>
            </a>
        </div>
    </header>

    <!-- Mobile Header -->
    <header class="sticky top-5 z-50 mx-5 bg-neutral-950/50 rounded-2xl backdrop-blur-3xl flex items-center justify-between px-6 py-4 md:hidden">
        <!-- Logo -->
        <a href="#" class="">
            <h1 class="text-2xl font-semibold playfair text-gray-300">MidnightCafe.</h1>
        </a>

        <!-- Hamburger Button -->
        <button id="mobileMenuBtn" aria-label="Open menu" class="text-gray-300 hover:text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <!-- Mobile Menu (hidden by default) -->
    <nav id="mobileMenu" class="fixed inset-0 px-5 bg-neutral-950/70 backdrop-blur-xl z-50 transform -translate-x-full transition-transform duration-300 md:hidden">
        <div class="flex flex-col p-6 space-y-6 text-white">
            <button id="closeMobileMenuBtn" aria-label="Close menu" class="self-end text-3xl font-bold hover:text-red-600">×</button>
            <a href="index.php" class="text-2xl font-semibold <?= $currentPage === 'index.php' ? 'text-red-500' : 'hover:text-red-600' ?>">Home</a>
            <a href="about.php" class="text-2xl font-semibold <?= $currentPage === 'about.php' ? 'text-red-500' : 'hover:text-red-600' ?>">About</a>
            <a href="menu.php" class="text-2xl font-semibold <?= $currentPage === 'menu.php' ? 'text-red-500' : 'hover:text-red-600' ?>">Menu</a>
            <a href="gallery.php" class="text-2xl font-semibold <?= $currentPage === 'gallery.php' ? 'text-red-500' : 'hover:text-red-600' ?>">Gallery</a>
            <a href="contact.php" class="text-2xl font-semibold <?= $currentPage === 'contact.php' ? 'text-red-500' : 'hover:text-red-600' ?>">Contact</a>

            <!-- Optional call button in mobile menu -->
            <a href="tel:0765567866" class="mt-6 inline-block bg-gradient-to-r from-red-600 to-red-500 px-6 py-3 rounded-full text-white text-center font-semibold shadow-md hover:brightness-110 transition">
                Call 076-556-7866
            </a>
        </div>
    </nav>


    <!-- Page Loader -->
    <div id="page-loader"
        class="fixed inset-0 bg-neutral-950 flex flex-col items-center justify-center z-[9999] transition-opacity duration-500">

        <!-- Logo Text -->
        <h1 class="text-5xl md:text-9xl font-semibold playfair text-gray-300">
            MidnightCafe.
        </h1>

        <!-- Optional subtitle or loading text -->
        <p class="mt-5 md:mt-20 text-neutral-400 text-xs tracking-wider uppercase">Loading...</p>
    </div>



    <script>
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('contextmenu', e => e.preventDefault());
            img.draggable = false;
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMobileMenuBtn = document.getElementById('closeMobileMenuBtn');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.style.transform = 'translateX(0)';
        });

        closeMobileMenuBtn.addEventListener('click', () => {
            mobileMenu.style.transform = 'translateX(-100%)';
        });

        // Optional: close menu on link click (improve UX)
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.style.transform = 'translateX(-100%)';
            });
        });


        window.addEventListener('load', () => {
            const loader = document.getElementById('page-loader');
            loader.classList.add('opacity-0');
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500);
        });

        document.querySelectorAll('a[href]').forEach(link => {
            const isInternal = link.hostname === window.location.hostname;

            if (isInternal) {
                link.addEventListener('click', (e) => {
                    if (link.target === "_blank" || e.metaKey || e.ctrlKey) return;
                    e.preventDefault();

                    const loader = document.getElementById('page-loader');
                    loader.style.display = 'flex';
                    loader.classList.remove('opacity-0');

                    setTimeout(() => {
                        window.location.href = link.href;
                    }, 300);
                });
            }
        });
    </script>


</body>