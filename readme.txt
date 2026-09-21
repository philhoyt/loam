=== Loam ===
Contributors: philhoyt
Requires at least: 6.9
Tested up to: 7.1
Requires PHP: 8.2
Stable tag: 0.9.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: one-column, wide-blocks, block-patterns, block-styles, custom-colors, custom-logo, custom-menu, editor-style, featured-images, full-site-editing, rtl-language-support, style-variations, threaded-comments, translation-ready, entertainment, food-and-drink

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

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= How do I build a home page like the demo? =

Add a new page. In the pattern chooser, open the Pages tab and pick Home. Set the page's template to "Page (No Title)" so the hero's own heading is the only title, then set it as your front page under Settings > Reading.

= How do I list my events? =

Either edit the Upcoming events pattern by hand (three cards with date, title and ticket buttons), or publish each event as a post in an Events category and use the Events grid pattern, which is a Query Loop you can point at that category.

= Why does my page have a plain dark header band? =

The page template uses the page's featured image as the masthead. Set a featured image, or switch the page to the "Page (No Title)" template and start it with the Split hero or Photo band pattern.

= Does Loam need a plugin? =

No. Every pattern is built from core blocks. The Events grid lists posts, so an events plugin is optional; the Booking and Contact starters link to an email address and leave room for the form plugin of your choice.

= How do I change the colours? =

Open the Site Editor, go to Styles and choose a colour preset, or edit the palette. Every band, button and link follows the palette; the patterns carry no fixed colour values.

== Changelog ==

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
