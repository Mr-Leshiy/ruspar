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
        }

        .heading-shadow {
            text-shadow: 2px 2px 0px rgba(253, 251, 247, 0.8),
                4px 4px 6px rgba(94, 58, 47, 0.1);
        }

        /* Лінія-пунктир між назвою страви та ціною */
        .menu-leader {
            display: flex;
            align-items: baseline;
            gap: 0.4rem;
        }

        .menu-dots {
            flex: 1;
            border-bottom: 1.5px dotted rgba(94, 58, 47, 0.18);
            min-width: 16px;
            margin-bottom: 3px;
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

        /* Декоративна лінійка у заголовку категорії */
        .category-divider {
            height: 2px;
            background: linear-gradient(90deg, rgba(94, 58, 47, 0.25) 0%, rgba(249, 177, 98, 0.3) 50%, transparent 100%);
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
    <section class="pt-28 pb-10 relative overflow-hidden">
        <!-- Декоративні плями -->
        <div class="absolute inset-0 pointer-events-none opacity-30">
            <div class="absolute top-10 right-1/4 w-72 h-72 bg-surface-cream rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-primaryDark rounded-full filter blur-3xl opacity-40"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-extrabold text-earth-cedar leading-tight mb-5 heading-shadow">
                Меню ресторану
            </h1>
            <p class="text-lg text-earth-cedar/80 max-w-2xl mx-auto leading-relaxed">
                Домашня українська кухня, страви з мангалу та ароматні напої — все, щоб доповнити ваш відпочинок.
            </p>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- Навігація по категоріях -->
    <!-- ============================================ -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-6">
        <div class="flex flex-wrap gap-2 justify-center">
            <?php foreach ($sections as $section): ?>
                <a href="#<?php echo $section['id']; ?>"
                   class="px-4 py-2 rounded-full text-sm font-medium bg-surface-cream/60 hover:bg-surface-cream text-earth-cedar hover:text-earth-terracotta transition-all duration-200 border border-transparent hover:border-primary/40">
                    <span class="mr-1"><?php echo $section['icon']; ?></span><?php echo htmlspecialchars($section['title']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- Контент Меню — Двоколонковий Масонрі -->
    <!-- TODO: деякі позиції треба підігнати по ширині. Довгий текст - зʼїзжає ціна. -->
    <!-- ============================================ -->
    <main class="pb-16 pt-2">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="menu-masonry">

                <?php foreach ($sections as $section): ?>
                    <div id="<?php echo $section['id']; ?>" class="menu-category scroll-mt-28">
                        <div class="bg-surface-cream rounded-3xl shadow-soft overflow-hidden border border-primary/15">

                            <!-- Заголовок категорії -->
                            <div class="px-6 sm:px-7 pt-6 pb-4">
                                <div class="flex items-center gap-3 mb-2">
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
                                <div class="category-divider"></div>
                            </div>

                            <!-- Позиції меню -->
                            <div class="px-6 sm:px-7 pb-5 space-y-0">
                                <?php foreach ($section['items'] as $index => $item): ?>
                                    <div class="group py-3 rounded-lg px-1 -mx-1 hover:bg-primary/[0.06] transition-colors duration-150 <?php echo $index < count($section['items']) - 1 ? 'border-b border-primary/[0.07]' : ''; ?>">

                                        <!-- Назва страви + пунктир + ціна -->
                                        <div class="menu-leader">
                                            <span class="font-semibold text-earth-cedar text-[15px] group-hover:text-earth-terracotta transition-colors duration-150 flex-shrink-0 max-w-[55%] sm:max-w-[65%]">
                                                <?php echo htmlspecialchars($item['name']); ?>
                                            </span>
                                            <span class="menu-dots hidden sm:block"></span>

                                            <!-- Порція/Вага (бейдж) -->
                                            <?php if (!empty($item['portion']) && $item['portion'] !== '—'): ?>
                                                <span class="flex-shrink-0 text-xs text-surface-charcoal/40 font-medium bg-primary/10 px-2 py-0.5 rounded-full hidden sm:inline-block">
                                                    <?php echo htmlspecialchars($item['portion']); ?>
                                                </span>
                                            <?php endif; ?>

                                            <!-- Ціна -->
                                            <span class="flex-shrink-0 font-display font-bold text-accent-forest text-base sm:text-lg whitespace-nowrap ml-auto sm:ml-2">
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
                                                <span class="inline-block text-xs bg-primary/10 text-earth-cedar/60 px-2 py-0.5 rounded-full">
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

        <!-- CTA кнопка -->
        <div class="text-center pt-10 pb-4">
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

            <!-- Нижній рядок -->
            <div class="py-6 flex flex-col sm:flex-row justify-between items-center gap-3">
                <p class="text-xs text-surface-cream/40">&copy; <?php echo date('Y'); ?> Банька «Легкий Пар». Всі права захищені.</p>
                <a href="index.php" class="text-xs text-surface-cream/40 hover:text-primary transition-colors">Повернутися на головну &rarr;</a>
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
