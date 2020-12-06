<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class WangEditor extends Field
{
    protected $view = 'admin.wang-editor';

    protected static $css = [
        '/vendor/wangEditor-3.1.1/release/wangEditor.css',
    ];

    protected static $js = [
        'vendor/wangEditor-3.1.1/release/wangEditor.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $this->script = <<<EOT

var E = window.wangEditor
const editor = new E('#{$this->id}');

editor.customConfig.colors = [
    '#000000',
    '#eeece0',
    '#1c487f',
    '#4d80bf'
]

editor.customConfig.menus = [
    'head',
    'bold',
    'fontSize',
    'fontName',
    'italic',
    'underline',
    'strikeThrough',
    'indent',
    'lineHeight',
    'foreColor',
    'backColor',
    'link',
    'list',
    'justify',
    'quote',
    'emoticon',
    'image',
    'video',
    'table',
    'code',
    'splitLine',
    'undo',
    'redo',
]

// 配置字体
editor.customConfig.fontNames = [
    '黑体',
    '仿宋',
    '楷体',
    '标楷体',
    '华文仿宋',
    '华文楷体',
    '宋体',
    '微软雅黑',
    'Arial',
    'Tahoma',
    'Verdana',
    'Times New Roman',
    'Courier New',
]

editor.customConfig.fontSizes = {
    'x-small': { name: '10px', value: '1' },
    'small': { name: '13px', value: '2' },
    'normal': { name: '16px', value: '3' },
    'large': { name: '18px', value: '4' },
    'x-large': { name: '24px', value: '5' },
    'xx-large': { name: '32px', value: '6' },
    'xxx-large': { name: '48px', value: '7' },
}

// 配置行高
editor.customConfig.lineHeights = ['1', '1.15', '1.6', '2', '2.5', '3']


editor.customConfig.zIndex = 0
editor.customConfig.uploadImgShowBase64 = true

editor.customConfig.onchange = function (html) {
    $('input[name=\'$name\']').val(html);
}


editor.create()

EOT;
        return parent::render();
    }
}
