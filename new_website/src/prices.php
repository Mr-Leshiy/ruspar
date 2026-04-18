<?php
header('Content-Type: text/html; charset=utf-8');
// Завантаження даних
$priceData = include 'data/prices.php';
$sections = $priceData['sections'];
$conditions = $priceData['conditions'];
?>
<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Прайс-лист | Банька "Легкий Пар"</title>
    <meta name="description"
        content="Актуальні ціни на послуги лазні 'Легкий Пар': оренда парної, паріння віниками, скрабування, масаж та додаткові послуги.">

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

        /* Leader dots between service name and price */
        .leader-row {
            display: flex;
            align-items: baseline;
            gap: 0.5rem;
        }

        .leader-dots {
            flex: 1;
            border-bottom: 2px dotted rgba(94, 58, 47, 0.2);
            min-width: 20px;
            margin-bottom: 4px;
        }

        /* Smooth category reveal on scroll */
        .price-card {
            opacity: 0;
            transform: translateY(24px);
            animation: fadeSlideUp 0.5s ease-out forwards;
        }

        @keyframes fadeSlideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stagger animation delay for each card */
        .price-card:nth-child(1) { animation-delay: 0.05s; }
        .price-card:nth-child(2) { animation-delay: 0.12s; }
        .price-card:nth-child(3) { animation-delay: 0.19s; }
        .price-card:nth-child(4) { animation-delay: 0.26s; }
        .price-card:nth-child(5) { animation-delay: 0.33s; }
        .price-card:nth-child(6) { animation-delay: 0.40s; }
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
                        class="text-earth-terracotta font-semibold border-b-2 border-earth-terracotta transition-colors">Прайс-лист</a>
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
                <a href="prices.php" class="block text-earth-terracotta font-semibold py-2">Прайс-лист</a>
                <a href="menu.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Ресторан</a>
                <a href="gallery.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Галерея</a>
                <a href="contacts.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Контакти</a>
                <a href="contacts.php#phones" class="block bg-accent-forest text-white font-semibold py-3 px-6 rounded-full text-center mt-2">Забронювати</a>
            </div>
        </div>
    </nav>

    <!-- ============================================ -->
    <!-- Заголовок сторінки Прайс-листа -->
    <!-- ============================================ -->
    <section class="pt-28 pb-12 relative overflow-hidden">
        <!-- Warm ambient background blobs -->
        <div class="absolute inset-0 pointer-events-none opacity-30">
            <div class="absolute top-10 left-1/4 w-72 h-72 bg-surface-cream rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-primaryDark rounded-full filter blur-3xl opacity-40"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-extrabold text-earth-cedar leading-tight mb-6 heading-shadow">
                Прайс-лист
            </h1>
            <p class="text-lg text-earth-cedar/80 max-w-2xl mx-auto leading-relaxed">
                Оберіть процедури для ідеального відпочинку. Наші ціни включають все необхідне для вашого комфорту.
            </p>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- Швидка навігація по секціях -->
    <!-- ============================================ -->
    <!-- TODO: зробити так щоб ця навігація була не липка а просто була; відцентрувати її -->
    <div class="sticky top-20 z-40 bg-primary/80 backdrop-blur-md border-y border-primaryDark/20 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-2 py-3 overflow-x-auto scrollbar-hide">
                <?php foreach ($sections as $section): ?>
                    <?php if (isset($section['type']) && $section['type'] === 'features') continue; ?>
                    <a href="#<?php echo $section['id']; ?>"
                       class="flex-shrink-0 px-4 py-2 rounded-full text-sm font-medium bg-surface-cream/60 hover:bg-surface-cream text-earth-cedar hover:text-earth-terracotta transition-all duration-200 border border-transparent hover:border-primary/40">
                        <span class="mr-1"><?php echo $section['icon']; ?></span>
                        <?php echo htmlspecialchars($section['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- Контент Прайс-листа -->
    <!-- ============================================ -->
    <main class="pb-16 pt-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <?php foreach ($sections as $sectionIndex => $section): ?>

                <?php if (isset($section['type']) && $section['type'] === 'features'): ?>
                    <!-- ====== Включені послуги (Features Layout) ====== -->
                    <div id="<?php echo $section['id']; ?>" class="price-card scroll-mt-36">
                        <div class="bg-surface-cream rounded-3xl shadow-soft overflow-hidden border border-primary/15">
                            <!-- Section Header -->
                            <div class="bg-gradient-to-r from-accent-forest/10 to-accent-sage/10 px-6 sm:px-8 py-5 border-b border-accent-sage/20">
                                <div class="flex items-center gap-3">
                                    <span class="text-2xl"><?php echo $section['icon']; ?></span>
                                    <h2 class="font-display text-2xl font-bold text-earth-cedar"><?php echo htmlspecialchars($section['title']); ?></h2>
                                </div>
                            </div>

                            <!-- Feature Grid -->
                            <div class="p-6 sm:p-8">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <?php foreach ($section['items'] as $feature): ?>
                                        <div class="flex gap-3 p-4 rounded-2xl bg-accent-forest/5 border border-accent-sage/15 hover:border-accent-sage/40 transition-colors duration-200">
                                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-accent-forest/15 flex items-center justify-center mt-0.5">
                                                <svg class="w-4 h-4 text-accent-forest" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-earth-cedar text-sm"><?php echo htmlspecialchars($feature['title']); ?></h3>
                                                <p class="text-surface-charcoal/60 text-xs mt-1 leading-relaxed"><?php echo htmlspecialchars($feature['desc']); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- ====== Стандартна секція з цінами ====== -->
                    <div id="<?php echo $section['id']; ?>" class="price-card scroll-mt-36">
                        <div class="bg-surface-cream rounded-3xl shadow-soft overflow-hidden border border-primary/15">
                            <!-- Section Header -->
                            <div class="bg-gradient-to-r from-earth-cedar/5 to-primary/10 px-6 sm:px-8 py-5 border-b border-primary/15">
                                <div class="flex items-center gap-3">
                                    <span class="text-2xl"><?php echo $section['icon']; ?></span>
                                    <div>
                                        <h2 class="font-display text-2xl font-bold text-earth-cedar"><?php echo htmlspecialchars($section['title']); ?></h2>
                                        <?php if (!empty($section['subtitle'])): ?>
                                            <p class="text-sm text-surface-charcoal/50 mt-0.5"><?php echo htmlspecialchars($section['subtitle']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Price Rows -->
                            <div class="divide-y divide-primary/10">
                                <?php foreach ($section['items'] as $itemIndex => $item): ?>
                                    <div class="group px-6 sm:px-8 py-4 hover:bg-primary/8 transition-colors duration-200 <?php echo $itemIndex % 2 === 0 ? 'bg-transparent' : 'bg-primary/[0.03]'; ?>">

                                        <!-- Main row: Name + dots + Price -->
                                        <div class="leader-row">
                                            <div class="flex-shrink-0 max-w-[60%] sm:max-w-none">
                                                <span class="font-semibold text-earth-cedar text-[15px] group-hover:text-earth-terracotta transition-colors duration-200">
                                                    <?php echo htmlspecialchars($item['name'] ?? $item['service'] ?? $item['type'] ?? ''); ?>
                                                </span>
                                            </div>
                                            <span class="leader-dots hidden sm:block"></span>

                                            <?php if (isset($item['duration'])): ?>
                                                <span class="flex-shrink-0 text-sm text-surface-charcoal/50 font-medium hidden sm:inline-block mr-4">
                                                    <?php echo htmlspecialchars($item['duration']); ?>
                                                </span>
                                            <?php endif; ?>

                                            <?php if (isset($item['time']) && $item['time'] !== '—'): ?>
                                                <span class="flex-shrink-0 text-sm text-surface-charcoal/50 font-medium hidden sm:inline-block mr-4">
                                                    <?php echo htmlspecialchars($item['time']); ?>
                                                </span>
                                            <?php endif; ?>

                                            <span class="flex-shrink-0 font-display font-bold text-accent-forest text-lg whitespace-nowrap">
                                                <?php echo htmlspecialchars($item['price']); ?>
                                            </span>
                                        </div>

                                        <!-- Description / Effect (shown below name on mobile, inline subtle on desktop) -->
                                        <?php
                                        $desc = $item['desc'] ?? $item['effect'] ?? '';
                                        if (!empty($desc)):
                                        ?>
                                            <p class="text-xs text-surface-charcoal/45 mt-1.5 leading-relaxed max-w-xl">
                                                <?php echo htmlspecialchars($desc); ?>
                                            </p>
                                        <?php endif; ?>

                                        <!-- Mobile-only duration/time badge -->
                                        <?php if (isset($item['duration']) || (isset($item['time']) && $item['time'] !== '—')): ?>
                                            <div class="sm:hidden mt-2">
                                                <span class="inline-block text-xs bg-primary/15 text-earth-cedar px-2.5 py-1 rounded-full">
                                                    <?php echo htmlspecialchars($item['duration'] ?? $item['time']); ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>

            <!-- ============================================ -->
            <!-- Важливі умови -->
             <!-- TODO: перенести цю плашку на верх страниці -->
            <!-- ============================================ -->
            <?php if (!empty($conditions)): ?>
                <div class="price-card">
                    <div class="bg-earth-cedar/5 rounded-2xl border border-earth-cedar/10 p-6 sm:p-8">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-earth-terracotta/15 flex items-center justify-center mt-0.5">
                                <svg class="w-5 h-5 text-earth-terracotta" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-display font-bold text-earth-cedar text-lg mb-3">Важливі умови</h3>
                                <ul class="space-y-2">
                                    <?php foreach ($conditions as $condition): ?>
                                        <li class="flex items-start gap-2 text-sm text-earth-cedar/80 leading-relaxed">
                                            <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full bg-earth-terracotta/60 mt-2"></span>
                                            <?php echo htmlspecialchars($condition); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- CTA button -->
            <div class="text-center pt-4 pb-8">
                <a href="contacts.php#phones"
                    class="inline-flex items-center gap-2 bg-accent-forest hover:bg-earth-cedar text-white text-lg font-bold py-4 px-10 rounded-full shadow-soft transform hover:-translate-y-1 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    Забронювати зараз
                </a>
            </div>

        </div>
    </main>

    <!-- ============================================ -->
    <!-- Футер -->
    <!-- ============================================ -->
    <footer class="bg-earth-cedar text-surface-cream/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Top section -->
            <div class="py-12 grid grid-cols-1 md:grid-cols-3 gap-10 border-b border-surface-cream/10">
                <!-- Logo & tagline -->
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

                <!-- Quick Links -->
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

                <!-- Contact Info -->
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

            <!-- Bottom bar -->
            <div class="py-6 flex flex-col sm:flex-row justify-between items-center gap-3">
                <p class="text-xs text-surface-cream/40">&copy; <?php echo date('Y'); ?> Банька «Легкий Пар». Всі права захищені.</p>
                <a href="index.php" class="text-xs text-surface-cream/40 hover:text-primary transition-colors">Повернутися на головну &rarr;</a>
            </div>
        </div>
    </footer>

    <!-- ============================================ -->
    <!-- JavaScript: Mobile Menu Toggle -->
    <!-- ============================================ -->
    <script>
        // Mobile menu toggle
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
