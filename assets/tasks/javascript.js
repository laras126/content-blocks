module.exports = function(grunt, config) {
    
    var jsFileList = [
    	config.jsConcatDir + 'modernizr-custom.js',
        config.jsSrcDir + '*.js'
    ];  

    console.log(jsFileList);

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
			      	'modernizr'
			    ]
			}
		},

		concat: {
	        options: {
	        },
	        dist: {
	            src: jsFileList,
	            dest: config.jsConcatDir + 'scripts.js',
	        },
	    },
		
	    uglify: {
	    	options: {
	    	},
			dist: {
	            files: {
					// For some reason this doesn't accept the config variable for the key. Bleh.
					'js/build/scripts.min.js': ['<%= concat.dist.dest %>']
	            }
	        }
	    },

	    watch: {
	    	js: {
				files: jsFileList,
				tasks: [
					'concat'
				]
	    	}
	    }

	});

}

