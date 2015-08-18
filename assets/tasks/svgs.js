
module.exports = function(grunt, config) {

    grunt.config.merge({
    
        svgmin: {
            options: {
                plugins: [
                    {
                        removeViewBox: false
                    }, {
                        removeUselessStrokeAndFill: false
                    }
                ]
            },
            
            dist: {
                expand: true,
                cwd: 'img/svg-raw',
                src: ['*.svg'],
                dest: 'img/svg-min',
                ext: '.min.svg'
            }
        },

        svgstore: {
            options: {
                prefix : 'shape-',
                cleanup: ['style'],
                svg: { 
                    viewBox : '0 0 100 100',
                    xmlns: 'http://www.w3.org/2000/svg'
                }
            },
            default : {
                files: {
                    '../views/partials/svg-defs.svg': ['img/svg-min/*.svg'],
                }
            }
        },
    });

}