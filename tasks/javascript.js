module.exports = function(grunt, config) {
    
    var jsFileList = [
    	config.jsConcatDir + 'bower.js',
        config.jsSrcDir + '*.js'
    ];  

	grunt.config.merge({
		
		jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
        
            all: [
                'Gruntfile.js',
                config.jsSrcDir + '*.js'
            ],
        },
        
		bower_concat: {
			all: {
			    dest: config.jsSrcDir + 'bower.js',
			    cssDest: config.cssDir + 'bower.css',
			    exclude: [
					'jquery',
			      	'modernizr',
			      	'matchmedia'
			    ],
			    // dependencies: {
			    //   	'underscore': 'jquery',
			    //   	'backbone': 'underscore',
			    //   	'jquery-mousewheel': 'jquery'
			    // },
			    // bowerOptions: {
			    //   	relative: false
			    // }
			}
		},

		concat: {
	        options: {
	        },
	        dist: {
	            src: jsFileList,
	            dest: config.jsSrcDir + 'scripts.js',
	        },
	    },
		
	    uglify: {
	    	options: {
	    	},
			dist: {
	            files: {
					// For some reason this doesn't accept the config variable for the key. Bleh.
					'assets/js/build/scripts.min.js': ['<%= concat.dist.dest %>']
	            }
	        }
	    },

	    watch: {
	    	js: {
				files: jsFileList,
				tasks: [
					'jshint',
					'concat'
				]
	    	}
	    }

	});

}

