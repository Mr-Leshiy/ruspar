<?php
header('Content-Type: text/html; charset=utf-8');
// Завантаження даних
$priceData = include 'data/prices.php';
$menu = include 'data/menu.php';
$gallery = include 'data/gallery.php';
// Extract first section (sauna rental) for preview cards
$rentalSection = $priceData['sections'][0];
?>
<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Банька "Легкий Пар" | Традиційна Українська Лазня</title>
    <meta name="description"
        content="Традиційна українська лазня 'Легкий Пар'. Паріння віниками, чани, домашня кухня та справжній відпочинок для душі і тіла.">

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
                        primary: '#F9B162',     // Soft Amber / Apricot (Base)
                        primaryDark: '#e59d4f', // For hovers
                        accent: {
                            sage: '#8ba888',    // Sage Green
                            forest: '#2d5a27',  // Forest Green
                            cyan: '#4fb0c6',    // Cerulean / Cyan (refreshing accent)
                        },
                        earth: {
                            terracotta: '#c85e43', // Terracotta
                            cedar: '#5e3a2f',      // Cedar (dark backgrounds/borders)
                        },
                        surface: {
                            cream: '#fdfbf7',   // Cream/Vanilla (card backgrounds)
                            charcoal: '#2c2c2c',// Deep Charcoal (text)
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
        /* Custom Styles for Neo-Traditional Vibe */
        body {
            background-color: theme('colors.surface.cream');
            color: theme('colors.surface.charcoal');
        }

        .heading-shadow {
            text-shadow: 2px 2px 0px rgba(253, 251, 247, 0.8),
                4px 4px 6px rgba(94, 58, 47, 0.1);
        }

        .hero-pattern {
            background-image: radial-gradient(theme('colors.primary') 1px, transparent 1px);
            background-size: 20px 20px;
            background-color: theme('colors.surface.cream');
        }
    </style>
</head>

<body class="antialiased">

    <!-- Стійка навігація (Sticky Navigation) -->
    <nav
        class="fixed w-full z-50 bg-surface-cream/90 backdrop-blur-md border-b border-primary/30 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Логотип -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="flex gap-3 items-center">
                        <div
                            class="w-12 h-12 rounded-full bg-primary flex items-center justify-center shadow-glow overflow-hidden">
                            <!-- Placeholder if logo doesn't exist yet, but using the specified path -->
                            <img src="images/Legkiy_Par_Logo_Small.png" alt="Легкий Пар Лого"
                                class="w-full h-full object-cover"
                                onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'white\'><path d=\'M17 2H7C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5zM9 18H7v-2h2v2zm0-4H7V8h2v6zm6 4h-2v-2h2v2zm0-4h-2V8h2v6zm4 4h-2v-2h2v2zm0-4h-2V8h2v6z\'/></svg>'">
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
                <a href="gallery.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Галерея</a>
                <a href="contacts.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Контакти</a>
                <a href="contacts.php#phones" class="block bg-accent-forest text-white font-semibold py-3 px-6 rounded-full text-center mt-2">Забронювати</a>
            </div>
        </div>
    </nav>

    <!-- Геройська Секція (Hero Section) -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden hero-pattern">
        <!-- Декоративні елементи "пару" -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-40">
            <div
                class="absolute top-20 left-10 w-96 h-96 bg-primary rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse">
            </div>
            <div
                class="absolute top-40 right-10 w-96 h-96 bg-surface-cream rounded-full mix-blend-multiply filter blur-3xl opacity-70">
            </div>
            <div
                class="absolute -bottom-8 left-1/2 w-96 h-96 bg-primaryDark rounded-full mix-blend-multiply filter blur-3xl opacity-30">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-surface-cream/80 border border-primary text-earth-terracotta font-medium mb-6 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-accent-forest animate-pulse"></span>
                    Справжній жар та традиції
                </div>

                <h1
                    class="font-display text-5xl md:text-6xl lg:text-7xl font-extrabold text-earth-cedar leading-tight mb-8 heading-shadow">
                    Відпочинок, що зцілює <br /> <span class="text-primaryDark">душу та тіло</span>
                </h1>

                <p class="text-lg md:text-xl text-surface-charcoal/80 mb-10 font-medium leading-relaxed">
                    Пориньте в атмосферу затишку нашої традиційної української лазні.
                    Цілющий пар, запашні віники та домашнє частування чекають на вас.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="contacts.php#phones"
                        class="w-full sm:w-auto bg-earth-terracotta hover:bg-earth-cedar text-white text-lg font-bold py-4 px-8 rounded-full shadow-soft transform hover:-translate-y-1 transition-all duration-300">
                        Забронювати Лазню
                    </a>
                    <a href="prices.php"
                        class="w-full sm:w-auto bg-surface-cream hover:bg-primary/20 text-earth-cedar border-2 border-primary/50 text-lg font-bold py-4 px-8 rounded-full transition-all duration-300">
                        Дивитись Ціни
                    </a>
                </div>
            </div>

            <!-- Ілюстрація / Зображення Героя -->
            <div class="mt-16 md:mt-24 relative max-w-5xl mx-auto">
                <div
                    class="aspect-w-16 aspect-h-9 md:aspect-h-7 rounded-3xl overflow-hidden shadow-2xl border-4 border-surface-cream relative group min-h-[300px]">
                    <div
                        class="absolute inset-0 bg-earth-cedar/20 group-hover:bg-transparent transition-colors duration-500 z-10">
                    </div>
                    <!-- TODO: Заглушка для головного фото лазні -->
                    <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                        alt="Інтер'єр нашої лазні"
                        class="w-full h-full object-cover transform scale-105 group-hover:scale-100 transition-transform duration-700 absolute inset-0">

                    <div
                        class="absolute bottom-6 right-6 z-20 bg-surface-cream/90 backdrop-blur rounded-2xl p-4 shadow-soft">
                        <div class="flex items-center gap-3">
                            <div class="bg-primary/20 p-2 rounded-full text-earth-terracotta">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-surface-charcoal font-medium">Працюємо щодня</p>
                                <p class="font-bold text-earth-cedar">09:00 - 23:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Демонстрація виведення даних (Прайс-лист прев'ю) -->
    <section id="prices" class="py-20 bg-surface-cream relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-display text-4xl font-bold text-center text-earth-cedar mb-12">Популярні послуги</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach (array_slice($rentalSection['items'], 0, 3) as $package): ?>
                    <div
                        class="bg-white rounded-2xl p-8 border border-primary/20 shadow-soft hover:shadow-glow transition-all duration-300 group">
                        <div
                            class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center mb-6 text-earth-terracotta group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl text-earth-cedar mb-2">
                            <?php echo htmlspecialchars($package['service']); ?>
                        </h3>
                        <p class="text-surface-charcoal/70 mb-6 text-sm">Час:
                            <?php echo htmlspecialchars($package['time']); ?>
                        </p>
                        <div class="text-3xl font-display font-bold text-accent-forest">
                            <?php echo htmlspecialchars($package['price']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 text-center">
                <a href="prices.php"
                    class="inline-block text-earth-terracotta hover:text-earth-cedar font-semibold underline underline-offset-4 decoration-2 transition-colors">Переглянути
                    повний прайс-лист &rarr;</a>
            </div>
        </div>
    </section>

    <!-- JavaScript: Мобільне Меню -->
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