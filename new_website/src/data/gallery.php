<?php
// =========================================================================
// 📸 ФОТОГАЛЕРЕЯ — НАЛАШТУВАННЯ ЗОБРАЖЕНЬ
// =========================================================================
//
// ЯК ДОДАТИ НОВЕ ФОТО:
// 1. Завантажте фото у папку "images/gallery/" або "images/gallery2/"
// 2. Додайте новий рядок у масив нижче за зразком:
//
//    ['thumb' => 'images/gallery/НАЗВА_p.jpg', 'full' => 'images/gallery/НАЗВА_b.jpg', 'alt' => 'Опис фото'],
//
//    — 'thumb' — шлях до маленької версії фото (прев'ю для сітки)
//    — 'full'  — шлях до великої версії фото (відкривається у лайтбоксі)
//    — 'alt'   — короткий опис фото українською (для SEO та доступності)
//
// ЯК ВИДАЛИТИ ФОТО:
//    Просто видаліть відповідний рядок з масиву нижче.
//
// ЯК ЗМІНИТИ ПОРЯДОК:
//    Перемістіть рядки у масиві — фото виводяться зверху вниз у тому ж порядку.
//
// УВАГА: Не забудьте кому після кожного рядка, окрім останнього!
// =========================================================================

return [
    // — Інтер'єр та атмосфера —
    ['thumb' => 'images/gallery/001_p.jpg', 'full' => 'images/gallery/001_b.jpg', 'alt' => 'Затишний інтер\'єр лазні'],
    ['thumb' => 'images/gallery/002_p.jpg', 'full' => 'images/gallery/002_b.jpg', 'alt' => 'Зона відпочинку'],
    ['thumb' => 'images/gallery/003_p.jpg', 'full' => 'images/gallery/003_b.jpg', 'alt' => 'Кімната релаксу'],
    ['thumb' => 'images/gallery/004_p.jpg', 'full' => 'images/gallery/004_b.jpg', 'alt' => 'Трапезна'],
    ['thumb' => 'images/gallery/005_p.jpg', 'full' => 'images/gallery/005_b.jpg', 'alt' => 'Декор та інтер\'єр'],
    ['thumb' => 'images/gallery/006_p.jpg', 'full' => 'images/gallery/006_b.jpg', 'alt' => 'Частина комплексу'],

    // — Парна та процедури —
    ['thumb' => 'images/gallery/007_p.jpg', 'full' => 'images/gallery/007_b.jpg', 'alt' => 'Парна кімната'],
    ['thumb' => 'images/gallery/008_p.jpg', 'full' => 'images/gallery/008_b.jpg', 'alt' => 'Процедурна зона'],
    ['thumb' => 'images/gallery/009_p.jpg', 'full' => 'images/gallery/009_b.jpg', 'alt' => 'Атмосфера парної'],
    ['thumb' => 'images/gallery/010_p.jpg', 'full' => 'images/gallery/010_b.jpg', 'alt' => 'Віники та приладдя'],

    // — Басейн та територія —
    ['thumb' => 'images/gallery/011_p.jpg', 'full' => 'images/gallery/011_b.jpg', 'alt' => 'Басейн для охолодження'],
    ['thumb' => 'images/gallery/012_p.jpg', 'full' => 'images/gallery/012_b.jpg', 'alt' => 'Літній майданчик'],
    ['thumb' => 'images/gallery/013_p.jpg', 'full' => 'images/gallery/013_b.jpg', 'alt' => 'Територія комплексу'],
    ['thumb' => 'images/gallery/014_p.jpg', 'full' => 'images/gallery/014_b.jpg', 'alt' => 'Зовнішній вигляд'],
    ['thumb' => 'images/gallery/015_p.jpg', 'full' => 'images/gallery/015_b.jpg', 'alt' => 'Панорама комплексу'],

    // — Додаткові фото (gallery2) —
    ['thumb' => 'images/gallery2/01s.jpg', 'full' => 'images/gallery2/01.jpg', 'alt' => 'Нові фото комплексу'],
    ['thumb' => 'images/gallery2/02s.jpg', 'full' => 'images/gallery2/02.jpg', 'alt' => 'Оновлений інтер\'єр'],
    ['thumb' => 'images/gallery2/03s.jpg', 'full' => 'images/gallery2/03.jpg', 'alt' => 'Нова зона відпочинку'],
];
