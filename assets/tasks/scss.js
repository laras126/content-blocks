module.exports = function(grunt, config) {

    var sassFileList = [
        config.scssDir + '*.scss',
        config.scssDir + '**/*.scss'
    ];

	grunt.config.merge({
	
		sass: {

			options: {
			},

			dist: {
				style: 'expanded',
				src: config.scssDir + 'main.scss',
				dest: config.cssDir + 'main.css',
				// Source maps are available, but require Sass 3.3.0 to be installed
				// https://github.com/gruntjs/grunt-contrib-sass#sourcemap
				sourcemap: true
			}
		},

		autoprefixer: {

		    options: {
		        browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
		    },
			
		    dist: {
		        src: config.cssDir + 'main.css'
		    }
		},

		cssmin: {
		    options: {
		        keepSpecialComments: 0
		    },
			
		    css: {
		        src: config.cssDir + 'main.css',
		        dest: config.cssDir + 'main.min.css'
		    },

		    critical: {
		    	src: config.cssDir + 'critical.css',
				dest: config.cssDir + 'critical.min.css'
			}
		},

		watch: {
			sass: {
				files: sassFileList,
				tasks: [
					'sass'
				]
			}
		}
	});
}