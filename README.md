# Intersect_CMS (CodeIgniter 4 Edition)

A modern CMS for Intersect Engine built with **CodeIgniter 4**  
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/9f865cc165e8413fa39d57bf1c4e3c66)](https://www.codacy.com/gh/WhiteAssassins/Intersect_CMS/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=WhiteAssassins/Intersect_CMS&amp;utm_campaign=Badge_Grade)  
[![CodeFactor](https://www.codefactor.io/repository/github/whiteassassins/intersect_cms/badge)](https://www.codefactor.io/repository/github/whiteassassins/intersect_cms)

> 🚧 This branch is under active development. Expect updates and improvements.

## Features

- Built using **CodeIgniter 4**
- Updated folder structure and improved modularity
- Multilanguage support with session-based language switching
- REST API integration with Intersect Server
- Clean and responsive frontend design

## Structure

- `app/` – Controllers, Models, Views, Config
- `public/` – Public web root (index.php, assets)
- `vendor/` – Composer dependencies
- `writable/` – Cache, logs, uploads, sessions
- `.env` – Environment variables and database config

## Requirements

- PHP 8.1 or higher
- MySQL 5.7+ or MariaDB
- Apache with mod_rewrite or Nginx
- Intersect Game Server

## Quick Setup

```bash
git clone https://github.com/WhiteAssassins/Intersect_CMS.git
cd Intersect_CMS
composer install
cp env .env
php spark key:generate
```

1. Configure `.env` with your database and base URL.
2. Run `php spark migrate` if migrations are included.
3. Serve the app using Apache/Nginx pointing to `/public`.

## Screenshots

Coming soon with the CI4 release!

## Stay Connected

- Discord: [https://discord.gg/2XcYgevUws](https://discord.gg/2XcYgevUws)
- Twitter: [@whiteassassinsr](https://twitter.com/whiteassassinsr)
- Support us: [Buy Me a Coffee ☕](https://www.buymeacoffee.com/whiteassassins)
