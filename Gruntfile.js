module.exports = function (grunt) {
    
    "use strict";
    
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                // define a string to put between each file in the concatenated output
                separator: grunt.util.linefeed + ';' + grunt.util.linefeed,
                stripBanners: true
            },
            dist: {
                // the files to concatenate
                src: ['public/assets/src/js/*.js'],                     
                // the location of the resulting JS file
                dest: 'public/assets/dist/js/<%= pkg.name %>.js'
            }
        },
        less: {
            always: {
                options: {
                    paths: ['css/less'],
                    plugins: [
                        new (require('less-plugin-clean-css'))({advanced: true})
                    ],
                },
                files: {
                    'public/assets/dist/css/main.css': 'public/assets/src/less/main.less'
                  
                }
            }
        },
        uglify: {
            js: {
                options: { 
                    preserveComments: false
                },
                files: {
                    'public/assets/dist/js/script.min.js': ['public/assets/src/js/<%= pkg.name %>.js']
                }
            }
        },
        watch: {
            concat: {
                files: ['public/assets/src/js/*.js'],
                tasks: 'concat'
            },
            less: {
                files: 'public/assets/src/less/*',
                tasks: 'less:always',
                options: {
                    livereload: true
                }
            },
            uglify: {
                files: 'public/assets/dist/js/<%= pkg.name %>.js',
                tasks: 'uglify:js'
            }
        }
    });
    
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    
    grunt.registerTask('default', ['watch']);
    
    
};