<?php
header('Content-Type: text/html; charset=utf-8');
// Завантаження контактних даних
$contacts = include 'data/contacts.php';
?>
<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакти та Бронювання | Банька "Легкий Пар"</title>
    <meta name="description"
        content="Зв'яжіться з нами для бронювання лазні 'Легкий Пар'. Телефони, адреса, карта та графік роботи.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Podkova:wght@600;700;800&display=swap"
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

        /* Пульсуюча анімація для телефону */
        .phone-pulse {
            animation: phonePulse 2s ease-in-out infinite;
        }

        @keyframes phonePulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.03);
            }
        }

        /* Плавна поява блоків */
        .contact-block {
            opacity: 0;
            transform: translateY(20px);
            animation: contactReveal 0.5s ease-out forwards;
        }

        .contact-block:nth-child(1) {
            animation-delay: 0.05s;
        }

        .contact-block:nth-child(2) {
            animation-delay: 0.15s;
        }

        .contact-block:nth-child(3) {
            animation-delay: 0.25s;
        }

        @keyframes contactReveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
                                class="w-full h-full object-cover" onerror="this.style.display='none'">
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
                        class="text-surface-charcoal hover:text-earth-terracotta font-medium transition-colors">Галерея</a>
                    <a href="contacts.php"
                        class="text-earth-terracotta font-semibold border-b-2 border-earth-terracotta transition-colors">Контакти</a>

                    <!-- Кнопка 'Забронювати' — скролить до телефонів -->
                    <a href="#phones"
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
                <a href="prices.php"
                    class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Прайс-лист</a>
                <a href="menu.php"
                    class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Ресторан</a>
                <a href="gallery.php"
                    class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Галерея</a>
                <a href="contacts.php" class="block text-earth-terracotta font-semibold py-2">Контакти</a>
                <a href="#phones"
                    class="block bg-accent-forest text-white font-semibold py-3 px-6 rounded-full text-center mt-2">Забронювати</a>
            </div>
        </div>
    </nav>

    <!-- ============================================ -->
    <!-- Заголовок сторінки -->
    <!-- ============================================ -->
    <section class="pt-28 pb-10 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-30">
            <div class="absolute top-10 right-1/4 w-72 h-72 bg-surface-cream rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-primaryDark rounded-full filter blur-3xl opacity-40">
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1
                class="font-display text-4xl md:text-5xl lg:text-6xl font-extrabold text-earth-cedar leading-tight mb-5 heading-shadow">
                Контакти та Бронювання
            </h1>
            <p class="text-lg text-earth-cedar/80 max-w-2xl mx-auto leading-relaxed">
                <?php echo htmlspecialchars($contacts['booking_note']); ?>
            </p>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- Основний контент — Два стовпці -->
    <!-- ============================================ -->
    <main class="pb-16 pt-2">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">

                <!-- ======================================== -->
                <!-- ЛІВА КОЛОНКА: Інформація та Телефони -->
                <!-- ======================================== -->
                <div class="space-y-6">

                    <!-- Блок "Як Забронювати" -->
                    <div
                        class="contact-block bg-surface-cream rounded-3xl shadow-soft border border-primary/15 overflow-hidden">
                        <div
                            class="bg-gradient-to-r from-accent-forest/10 to-accent-sage/10 px-6 sm:px-8 py-5 border-b border-accent-sage/20">
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">📋</span>
                                <h2 class="font-display text-2xl font-bold text-earth-cedar">Як забронювати</h2>
                            </div>
                        </div>
                        <div class="px-6 sm:px-8 py-6">
                            <ol class="space-y-4">
                                <li class="flex items-start gap-4">
                                    <span
                                        class="flex-shrink-0 w-8 h-8 rounded-full bg-accent-forest text-white font-bold flex items-center justify-center text-sm">1</span>
                                    <div>
                                        <p class="font-semibold text-earth-cedar">Зателефонуйте нам</p>
                                        <p class="text-sm text-surface-charcoal/60 mt-0.5">Оберіть будь-який номер нижче
                                            — ми на зв'язку щодня</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-4">
                                    <span
                                        class="flex-shrink-0 w-8 h-8 rounded-full bg-accent-forest text-white font-bold flex items-center justify-center text-sm">2</span>
                                    <div>
                                        <p class="font-semibold text-earth-cedar">Оберіть дату та час</p>
                                        <p class="text-sm text-surface-charcoal/60 mt-0.5">Ми допоможемо підібрати
                                            зручний для вас час</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-4">
                                    <span
                                        class="flex-shrink-0 w-8 h-8 rounded-full bg-accent-forest text-white font-bold flex items-center justify-center text-sm">3</span>
                                    <div>
                                        <p class="font-semibold text-earth-cedar">Насолоджуйтесь відпочинком!</p>
                                        <p class="text-sm text-surface-charcoal/60 mt-0.5">
                                            <?php echo htmlspecialchars($contacts['min_booking']); ?>
                                        </p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <!-- Блок з Телефонами (головний CTA) -->
                    <div id="phones"
                        class="contact-block bg-surface-cream rounded-3xl shadow-soft border border-primary/15 overflow-hidden scroll-mt-28">
                        <div
                            class="bg-gradient-to-r from-earth-terracotta/10 to-primary/15 px-6 sm:px-8 py-5 border-b border-earth-terracotta/15">
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">📞</span>
                                <h2 class="font-display text-2xl font-bold text-earth-cedar">Телефонуйте зараз</h2>
                            </div>
                        </div>
                        <div class="px-6 sm:px-8 py-8 space-y-5">
                            <?php foreach ($contacts['phones'] as $phone): ?>
                                <a href="tel:<?php echo htmlspecialchars($phone['href']); ?>"
                                    class="group flex items-center gap-4 p-4 rounded-2xl bg-primary/10 hover:bg-accent-forest/10 border-2 border-transparent hover:border-accent-forest/30 transition-all duration-300 phone-pulse">
                                    <!-- Іконка телефону -->
                                    <div
                                        class="flex-shrink-0 w-14 h-14 rounded-full bg-accent-forest/15 group-hover:bg-accent-forest/25 flex items-center justify-center transition-colors duration-300">
                                        <svg class="w-7 h-7 text-accent-forest" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                    </div>
                                    <!-- Номер -->
                                    <div>
                                        <p
                                            class="font-display text-2xl sm:text-3xl font-extrabold text-earth-cedar group-hover:text-accent-forest transition-colors duration-300 tracking-wide">
                                            <?php echo htmlspecialchars($phone['display']); ?>
                                        </p>
                                        <?php if (!empty($phone['label'])): ?>
                                            <p class="text-sm text-surface-charcoal/50 mt-1">
                                                <?php echo htmlspecialchars($phone['label']); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Стрілка -->
                                    <div
                                        class="ml-auto flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <svg class="w-6 h-6 text-accent-forest" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Блок з Адресою та Графіком -->
                    <div
                        class="contact-block bg-surface-cream rounded-3xl shadow-soft border border-primary/15 overflow-hidden">
                        <div class="px-6 sm:px-8 py-6 space-y-5">
                            <!-- Адреса -->
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 rounded-full bg-earth-terracotta/10 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-earth-terracotta" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-earth-cedar text-lg">Адреса</h3>
                                    <p class="text-surface-charcoal/70 mt-1">
                                        <?php echo htmlspecialchars($contacts['address']); ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Розділювач -->
                            <div class="border-t border-primary/10"></div>

                            <!-- Графік -->
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 rounded-full bg-primary/15 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-primaryDark" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-earth-cedar text-lg">Графік роботи</h3>
                                    <p class="text-surface-charcoal/70 mt-1">
                                        <?php echo htmlspecialchars($contacts['working_hours']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ======================================== -->
                <!-- ПРАВА КОЛОНКА: Карта Google Maps -->
                <!-- ======================================== -->
                <div class="contact-block flex flex-col h-full">
                    <div
                        class="bg-surface-cream rounded-3xl shadow-soft border border-primary/15 overflow-hidden flex flex-col flex-1">
                        <div
                            class="bg-gradient-to-r from-earth-cedar/5 to-primary/10 px-6 sm:px-8 py-5 border-b border-primary/15 flex-shrink-0">
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">🗺️</span>
                                <h2 class="font-display text-2xl font-bold text-earth-cedar">Як нас знайти</h2>
                            </div>
                        </div>

                        <!--
                        ================================================================
                        🗺️ КАРТА GOOGLE MAPS — ІНСТРУКЦІЯ ДЛЯ ЗАМІНИ
                        ================================================================
                        Щоб вставити свою карту:

                        1. Відкрийте сайт https://maps.google.com
                        2. Знайдіть адресу вашого закладу
                        3. Натисніть кнопку "Поділитися" (іконка share)
                        4. Перейдіть на вкладку "Вбудувати карту" (Embed a map)
                        5. Оберіть розмір "Великий" (Large)
                        6. Натисніть "Копіювати HTML"
                        7. Із скопійованого коду вам потрібне ТІЛЬКИ посилання,
                           яке знаходиться між src=" і наступною лапкою "
                           Приклад: src="https://www.google.com/maps/embed?pb=!1m18..."
                        8. Вставте це посилання у файл data/contacts.php
                           у поле 'map_embed_url'
                        9. Збережіть файл — карта оновиться автоматично!
                        ================================================================
                        -->

                        <div class="p-4 sm:p-6 flex-1 flex flex-col min-h-[300px]">
                            <div
                                class="relative flex-1 rounded-2xl overflow-hidden border border-primary/10">
                                <iframe src="<?php echo htmlspecialchars($contacts['map_embed_url']); ?>"
                                    class="absolute inset-0 w-full h-full"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="Карта розташування Банька Легкий Пар">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- ============================================ -->
    <!-- Футер -->
    <!-- ============================================ -->
    <footer class="bg-earth-cedar text-surface-cream/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-12 grid grid-cols-1 md:grid-cols-3 gap-10 border-b border-surface-cream/10">
                <div>
                    <a href="index.php" class="flex gap-3 items-center mb-4">
                        <div
                            class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center overflow-hidden">
                            <img src="images/Legkiy_Par_Logo_Small.png" alt="Легкий Пар"
                                class="w-full h-full object-cover" onerror="this.style.display='none'">
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
                    <h3 class="font-display font-bold text-surface-cream mb-4">Зв'язатися з нами</h3>
                    <ul class="space-y-3 text-sm">
                        <?php foreach ($contacts['phones'] as $phone): ?>
                            <li>
                                <a href="tel:<?php echo htmlspecialchars($phone['href']); ?>"
                                    class="flex items-center gap-2 hover:text-primary transition-colors">
                                    <svg class="w-4 h-4 text-primary/60 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    <?php echo htmlspecialchars($phone['display']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary/60 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <?php echo htmlspecialchars($contacts['working_hours']); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="py-6 flex flex-col sm:flex-row justify-between items-center gap-3">
                <p class="text-xs text-surface-cream/40">&copy; <?php echo date('Y'); ?> Банька «Легкий Пар». Всі права
                    захищені.</p>
                <a href="index.php"
                    class="text-xs text-surface-cream/40 hover:text-primary transition-colors">Повернутися на головну
                    &rarr;</a>
            </div>
        </div>
    </footer>

    <!-- ============================================ -->
    <!-- JavaScript: Мобільне Меню -->
    <!-- ============================================ -->
    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>

</body>

</html>