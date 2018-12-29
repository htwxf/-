<?php
// 定义标题和面包屑信息
$this->title = '文章分类';
?>
<?=\backend\widgets\MeTable::widget()?>
<?php $this->beginBlock('javascript') ?>
<script type="text/javascript">
    var m = meTables({
        title: "文章分类",
        table: {
            "aoColumns": [
                			{"title": "自增id", "data": "id", "sName": "id", "bSortable": false}, 
			{"title": "名称", "data": "cat_name", "sName": "cat_name", "edit": {"type": "text", "required": true,"rangelength": "[2, 20]"}, "search": {"type": "text"}, "bSortable": false}, 
			{"title": "上级", "data": "category_id", "sName": "category_id", "edit": {"type": "select", "required": true,"number": true}, "bSortable": false}, 
			{"title": "分类图片", "data": "cat_img", "sName": "cat_img", "edit": {"type": "radio", "required": true,"rangelength": "[2, 255]"}, "bSortable": false}, 

            ]       
        }
    });
    
    /**
    meTables.fn.extend({
        // 显示的前置和后置操作
        beforeShow: function(data, child) {
            return true;
        },
        afterShow: function(data, child) {
            return true;
        },
        
        // 编辑的前置和后置操作
        beforeSave: function(data, child) {
            return true;
        },
        afterSave: function(data, child) {
            return true;
        }
    });
    */

     $(function(){
         m.init();
     });
</script>
<?php $this->endBlock(); ?>