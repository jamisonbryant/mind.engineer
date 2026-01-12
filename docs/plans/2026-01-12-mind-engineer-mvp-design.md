# The Mind Engineer - MVP Site Design

## Overview

Content-first professional site for The Mind Engineer brand. Simple CMS backend, minimal public-facing site focused on essays and long-form writing.

**Stack:**
- CakePHP 5.2
- MySQL
- Markdown content (league/commonmark)
- Milligram CSS + brand customizations
- TinyMCE via CDN for admin editing

## Architecture

```
Public Site                          Admin Area (/admin)
─────────────                        ─────────────────────
/              → Home (from Pages)   /admin/login
/about         → About page          /admin/pages/*
/manifesto     → Manifesto page      /admin/articles/*
/articles      → Article listing     /admin/email-subscriptions
/articles/:slug → Article detail
```

**Authentication:**
- CakePHP Authentication plugin
- Single admin user seeded via migration
- Session-based auth, all /admin/* routes protected

## Data Model

### users
| Column | Type | Notes |
|--------|------|-------|
| id | INT (PK) | Auto-increment |
| email | VARCHAR(255) | Unique |
| password | VARCHAR(255) | Hashed |
| created | DATETIME | |
| modified | DATETIME | |

### pages
| Column | Type | Notes |
|--------|------|-------|
| id | INT (PK) | |
| slug | VARCHAR(100) | Unique |
| title | VARCHAR(255) | |
| subtitle | VARCHAR(255) | Nullable |
| content | TEXT | Markdown |
| is_published | BOOLEAN | Default true |
| created | DATETIME | |
| modified | DATETIME | |

### articles
| Column | Type | Notes |
|--------|------|-------|
| id | INT (PK) | |
| slug | VARCHAR(100) | Unique, auto-generated |
| title | VARCHAR(255) | |
| summary | TEXT | Brief abstract |
| content | TEXT | Markdown |
| status | ENUM('draft','published') | Default 'draft' |
| published_at | DATETIME | Nullable |
| created | DATETIME | |
| modified | DATETIME | |

### email_subscriptions
| Column | Type | Notes |
|--------|------|-------|
| id | INT (PK) | |
| email | VARCHAR(255) | Unique |
| confirmed | BOOLEAN | Default false |
| created | DATETIME | |

## Routes

### Public
```
GET /                    → PagesController::home()
GET /about               → PagesController::view('about')
GET /manifesto           → PagesController::view('manifesto')
GET /articles            → ArticlesController::index()
GET /articles/:slug      → ArticlesController::view($slug)
POST /subscribe          → EmailSubscriptionsController::add()
```

### Admin (prefix routing)
```
GET  /admin/login        → Admin/UsersController::login()
POST /admin/logout       → Admin/UsersController::logout()

GET  /admin/pages        → Admin/PagesController::index()
GET  /admin/pages/edit/:id → Admin/PagesController::edit($id)

GET  /admin/articles              → Admin/ArticlesController::index()
GET  /admin/articles/add          → Admin/ArticlesController::add()
GET  /admin/articles/edit/:id     → Admin/ArticlesController::edit($id)
POST /admin/articles/delete/:id   → Admin/ArticlesController::delete($id)

GET  /admin/email-subscriptions   → Admin/EmailSubscriptionsController::index()
```

## Styling

**Brand Colors:**
```css
--color-primary: #1a2744;      /* Deep navy */
--color-accent: #c9a227;       /* Brass/gold */
--color-background: #faf8f5;   /* Off-white/cream */
--color-text: #2d2d2d;         /* Near-black */
```

**Typography:**
- Headings: System serif (Georgia, Cambria, serif)
- Body: System sans (Milligram defaults)
- Code: Monospace

## Templates

**Layouts:**
- `layout/default.php` - Public site
- `layout/admin.php` - Admin area

**Public:**
- `Pages/home.php` - Hero, intro, email capture
- `Pages/view.php` - Generic page (about, manifesto)
- `Articles/index.php` - Listing
- `Articles/view.php` - Detail with CTA footer
- `element/email_capture.php` - Reusable form

**Admin:**
- `Admin/Users/login.php`
- `Admin/Pages/index.php`, `edit.php`
- `Admin/Articles/index.php`, `add.php`, `edit.php`
- `Admin/EmailSubscriptions/index.php`

## Implementation Phases

1. **Foundation** - Dependencies, migrations, seeds
2. **Models** - Table classes, validation, slug behavior
3. **Authentication** - Plugin config, login/logout, middleware
4. **Admin Area** - Layout, Pages/Articles/Subscriptions CRUD
5. **Public Site** - Layout, pages, articles, email capture
6. **Polish** - Brand CSS, error pages, flash messages, tests

## Non-Goals

- No public user registration
- No roles/permissions
- No API layer
- No heavy JS frameworks
- No payment/checkout
- No AI integration
