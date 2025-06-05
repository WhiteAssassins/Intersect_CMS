# Intersect_CMS
CMS for Intersect Engine [![Codacy Badge](https://app.codacy.com/project/badge/Grade/9f865cc165e8413fa39d57bf1c4e3c66)](https://www.codacy.com/gh/WhiteAssassins/Intersect_CMS/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=WhiteAssassins/Intersect_CMS&amp;utm_campaign=Badge_Grade) [![CodeFactor](https://www.codefactor.io/repository/github/whiteassassins/intersect_cms/badge)](https://www.codefactor.io/repository/github/whiteassassins/intersect_cms)

Intersect_CMS es un gestor de contenido construido con **CodeIgniter 3** para servidores que usan el motor de juegos Intersect. Dentro del repositorio encontrarás el núcleo del framework, los archivos de la aplicación y dependencias instaladas mediante Composer.

## Estructura general
- `index.php` – punto de entrada que carga el framework.
- `application/` – controladores, modelos, vistas y archivos de configuración.
- `system/` – carpeta del sistema de CodeIgniter 3.
- `public/` – recursos estáticos (CSS, JS, fuentes, etc.).
- `vendor/` – dependencias de PHP instaladas con Composer.

## Requerimientos
- PHP 7.4 o superior
- MySQL Server
- Apache Server
- Intersect Server

## Instalación rápida
1. Clona el repositorio y ejecuta `composer install` para obtener las dependencias.
2. Crea una base de datos y ajusta `application/config/database.php` con tus credenciales.
3. Configura `base_url` y otros parámetros en `application/config/config.php`.
4. Sirve el proyecto a través de Apache apuntando a `index.php`.

Encontrarás una guía detallada en [Ascension Game Dev](https://www.ascensiongamedev.com/topic/6512-intersect-cms-novo/).

## Migración a CodeIgniter 4
El proyecto planea actualizarse a CodeIgniter 4. Se recomienda crear una rama aparte para experimentar con la migración:

```bash
git checkout -b ci4-upgrade
```

En esa rama podrás instalar CodeIgniter 4 como base y portar gradualmente los controladores y vistas.

## Fotos
![N|Solid](https://i.postimg.cc/65v014v3/1.png)
![N|Solid](https://i.postimg.cc/h4wsr1h6/2.png)
![N|Solid](https://i.postimg.cc/qvHLfBsG/3.png)

## Adicional
- Discord: <https://discord.gg/2XcYgevUws>
- Twitter: <https://twitter.com/whiteassassinsr/>
- Buy Me a Coffee: <https://www.buymeacoffee.com/whiteassassins>
