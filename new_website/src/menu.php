<?php
header('Content-Type: text/html; charset=utf-8');
// Завантаження даних
$menuData = include 'data/menu.php';
$sections = $menuData['sections'];
?>
<!DOCTYPE html>
<html lang="uk" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню ресторану | Банька "Легкий Пар"</title>
    <meta name="description"
        content="Меню ресторану лазні 'Легкий Пар': домашня українська кухня, страви на мангалі, холодні та гарячі закуски, напої.">

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
            position: relative;
        }

        /* Задній фон з розмиттям */
        body::before {
            content: "";
            position: fixed;
            top: -10%; left: -10%; right: -10%; bottom: -10%;
            z-index: -10;
            background-image: var(--bg-photo, none);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(2px);
        }

        /* Generic reusable classes for text shadows over photo backgrounds */
        .shadow-text-strong {
            text-shadow: 0px 4px 15px rgba(0, 0, 0, 0.8), 0px 2px 5px rgba(0, 0, 0, 0.6);
        }
        .shadow-text-light {
            text-shadow: 0px 2px 10px rgba(0, 0, 0, 0.8);
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Leader dots between dish name and price */
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

        /* Двоколонковий масонрі-лейаут для десктопу */
        .menu-masonry {
            column-count: 1;
            column-gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .menu-masonry {
                column-count: 2;
                column-gap: 2rem;
            }
        }

        .menu-category {
            break-inside: avoid;
            margin-bottom: 1.5rem;
        }

        /* Плавна поява секцій */
        .menu-category {
            opacity: 0;
            transform: translateY(20px);
            animation: menuFadeIn 0.45s ease-out forwards;
        }

        @keyframes menuFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .menu-category:nth-child(1) { animation-delay: 0.04s; }
        .menu-category:nth-child(2) { animation-delay: 0.10s; }
        .menu-category:nth-child(3) { animation-delay: 0.16s; }
        .menu-category:nth-child(4) { animation-delay: 0.22s; }
        .menu-category:nth-child(5) { animation-delay: 0.28s; }
        .menu-category:nth-child(6) { animation-delay: 0.34s; }
        .menu-category:nth-child(7) { animation-delay: 0.40s; }
        .menu-category:nth-child(8) { animation-delay: 0.46s; }
        .menu-category:nth-child(9) { animation-delay: 0.52s; }
        .menu-category:nth-child(10) { animation-delay: 0.58s; }
        .menu-category:nth-child(11) { animation-delay: 0.64s; }
        .menu-category:nth-child(12) { animation-delay: 0.70s; }
    </style>
</head>

<body class="antialiased" style="--bg-photo: url('images/new_gallery/optimized/17.jpg');">

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
                        class="text-earth-terracotta font-semibold border-b-2 border-earth-terracotta transition-colors">Ресторан</a>
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
                <a href="menu.php" class="block text-earth-terracotta font-semibold py-2">Ресторан</a>
                <a href="gallery.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Галерея</a>
                <a href="contacts.php" class="block text-surface-charcoal hover:text-earth-terracotta font-medium py-2">Контакти</a>
                <a href="contacts.php#phones" class="block bg-accent-forest text-white font-semibold py-3 px-6 rounded-full text-center mt-2">Забронювати</a>
            </div>
        </div>
    </nav>

    <!-- ============================================ -->
    <!-- Заголовок сторінки Меню -->
    <!-- ============================================ -->
    <section class="pt-28 pb-12 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-extrabold text-surface-cream leading-tight mb-6 shadow-text-strong">
                Меню ресторану
            </h1>
            <p class="text-lg md:text-xl text-surface-cream/90 max-w-2xl mx-auto leading-relaxed shadow-text-light font-medium">
                Домашня українська кухня, страви з мангалу та ароматні напої — все, щоб доповнити ваш відпочинок.
            </p>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- Швидка навігація по секціях -->
    <!-- ============================================ -->
    <div class="sticky top-24 z-40 pb-6 pointer-events-none">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center">
            <div class="pointer-events-auto flex gap-2 p-1.5 rounded-full bg-surface-cream/95 backdrop-blur-md border border-primary/20 shadow-soft overflow-x-auto scrollbar-hide max-w-full">
                <?php foreach ($sections as $section): ?>
                    <a href="#<?php echo $section['id']; ?>"
                       class="flex-shrink-0 px-5 py-2.5 rounded-full text-sm font-bold bg-transparent hover:bg-earth-terracotta hover:text-white text-earth-cedar transition-all duration-300 whitespace-nowrap shadow-none hover:shadow-md">
                        <span class="mr-1.5"><?php echo $section['icon']; ?></span>
                        <?php echo htmlspecialchars($section['title']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- Контент Меню — Двоколонковий Масонрі -->
    <!-- ============================================ -->
    <main class="pb-16 pt-2">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="menu-masonry">

                <?php foreach ($sections as $section): ?>
                    <div id="<?php echo $section['id']; ?>" class="menu-category scroll-mt-36">
                        <div class="bg-surface-cream rounded-3xl shadow-soft overflow-hidden border border-primary/15">

                            <!-- Заголовок категорії -->
                            <div class="bg-gradient-to-r from-earth-cedar/5 to-primary/10 px-6 sm:px-7 py-4 border-b border-primary/15">
                                <div class="flex items-center gap-3">
                                    <span class="text-2xl"><?php echo $section['icon']; ?></span>
                                    <div>
                                        <h2 class="font-display text-xl sm:text-2xl font-bold text-earth-cedar">
                                            <?php echo htmlspecialchars($section['title']); ?>
                                        </h2>
                                        <?php if (!empty($section['subtitle'])): ?>
                                            <p class="text-xs text-surface-charcoal/50 mt-0.5"><?php echo htmlspecialchars($section['subtitle']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Позиції меню -->
                            <div class="divide-y divide-primary/10">
                                <?php foreach ($section['items'] as $index => $item): ?>
                                    <div class="group px-6 sm:px-7 py-3 hover:bg-primary/8 transition-colors duration-200 <?php echo $index % 2 === 0 ? 'bg-transparent' : 'bg-primary/[0.03]'; ?>">

                                        <!-- Назва страви + пунктир + ціна -->
                                        <div class="leader-row">
                                            <div class="flex-shrink-0 max-w-[55%] sm:max-w-[65%]">
                                                <span class="font-semibold text-earth-cedar text-[15px] group-hover:text-earth-terracotta transition-colors duration-200">
                                                    <?php echo htmlspecialchars($item['name']); ?>
                                                </span>
                                            </div>
                                            <span class="leader-dots hidden sm:block"></span>

                                            <!-- Порція/Вага (бейдж) -->
                                            <?php if (!empty($item['portion']) && $item['portion'] !== '—'): ?>
                                                <span class="flex-shrink-0 text-xs text-surface-charcoal/50 font-medium hidden sm:inline-block mr-2">
                                                    <?php echo htmlspecialchars($item['portion']); ?>
                                                </span>
                                            <?php endif; ?>

                                            <!-- Ціна -->
                                            <span class="flex-shrink-0 font-display font-bold text-accent-forest text-base sm:text-lg whitespace-nowrap ml-auto sm:ml-0">
                                                <?php echo htmlspecialchars($item['price']); ?>
                                            </span>
                                        </div>

                                        <!-- Опис / Інгредієнти (курсив) -->
                                        <?php if (!empty($item['desc'])): ?>
                                            <p class="text-xs text-surface-charcoal/45 mt-1 leading-relaxed italic">
                                                <?php echo htmlspecialchars($item['desc']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <!-- Порція на мобільному -->
                                        <?php if (!empty($item['portion']) && $item['portion'] !== '—'): ?>
                                            <div class="sm:hidden mt-1.5">
                                                <span class="inline-block text-xs bg-primary/15 text-earth-cedar px-2.5 py-0.5 rounded-full font-medium">
                                                    <?php echo htmlspecialchars($item['portion']); ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- Заборона -->
        <div class="flex justify-center pt-8 pb-4 px-4 w-full">
            <div class="w-fit bg-surface-cream rounded-2xl border-2 border-earth-terracotta/30 py-5 px-6 sm:px-8 shadow-glow relative overflow-hidden">
                <div class="absolute top-0 left-0 w-2 h-full bg-earth-terracotta"></div>
                <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6 ml-2">
                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-earth-terracotta/10 flex items-center justify-center">
                        <span class="text-2xl sm:text-3xl">🚫</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <p class="font-display font-bold text-earth-terracotta text-lg sm:text-xl tracking-wide leading-snug text-center">
                            Приносити свої напої та продукти
                        </p>
                        <p class="font-display font-extrabold text-earth-terracotta text-xl sm:text-2xl tracking-widest uppercase mt-1 text-center">
                            ЗАБОРОНЕНО
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA кнопка -->
        <div class="text-center pt-4 pb-4">
            <a href="contacts.php#phones"
                class="inline-flex items-center gap-2 bg-accent-forest hover:bg-earth-cedar text-white text-lg font-bold py-4 px-10 rounded-full shadow-soft transform hover:-translate-y-1 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                Забронювати столик
            </a>
        </div>
    </main>

    <!-- ============================================ -->
    <!-- Футер -->
    <!-- ============================================ -->
    <footer class="bg-earth-cedar text-surface-cream/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Верхня секція -->
            <div class="py-12 grid grid-cols-1 md:grid-cols-3 gap-10 border-b border-surface-cream/10">
                <!-- Логотип та слоган -->
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

                <!-- Навігація -->
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

                <!-- Контактна інформація -->
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

            <!-- Legal & Bottom bar -->
            <div class="py-8 border-t border-surface-cream/10">
                <div class="mb-6 text-xs text-surface-cream/40 leading-relaxed space-y-4 text-center sm:text-left">
                    <p>
                        Інформація, розміщена на сайті, носить ознайомлювальний характер і не є публічною офертою. Актуальні ціни, наявність вільних місць та умови надання послуг уточнюйте в адміністратора під час бронювання за телефоном.
                    </p>
                    <p>
                        Відвідування лазні та супутні процедури мають протипоказання. Будь ласка, переконайтеся у відсутності обмежень за станом здоров'я.
                    </p>
                    <p>
                        Юридична адреса: м. Одеса, вул. Єфімова, 15.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-center gap-3">
                    <p class="text-xs text-surface-cream/40">&copy; <?php echo date('Y'); ?> Банька «Легкий Пар». Всі права захищені.</p>
                    <a href="index.php" class="text-xs text-surface-cream/40 hover:text-primary transition-colors">Повернутися на головну &rarr;</a>
                </div>
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
