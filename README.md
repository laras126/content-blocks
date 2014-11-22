
# Welome to the [Timber](https://github.com/jarednova/timber/) Starter Kit

If you aren't familiar with Timber, it's like, the greatest. In a sentence, it's a "Plugin to write WordPress themes w Object-Oriented Code and the Twig Template Engine". A-maze-ing.

Since the included starter theme is pretty bare, I slapped this together with some more front end tools. It includes:

* [Simple Sassy Starter](http://github.com/laras126/simple-sassy-starter) (Sass project and assets folder structure)
* Grunt 
* Uh, that's it. Maybe I'll add some helpful WordPress stuff later on, but for now keeping it basic.

### To use:

1. Install the [Timber plugin](https://github.com/jarednova/timber/)
2. Clone this repo into wp-content/themes
3. ```cd``` into the Simple Sassy Starter submodule and pull it down with ```git submodule update --init --recursive```
3. Rename the 'simple-sassy-starter' directory to 'assets' and [remove the submodule](ttp://stackoverflow.com/questions/1260748/remove-a-git-submodule).
4. ```npm install```
5. Enqueue main.css and scripts.js (this is something I will include in here, but haven't yet)
6. ```grunt watch```
7. Code!

### Gruntfile

Included Grunt plugins are:

* Sass
* JSHint
* Concat
* SVGstore, for SVG sprites. Read this CSS-Tricks article for more info on those.
* 

You'll notice there is no minification or automatic versioning in the Grunt setup. This is intentional - use WP Total Cache. My philosophy of late is to leverage what WP has to offer and not do things manually for the sake of pride/ego. 



### Simple Sassy Starter



### functions.php

I added some nice things in here, I think. They are:

* Use jQuery from the Google CDN
* A function to replace the "Post Title" placeholder in the editor for custom types
* Add an editor-style.css - you'll need to add the file yourself to ```assets/css```, I usually snipe [the one from Roots.io](https://github.com/roots/roots-sass/blob/master/assets/css/editor-style.css). It's just the Bootstrap typography, but does the job nicely.

