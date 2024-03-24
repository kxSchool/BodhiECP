/**
 * Created by Yongbo Lu on 2017/5/17.
 */
$(function(){
    /**添加、编辑权限分类验证**/
    $('#constantForm').bootstrapValidator({
        message: '此值无效',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            parentid: {
                group: '.col-sm-10',
                validators: {
                    notEmpty: {
                        message: '上级常量未选择'
                    }
                }
            },
            categoryname: {
                group: '.col-sm-10',
                validators: {
                    notEmpty: {
                        message: '常量名不能为空'
                    }
                }
            }
        }
    });
});

