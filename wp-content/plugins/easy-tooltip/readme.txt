=== Easy Tooltip ===
Contributors: f.viaudmurat
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L93L2QVKUNB7J
Tags: tooltip, tooltips
Requires at least: 3.3.1
Tested up to: 3.3.1
Stable tag: 1.0.1

WordPress tooltip lets you easily add css tooltips to content on your posts and pages.

== Description ==

WordPress tooltip lets you easily add tooltips to content on your posts and pages. Contrary to most libraries, tooltips are achieved only through CSS.

It offers a tinyMCE shortcode GUI which will guide you through the entire process of a tooltip.

You can also add tooltips manually by following the pattern below:
		
`[tooltip title="This will show as a title for the tooltip (disabled for the classic tooltip)"
content="This will show in a tooltip" type="classic|critical|help|info|warning"]Hover over me for tooltip[/tooltip]`
		
(type is only optional, classic is the default)

== Installation ==

Download the plugin. Navigate to "Plugins -> Add New" and click on Upload link.

Use the uploader to upload the plugin zip file and click on "Install Now" button.

After plugin is uploaded. Click on "Activate Now" link to fully install the plugin.

== Frequently Asked Questions ==

= Why not using alt attributes for the tooltip content? =

Some purists argue that it would be better to respect the semantics and to use alt attributes for the tooltip content. But there are a few advantages with the span technique: you can put all type of markup content in the tooltip, you don't risk any code conflict, and you know it will work even in the absence of level 3 selectors or if javascript has been disabled.

= How to modify the style of the tooltips? =

If you need to change the tooltip styles, you can always edit "easy-tooltip.css", but a more secure way is to copy and rename this file to "custom.css". The plugin will give the priority to your custom stylesheet when it loads. This way you minimize the risk to lose your precious customizations when upgrading the plugin in the future.

== Screenshots ==

1. Tooltip GUI and in the background a TinyMCE button to initiate the process.
2. You can see how pretty a tooltip can actually be, much better than the default!

== Credits ==

This plugin is largely based on isharis's plugin: "WordPress Tooltip" which uses the TipTip jQuery plugin. Many thanks Muhammad! Note that I've corrected
the main bug which prevented it from working in some server configurations (tinyMCE form just redirected to the site
homepage).

It uses the excellent "Sexy Tooltips with Just CSS" authored by Alexander Dawson
(http://sixrevisions.com/css/css-only-tooltips/).