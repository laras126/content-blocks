'use strict';
module.exports = function(grunt) {
    
    // Load config
    var config = grunt.file.readYAML("Gruntconfig.yml"); 

    // Load all tasks
    require('load-grunt-tasks')(grunt);

    // Show elapsed time
    require('time-grunt')(grunt);

    // Configure tasks
    require('./tasks/scss.js')(grunt, config);
    require('./tasks/javascript.js')(grunt, config);
    require('./tasks/utils.js')(grunt, config);
    require('./tasks/svgs.js')(grunt, config);


    // require('./grunt_tasks/build-files.js')(grunt, config);


    // Register new tasks


    // grunt.initConfig({
        
    // watch: {
    //     sass: {
    //         files: [
    //             'assets/scss/*.scss',
    //             'assets/scss/**/*.scss'
    //         ],
    //         tasks: ['sass:dev']
    //     },

    //     css: {
    //       files: [
    //             'assets/css/main.css'
    //         ],
    //         tasks: ['cssmin:css']  
    //     },

    //     js: {
    //         files: [
    //             jsFileList,
    //             '<%= jshint.all %>'
    //         ],
    //         tasks: ['jshint', 'concat', 'uglify']
    //     },

    //     livereload: {
    //         // Browser live reloading
    //         // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
    //         options: {
    //             livereload: false
    //         },
    //         files: [
    //             'assets/css/main.css',
    //             'assets/js/scripts.js',
    //             'views/*.twig',
    //             '*.php'
    //         ]
    //         }
    //     }
    // });

    // Register tasks
    grunt.registerTask('default', [
        'sass'
    ]);

    grunt.registerTask('js', [
        'bower_concat',
        'concat',
        'uglify'
    ]);

    grunt.registerTask('build', [
        'uglify',
        'autoprefixer',
        'cssmin',
        // 'shell'
    ]);

    // Pretty redundant task here...
    grunt.registerTask('prep', [
        'uglify',
        'autoprefixer',
        'cssmin',
        'criticalcss'
    ]);

};
