module.exports = function (grunt) {
	'use strict';

	// Load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	// Project configuration
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		compass: {
			dist: {
				options: {
					sassDir: 'scss',
					cssDir : 'css'
				}
			}
		},
		watch  : {
			css: {
				files  : ['scss/**/*.scss', 'scss/*.scss' ],
				tasks  : ['compass'],
				options: {
					debounceDelay: 500
				}
			}
		}
	});

	// Default task.
	grunt.registerTask('default', ['watch']);

	grunt.util.linefeed = '\n';
};