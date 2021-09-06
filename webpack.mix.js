const mix = require('laravel-mix');

mix
	.copy('resources/img','public/img')
	.copy('node_modules/font-awesome/fonts','public/fonts')
	// main
	.styles([
		'resources/css/vali/main.css',
		'node_modules/font-awesome/css/font-awesome.css'
	],'public/css/oWD5bC7852_main.css')
	// flatpickr
	.styles([
		'node_modules/flatpickr/dist/flatpickr.css'
	],'public/css/JMtvK2onmA_fltpckr.css')
	// tom select
	.styles([
		'node_modules/tom-select/dist/css/tom-select.bootstrap4.css'
	],'public/css/9oExJP7cAB_ts.css')
	// select2
	.styles([
		'node_modules/select2/dist/css/select2.css',
		'node_modules/select2-theme-bootstrap4/dist/select2-bootstrap.css'
	], 'public/css/8mCcq93x7C_s2.css')
	.styles([
		'node_modules/bootstrap/dist/css/bootstrap.css',
		'resources/css/welcome/owl.carousel.css',
		'resources/css/welcome/style.css'
	], 'public/css/5agMXYbT_wlcm.css')
	.styles([
		'resources/css/vali/datatables/dataTables.bootstrap4.css'
	], 'public/css/5EC8VBfS_dt.css')
// =====================================================================

// =====================================================================
	.scripts([
		'resources/js/vali/datatables/jquery.dataTables.js',
		'resources/js/vali/datatables/dataTables.bootstrap4.js'
	], 'public/js/5EC8VBfS_dt.js')
	.scripts([
		'resources/js/vali/jquery.js',
		'resources/js/vali/popper.js',
		'resources/js/vali/bootstrap.js',
		'resources/js/welcome/owl.carousel.js'
	], 'public/js/5agMXYbT_wlcm.js')
	// tom select
	.scripts([
		'node_modules/tom-select/dist/js/tom-select.complete.js'
	],'public/js/9oExJP7cAB_ts.js')
	//select2
	.scripts([
		'node_modules/select2/dist/js/select2.js'
	], 'public/js/8mCcq93x7C_s2.js')
	//flatpickr
	.scripts([
		'node_modules/flatpickr/dist/flatpickr.js'
	],'public/js/JMtvK2onmA_fltpckr.js')
	// main
	.scripts([
		'resources/js/vali/jquery.js',
		'resources/js/vali/popper.js',
		'resources/js/vali/bootstrap.js',
		'resources/js/vali/main.js',
		'resources/js/vali/pace.js'
	],'public/js/oWD5bC7852_main.js')

	.scripts([
		'resources/js/vali/pwstrength-bootstrap.js'
	],'public/js/CdLS38vf2N_pwd.js')

	// bootstrap
	.js('resources/js/app.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css');
