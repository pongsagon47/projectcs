/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {

    config.toolbar = [
        { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
        { name: 'styles', items: [ 'Styles', 'Format' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
        { name: 'links', items: [ 'Link', 'Unlink' ] },
        { name: 'insert', items: [ 'Image', 'EmbedSemantic', 'Table' ] },
        { name: 'tools', items: [ 'Maximize' ] },
        { name: 'editing', items: [ 'Scayt' , 'Source'] }

    ];

    config.customConfig = '';
    config.extraPlugins = 'image2','liststyle';
    config.removePlugins = 'image';
    config.height = 300;
    config.contentsCss = ['/ckeditor/contents.css', '/ckeditor/mystyles.css'];
    config.bodyClass = 'article-editor';
    config.format_tags = 'p;h1;h2;h3;pre';
    config.removeDialogTabs = 'image:advanced;link:advanced';
    config.stylesSet = [
        { name: 'Marker',			element: 'span', attributes: { 'class': 'marker' } },
        { name: 'Cited Work',		element: 'cite' },
        { name: 'Inline Quotation',	element: 'q' },
        {
            name: 'Special Container',
            element: 'div',
            styles: {
                padding: '5px 10px',
                background: '#eee',
                border: '1px solid #ccc'
            }
        },
        {
            name: 'Compact table',
            element: 'table',
            attributes: {
                cellpadding: '5',
                cellspacing: '0',
                border: '1',
                bordercolor: '#ccc'
            },
            styles: {
                'border-collapse': 'collapse'
            }
        },
        { name: 'Borderless Table',		element: 'table',	styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
        { name: 'Square Bulleted List',	element: 'ul',		styles: { 'list-style-type': 'square' } },
        { name: 'Illustration', type: 'widget', widget: 'image', attributes: { 'class': 'image-illustration' } },
        { name: '240p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-240p' } },
        { name: '360p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-360p' } },
        { name: '480p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-480p' } },
        { name: '720p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-720p' } },
        { name: '1080p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-1080p' } }
    ];
    config.filebrowserBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=flash';
    // config.filebrowserUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=files';
    // config.filebrowserImageUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=images';
    // config.filebrowserFlashUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=flash';

};



