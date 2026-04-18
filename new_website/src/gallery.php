<?php
header('Content-Type: text/html; charset=utf-8');
// Завантаження даних галереї
$photos = include 'data/gallery.php';
?>
<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея | Банька "Легкий Пар"</title>
    <meta name="description"
        content="Фотогалерея лазні 'Легкий Пар': інтер'єр, парна, басейн, зона відпочинку та наші страви. Перегляньте атмосферу справжнього відпочинку.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Podkova:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F9B162',
                        primaryDark: '#e59d4f',
                        accent: {
                            sage: '#8ba888',
                            forest: '#2d5a27',
                            cyan: '#4fb0c6',
                        },
                        earth: {
                            terracotta: '#c85e43',
                            cedar: '#5e3a2f',
                        },
                        surface: {
                            cream: '#fdfbf7',
                            charcoal: '#2c2c2c',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Podkova', 'serif'],
                    },
                    boxShadow: {
                        'soft': '0 10px 40px -10px rgba(94, 58, 47, 0.15)',
                        'glow': '0 0 20px rgba(249, 177, 98, 0.5)',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #F9B162;
            color: #2c2c2c;
        }

        .heading-shadow {
            text-shadow: 2px 2px 0px rgba(253, 251, 247, 0.8),
                4px 4px 6px rgba(94, 58, 47, 0.1);
        }

        /* Плавна поява фото */
        .gallery-item {
            opacity: 0;
            transform: translateY(16px) scale(0.97);
            animation: galleryReveal 0.4s ease-out forwards;
        }

        @keyframes galleryReveal {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Stagger delays */
        .gallery-item:nth-child(1) { animation-delay: 0.03s; }
        .gallery-item:nth-child(2) { animation-delay: 0.08s; }
        .gallery-item:nth-child(3) { animation-delay: 0.13s; }
        .gallery-item:nth-child(4) { animation-delay: 0.18s; }
        .gallery-item:nth-child(5) { animation-delay: 0.23s; }
        .gallery-item:nth-child(6) { animation-delay: 0.28s; }
        .gallery-item:nth-child(7) { animation-delay: 0.33s; }
        .gallery-item:nth-child(8) { animation-delay: 0.38s; }
        .gallery-item:nth-child(9) { animation-delay: 0.43s; }
        .gallery-item:nth-child(10) { animation-delay: 0.48s; }
        .gallery-item:nth-child(11) { animation-delay: 0.53s; }
        .gallery-item:nth-child(12) { animation-delay: 0.58s; }
        .gallery-item:nth-child(n+13) { animation-delay: 0.6s; }

        /* Лайтбокс */
        .lightbox-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.92);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .lightbox-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        .lightbox-overlay img {
            max-width: 90vw;
            max-height: 85vh;
            border-radius: 1rem;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.6);
            transform: scale(0.9);
            transition: transform 0.35s ease;
        }

        .lightbox-overlay.active img {
            transform: scale(1);
        }
    </style>
</head>

