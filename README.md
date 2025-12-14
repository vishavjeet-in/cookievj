# CookieVJ – Cookie Notice & Consent Banner

CookieVJ is a lightweight WordPress plugin that displays a customizable cookie consent banner to inform visitors about cookie usage and record their consent choice. It helps site owners meet privacy notice requirements under regulations such as GDPR and CCPA.

> **Important:** This plugin does not provide legal advice. Compliance depends on your website’s configuration and applicable laws.

---

## Plugin Details

- **Plugin Name:** CookieVJ – Cookie Notice & Consent Banner  
- **Author:** Vishavjeet Choubey  
- **Contributors:** wpvishavjeet  
- **Requires WordPress:** 5.0 or higher  
- **Tested up to:** 6.9  
- **Requires PHP:** 7.4 or higher  
- **Stable Version:** 1.0.0  
- **License:** GPL v2 or later  
- **License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

---

## Description

CookieVJ adds a cookie consent notice to your website, allowing visitors to accept or reject cookies. The consent choice is stored using a browser cookie and respected on subsequent visits.

This plugin **does not block cookies automatically**. If your site requires cookie blocking before consent, additional implementation or plugins are needed.

---

## Features

- Easy setup via **Settings → CookieVJ**
- Enable or disable the consent banner
- Customizable banner message
- Custom accept and reject button text
- Banner positions:
  - Bottom full width
  - Bottom left
  - Bottom right
- Background and button color customization
- Lightweight and performance friendly
- Stores consent using cookies (not localStorage)
- Translation ready
- Developer-friendly hooks and filters

---

## Installation

### Automatic Installation

1. Log in to your WordPress Admin Dashboard
2. Navigate to **Plugins → Add New**
3. Search for **CookieVJ**
4. Click **Install Now**
5. Activate the plugin

### Manual Installation

1. Download the plugin ZIP file
2. Go to **Plugins → Add New → Upload Plugin**
3. Upload the ZIP file
4. Install and activate the plugin

---

## Configuration

1. Go to **Settings → CookieVJ**
2. Enable the cookie banner
3. Customize banner message, button labels, colors, and position
4. Click **Save Changes**

---

## Frequently Asked Questions

### Does this plugin block cookies automatically?

No. CookieVJ only displays a cookie consent banner. Cookie blocking must be handled separately if required.

### Is CookieVJ GDPR or CCPA compliant?

CookieVJ provides tools to display a consent notice. Full compliance depends on your website’s setup and applicable legal requirements.

### Is the plugin compatible with caching plugins?

Yes. The banner loads dynamically and works with most caching plugins.

### Can I translate this plugin?

Yes. All strings are translation-ready and compatible with tools such as Loco Translate or Poedit.

---

## Developer Information

### Hooks and Filters

#### Actions

- `cookievj_before_banner` – Runs before the banner HTML output  
- `cookievj_after_banner` – Runs after the banner HTML output  

#### Filters

- `cookievj_banner_message` – Modify the banner message  
- `cookievj_cookie_expiry` – Change cookie duration (default: 365 days)  
- `cookievj_settings` – Filter all plugin settings  

### Example: Change Cookie Expiry

```php
add_filter( 'cookievj_cookie_expiry', function () {
    return 30;
});
