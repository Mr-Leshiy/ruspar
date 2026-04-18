## [CURRENT STATE & NEXT PHASE]
The Restaurant Menu is complete. The project is flowing perfectly. We are now moving to **Phase 4: The Photo Gallery (Галерея)**.

## [TASK OVERVIEW]
Your task is to build a flexible, scalable image gallery. The core requirement here is **Maintainability**. The business owner will receive photos sporadically and needs to add them to the site by simply updating a PHP array, without touching the UI markup.

## [STEP 1: DATA ARCHITECTURE (THE IMAGE ARRAY)]
1. Create the file `/data/gallery.php`.
2. This file must return a simple, flat PHP array of image file paths (e.g., `['/src/image/gallery/sauna_1.jpg', '/src/image/gallery/rest_1.jpg', ...]`).
3. **CRITICAL:** Populate this array with 6-8 placeholder paths for now. You MUST leave highly descriptive, easy-to-understand comments (in UKRAINIAN) directly above the array explaining exactly how the user can add new images or change existing paths.

## [STEP 2: UI/UX PRESENTATION & INTERACTION]
Create the frontend component for the Gallery (e.g., `gallery_page.php` or `components/gallery.php`).

**UI/UX Requirements for the Gallery:**
1. **Responsive CSS Grid:** Use Tailwind CSS Grid to create an "album" feel. 
   - Mobile: 1 column (`grid-cols-1`)
   - Tablet: 2 columns (`md:grid-cols-2`)
   - Desktop: 3 or 4 columns (`lg:grid-cols-3` or `4`)
   - Use generous gaps (`gap-6` or `gap-8`).
2. **Image Styling:** Images must feel premium. Use `object-cover` to keep the grid uniform, apply our established soft rounded corners (`rounded-2xl`), and add a subtle hover effect (e.g., slight scale up `hover:scale-105` and increased shadow) to invite interaction.
3. **The Lightbox (Vanilla JS):** A gallery is useless if users can't see the details. You MUST include a minimal, dependency-free Vanilla JS lightbox. 
   - When an image is clicked, it should open in a full-screen dark overlay (e.g., `bg-black/90`).
   - Include a clear "Close" (Закрити) button or allow clicking outside the image to close.
   - *Constraint:* Do not use jQuery or external libraries. Just clean Vanilla JS written at the bottom of the file or in a separate included script.

## [DELIVERABLES REQUESTED]
1. Provide the complete PHP code for `/data/gallery.php` with the Ukrainian instructional comments.
2. Provide the complete HTML/PHP/Tailwind code for the visual Gallery grid.
3. Provide the Vanilla JS code for the Lightbox functionality.
4. Ensure the aesthetic perfectly matches the established "Neo-Traditional" vibe (e.g., Cream background container, Amber page body).