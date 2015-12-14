var path = require('path');

module.exports = function(grunt){
    require('jit-grunt')(grunt);
    require('time-grunt')(grunt);

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    require('load-grunt-config')(grunt, {
        configPath: path.join(process.cwd(), 'grunt'),
        jitGrunt: true
    });
};