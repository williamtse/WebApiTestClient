<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/13
 * Time: 11:30
 */
namespace App\Extensions;
use Encore\Admin\Form\Field;
class JsonEditor extends Field
{
    protected $view = 'admin.json-editor';
    protected static $js = 'vendor/jsoneditor/dist/jsoneditor.js';
    protected static $css = 'vendor/jsoneditor/dist/jsoneditor.css';

    public function render()
    {
        $name = $this->formatName($this->column);
        $this->script = <<<EOF
// create the editor
        var container = document.getElementById("{$this->id}");
        var options = {
              onEditable: function (node) {
                // node is an object like:
                //   {
                //     field: 'FIELD',
                //     value: 'VALUE',
                //     path: ['PATH', 'TO', 'NODE']
                //   }
                switch (node.field) {
                  case '_id':
                    return false;
        
                  case 'name':
                    return {
                      field: false,
                      value: true
                    };
        
                  default:
                    return true;
                }
              }
            };
        var editor = new JSONEditor(container, options);
        editor.on('change',function(){
            $('input[name=$name]').val(editor.get());
        });
//        // set json
//        var json = {
//            "Array": [1, 2, 3],
//            "Boolean": true,
//            "Null": null,
//            "Number": 123,
//            "Object": {"a": "b", "c": "d"},
//            "String": "Hello World"
//        };
//        editor.set(json);
// 
//        // get json
//        var json = editor.get();
EOF;
        return parent::render();
    }
}