
# Welome to the [Timber](https://github.com/jarednova/timber/) Starter Kit

If you aren't familiar with Timber, it's like, the greatest. In a sentence, it's a "Plugin to write WordPress themes w Object-Oriented Code and the Twig Template Engine". A-maze-ing. It makes WordPress dev super fun and legit.

Since the included starter theme is pretty bare, I slapped this together with some more front end tools and components from my workflow. To see it in action, check out the repos for the [DiJiFi](https://github.com/laras126/dijifi-theme) and [MTNmeister](https://github.com/laras126/mtnmeister-theme) themes. 

Those projects are the beginning of a "block content strategy system" thing I'm working on. Maybe this repo will turn into a legitimate tool for that!

## Getting Started

1. Install the [Timber plugin](https://github.com/jarednova/timber/)
2. Clone this repo into wp-content/themes
3. ```cd``` into the Simple Sassy Starter submodule and pull it down with ```git submodule update --init --recursive```
3. Rename the 'simple-sassy-starter' directory to 'assets' and [remove the submodule](ttp://stackoverflow.com/questions/1260748/remove-a-git-submodule).
4. ```npm install```
5. Enqueue main.css and scripts.js (this is something I will include in here, but haven't yet)
6. ```grunt watch```
7. Code!


## What's here?

#### The Gruntfile

Included Grunt plugins are:

* Sass
* JSHint
* Concat
* [SVGstore](https://github.com/FWeinb/grunt-svgstore), for SVG sprites. Read [this CSS-Tricks article](http://css-tricks.com/svg-sprites-use-better-icon-fonts/) for more info on what and why. You need to ```{% include 'paritals/svg-defs.svg' %}``` - which is weird because an svg file shouldn't be in with the views. TODO: add it to ```$context```.

This is a pretty minimal set up - there is no minification or automatic versioning or production stuff. This is intentional - use [W3 Total Cache](https://wordpress.org/plugins/w3-total-cache/). My philosophy of late is to not do things manually for the sake of pride and figuring out build tools.


#### [Simple Sassy Starter](https://github.com/laras126/simple-sassy-starter)

(which will be referred to as SSS from here on out) This is a submodule of the [for-real SSS repo](https://github.com/laras126/simple-sassy-starter), but I think it may actually be too simple for this. I'd like to structure it around the actual Twig views, that's on the to-do.


#### functions.php

I added some nice things in here, I think. They are:

* Use jQuery from the Google CDN
* A function to replace the "Post Title" placeholder in the editor for custom types
* Add an editor-style.css - you'll need to add the file yourself to ```assets/css```, I usually snipe [the one from Roots.io](https://github.com/roots/roots-sass/blob/master/assets/css/editor-style.css). It's just the Bootstrap typography, but does the job nicely.
* Require files from lib/ instead of adding all of your types and taxonomies in there. I like chunking things out.


#### _notes/

This is weird, huh. No way! I've been into this "designing in text" idea from Stephen Hay's RWD workflow (Brad Frost [wrote a nice summary](http://bradfrost.com/blog/mobile/bdconf-stephen-hay-presents-responsive-design-workflow/)). Before starting any kind of code, I do lots of content mapping in these files. It usually goes like this:

1. **content-list.md**: This is a hierarchical list of all content on the site. 
2. **urls.md**: After that, I start thinking about the URL scheme. I found doing this from the get-go, before even thinking about the WP architecture or any kind of design, to be super helpful in determining your post types, etc.
3. **atomic.md**: Based on Brad Frost's [Atomic Design](http://bradfrost.com/blog/post/atomic-web-design/). Break down your content-list into tiny components and figure out how they work together. 
4. **template.md**: Now combine everything. Using the URL scheme as a guide, make a list of what components from atomic.md are in each page, and what content they will contain.

Those are pretty vague directions. This is something I'd like to write more about in future - stay tuned!



