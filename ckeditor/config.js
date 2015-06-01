/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	var _host='http://localhost/yiiquiz';
	 config.filebrowserBrowseUrl = _host+'/ckeditor/ckfinder/ckfinder.html';

     config.filebrowserImageBrowseUrl = _host+'/ckeditor/ckfinder/ckfinder.html?type=Images';

     config.filebrowserFlashBrowseUrl = _host+'/ckeditor/ckfinder/ckfinder.html?type=Flash';

     config.filebrowserUploadUrl = _host+'/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

     config.filebrowserImageUploadUrl = _host+'/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

     config.filebrowserFlashUploadUrl = _host+'/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';  
};
