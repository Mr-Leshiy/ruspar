## [CURRENT STATE & NEXT PHASE]
Outstanding execution on the Pricelist. The visual baseline and data separation are working perfectly. We are now moving to **Phase 3: The Restaurant Menu (Меню ресторану)**.

## [TASK OVERVIEW]
Your task is to build the frontend UI for the restaurant menu. 
*CRITICAL DATA NOTE:* You do not need to parse markdown for this phase. The data is already structured and ready to use in the `src/data/menu.php` file. Your job is to `require` this file and build the visual presentation.

## [UI/UX & LAYOUT STRATEGY]
While this page must share the exact same visual DNA (colors, typography, shadows) as the Pricelist, a food menu requires a different layout strategy to feel appetizing and legible.

**Design Requirements:**
1. **The Physical Menu Metaphor:** On desktop (`md:` or `lg:` breakpoints in Tailwind), utilize a 2-column masonry or CSS Grid layout. This mimics an elegant physical restaurant menu. On mobile, it must gracefully stack into a single column.
2. **Category Headers:** Distinct, beautifully styled headers for food categories (e.g., "Холодні закуски" [Cold Snacks], "Страви на мангалі" [Grill], "Напої" [Beverages]). Use the established decorative font.
3. **Item Anatomy:** - **Dish Name:** Bold, primary text color.
   - **Ingredients/Description:** Smaller, lighter text (e.g., `text-gray-600`, italicized) placed directly beneath the dish name. This is crucial for food menus.
   - **Weight/Volume:** Subtle badge or muted text (e.g., "200г" or "0.5л").
   - **Price:** Right-aligned, prominent. 
4. **Leader Lines:** If possible, use a flex layout with a border-bottom or pseudo-element to create a subtle dotted line between the dish name and the price (e.g., `Борщ український ................... 150 грн`).

## [DELIVERABLES REQUESTED]
1. Provide the complete HTML/PHP/Tailwind code for the visual Restaurant Menu component (e.g., `menu_page.php` or `components/menu.php`).
2. Show exactly how you are iterating through the array provided by `src/data/menu.php`.
3. Ensure all placeholder text, categories, and structural comments are in UKRAINIAN.

## ADDITIONAL INSTRUCTIONS

DO NOT TRY TO RUN `php` COMMANDS. I AM RUNNING EVERYTHING IN Docker AND CHECKING THE RESULTS THERE MANUALLY. I HAVE NO `php` INSTALLED ON MY MACHINE.