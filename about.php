<?php include 'components/header.php'; ?>

<div class="bg-neutral-950 min-h-screen text-white font-sans relative overflow-hidden">
    <!-- Glow  -->
    <div class="hidden md:block absolute top-60 left-20 transform -translate-x-1/2 w-[400px] h-[400px] bg-red-500/10 blur-2xl rounded-full pointer-events-none z-0"></div>

    <!-- Hero Section -->
    <section class="py-20 sm:py-24 px-4 sm:px-6 relative">
        <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="space-y-8 max-w-xl mx-auto md:mx-0 text-center md:text-left">
                <h1 data-aos="fade-in" data-aos-delay="300" class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight tracking-tight playfair">
                    About <span class="bg-gradient-to-r from-red-600 via-pink-500 to-yellow-400 bg-clip-text text-transparent">MidnightCafe</span>
                </h1>
                <p data-aos="fade-in" data-aos-delay="300" class="text-neutral-400 text-base sm:text-lg md:text-xl leading-relaxed">
                    MidnightCafe is a nocturnal escape, where carefully crafted flavors meet moody vibes. We blend art, ambiance, and culinary mastery to create unforgettable nights.
                </p>
                <a data-aos="fade-up" data-aos-delay="600" href="contact.php"
                    class="inline-block px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-red-600 to-red-500 bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-500 ease-in-out text-white rounded-full text-base sm:text-lg font-medium shadow-lg">
                    Reserve Your Table
                </a>
            </div>

            <div data-aos="fade-in" data-aos-delay="100" class="relative rounded-3xl overflow-hidden shadow-2xl max-h-[400px] sm:max-h-[450px]">
                <img src="assets/about-hero.jpg"
                    alt="About MidnightCafe"
                    class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700 ease-in-out"
                    loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent pointer-events-none"></div>
            </div>
        </div>
    </section>

    <!-- Philosophy -->
    <section class="py-20 sm:py-24 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto text-center space-y-8">
            <h2 class="text-4xl sm:text-5xl font-semibold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-red-600 to-yellow-400 playfair">
                Our Philosophy
            </h2>
            <p class="text-neutral-400 text-base sm:text-lg md:text-xl max-w-3xl mx-auto leading-relaxed tracking-wide">
                We combine innovation with tradition — crafting unique flavors using ethically sourced ingredients and serving them in a moody, intimate atmosphere designed to inspire and delight.
            </p>
            <div class="mt-12 flex flex-wrap justify-center gap-6 text-xs sm:text-sm font-semibold uppercase tracking-widest text-red-500">
                <span class="hover:text-yellow-400 cursor-pointer transition">Sustainability</span>
                <span class="hover:text-yellow-400 cursor-pointer transition">Innovation</span>
                <span class="hover:text-yellow-400 cursor-pointer transition">Community</span>
                <span class="hover:text-yellow-400 cursor-pointer transition">Experience</span>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 sm:py-24 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl sm:text-5xl font-semibold playfair text-white text-center mb-16 sm:mb-20 tracking-tight">
                Meet the <span class="text-red-600">Team</span>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 sm:gap-12 md:gap-16">
                <?php
                require_once "utils/db_connect.php";

                $sql = "SELECT name, role, image FROM team";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <div class="bg-neutral-900/60 backdrop-blur border border-white/10 rounded-3xl p-6 flex flex-col items-center shadow-lg transition-transform duration-300 hover:scale-105 text-center md:mx-0 mx-10">
                                <img src="assets/team/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '" class="w-32 h-32 sm:w-36 sm:h-36 rounded-full object-cover ring-4 ring-red-600 shadow-lg mb-4 sm:mb-6" loading="lazy" />
                                <h3 class="text-xl sm:text-2xl font-semibold mb-1">' . htmlspecialchars($row['name']) . '</h3>
                                <p class="text-red-500 uppercase tracking-widest font-semibold text-xs sm:text-sm italic">' . htmlspecialchars($row['role']) . '</p>
                            </div>';
                    }
                } else {
                    echo '<p class="text-white text-center col-span-full">No team members found.</p>';
                }
                ?>

            </div>
        </div>
    </section>

    <!-- Last -->
    <section class="py-20 sm:py-24 px-20 md:px-4 sm:px-6 relative text-center bg-neutral-950">
        <!-- Glow -->
        <div class="absolute -bottom-10 right-1/2 transform translate-x-1/2 w-[250px] sm:w-[400px] h-[250px] sm:h-[400px] bg-yellow-500/10 blur-3xl rounded-full pointer-events-none"></div>

        <div class="relative z-10 max-w-5xl mx-auto">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4 sm:mb-6 playfair tracking-tight drop-shadow-lg">
                Experience MidnightCafe Like Never Before
            </h2>
            <p class="text-white/90 max-w-xl mx-auto mb-8 sm:mb-10 text-sm sm:text-base leading-relaxed">
                Book your table now and immerse yourself in a sensory feast of modern cuisine and ambient vibes.
            </p>
            <a href="contact.php"
                class="inline-block px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-red-600 to-red-500 bg-[length:200%_200%] bg-left hover:bg-right transition-all duration-500 ease-in-out text-white rounded-full text-base sm:text-lg font-medium shadow-lg">
                Reserve Your Table
            </a>
        </div>
    </section>
</div>
<script>
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('contextmenu', e => e.preventDefault());
        img.draggable = false;
    });
</script>

<?php include 'components/footer.php'; ?>