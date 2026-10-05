=== Loam ===
Contributors: philhoyt
Requires at least: 6.9
Tested up to: 7.1
Requires PHP: 8.2
Stable tag: 1.1.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: e-commerce, one-column, wide-blocks, block-patterns, block-styles, custom-colors, custom-logo, custom-menu, editor-style, featured-images, full-site-editing, rtl-language-support, style-variations, threaded-comments, translation-ready, entertainment, food-and-drink

A block theme for venues, bars, bowling alleys and clubs

== Description ==

Loam is built around heavy uppercase headings (Unbounded), a grotesk body face (Space Grotesk), chunky buttons and a cream page ground broken up by accent-coloured bands.

* Patterns for the things a venue site needs: a split hero, four signpost tiles, upcoming events cards, a photo band with a button, alternating media bands, a call to action band, a food and drink menu, hours and location, an FAQ and a follow band.
* Home, About, Events, Menu and Contact page starters compose those patterns; pick one from the Pages tab when you add a page.
* An Events grid Query Loop starter turns a category of posts into a listing.
* Three section styles (Accent, Dark, Tint) restyle a Group, Columns or Cover and everything inside it from one control.
* Four colour presets named for the seasons (Summer, Spring, Autumn, Winter) share the same slugs, so switching between them keeps saved content intact, and each one is checked against the same contrast table.
* Two typography presets: Unbounded & Space Grotesk, and an all-Space Grotesk alternative.
* Pages and posts use the featured image as their masthead; a "Page (No Title)" template is there for pages that start with a hero.
* The mobile menu opens as a full-screen band in the accent colour.
* WooCommerce templates for the shop, product categories and attributes, product search, single products, cart, a pared-back checkout, My Account, order confirmation and the coming soon page, styled to match the rest of the site.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate.

== Frequently Asked Questions ==

= How do I build a home page like the demo? =

Add a new page. In the pattern chooser, open the Pages tab and pick Home. Set the page's template to "Page (No Title)" so the hero's own heading is the only title, then set it as your front page under Settings > Reading.

= How do I list my events? =

Either edit the Upcoming events pattern by hand (three cards with date, title and ticket buttons), or publish each event as a post in an Events category and use the Events grid pattern, which is a Query Loop you can point at that category.

= Why does my page have a plain dark header band? =

The page template uses the page's featured image as the masthead. Set a featured image, or switch the page to the "Page (No Title)" template and start it with the Split hero or Photo band pattern.

= Does Loam need a plugin? =

No. The patterns in the inserter are built from core blocks. The store templates use WooCommerce's blocks and apply only while WooCommerce is active. The Events grid lists posts, so an events plugin is optional. The Booking and Contact starters link to an email address and leave room for a form plugin.

= Does Loam support WooCommerce? =

Yes. With WooCommerce active, Loam's own templates are used for the shop, product category, tag and attribute archives, product search, single products, cart, checkout, My Account, order confirmation and the coming soon page, and WooCommerce's forms, notices, cart and checkout pick up the theme's colours, type and field style. Without WooCommerce none of this loads. The My Account template applies to the page with the slug "my-account", which is the one WooCommerce creates.

= How do I change the colours? =

Open the Site Editor, go to Styles and choose a colour preset, or edit the palette. Bands, buttons and links follow the palette; the patterns carry no fixed colour values. WooCommerce's error and warning notices keep their own red and amber.

= Is there a dark colour preset? =

No. All four presets are light, because the section styles assume a light page ground.

= Why does WordPress 6.9 need to be the minimum? =

The FAQ pattern uses the core Accordion block, added in WordPress 6.9.

== Changelog ==

