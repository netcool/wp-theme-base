/**
 * Gruntfile 配置
 * author : cgzero
 * email : cgzero@me.com
 */
module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// 将less编译成css
		less: {
			compile: {
				files: {
					'style.css': ['style.less'] // 需要编译的less文件
				}
			}
		},

		// 压缩css文件
		cssmin: {
			minify: {
				options: {
					banner: '/**\n * Theme Name: wp-theme-base\n * Author: cgzero\n * Author URI: http://cgzero.com\n * Description: wp-theme-base\n * Version: 1.0\n **/'
				},
				files: {
					'style.css': ['style.css']
				}
			}
		},

		// 压缩js文件
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
			},
			build: {
				files: {
					'js/global.min.js': ['js/global.js']
				}
			}
		},

		// 实时监听文件变化并编译
		watch: {
			files: ['js/global.js', 'style.less', 'css/*.less', 'css/inc/*.less'],
			tasks: ['less', 'cssmin', 'uglify']
		}
	});

	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');

	// 编译，将less转换成css，压缩html，js，css
	grunt.registerTask('default', ['less', 'cssmin', 'uglify', 'watch']);
	grunt.registerTask('build', ['less', 'cssmin', 'uglify']);
};