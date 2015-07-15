=== Dizzle Vendor List ===
Tags: Dizzle, Dizzle.com, Vendor, Real Estate
Requires at least: 3.2.0
License: GNU v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Displays your Dizzle vendor list inside the current post or page.

== Description ==
Dizzle Vendor List displays your preferred vendors you create at Dizzle on your Wordpress site.

Features include:

* Display your entire vendor list
* Display an individual vendor
* Display a category of vendors
* Include or hide drop down navigation
* Include or hide link list navigation

PS: You'll need to register at [Dizzle](http://app.dizzle.com/register) to create your vendor list.  It's a free to get a web widget with analytics.


== Installation ==
Upload the Dizzle Vendor List plugin to your blog and Activate it.  That's it!

== Frequently Asked Questions ==
Usage

You can display your vendor list in any Page or Post by including a Wordpress short code in your post body.  To display your entire vendor list, specify your profile slug (ususally your email address) in the list attribute of the dizzle_vendor shortcode.  For example:

[dizzle_vendor list="will@dizzle.com"]

This will output your vendor list to the page, including 2 forms of navigation.  To disable navigation, you can specify on or more attributes:

[dizzle_vendor list="sandiego" dropdown_nav="false" link_nav="false"]

To limt the list to a particular category, include the category attribute:

[dizzle_vendor list="sandiego" category="Home Inspection"]

To limt the list to a single vendor, include that vendor's id:

[dizzle_vendor list="sandiego" vendor="w2GtMjxBsh"]

[dizzle_vendor list="sandiego" dropdown_nav="false" link_nav="false"]