=== CookieVJ – Cookie Notice & Consent Banner ===
Contributors: wpvishavjeet
Tags: cookie, consent, gdpr, ccpa, privacy
Requires at least: 5.0
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Lightweight GDPR & CCPA compliant cookie notice with customizable consent banner.

== Description ==

CookieVJ helps your website comply with GDPR and CCPA regulations by displaying a customizable cookie consent banner to inform visitors about cookie usage and obtain their consent.

= Features =

* **Easy Setup** - Configure in minutes from Settings → CookieVJ
* **GDPR & CCPA Compliant** - Meet privacy regulations
* **Customizable Design** - Choose colors, position, and button text
* **Multiple Positions** - Display banner at bottom (full width), bottom left, or bottom right
* **Lightweight** - Minimal impact on page load speed
* **Cookie-Based Storage** - Uses proper browser cookies (not localStorage)
* **Translation Ready** - Fully translatable
* **Developer Friendly** - Clean, object-oriented code

= Banner Options =

* Enable/Disable cookie banner
* Customize banner message
* Change accept/reject button text
* Choose banner position (bottom full width, bottom left, bottom right)
* Select background color
* Select button color

= Privacy & Compliance =

This plugin helps you display cookie consent notices but does not provide legal advice. Please consult with a legal professional to ensure your website complies with applicable privacy laws.

= Developer Notes =

The plugin follows WordPress coding standards and best practices:
* Object-oriented architecture
* Proper sanitization and escaping
* Nonce verification
* Translation-ready
* Minified assets for performance

== Installation ==

= Automatic Installation =

1. Log in to your WordPress admin panel
2. Navigate to Plugins → Add New
3. Search for "CookieVJ"
4. Click "Install Now" and then "Activate"

= Manual Installation =

1. Download the plugin zip file
2. Log in to your WordPress admin panel
3. Navigate to Plugins → Add New → Upload Plugin
4. Choose the downloaded zip file and click "Install Now"
5. Activate the plugin

= Configuration =

1. Go to Settings → CookieVJ
2. Enable the cookie banner
3. Customize the message, button text, colors, and position
4. Click "Save Changes"

== Frequently Asked Questions ==

= Does this plugin block cookies automatically? =

No, this plugin displays a consent banner. You'll need to implement cookie blocking logic based on user consent in your custom code or use additional plugins.

= Is this plugin GDPR compliant? =

This plugin provides the tools to display a cookie consent banner, but GDPR compliance depends on your entire website setup. Please consult with a legal professional.

= Can I customize the banner design? =

Yes! You can customize the background color, button color, banner position, and all text content from the settings page.

= Does it work with caching plugins? =

Yes, the plugin is compatible with caching plugins. The cookie banner is loaded via JavaScript and respects cached pages.

= How long does the cookie consent last? =

The consent cookie is stored for 365 days (1 year) by default.

= Can I translate the plugin? =

Yes! The plugin is translation-ready. All strings are wrapped in translation functions and you can use tools like Loco Translate or Poedit.

== Screenshots ==

1. Settings page - Configure your cookie banner
2. Bottom full-width banner position
3. Bottom left corner banner position
4. Bottom right corner banner position
5. Color picker for customization

== Changelog ==

= 1.0.0 =
* Initial release
* Cookie consent banner with accept/reject options
* Customizable colors and positions
* Admin settings page
* Translation-ready

== Upgrade Notice ==

= 1.0.0 =
Initial release of CookieVJ.

== Support ==

For support, please visit the plugin's support forum on WordPress.org.

== Developer Information ==

= Hooks & Filters =

The plugin provides several hooks for developers:

**Actions:**
* `cookievj_before_banner` - Fires before the banner HTML
* `cookievj_after_banner` - Fires after the banner HTML

**Filters:**
* `cookievj_banner_message` - Filter the banner message
* `cookievj_cookie_expiry` - Filter cookie expiration days (default: 365)
* `cookievj_settings` - Filter all plugin settings

= Code Example =

Change cookie expiry to 30 days:
`
add_filter( 'cookievj_cookie_expiry', function() {
    return 30;
});
`

== Privacy Policy ==

CookieVJ stores a cookie on the user's browser to remember their consent choice. This cookie contains only the consent status (accepted/rejected) and no personal information.

Cookie name: `cookievj_cookie_consent`
Cookie duration: 365 days
Cookie value: "accepted" or "rejected"