= 1.1.0 =
* Add: Pages show comments when the page has comments open or already has some.
* Add: Posts split into pages in the classic editor get page links. Page links are large enough to tap.
* Add: Styles for classic editor content. The gallery shortcode is a grid, aligned images align, and blockquotes, tables, captions and code match their block equivalents.
* Change: Body text is a fixed 18px. It was about 14px on a phone and 16px on a 1280px screen.
* Change: Page titles are 33px on a phone instead of 37px, so fewer words split across lines.
* Fix: Long words, wide images, captions and embeds no longer make the page scroll sideways on a phone.
* Fix: The header band on posts and pages keeps a long title away from the screen edge and the site header.
* Fix: A page that starts or ends with plain text has space under the header band and above the footer.
* Fix: The first block of a post no longer sits flush against the post header.
* Fix: Replies in deep comment threads keep a readable width on a phone. Numbered lists inside comments show their numbers.
* Fix: Password-protected posts no longer show a stray dot before the author or a Comments heading with nothing under it.

= 1.0.0 =
* Add: WooCommerce templates for the shop and product archives, product search, single products, cart, checkout, My Account, order confirmation and coming soon, with a category button row, upsells and related products.
* Add: Checkout Header and Checkout Footer template parts with the logo, a "Secure checkout" label and a link back to the cart, and no menu.
* Add: WooCommerce forms, notices, product tabs, cart, checkout and mini cart follow the theme's palette, type and field style, loaded only while WooCommerce is active.
* Fix: The WooCommerce account and mini cart icons sit next to the menu instead of being spread across the header.
* Fix: Accessibility: the closed mini cart drawer is out of the keyboard tab order.

= 0.10.0 =
* Add: Navigation open and close toggles drawn as bold bars to match the display face, sized by theme.json tokens.
* Add: A WordPress Playground demo with the five page starters, linked from the README.
* Fix: Page content no longer shows a second block of empty space above the first band and below the last one; bands sit flush against the masthead and the footer.
* Fix: Accessibility: the page list fallback inside the navigation block renders one list instead of a nested one, tile and event card images are plain images with the heading as the link, and event titles under a page heading use the h2 level. Every template passes an axe-core WCAG 2.1 AA check at desktop and phone widths.
* Change: Post content gets no automatic edge margins; content that starts or ends with an ordinary block wraps it in a padded group, as the About and Menu starters do.

= 0.9.0 =
* Add: Summer, Spring, Autumn and Winter colour presets and two typography presets (Unbounded & Space Grotesk, Space Grotesk).
* Add: Accent, Dark and Tint section styles for Group, Columns and Cover blocks.
* Add: Split hero, photo band, four tiles, upcoming events, events grid, alternating media bands, call to action band, menu list, FAQ, hours and location and follow band patterns, with Home, About, Events, Menu and Contact page starters.
* Add: Featured image mastheads on pages and posts, a Page (No Title) template, comments styled as bubbles, an author card and a keep reading row.
* Add: Full-screen accent-coloured mobile menu; the four tiles become a 2x2 grid on phones.
* Add: FAQ pattern built on the core Accordion block (WordPress 6.9 or later).
* Add: Unbounded and Space Grotesk bundled as variable fonts; CC0 placeholder artwork.
* Add: Right-to-left stylesheet, served automatically on RTL sites.

== Copyright ==

Loam WordPress Theme, (C) 2026 Phil Hoyt
Loam is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Unbounded font
Copyright 2022 The Unbounded Project Authors (https://github.com/googlefonts/unbounded)
License: SIL Open Font License, 1.1, https://opensource.org/licenses/OFL-1.1
Source: https://fonts.google.com/specimen/Unbounded

Space Grotesk font
Copyright 2020 The Space Grotesk Project Authors (https://github.com/floriankarsten/space-grotesk)
License: SIL Open Font License, 1.1, https://opensource.org/licenses/OFL-1.1
Source: https://fonts.google.com/specimen/Space+Grotesk

Placeholder artwork in assets/images (masthead-1.svg, masthead-2.svg, masthead-3.svg, tile-1.svg, tile-2.svg, tile-3.svg, tile-4.svg, card-1.svg, card-2.svg, card-3.svg, portrait.svg)
Created by Phil Hoyt for this theme, released under CC0 1.0 Universal (Public Domain Dedication), https://creativecommons.org/publicdomain/zero/1.0/
