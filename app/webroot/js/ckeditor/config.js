/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// 
	config.filebrowserBrowseUrl = '/compete_shopping/js/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = '/compete_shopping/js/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = '/compete_shopping/js/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = '/compete_shopping/js/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = '/compete_shopping/js/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '/compete_shopping/js/kcfinder/upload.php?type=flash';
};
