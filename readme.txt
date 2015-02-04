=== SMN Woo Cleanup ===
Contributors: chousmith
Tags: woo, commerce, checkout, fields, order, reorder, cleanup
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 0.1

Hooks to some Woo Commerce filters and actions to re-arrange and clean up some things.


== Description ==

Hooks to some Woo Commerce filters and actions to re-arrange and clean up some things. Replicating static PHP landing pages with WooCommerce One Page Checkout and magic.

A few notes :

* woocommerce template files in this plugin are just stored here for reference. They should actually exist in the current active theme.
* Currently the vlanding js & css are injected based on the hardcoded slug of that one page, too. Not the most robust.
* You can find the source code at the GitHub repository: https://github.com/ninthlink/nlk-plugins/tree/master/smn-woo-cleanup


== Installation ==

1. Upload file to the `/wp-content/plugins/` directory
1. Activate the SMN Woo Cleanup plugin through the 'Plugins' menu in the WordPress Admin Panel
1. Manually copy the woocommerce template files to the current theme


== Changelog ==

= 0.1 =
* Initial release