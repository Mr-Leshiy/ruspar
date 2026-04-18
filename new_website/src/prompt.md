## [ROLE DEFINITION]
Act as a Senior Fullstack Web Architect and UI/UX Design Lead. Your goal is to engineer a modern, premium, high-conversion website for a traditional Ukrainian sauna business named "Банька 'Легкий Пар'".

## [TECH STACK & ARCHITECTURE]

- Backend/Templating: Pure PHP 8.x. (No database yet).

- Frontend: Semantic HTML5, Tailwind CSS (via CDN for rapid deployment, configured with custom colors), and minimal Vanilla JS for interactions (mobile menu, gallery lightbox).

- Architecture (CRITICAL FOR SCALABILITY): You must separate data from presentation. Create a /data directory with files like prices.php, menu.php, and gallery.php that return standard PHP arrays. The UI components must loop through these arrays. This ensures the business owner can update prices and photos easily without touching the HTML markup.

- Encoding: All files MUST be saved in UTF-8. The main entry point must include header('Content-Type: text/html; charset=utf-8');.

## [LANGUAGE CONSTRAINT]

- Language: UKRAINIAN. All generated UI text, placeholder copy, comments explaining the UI to the user, and meta tags MUST be in Ukrainian. (Technical code comments can remain in English).

## [USER EXPERIENCE (UX) & FLOW]
Build a long-scroll, Single Page Application (SPA) style layout with smooth scrolling. The primary goal is conversion (booking).

- Sticky Navigation: Must contain a highly visible, persistent "Забронювати" (Book Now / Contacts) button.

Flow: 1. Hero Section: Warm, inviting, conveying heat and relaxation.
2. About (Про нас): Short, folkloric but professional introduction.
3. Pricelist (Прайс-лист): Clean, easily readable data tables or cards for sauna services.
4. Menu (Меню ресторану): Restaurant offerings with prices.
5. Gallery (Галерея): Masonry or grid layout for photos (ensure easy image path swapping via PHP data arrays).
6. Special Offers (Акції): Highlighted cards for current deals.
7. Contacts (Контакти & Бронювання): The ultimate destination. Phone numbers, address, map embed placeholder, and clear booking instructions.

## [UI / VISUAL DESIGN (THE "VIBE")]
The aesthetic is "Neo-Traditional Ukrainian Folkloric." It must feel like a premium, expensive, artisanal experience—not a generic corporate template.

- Core Atmosphere: Warm, cozy, artisanal, storybook-like but polished.

- Color Palette (Configure via Tailwind theme):

    - Primary Background/Base: Soft Amber / Apricot (#F9B162) - simulating the glow of a wood-fired sauna.
    - Accents: Forest & Sage Green (for buttons, highlights, representing birch veniks).
    - Earthy Anchors: Cedar & Terracotta (rich browns for borders, dividers, or dark backgrounds).
    - Contrast: Cerulean / Cyan (use sparingly for "refreshing" accents or links).
    - Text & Surface: Deep Charcoal (for readable text) and Cream/Vanilla (for card backgrounds and steam elements).

- Typography:

    - Headings: A custom decorative, arched/vintage slab display font (e.g., specify a Google Font like 'Podkova', 'Russo One', or 'Playfair Display' with heavy weights and text-shadows to mimic the logo's white outline).
    - Body/UI: A sturdy, highly legible sans-serif (e.g., 'Inter', 'Montserrat', or 'Manrope').

- Styling Rules: Utilize soft gradients, rounded corners (large border-radius for "comfy" shapes), and subtle drop shadows. Avoid sharp, aggressive geometric lines.

## [DELIVERABLES REQUESTED]

1. Provide the exact directory structure.

2. Provide the tailwind.config.js script block with the custom color palette.

3. Provide the PHP data array structure for the prices.php and menu.php to prove the data separation works. 
**NOTE:** The data for the prices.php and menu.php should be taken from the `/data` directory.

4. Provide the index.php shell and the Hero Section component code to establish the visual baseline.