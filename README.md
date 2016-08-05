#ACF-Page-Elements

Remember that time when I created a crap load of ACF page elements (see [ACF Pro - Custom Page Options](https://github.com/wglassbrook/ACF-PRO-Custom-Page-Options)) based on the ACF Pro Felxible Content Fields? Yeah, that was cool.  

I got kinda tired of always trying to crowbar it into my WP themes, so I decided to make it into a WP plugin. Besides, this is how it should have been don to begin with, but I was too lazy.  

There's a lot of cary-over from the original code, but there's been significant updates here, including, but not limited to the fact that the Page Elements are now filtered into `the_content()` instead of adding it manually to the theme. Dig in and you'll see a bunch of improvements.

###"What is it again?"  

The simple answer... It's a plugin that adds a bunch of pre-defined "elements" or "cards" to your Bootstrap based WordPress site.

The complex answer... It's a plugin designed to take advantage of Advanced Custom Fields Pro Flexible Content Field and a custom built, Bootstrap based, WordPress template. So that means you must have ACF Pro, and be willing to find and customize a Bootstrap based WP them, or just build your own. I've been a big pro-ponent of the Sage starter theme for a number of years, and I find that the two work well together with a modicum of customization.

Alternatively, I've included the ability to override the element templates and the default CSS. All of the default element templates are included in the `elements directory`. You can copy these files (all or individually) into a new folder called `custom-elements` which the plugin will look for first, before using the defaults. The same goes for the `css` folder. Create a new `custom-css` folder in the root and go wild with your own `acfpe_styles.css` file in there.