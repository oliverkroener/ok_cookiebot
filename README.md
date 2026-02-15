# Cookiebot Cookie Consent (ok_cookiebot)

[![TYPO3 12](https://img.shields.io/badge/TYPO3-12-orange?logo=typo3)](https://get.typo3.org/version/12)
[![TYPO3 13](https://img.shields.io/badge/TYPO3-13-orange?logo=typo3)](https://get.typo3.org/version/13)
[![TYPO3 14](https://img.shields.io/badge/TYPO3-14-orange?logo=typo3)](https://get.typo3.org/version/14)
[![License: GPL v2+](https://img.shields.io/badge/License-GPL%20v2%2B-blue)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
[![Version](https://img.shields.io/badge/version-1.0.0-green)](https://github.com/okroener/ok_cookiebot)

TYPO3 extension that provides a backend module to manage Cookiebot cookie consent banner and declaration scripts per site.

## Features

- **Backend module** under the "Web" section with page tree navigation for managing Cookiebot scripts per site
- **Two script fields**: banner script (rendered in `<head>`) and declaration script (rendered before `</body>`)
- **Per-site configuration**: scripts are stored per site root in `sys_template` records
- **Automatic frontend rendering** via TypoScript `USER` objects (`lib.cookiebotHeadScript` / `lib.cookiebotBodyScript`)
- **Multi-language backend**: English and German translations
- **Custom SVG icon** for the backend module

## Requirements

- TYPO3 12.4 LTS, 13.4 LTS, or 14.x
- PHP (no explicit constraint — follows TYPO3 core requirements)

## Installation

### Composer

```bash
composer require oliverkroener/ok-cookiebot
```

### Local path repository

Add to your root `composer.json`:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "packages/ok_cookiebot"
        }
    ]
}
```

Then run:

```bash
composer require oliverkroener/ok-cookiebot:@dev
```

### Activate

After installation, include the static TypoScript template **[kroener.DIGITAL] Cookiebot** in your site's template record.

## Configuration

### TypoScript

Include the static template to enable automatic frontend script rendering. The extension registers two TypoScript objects:

| Object | Placement | Description |
|---|---|---|
| `lib.cookiebotHeadScript` | `page.headerData.261487170` | Renders the banner script in `<head>` |
| `lib.cookiebotBodyScript` | `page.footerData.261487170` | Renders the declaration script before `</body>` |

### Backend Module

1. Navigate to **Web > Cookiebot** in the TYPO3 backend
2. Select a page within a site that has a root template
3. Paste the Cookiebot banner script (for `<head>`) and declaration script (for `<body>`)
4. Click **Save**

Scripts are stored in the `sys_template` record of the site root page via custom fields `tx_ok_cookiebot_banner_script` and `tx_ok_cookiebot_declaration_script`.

## Architecture

```
ok_cookiebot/
├── Classes/
│   ├── Controller/Backend/
│   │   └── ConsentController.php      # Backend module controller (index + save)
│   └── Rendering/
│       └── CookiebotScriptRenderer.php # Frontend TypoScript USER renderer
├── Configuration/
│   ├── Backend/Modules.php             # Backend module registration
│   ├── Icons.php                       # SVG icon registration
│   ├── Services.yaml                   # DI autowiring
│   ├── TCA/Overrides/sys_template.php  # Static TypoScript file registration
│   └── TypoScript/setup.typoscript     # Frontend script rendering setup
├── Resources/
│   ├── Private/
│   │   ├── Language/                   # XLIFF translations (en, de)
│   │   └── Templates/Backend/          # Fluid backend templates
│   └── Public/
│       ├── Css/                        # Backend module stylesheets
│       ├── Icons/                      # Extension & module icons
│       └── JavaScript/                 # Backend module JavaScript
└── ext_localconf.php                   # TypoScript setup import
```

## License

GPL-2.0-or-later

## Author

**Oliver Kroener** — [oliver-kroener.de](https://www.oliver-kroener.de) — [ok@oliver-kroener.de](mailto:ok@oliver-kroener.de)
