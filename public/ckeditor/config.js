CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		'/',
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Save,NewPage,Preview,Replace,Find,SelectAll,Scayt,Flash,Iframe,ImageButton,Button,Form,Radio,TextField,Checkbox,Select,HiddenField,Textarea,Subscript,Language,About,CreateDiv,PageBreak,Smiley,ShowBlocks,PasteText,Format,Templates,Print';
};