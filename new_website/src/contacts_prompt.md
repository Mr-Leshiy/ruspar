## [CURRENT STATE & NEXT PHASE]
The Gallery execution was flawless. We are now moving to the final and most crucial phase: **Phase 5: The Contacts & Booking Page (Контакти та Бронювання)**.

## [TASK OVERVIEW]
This business does **not** use an automated online booking system. All reservations are made via direct phone calls to the administrator. Therefore, this page must be hyper-optimized to drive phone calls and provide location data.

## [STEP 1: DATA ARCHITECTURE]
1. Create `/data/contacts.php`.
2. This file should return an array containing the physical address, an array of phone numbers, and a placeholder variable for the Google Maps embed URL. 
3. Leave clear comments (in UKRAINIAN) explaining how to update the phone numbers and the map URL.

## [STEP 2: UI/UX PRESENTATION & LAYOUT]
Create the frontend component for the Contacts page (e.g., `contacts_page.php` or `components/contacts.php`).

**UI/UX Requirements:**
1. **The "Call to Action" (Highest Priority):** The phone numbers must be the largest, most visually striking elements on the page. Use the primary decorative font or a massive weight of the UI font.
2. **Click-to-Call:** Every phone number MUST be wrapped in an anchor tag with a `tel:` href attribute so mobile users can tap to call instantly. Add a hover state (e.g., text color change to Forest Green) to indicate they are clickable.
3. **Split Layout (Desktop):** Use a 2-column layout on medium/large screens.
   - *Left Column:* "How to Book" (Як забронювати) instructions, massive phone numbers, and the physical address with an icon (e.g., a map pin).
   - *Right Column:* The Google Maps embed.
   - *Mobile:* These columns should gracefully stack (Text first, Map second).
4. **Google Maps Embed Placeholder:** Create a responsive container (using aspect ratio classes like `aspect-square` or `aspect-video`) holding an `<iframe>`. 
   - You MUST leave highly descriptive, step-by-step comments in the HTML/PHP (in UKRAINIAN) explaining exactly how the user can generate an embed code from Google Maps and where to paste the `src` link.
   - Apply our established styling to the map container (e.g., `rounded-2xl overflow-hidden shadow-lg border border-gray-100`).

## [DELIVERABLES REQUESTED]
1. Provide the complete PHP code for `/data/contacts.php` with instructional comments.
2. Provide the complete HTML/PHP/Tailwind code for the visual Contacts layout.
3. Ensure the aesthetic matches the established "Neo-Traditional" vibe (warm, inviting, readable).