<body class="antialiased">

    <!-- ============================================ -->
    <!-- Стійка навігація (Sticky Navigation) -->
    <!-- ============================================ -->
    <nav
        class="fixed w-full z-50 bg-surface-cream/90 backdrop-blur-md border-b border-primary/30 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Логотип -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="index.php" class="flex gap-3 items-center">
                        <div
                            class="w-12 h-12 rounded-full bg-primary flex items-center justify-center shadow-glow overflow-hidden">
                            <img src="images/Legkiy_Par_Logo_Small.png" alt="Легкий Пар Лого"
                                class="w-full h-full object-cover"
                                onerror="this.style.display='none'">
                        </div>
                        <span class="font-display font-bold text-2xl text-earth-cedar tracking-wide">Легкий Пар</span>
                    </a>
                </div>

                <!-- Десктоп Меню -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="prices.php"
                        class="text-surface-charcoal hover:text-earth-terracotta font-medium transition-colors">Прайс-лист</a>
                    <a href="menu.php"
                        class="text-surface-charcoal hover:text-earth-terracotta font-medium transition-colors">Ресторан</a>
                    <a href="gallery.php"
                        class="text-earth-terracotta font-semibold border-b-2 border-earth-terracotta transition-colors">Галерея</a>
                    <a href="contacts.php"
                        class="text-surface-charcoal hover:text-earth-terracotta font-medium transition-colors">Контакти</a>

                    <!-- Кнопка 'Забронювати' -->
                    <a href="contacts.php#phones"
                        class="bg-accent-forest hover:bg-accent-sage text-white font-semibold py-2.5 px-6 rounded-full shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        Забронювати
                    </a>
                </div>

                <!-- Мобільне меню (кнопка) -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-earth-cedar hover:text-earth-terracotta focus:outline-none"
                        aria-label="Відкрити меню">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Мобільне меню (панель) -->
        <div id="mobile-menu" class="hidden md:hidden bg-surface-cream/95 backdrop-blur-md border-t border-primary/20">
            <div class="px-4 py-4 space-y-3">
                <a href="prices.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Прайс-лист</a>
                <a href="menu.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Ресторан</a>
                <a href="gallery.php" class="block text-earth-terracotta font-semibold py-2">Галерея</a>
                <a href="contacts.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Контакти</a>
                <a href="contacts.php#phones" class="block bg-accent-forest text-white font-semibold py-3 px-6 rounded-full text-center mt-2">Забронювати</a>
            </div>
        </div>
    </nav>

    <!-- ============================================ -->
    <!-- Заголовок сторінки Галереї -->
    <!-- ============================================ -->
    <section class="pt-28 pb-10 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-30">
            <div class="absolute top-10 left-1/3 w-72 h-72 bg-surface-cream rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-0 right-1/3 w-96 h-96 bg-primaryDark rounded-full filter blur-3xl opacity-40"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-extrabold text-earth-cedar leading-tight mb-5 heading-shadow">
                Галерея
            </h1>
            <p class="text-lg text-earth-cedar/80 max-w-2xl mx-auto leading-relaxed">
                Зазирніть у нашу лазню — фотографії передають атмосферу тепла, затишку та справжнього відпочинку.
            </p>
            <p class="text-sm text-earth-cedar/50 mt-3">
                <?php echo count($photos); ?> фото · Натисніть для збільшення
            </p>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- Сітка Фотогалереї -->
    <!-- ============================================ -->
    <main class="pb-16 pt-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 sm:gap-6">

                <?php foreach ($photos as $index => $photo): ?>
                    <div class="gallery-item group cursor-pointer"
                         onclick="openLightbox(<?php echo $index; ?>)"
                         role="button"
                         tabindex="0"
                         aria-label="Відкрити фото: <?php echo htmlspecialchars($photo['alt']); ?>">
                        <div class="relative overflow-hidden rounded-2xl shadow-soft border-2 border-surface-cream/80 bg-surface-cream aspect-[4/3]">
                            <!-- Зображення -->
                            <img src="<?php echo htmlspecialchars($photo['thumb']); ?>"
                                 alt="<?php echo htmlspecialchars($photo['alt']); ?>"
                                 loading="lazy"
                                 class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110">

                            <!-- Ховер-оверлей -->
                            <div class="absolute inset-0 bg-earth-cedar/0 group-hover:bg-earth-cedar/20 transition-colors duration-300 flex items-center justify-center">
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform group-hover:scale-100 scale-75">
                                    <div class="bg-surface-cream/90 backdrop-blur-sm rounded-full p-3 shadow-lg">
                                        <svg class="w-6 h-6 text-earth-cedar" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Підпис фото -->
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-earth-cedar/60 to-transparent p-3 pt-8 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-surface-cream text-sm font-medium truncate"><?php echo htmlspecialchars($photo['alt']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- CTA кнопка -->
        <div class="text-center pt-12 pb-4">
            <a href="contacts.php#phones"
                class="inline-flex items-center gap-2 bg-accent-forest hover:bg-earth-cedar text-white text-lg font-bold py-4 px-10 rounded-full shadow-soft transform hover:-translate-y-1 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                Забронювати відвідування
            </a>
        </div>
    </main>

    <!-- ============================================ -->
    <!-- Лайтбокс (Vanilla JS) -->
    <!-- ============================================ -->
    <div id="lightbox" class="lightbox-overlay" onclick="closeLightbox(event)">
        <!-- Кнопка закриття -->
        <button onclick="closeLightbox(event, true)"
                class="absolute top-6 right-6 z-10 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white rounded-full p-3 transition-colors duration-200"
                aria-label="Закрити">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Кнопка "Попередня" -->
        <button onclick="prevPhoto(event)"
                class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 z-10 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white rounded-full p-3 transition-colors duration-200"
                aria-label="Попереднє фото">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <!-- Кнопка "Наступна" -->
        <button onclick="nextPhoto(event)"
                class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 z-10 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white rounded-full p-3 transition-colors duration-200"
                aria-label="Наступне фото">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Зображення -->
        <img id="lightbox-img" src="" alt="" class="relative z-0">

        <!-- Лічильник фото -->
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 bg-white/10 backdrop-blur-sm text-white text-sm font-medium px-4 py-2 rounded-full">
            <span id="lightbox-counter"></span>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- Футер -->
    <!-- ============================================ -->
    <footer class="bg-earth-cedar text-surface-cream/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-12 grid grid-cols-1 md:grid-cols-3 gap-10 border-b border-surface-cream/10">
                <div>
                    <a href="index.php" class="flex gap-3 items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center overflow-hidden">
                            <img src="images/Legkiy_Par_Logo_Small.png" alt="Легкий Пар" class="w-full h-full object-cover" onerror="this.style.display='none'">
                        </div>
                        <span class="font-display font-bold text-xl text-surface-cream tracking-wide">Легкий Пар</span>
                    </a>
                    <p class="text-surface-cream/50 text-sm leading-relaxed">
                        Традиційна українська лазня з домашньою атмосферою та справжнім жаром.
                    </p>
                </div>
                <div>
                    <h3 class="font-display font-bold text-surface-cream mb-4">Навігація</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="index.php" class="hover:text-primary transition-colors">Головна</a></li>
                        <li><a href="prices.php" class="hover:text-primary transition-colors">Прайс-лист</a></li>
                        <li><a href="menu.php" class="hover:text-primary transition-colors">Ресторан</a></li>
                        <li><a href="gallery.php" class="hover:text-primary transition-colors">Галерея</a></li>
                        <li><a href="contacts.php" class="hover:text-primary transition-colors">Контакти</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-display font-bold text-surface-cream mb-4">Контакти</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary/60 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Щодня 09:00 – 23:00
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary/60 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Зателефонуйте нам
                        </li>
                    </ul>
                </div>
            </div>
            <div class="py-6 flex flex-col sm:flex-row justify-between items-center gap-3">
                <p class="text-xs text-surface-cream/40">&copy; <?php echo date('Y'); ?> Банька «Легкий Пар». Всі права захищені.</p>
                <a href="index.php" class="text-xs text-surface-cream/40 hover:text-primary transition-colors">Повернутися на головну &rarr;</a>
            </div>
        </div>
    </footer>

    <!-- ============================================ -->
    <!-- JavaScript: Мобільне Меню + Лайтбокс -->
    <!-- ============================================ -->
    <script>
        // ---- Мобільне меню ----
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // ---- Лайтбокс (Vanilla JS, без залежностей) ----
        const photos = <?php echo json_encode(array_map(function($p) {
            return ['full' => $p['full'], 'alt' => $p['alt']];
        }, $photos), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

        let currentIndex = 0;
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxCounter = document.getElementById('lightbox-counter');

        function openLightbox(index) {
            currentIndex = index;
            updateLightboxImage();
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox(e, force) {
            // Close only if clicking the overlay background or the close button
            if (force || e.target === lightbox) {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        function nextPhoto(e) {
            e.stopPropagation();
            currentIndex = (currentIndex + 1) % photos.length;
            updateLightboxImage();
        }

        function prevPhoto(e) {
            e.stopPropagation();
            currentIndex = (currentIndex - 1 + photos.length) % photos.length;
            updateLightboxImage();
        }

        function updateLightboxImage() {
            lightboxImg.src = photos[currentIndex].full;
            lightboxImg.alt = photos[currentIndex].alt;
            lightboxCounter.textContent = (currentIndex + 1) + ' / ' + photos.length;
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('active')) return;
            if (e.key === 'Escape') {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
            }
            if (e.key === 'ArrowRight') {
                currentIndex = (currentIndex + 1) % photos.length;
                updateLightboxImage();
            }
            if (e.key === 'ArrowLeft') {
                currentIndex = (currentIndex - 1 + photos.length) % photos.length;
                updateLightboxImage();
            }
        });
    </script>

</body>

</html>
