'use strict';

var sweetAlert = require('sweetalert');
global.jQuery = require('jquery');
require('image-picker/image-picker/image-picker.js');

jQuery(function() {
	jQuery(".image-picker").imagepicker();
});
