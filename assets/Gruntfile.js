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


    // Register tasks
    grunt.registerTask('default', [
        'sass'
    ]);

    grunt.registerTask('js', [
        'bower_concat',
        // 'jshint',
        'concat',
        'uglify'
    ]);

    grunt.registerTask('svgs', [
        'svgmin',
        'svgstore'
    ]);

    grunt.registerTask('build', [
        'modernizr',
        'concat',
        'uglify',
        'autoprefixer',
        'cssmin'
    ]);

};
