module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        jshint: {
          options: {
            jshintrc: '.jshintrc'
          },
          all: [
            'Gruntfile.js',
            'assets/js/*.js'
          ]
        },

        concat: {   
            dist: {
                src: [
                    'assets/js/libs/*.js',
                    'assets/js/*.js',
                    'assets/js/_*.js'
                ],
                dest: 'assets/js/build/scripts.js',
            }
        },

        uglify: {
            build: {
                src: 'assets/js/build/scripts.js',
                dest: 'assets/js/build/scripts.min.js'
            }
        },

        sass: {
          dist: {
            options: {
              style: 'expanded',
              compass: true,
              // Source maps are available, but require Sass 3.3.0 to be installed
              // https://github.com/gruntassets/js/grunt-contrib-sass#sourcemap
              sourcemap: false,
              require: 'breakpoint-slicer'
            },
            files: {
                'assets/css/main.css': 'assets/scss/main.scss',
                // 'assets/css/main-Press.min.css': 'assets/scss/main-Press.scss',
                // 'assets/css/main-Pixel.min.css': 'assets/scss/main-Pixel.scss',
                // 'assets/css/main-PressPlay.min.css': 'assets/scss/main-PressPlay.scss',
            }
          }
        },

        // svgstore: {
        //   options: {
        //     prefix : 'shape-', // This will prefix each <g> ID
        //   },
        //   default : {
        //       files: {
        //         'assets/img/processed/svg-defs.svg': ['assets/img/svgs/*.svg'],
        //       }
        //     }
        // },

        watch: {
            scripts: {
                files: ['assets/js/*.js', 'assets/**/*.scss'],
                // Add 'svgstore' here when the include issue is figured out
                // http://css-tricks.com/svg-sprites-use-better-icon-fonts/
                tasks: ['concat', 'uglify', 'sass'],
                options: {
                    spawn: false,
                },
            },

            sass: {
                files: ['assets/css/*.scss'],
                files: ['assets/css/*/*.scss'],
                files: ['assets/css/*/*.scss'],
                tasks: ['compass'],
                options: {
                    spawn: false,
                }
            },

            livereload: {
		        // Browser live reloading
		        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
		        options: {
		          livereload: true
		        },
		        files: [
		          'assets/css/main.css',
		          'assets/js/build/scripts.js',
		          'templates/*.html',
              'templates/*/*.html',
		          '*.php'
		        ]
		    },

        // svgstore: {
        //     files: [
        //       'assets/img/svgs/*.svg'
        //     ]
        //   }
      }
        
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify' );
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    // grunt.loadNpmTasks('grunt-svgstore');
    
    // Register tasks
      grunt.registerTask('default', [
        'sass',
        'uglify'
      ]);

      grunt.registerTask('dev', [
        'watch'
      ]);

};