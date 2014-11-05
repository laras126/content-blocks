# Welome to the [Timber](https://github.com/jarednova/timber/) Starter Kit

If you aren't familiar with Timber, it's like, the greatest. In a sentence, it's a "Plugin to write WordPress themes w Object-Oriented Code and the Twig Template Engine". A-maze-ing.

Since the included starter theme is pretty bare, I slapped this together with some more front end tools. It includes:

* [Simple Sassy Starter](http://github.com/laras126/simple-sassy-starter) (Sass project and assets folder structure)
* Grunt 
* Uh, that's it. Maybe I'll add some helpful WordPress stuff later on, but for now keeping it basic.

### To use:

1. Install the [Timber plugin](https://github.com/jarednova/timber/)
2. Clone this repo into wp-content/themes
3. Rename the 'simple-sassy-starter' directory to 'assets'*
4. ```npm install```
5. Enqueue main.css and scripts.js (this is something I will include in here, but haven't yet)
5. ```grunt watch```
6. Code!

* The assets folder is a submodule of Simple Sassy Starter, but assets is a more sensible folder name. You might want to remove the submodule by [doing this](http://stackoverflow.com/questions/1260748/remove-a-git-submodule), since once you start coding Sass you won't want to pull from the repo.