<?php include 'components/header.php'; ?>
<?php
include 'utils/db_connect.php';

$toastMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $subject && $message) {
        $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, msg) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            $toastMessage = "Message sent successfully!";
        } else {
            $toastMessage = "Error sending message: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $toastMessage = "Please fill in all fields correctly.";
    }
    $conn->close();
}
?>

<div data-aos="fade-in" data-aos-delay="300" class="bg-neutral-950 min-h-screen text-white font-sans px-6 py-24 max-w-7xl mx-auto">

    <h1 class="text-6xl font-extrabold playfair mb-16 text-center tracking-tight">
        Get in <span class="text-red-600">Touch</span>
    </h1>

    <div class="grid md:grid-cols-2 gap-16">

        <!-- Contact Form -->
        <div class="bg-neutral-900/60 backdrop-blur-md rounded-3xl p-10 shadow-lg">
            <form action="" method="POST" class="space-y-8">
                <div>
                    <label for="name" class="block mb-2 text-lg font-semibold">Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 rounded-lg bg-neutral-800 border border-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition"
                        placeholder="Your full name" />
                </div>

                <div>
                    <label for="email" class="block mb-2 text-lg font-semibold">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-3 rounded-lg bg-neutral-800 border border-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition"
                        placeholder="your.email@example.com" />
                </div>

                <div>
                    <label for="subject" class="block mb-2 text-lg font-semibold">Subject</label>
                    <input type="text" id="subject" name="subject" required
                        class="w-full px-4 py-3 rounded-lg bg-neutral-800 border border-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition"
                        placeholder="Subject of your message" />
                </div>

                <div>
                    <label for="message" class="block mb-2 text-lg font-semibold">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full px-4 py-3 rounded-lg bg-neutral-800 border border-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition resize-none"
                        placeholder="Write your message here..."></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-red-600 to-red-500 bg-[length:200%_200%] bg-left text-white py-4 rounded-full text-lg font-semibold shadow-lg hover:bg-right transition-all duration-700 ease-in-out">
                    Send Message
                </button>


            </form>
        </div>

        <!-- Info Section -->
        <div class="space-y-12 text-neutral-300">
            <div>
                <h2 class="text-3xl font-extrabold text-white mb-6 playfair">Contact Info</h2>
                <ul class="space-y-4 text-lg">
                    <li class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 0v8a2 2 0 002 2h14a2 2 0 002-2v-8" />
                        </svg>
                        <a href="mailto:contact@midnightcafe.com" class="hover:text-red-600 transition">contact@midnightcafe.com</a>
                    </li>
                    <li class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h1.58a1 1 0 01.94.66l1.25 3.32a1 1 0 01-.21 1.05l-1.23 1.23a16 16 0 006.36 6.36l1.23-1.23a1 1 0 011.05-.21l3.32 1.25a1 1 0 01.66.94V19a2 2 0 01-2 2h-1c-9.39 0-17-7.61-17-17V5z" />
                        </svg>
                        <a href="tel:+94765567866" class="hover:text-red-600 transition">076-556-7866</a>
                    </li>
                    <li class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.104-.896-2-2-2s-2 .896-2 2 .896 2 2 2 2-.896 2-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v8m0 0v8m0-8h8m-8 0H4" />
                        </svg>
                        <span>123 Midnight Street, Night City</span>
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="text-3xl font-extrabold text-white mb-6 playfair">Follow Us</h2>
                <div class="flex space-x-8 text-red-600">
                    <a href="#" aria-label="Facebook" class="hover:text-sky-400 transition">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5 3.657 9.128 8.438 9.876v-6.987H7.898v-2.89h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 17 22 12z" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="hover:text-pink-500 transition">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm0 2h10c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3zm5 3.5a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9zm0 2a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm4.5-3.5a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Twitter" class="hover:text-sky-400 transition">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 19c7 0 10.8-5.8 10.8-10.8v-.5A7.8 7.8 0 0 0 22 4.5a7.53 7.53 0 0 1-2.3.6A4 4 0 0 0 21.3 3a7.66 7.66 0 0 1-2.5 1A3.97 3.97 0 0 0 11 6a11.3 11.3 0 0 1-8.2-4.2 4 4 0 0 0 1.3 5.3A4 4 0 0 1 2 6v.1a4 4 0 0 0 3.2 3.9 3.9 3.9 0 0 1-1.8.1 4 4 0 0 0 3.7 2.8 8 8 0 0 1-5.1 1.8A7.9 7.9 0 0 1 2 17a11.3 11.3 0 0 0 6 1.8" />
                        </svg>
                    </a>
                    <a href="#" aria-label="YouTube" class="hover:text-red-100 transition">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.6 7.2a2.3 2.3 0 0 0-1.6-1.6C16.3 5.3 12 5.3 12 5.3s-4.3 0-5.9.3a2.3 2.3 0 0 0-1.6 1.6A23.7 23.7 0 0 0 4 12a23.7 23.7 0 0 0 .5 4.8 2.3 2.3 0 0 0 1.6 1.6c1.6.3 5.9.3 5.9.3s4.3 0 5.9-.3a2.3 2.3 0 0 0 1.6-1.6A23.7 23.7 0 0 0 20 12a23.7 23.7 0 0 0-.4-4.8zM10 15.5v-7l6 3.5-6 3.5z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Map -->
            <div>
                <h2 class="text-3xl font-extrabold text-white mb-6 playfair">Find Us</h2>
                <div class="w-full aspect-[16/9] rounded-3xl overflow-hidden shadow-lg border border-red-600">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8290236746875!2d79.88494987399538!3d6.91103701854063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259c4933a50d1%3A0x3fce10c2e896c4c4!2sNIBM%20School%20of%20Business!5e0!3m2!1sen!2slk!4v1753612421357!5m2!1sen!2slk"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="rounded-3xl">
                    </iframe>
                </div>
            </div>
        </div>

    </div>

</div>

<div id="toast" style="
    visibility: hidden;
    min-width: 250px;
    background-color: #333;
    color: white;
    text-align: center;
    border-radius: 8px;
    padding: 16px;
    position: fixed;
    z-index: 9999;
    top: 20px;
    right: 20px;
    font-size: 17px;
    transform: translateX(-50%);
    transition: visibility 0s, opacity 0.5s ease-in-out;
    opacity: 0;
">
    <?= htmlspecialchars($toastMessage) ?>
</div>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const toast = document.getElementById('toast');
        if (toast.textContent.trim() !== '') {
            toast.style.visibility = 'visible';
            toast.style.opacity = '1';
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.visibility = 'hidden';
            }, 3500);
        }
    });
</script>
<script>
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('contextmenu', e => e.preventDefault());
        img.draggable = false;
    });
</script>


<?php include 'components/footer.php'; ?>