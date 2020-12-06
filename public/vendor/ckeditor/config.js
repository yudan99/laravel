/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		'/',
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'links', groups: [ 'links' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
        { name: 'about', groups: [ 'about' ] },
	];

    config.extraPlugins = 'mentions';
    config.extraPlugins = 'tableresize';
    config.extraPlugins = 'ajax';
    config.extraPlugins = 'textmatch';
    config.extraPlugins = 'autocomplete';
    config.extraPlugins = 'textwatcher';
    config.extraPlugins = 'xml';
    config.extraPlugins = 'html5video';
    config.extraPlugins = 'imageuploader';
    config.extraPlugins = 'uploadfile';
    config.extraPlugins = 'simage';
    config.extraPlugins = 'imageresizerowandcolumn';
    config.extraPlugins = 'imageresize';
    config.extraPlugins = 'lineheight';
    // config.extraPlugins = '';
    // config.extraPlugins = '';

    config.defaultLanguage = 'zh-cn';
    config.skin = 'kama';


    config.autoGrow_onStartup = true;

    config.image2_alignClasses = [ 'image-left', 'image-center', 'image-right' ];
    config.image2_captionedClass = 'image-captioned';

    //config.uiColor = '#FFFFCC';
    config.width = 880;
    config.height = 600;
    //config.line_height="1em;1.1em;1.2em;1.3em;1.4em;1.5em" ;
    //config.line_height="1px;1.1px;1.2px;1.3px;1.4px;1.5px" ;



    //config.toolbarCanCollapse = true;



    // config.imageResize.maxWidth = 100;
    // config.imageResize.maxHeight = 100;

	config.removeButtons = 'Source,Save,NewPage,ExportPdf,Preview,Print,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,PageBreak,About,Maximize,ShowBlocks';
};

CKEDITOR.plugins.imageresize.resizeAll(
    CKEDITOR.editorConfig,
    300,
    300
);

// CKEDITOR.editorConfig = function( config ) {
// 	// Define changes to default configuration here. For example:
// 	// config.language = 'fr';
//     // config.uiColor = '#AADC6E';

// };
