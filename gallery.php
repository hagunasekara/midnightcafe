<?php include 'components/header.php'; ?>
<?php
require_once 'utils/db_connect.php';

$galleryImages = [];

$sql = "SELECT name, src FROM gallery";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $galleryImages[] = [
            'src' => 'assets/gallery/' . $row['src'],
            'alt' => $row['name']
        ];
    }
}
?>


<div data-aos="fade-in" data-aos-delay="300" class="bg-neutral-950 min-h-screen text-white font-sans px-6 py-24">

    <h1 class="text-6xl font-extrabold playfair mb-16 max-w-7xl mx-auto text-center tracking-tight">
        MidnightCafe <span class="text-red-600">Gallery</span>
    </h1>

    <div id="galleryGrid" class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php

        foreach ($galleryImages as $index => $img) {
            echo '
            <div class="relative overflow-hidden rounded-3xl shadow-lg cursor-pointer group" data-index="' . $index . '">
                <img
                    src="' . htmlspecialchars($img['src']) . '"
                    alt="' . htmlspecialchars($img['alt']) . '"
                    loading="lazy"
                    class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105"
                />
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <p class="text-white text-lg font-semibold">' . $img['alt'] . '</p>
                </div>
            </div>';
        }
        ?>
    </div>



</div>
<script>
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('contextmenu', e => e.preventDefault());
        img.draggable = false;
    });
</script>
<script>
    const modal = document.createElement('div');
    const modalImg = document.createElement('img');
    const closeBtn = document.createElement('button');
    const nextBtn = document.createElement('button');
    const prevBtn = document.createElement('button');

    Object.assign(modal.style, {
        position: 'fixed',
        top: '0',
        left: '0',
        width: '100vw',
        height: '100vh',
        backgroundColor: 'rgba(0,0,0,0.9)',
        display: 'none',
        justifyContent: 'center',
        alignItems: 'center',
        flexDirection: 'column',
        zIndex: '9999',
        cursor: 'default',
        userSelect: 'none',
    });

    Object.assign(modalImg.style, {
        maxWidth: '50vw',
        maxHeight: '40vh',
        borderRadius: '12px',
        boxShadow: '0 0 15px rgba(255,255,255,0.3)',
        marginBottom: '10px',
    });

    const btnCommonStyles = {
        backgroundColor: 'rgba(255, 255, 255, 0.5)',
        border: 'none',
        color: 'black',
        padding: '10px 20px',
        margin: '5px',
        borderRadius: '6px',
        cursor: 'pointer',
        fontSize: '16px',
        transition: 'background-color 0.3s',
        userSelect: 'none',
    };

    function applyBtnStyles(btn) {
        Object.assign(btn.style, btnCommonStyles);
        btn.onmouseenter = () => btn.style.backgroundColor = 'rgba(255, 255, 255, 0.9)';
        btn.onmouseleave = () => btn.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
    }

    // Setup buttons
    closeBtn.textContent = 'Close';
    nextBtn.textContent = 'Next ›';
    prevBtn.textContent = '‹ Prev';

    applyBtnStyles(closeBtn);
    applyBtnStyles(nextBtn);
    applyBtnStyles(prevBtn);

    const btnContainer = document.createElement('div');
    Object.assign(btnContainer.style, {
        display: 'flex',
        justifyContent: 'center',
        width: '100%',
        maxWidth: '90vw',
    });

    btnContainer.appendChild(prevBtn);
    btnContainer.appendChild(closeBtn);
    btnContainer.appendChild(nextBtn);

    modal.appendChild(modalImg);
    modal.appendChild(btnContainer);
    document.body.appendChild(modal);

    const galleryGrid = document.getElementById('galleryGrid');
    const images = Array.from(galleryGrid.querySelectorAll('img'));
    let currentIndex = -1;

    function openModal(index) {
        currentIndex = index;
        modalImg.src = images[currentIndex].src;
        modalImg.alt = images[currentIndex].alt;
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    function showNext() {
        if (images.length === 0) return;
        currentIndex = (currentIndex + 1) % images.length;
        modalImg.src = images[currentIndex].src;
        modalImg.alt = images[currentIndex].alt;
    }

    function showPrev() {
        if (images.length === 0) return;
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        modalImg.src = images[currentIndex].src;
        modalImg.alt = images[currentIndex].alt;
    }


    galleryGrid.addEventListener('click', (e) => {
        if (window.innerWidth < 768) return;

        if (e.target.tagName === 'IMG' && e.target.closest('#galleryGrid')) {
            const idx = images.indexOf(e.target);
            if (idx !== -1) openModal(idx);
        }
    });


    closeBtn.addEventListener('click', closeModal);
    nextBtn.addEventListener('click', showNext);
    prevBtn.addEventListener('click', showPrev);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    document.addEventListener('keydown', (e) => {
        if (modal.style.display === 'flex') {
            if (e.key === 'Escape') closeModal();
            else if (e.key === 'ArrowRight') showNext();
            else if (e.key === 'ArrowLeft') showPrev();
        }
    });
</script>



<?php include 'components/footer.php'; ?>