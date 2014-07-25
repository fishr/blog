=== T&P Gallery Slider ===
Tags: gallery, images, image, jquery, pictures, photos, gallery, scroll, scrollbar, slide, slideshow, onclick, onmouseover
Contributors: Peyman Shadpour, Tzahi Raz
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

T&P Gallery Slider for WordPress is an image hover/click gallery as a WordPress plugin.


== Description ==

This simple plugin shows a large size image in the page and below a scrollable row of thumbnails without scrollbar. You can scroll the thumbs while mouseover or mouseclick and choose an image for the big view.
you can also add each image a short description that displaying on the big image (the description is the images alt).
you can display slider from another post/page by passing his ID to the short code [tp_gallery post_id="id"].
also there is a setting page with beautiful preview box.


== Installation ==

1. Unpack the plugin, put it in your "plugins" folder (`/wp-content/plugins/`).
2. Activate the plugin from the Plugins section.
3. go to T&P Setting page.
4. put the short code in your theme.
5. for specific slide post/page add short code [tp_gallery post_id="id"].

== Create Images ==

You need all images of your gallery in the same size and have to upload them in the same aspect ratio.
1. The size of the big image is the size of the first in the gallery. You should have all images in the gallery in the same width and heigth to avoid scaling.
2. When putting the mouse over the big image will change.

== Frequently Asked Questions ==

= The gallery does not work =
Make sure that there is a wp_footer() func in your footer.php

= What images appear in the gallery =
Simple attach the images you wish to appear in the gallery to the page or post where you will place the shortcode [tp_gallery].
or slider from another post/page by passing his ID to the short code [tp_gallery post_id="id"].

= How do I change the design =
You can use CSS to change the look and feel of the layout.

= How do I change the image and thumbnail sizes =
You can use CSS to change image and thumbnail sizes.

= Which size have the images in the gallery =
the full width of image size. If you make the images square or landscape depends on you. Portrait images are no good idea because the gallery will become too high and you can not see the big image (overflow: hidden;).

== Screenshots ==

1. screenshot-1.png 
2. screenshot-2.png 


== Changelog ==

* 1: First release December 2012
* 2: Second release January 2013: Fixed: Gallery always display above the content.
* 3: Third release May 2013: Add: Slide from specific post/page by new short code [tp_gallery post_id="id"].