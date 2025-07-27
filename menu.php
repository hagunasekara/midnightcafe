<?php include 'components/header.php'; ?>

<?php
require_once 'utils/db_connect.php';

$menuItems = [];

$sql = "SELECT title, description, price, rating, img, category FROM menu";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuItems[] = [
            'name' => $row['title'],
            'description' => $row['description'],
            'price' => (int) $row['price'],
            'rating' => (float) $row['rating'],
            'category' => $row['category'],
            'image' => 'assets/menu/' . $row['img']
        ];
    }
} else {
    echo "No menu items found.";
}
?>


<div data-aos="fade-in" data-aos-delay="300" class="bg-neutral-950 min-h-screen text-white font-sans py-24 px-6">
    <div class="max-w-7xl mx-auto text-center mb-12">
        <h1 class="text-5xl font-semibold playfair tracking-tight mb-4">
            Explore Our <span class="text-red-600">Menu</span>
        </h1>
        <p class="text-neutral-400 text-lg max-w-2xl mx-auto">
            Handcrafted dishes to satisfy every midnight craving.
        </p>
    </div>

    <!-- Categories -->
    <div class="flex justify-center flex-wrap gap-4 mb-8">
        <?php
        $categories = ['All', 'Mains', 'Drinks', 'Desserts'];
        foreach ($categories as $cat): ?>
            <button data-category="<?= $cat ?>"
                class="category-btn bg-neutral-800 text-white px-4 py-2 rounded-full hover:bg-red-600 transition duration-300">
                <?= $cat ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Sorting -->
    <div class="flex justify-center gap-4 mb-10 flex-wrap">
        <button data-sort="price-high"
            class="sort-btn bg-neutral-800 px-4 py-2 rounded-full text-sm hover:bg-red-600 transition">
            Price: High to Low
        </button>
        <button data-sort="price-low"
            class="sort-btn bg-neutral-800 px-4 py-2 rounded-full text-sm hover:bg-red-600 transition">
            Price: Low to High
        </button>
        <button data-sort="rating-high"
            class="sort-btn bg-neutral-800 px-4 py-2 rounded-full text-sm hover:bg-red-600 transition">
            Rating: High to Low
        </button>
        <button data-sort="rating-low"
            class="sort-btn bg-neutral-800 px-4 py-2 rounded-full text-sm hover:bg-red-600 transition">
            Rating: Low to High
        </button>
    </div>

    <!-- Menu Items -->
    <div id="menu-grid"
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 max-w-6xl mx-auto transition-all duration-500">
        <?php foreach ($menuItems as $item): ?>
            <div class="menu-item group bg-neutral-900/60 backdrop-blur border border-white/10 rounded-3xl menu-item opacity-100 scale-100 transition-all duration-300 shadow-lg overflow-hidden"
                data-category="<?= $item['category'] ?>"
                data-price="<?= $item['price'] ?>"
                data-rating="<?= $item['rating'] ?>">
                <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="w-full h-56 object-cover group-hover:scale-105 transition duration-300">
                <div class="p-6 space-y-3">
                    <h3 class="text-2xl font-semibold"><?= $item['name'] ?></h3>
                    <p class="text-neutral-400 text-sm"><?= $item['description'] ?></p>
                    <div class="flex justify-between items-center text-sm text-neutral-300">
                        <span class="text-red-500 font-bold">Rs. <?= $item['price'] ?></span>
                        <span>⭐ <?= $item['rating'] ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    const categoryButtons = document.querySelectorAll('.category-btn');
    const sortButtons = document.querySelectorAll('.sort-btn');
    const items = [...document.querySelectorAll('.menu-item')];
    const grid = document.getElementById('menu-grid');
    let activeCategory = 'All';
    let activeSort = null;

    categoryButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            categoryButtons.forEach(b => b.classList.remove('bg-red-600'));
            btn.classList.add('bg-red-600');

            activeCategory = btn.dataset.category;
            filterItems();

            if (activeSort) {
                sortButtons.forEach(b => b.classList.remove('bg-red-600'));
                activeSort = null;
            }
        });
    });

    sortButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            sortButtons.forEach(b => b.classList.remove('bg-red-600'));
            btn.classList.add('bg-red-600');

            activeSort = btn.dataset.sort;
            sortItems(activeSort);
        });
    });

    function filterItems() {
        items.forEach(item => {
            const itemCat = item.dataset.category;
            if (activeCategory === 'All' || itemCat === activeCategory) {
                item.style.display = 'block';
                requestAnimationFrame(() => {
                    item.classList.remove('opacity-0', 'scale-95');
                    item.classList.add('opacity-100', 'scale-100');
                });
            } else {
                item.classList.remove('opacity-100', 'scale-100');
                item.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
    }

    function sortItems(type) {
        const visibleItems = items.filter(item => item.style.display !== 'none');

        visibleItems.forEach(item => {
            item.classList.remove('opacity-100', 'scale-100');
            item.classList.add('opacity-0', 'scale-95');
        });

        setTimeout(() => {
            const key = type.includes('price') ? 'price' : 'rating';
            const order = type.includes('low') ? 1 : -1;

            visibleItems.sort((a, b) => {
                const aVal = parseFloat(a.dataset[key]);
                const bVal = parseFloat(b.dataset[key]);
                return order * (aVal - bVal);
            });

            visibleItems.forEach(item => grid.appendChild(item));

            visibleItems.forEach(item => {
                item.classList.remove('opacity-0', 'scale-95');
                item.classList.add('opacity-100', 'scale-100');
            });
        }, 250);
    }

    document.querySelector('.category-btn[data-category="All"]').classList.add('bg-red-600');
</script>

<script>
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('contextmenu', e => e.preventDefault());
        img.draggable = false;
    });
</script>
<?php include 'components/footer.php'; ?>