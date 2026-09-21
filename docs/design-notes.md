# Loam design notes

Loam is a general-release block theme for the WordPress Theme Directory, loosely based on
the anatomy of mahalls20lanes.com (a bowling alley, bar and music venue) and built to later
rebuild foundryconcertclub.com (a music venue with a show list, about, menus, FAQ, booking
and contact pages). This file records what was borrowed, what changed for a theme that
ships to strangers, and what was carried over from Fairport.

## 1. What the reference site got right

| What                                                           | Why it works                                                      | Where it lives in Loam                                             |
| -------------------------------------------------------------- | ----------------------------------------------------------------- | ------------------------------------------------------------------ |
| Cream ground, one loud accent, near-black ink                  | Three colours carry the whole identity; every band is one of them | `theme.json` palette roles `base` / `primary` / `contrast`         |
| Heavy uppercase display headings over a grotesk body           | Reads as a marquee without a single image                         | `elements.heading` (Unbounded, 800, uppercase), body Space Grotesk |
| Chunky uppercase buttons, black on the accent, accent on cream | Buttons read at a glance from across the page                     | `elements.button`, section styles                                  |
| Split image / text hero, then a row of signpost tiles          | "Where do I go" answered in the first two screens                 | `banner-split`, `tiles-four`                                       |
| Events grid on the accent band with two buttons per card       | Ticket links are the point of a venue site                        | `events-list` (static), `events-query` (Query Loop)                |
| Full-bleed photo band with one heading and one button          | A breather between dense bands                                    | `banner-cover`                                                     |
| Alternating 50/50 media bands                                  | Cheap way to tour the rooms                                       | `media-bands` with `.is-reversed`                                  |
| Full-screen accent-coloured mobile menu                        | The menu becomes a brand moment                                   | Navigation block `overlayBackgroundColor: primary`                 |

## 2. What changed for a mass release

| Reference did                             | Loam does                                      | Why                                                                                                                                |
| ----------------------------------------- | ---------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- |
| Commercial display font (Strenuous)       | Unbounded (OFL), the closest open geometric    | Directory themes ship their fonts with licences                                                                                    |
| Coral `#F85F51`                           | `#EC5038`                                      | Black text on the original is fine, but the coral itself is 2.7:1 on cream; 3:1 is needed for the link underline and accent shapes |
| Site-specific copy, links and social URLs | Placeholder copy, `#` links, service root URLs | Nothing may point at one organisation                                                                                              |
| One palette                               | Four seasonal presets with identical slugs     | Switching never breaks saved content; every preset passes `npm run check:contrast`                                                 |
| Fixed header with JS burger               | Core navigation block, no theme JS             | Directory review, and the Interactivity API already does the overlay                                                               |
| Event listings from a ticketing feed      | Static cards plus a Query Loop starter         | A theme cannot ship a post type; a plugin or a category of posts feeds the grid                                                    |

## 3. Carried over from Fairport

Role-based palette slugs; `styles/colors`, `styles/typography`, `styles/blocks`; `fontFace`
self-hosting with `OFL.txt` beside each font; CC0 placeholder SVGs referenced with
`get_theme_file_uri()`; page starters in a theme pattern category; the outline button on
`currentColor`; the band rhythm module (`_sections.scss`); the navigation underline and
overlay fixes; `page-no-title` template and no `front-page.html`; `dist/` committed;
`readme.txt` copyright section; the block markup validator.

## 4. Contrast table (must hold for every preset)

Run `npm run check:contrast`. Text pairs need 4.5:1 (body 7:1); non-text pairs 3:1.

| Pair                            | Used by                             | Min |
| ------------------------------- | ----------------------------------- | --- |
| `contrast` on `base`            | body                                | 7   |
| `contrast` on `primary`         | text and buttons on the accent band | 4.5 |
| `base` on `secondary`           | text on the dark band               | 4.5 |
| `contrast` on `contrast-light`  | text on the tint band               | 4.5 |
| `contrast-light` on `secondary` | muted text on the dark band         | 4.5 |
| `secondary` on `base`           | eyebrows and dates                  | 4.5 |
| `tertiary` on `base`            | focus ring                          | 3   |
| `contrast-medium` on `base`     | hairlines and captions              | 3   |
| `primary` on `base`             | link underline, accent shapes       | 3   |
| `primary` on `secondary`        | accent button on the dark band      | 3   |

Rule: `primary` is a band and button colour, never a text colour. Links are `contrast`
with a `primary` underline.

## 5. Rebuilding Foundry Concert Club with Loam

Not part of the theme; notes for the site build.

- Shows: keep the TicketWeb plugin (`.tw-section` markup) and style it in a small site
  plugin or the site's custom CSS, or import shows as posts in an Events category and use
  the Events grid pattern. The Upcoming events pattern is the home-page teaser either way.
- Pages map directly: Home, About, Events, Menus, FAQ (the FAQ pattern), Booking (CTA band
  plus a form plugin), Contact (Hours and location).
- Dark room feel: try the Winter preset first; a true dark palette would need `base` and
  `secondary` roles rethought because the section styles assume a light ground.
