<?php


// 定义标题和面包屑信息
$this->title = '文章';
?>
<?= \backend\widgets\MeTable::widget() ?>
<?php $this->beginBlock('javascript') ?>
<script type="text/javascript">
        
    // 显示上级分类
        function parentStatus(td, data) {
            $(td).html(aParents[data] ? aParents[data] : '顶级分类');
        }

        meTables.extend({
            //自定义下拉
            selectOptionsCreate: function (params) {
                return '<select ' + mt.handleParams(params) + '><option value="0">顶级分类</option><?= $options ?></select>';
            },
            selectOptionsSearchMiddleCreate: function (params) {
                delete params.type;
                params.id = "search-" + params.name;
                return '<label for="' + params.id + '"> ' + params.title + ': <select ' + mt.handleParams(params) + '>' +
                    '<option value="All">请选择</option>' +
                    '<option value="0">顶级分类</option>' +
                    '<?= $options ?>'   +
                    '</select></label>';
            },
            //自定义百度编辑器
            ueditorCreate:function(params) {
                return '<?= \common\widgets\ueditor\Ueditor::widget([
                    'id' => 'article_content',
                    'options' => [
                        'initialFrameWidth' => 510,
                        'toolbars' => [
                            [   
                                'source', //源代码
                                'anchor', //锚点
                                'undo', //撤销
                                'redo', //重做
                                'bold', //加粗
                                'indent', //首行缩进
                                'italic', //斜体
                                'underline', //下划线
                                'strikethrough', //删除线
                                'subscript', //下标
                                'fontborder', //字符边框
                                'superscript', //上标
                                'formatmatch', //格式刷
                                'blockquote', //引用
                                'pasteplain', //纯文本粘贴模式
                                'selectall', //全选
                                'horizontal', //分隔线
                                'removeformat', //清除格式
                                'time', //时间
                                'date', //日期
                                'unlink', //取消链接
                                'insertrow', //前插入行
                                'insertcol', //前插入列
                                'mergeright', //右合并单元格
                                'mergedown', //下合并单元格
                                'deleterow', //删除行
                                'deletecol', //删除列
                                'splittorows', //拆分成行
                                'splittocols', //拆分成列
                                'splittocells', //完全拆分单元格
                                'deletecaption', //删除表格标题
                                'inserttitle', //插入标题
                                'mergecells', //合并多个单元格
                                'deletetable', //删除表格
                                'cleardoc', //清空文档
                                'insertparagraphbeforetable', //"表格前插入行"
                                'fontfamily', //字体
                                'fontsize', //字号
                                'paragraph', //段落格式
                                'simpleupload', //单图上传
                                'insertimage', //多图上传
                                'edittable', //表格属性
                                'edittd', //单元格属性
                                'link', //超链接
                                'emotion', //表情
                                'spechars', //特殊字符
                                'searchreplace', //查询替换
                                'map', //Baidu地图
                                'gmap', //Google地图
                                'insertvideo', //视频
                                'help', //帮助
                                'justifyleft', //居左对齐
                                'justifyright', //居右对齐
                                'justifycenter', //居中对齐
                                'justifyjustify', //两端对齐
                                'forecolor', //字体颜色
                                'backcolor', //背景色
                                'insertorderedlist', //有序列表
                                'insertunorderedlist', //无序列表
                                'fullscreen', //全屏
                                'directionalityltr', //从左向右输入
                                'directionalityrtl', //从右向左输入
                                'rowspacingtop', //段前距
                                'rowspacingbottom', //段后距
                                'pagebreak', //分页
                                'insertframe', //插入Iframe
                                'imagenone', //默认
                                'imageleft', //左浮动
                                'imageright', //右浮动
                                'attachment', //附件
                                'imagecenter', //居中
                                'wordimage', //图片转存
                                'lineheight', //行间距
                                'edittip ', //编辑提示
                                'autotypeset', //自动排版
                                'touppercase', //字母大写
                                'tolowercase', //字母小写
                                'background', //背景
                                'template', //模板
                                'scrawl', //涂鸦
                                'music', //音乐
                                'inserttable', //插入表格
                                'drafts', // 从草稿箱加载
                                'charts', // 图表
                            ],
                        ], 
                    ]
                ]) ?>';
            }
        });
        var is_sh = <?= \yii\helpers\Json::encode($is_sh) ?>;
        var is_sh2 = <?= \yii\helpers\Json::encode($is_sh2) ?>;
        var is_shColor = <?= \yii\helpers\Json::encode($is_shColor) ?>;
        var state = <?= \yii\helpers\Json::encode($state) ?>;
        var stateColor = <?= \yii\helpers\Json::encode($stateColor) ?>;
        
    var m = meTables({
        params: {
        is_sh: 0
         },
        title: "文章 ",
        table: {
            "aoColumns": [
            {
                "title": "自增id",
                 "data": "id",
                  "sName": "id"
            }, 
			{
                "title": "文章名称",
                "data": "article_name",
                "sName": "article_name",
                "edit": {
                    "type": "text",
                    "required": true,
                    "rangelength": "[2, 20]"
                }, 
                "search": {"type": "text"},
                "bSortable": false//排序
            }, 
			{
                "title": "文章分类",
                "data": "cat_id", 
                "sName": "cat_id", 
                "edit": {
                    "type": "selectOptions", //下拉框
                    "required": true,
                    "number": 1,
                    id: "select-options"
                }, 
                "search": {
                    "type": "selectOptions"
                }, 
                "bSortable": false
            }, 
                
			{
                "title": "文章内容", 
                "data": "article_content", 
                "sName": "article_content", 
                "edit": {
                    "type": "ueditor", 
                    "required": true,
                    "rangelength": "[2, 255]",
                
                }, 
                "bSortable": false
            }, 
            {
                "title": "审核", 
                "data": "is_sh", 
                "sName": "is_sh", 
                "value": is_sh,
                "edit": {
                    "type": "radio", //单选
                    "default": 0,//默认值
                    "required": true,
                    "number": true,
                }, 
                "search": {
                    "type": "select"
                }, 
             
                "createdCell":function(td, data) {
                    $(td).html(mt.valuesString(is_sh, is_shColor, data));
                }

            }, 
			{
                "title": "审核未通过理由", 
                "data": "is_sh_no", 
                "sName": "is_sh_no", 
                "isHide": true, 
                "edit": {
                    "type": "text",  
                     
                }, 
                "bSortable": false
            }, 
            {
                "title": "发布 ", 
                "data": "is_fb", 
                "sName": "is_fb", 
                "value": state,
                "edit": {
                    "type": "radio", 
                    "default": 0,
                    "required": true,
                    "number": true
                }, 
                "search": {
                    "type": "select"
                }, 
               "createdCell":function(td, data) {
                    $(td).html(mt.valuesString(state, stateColor, data));
                }
            }, 
			{
                "title": "推荐 ",
                "data": "is_tj", 
                "sName": "is_tj", 
                "value": state,
                "edit": {
                    "type": "radio", 
                    "default": 0,
                    "required": true,
                    "number": true
                }, 
                "search": {
                    "type": "select"
                }, 
                "createdCell":function(td, data) {
                    $(td).html(mt.valuesString(state, stateColor, data));
                }
            }, 
			{
                "title": "点击数", 
                "data": "click_num", 
                "sName": "click_num", 
                "isHide": true,
                "edit": {
                    "type": "text", 
                    "required": true,
                    "number": true
                }, 
                "bSortable": false
            }, 
            
            {
                "title": "作者", 
                "data": "author", 
                "sName": "author", 
                "isHide": true
                }, 

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