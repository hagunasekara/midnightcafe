<?php include 'components/header.php'; ?>
<?php include 'utils/db_connect.php'; ?>

<div class="bg-neutral-950 min-h-screen items-center">
    <div class="min-h-[80vh] flex items-center">

        <section class="flex flex-col md:flex-row max-w-7xl mx-auto my-12 px-6">

            <!-- Left side -->
            <div data-aos="fade-in" data-aos-delay="0"
                class="md:w-4/6 w-full h-auto relative md:bg-[url('assets/intro-pic-primary.jpg')] md:pr-8 flex flex-col justify-center bg-no-repeat bg-right">
                <h2 data-aos="fade-up" data-aos-delay="400" class="text-xl md:text-3xl mb-2 md:mb-4 bg-gradient-to-r from-red-600 to-red-500 bg-clip-text text-transparent italic playfair">
                    Welcome to
                </h2>
                <p data-aos="fade-up" data-aos-delay="600" class="text-5xl md:text-[10rem] leading-none font-semibold playfair text-gray-300">
                    Midnight<br />Cafe
                </p>
                <div data-aos="fade-up" data-aos-delay="1200" class="md:flex hidden justify-start mt-8 md:mt-12">
                    <svg
                        class="w-20 md:w-28 h-20 md:h-28 text-gray-600"
                        viewBox="0 0 160 160"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <path
                                id="circlePath"
                                d="M80,80 m-60,0 a60,60 0 1,1 120,0 a60,60 0 1,1 -120,0" />
                        </defs>
                        <g class="rotate-textPath">
                            <text
                                class="text-[10px] md:text-xs font-semibold fill-current text-gray-600"
                                font-size="6"
                                letter-spacing="2">
                                <textPath xlink:href="#circlePath" startOffset="0%">
                                    SCROLL DOWN • SCROLL DOWN • SCROLL DOWN •
                                </textPath>
                            </text>
                        </g>
                        <g transform="translate(80 80)">
                            <path
                                stroke="currentColor"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M-10,-5 L0,7 L10,-5"
                                fill="none" />
                        </g>
                    </svg>
                </div>
            </div>

            <!-- Right side -->
            <div class="md:w-2/6 w-full flex flex-col mt-8 md:mt-0 md:pl-16">
                <img
                    data-aos="fade-in" data-aos-delay="200"
                    src="assets/intro-pic-secondary.jpg"
                    alt="Right side image"
                    class="rounded-md shadow-md w-full h-auto" />
                <hr data-aos="fade-up" data-aos-delay="800" class="w-full border-gray-700 my-6 md:my-8" />
                <p data-aos="fade-up" data-aos-delay="800" class="text-neutral-300 text-base md:text-xl leading-relaxed">
                    Elevate your everyday with dishes inspired by passion, paired with the warm comfort of carefully curated ambiance.
                </p>
                <div data-aos="fade-up" data-aos-delay="1000" class="text-neutral-500 mt-4 md:mt-6 text-md md:text-lg flex flex-wrap gap-4">
                    <a href="#" class="hover:text-neutral-300 transition-colors duration-200 ease-in-out">
                        <p class="bg-gradient-to-r from-red-600 to-red-500 bg-clip-text text-transparent">FB</p>
                    </a>
                    <a href="#" class="hover:text-neutral-300 transition-colors duration-200 ease-in-out">
                        <p class="bg-gradient-to-r from-red-600 to-red-500 bg-clip-text text-transparent">IG</p>
                    </a>
                    <a href="#" class="hover:text-neutral-300 transition-colors duration-200 ease-in-out">
                        <p class="bg-gradient-to-r from-red-600 to-red-500 bg-clip-text text-transparent">YT</p>
                    </a>
                    <a href="#" class="hover:text-neutral-300 transition-colors duration-200 ease-in-out">
                        <p class="bg-gradient-to-r from-red-600 to-red-500 bg-clip-text text-transparent">X</p>
                    </a>
                </div>
            </div>
        </section>

    </div>
    <section class="bg-neutral-950 py-24 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-5xl mb-14 font-semibold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-red-600 to-yellow-400 playfair">
                Signature Dishes
            </h2>

            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
                <?php
                $sql = "SELECT title, description, src FROM signature";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                        $image = htmlspecialchars($row['src']);
                        $title = htmlspecialchars($row['title']);
                        $desc = htmlspecialchars($row['description']);
                ?>
                        <div class="relative rounded-3xl overflow-hidden group shadow-xl bg-neutral-900/60 backdrop-blur border border-white/10">
                            <img
                                src="assets/dish/<?php echo $image; ?>"
                                alt="<?php echo $title; ?>"
                                class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500" />

                            <!-- Icon -->
                            <div class="absolute top-4 right-4 bg-white/10 p-2 rounded-full backdrop-blur group-hover:scale-110 transition">
                                <svg class="w-5 h-5 text-green-100 opacity-80" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>

                            <div class="p-6 text-left">
                                <h3 class="text-2xl font-semibold text-white mb-2"><?php echo $title; ?></h3>
                                <p class="text-neutral-400 text-sm leading-relaxed"><?php echo $desc; ?></p>
                            </div>
                        </div>
                <?php
                    endwhile;
                else:
                    echo "<p class='text-white col-span-full'>No signature dishes found.</p>";
                endif;

                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <section class="bg-neutral-950 text-white py-24 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-14 items-center">
            <!-- Image -->
            <div class="relative group">
                <img
                    src="assets/about-pic-primary.jpg"
                    alt="Our Story"
                    class="w-full h-auto rounded-3xl shadow-2xl object-cover transition-transform duration-700 group-hover:scale-105" />
                <!-- Glow -->
                <div class="absolute -inset-2 rounded-3xl bg-gradient-to-tr from-amber-400/10 to-fuchsia-500/10 blur-lg opacity-30 group-hover:opacity-50 transition-all duration-700"></div>
            </div>

            <!-- Content -->
            <div>
                <h2 class="text-5xl font-semibold tracking-tight text-transparent mb-6 bg-clip-text bg-gradient-to-r from-pink-500 via-red-600 to-yellow-400 playfair">Our Story</h2>
                <p class="text-neutral-400 text-lg leading-relaxed tracking-wide">
                    Midnight Café isn’t just a restaurant — it’s a soulful retreat for those who savor the night. Born from a passion for flavors and ambiance, we craft dishes that comfort, surprise, and linger in memory long after the last bite.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-neutral-950 py-24 text-center text-white relative overflow-hidden">
        <!-- Glow -->
        <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-[500px] h-[500px] bg-red-500/10 blur-3xl rounded-full pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl mx-auto px-6">
            <h2 class="text-5xl font-semibold playfair mb-6 leading-tight tracking-tight">
                Reserve Your Table
            </h2>
            <p class="text-neutral-400 text-lg mb-10">
                From intimate dinners to unforgettable celebrations — we’ll craft the perfect atmosphere.
            </p>

            <a href="contact.php"
                class="inline-block px-8 py-4 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-full text-lg font-medium shadow-lg transition-all duration-500 bg-[length:200%_200%] bg-left hover:bg-right">
                Book Now
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