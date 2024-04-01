/**
 * Created by  YongBo Lu
 * User: Administrator
 * Date: 2017/5/18
 * Time: 14:32
 */
$(function(){
        URL = 'http://' + document.domain + '/b2b/admin/cpl_admin/';
        /**添加、编辑权限车型验证**/
        $('#carsForm').bootstrapValidator({
            message: '此值无效',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                char: {
                    group: '.col-sm-10',
                    validators: {
                        notEmpty: {
                            message: '字母编码不能为空'
                        }
                    }
                },
                brand: {
                    group: '.col-sm-10',
                    validators: {
                        notEmpty: {
                            message: '品牌不能为空'
                        }
                        //以下为bootstrapvalidator的回调函数，因不停的调用ajax，对服务器造成负担，弃用！

                        // callback:{
                        //     message: '不存在该品牌',        //提示信息
                        //     callback: function(value, validator) {
                        //         // //用ajax提交到后台，进行校验。如果校验失败  return false; 校验成功 return true;
                        //         // var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                        //         // return value == sum;
                        //         var value = $("#brand").val();
                        //         var res = true;
                        //         $.ajax({
                        //             url: URL + "cars/checkchars",
                        //             type:"POST",
                        //             async:false,  //######### 调整为同步请求
                        //             datatype:'json',
                        //             data:{'parm':'brand','value':value},
                        //             success:function(data){//data返回的是一个json字符串，先转换成json数据再处理
                        //                 console.log(data);
                        //                 var datas = eval('(' + data + ')');
                        //                 if(datas.info != '1'){
                        //                     res = false;
                        //                 }
                        //             }
                        //         });
                        //         return res;
                        //     }
                        // }
                    }
                },
                factory: {
                    group: '.col-sm-10',
                    validators: {
                        notEmpty: {
                            message: '厂商不能为空'
                        }
                        // callback:{
                        //     message: '不存在该厂商',        //提示信息
                        //     callback: function(value, validator) {
                        //         // //用ajax提交到后台，进行校验。如果校验失败  return false; 校验成功 return true;
                        //         // var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                        //         // return value == sum;
                        //         var value = $("#factory").val();
                        //         var res = true;
                        //         $.ajax({
                        //             url: URL + "cars/checkchars",
                        //             type:"POST",
                        //             async:false,  //######### 调整为同步请求
                        //             datatype:'json',
                        //             data:{'parm':'factory','value':value},
                        //             success:function(data){//data返回的是一个json字符串，先转换成json数据再处理
                        //                 console.log(data);
                        //                 var datas = eval('(' + data + ')');
                        //                 if(datas.info != '1'){
                        //                     res = false;
                        //                 }
                        //             }
                        //         });
                        //         return res;
                        //     }
                        // }
                    }
                },
                series: {
                    group: '.col-sm-10',
                    validators: {
                        notEmpty: {
                            message: '车系不能为空'
                        }
                        // callback:{
                        //     message: '不存在该车系',        //提示信息
                        //     callback: function(value, validator) {
                        //         // //用ajax提交到后台，进行校验。如果校验失败  return false; 校验成功 return true;
                        //         // var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                        //         // return value == sum;
                        //         var value = $("#series").val();
                        //         var res = true;
                        //         $.ajax({
                        //             url: URL + "cars/checkchars",
                        //             type:"POST",
                        //             async:false,  //######### 调整为同步请求
                        //             datatype:'json',
                        //             data:{'parm':'series','value':value},
                        //             success:function(data){//data返回的是一个json字符串，先转换成json数据再处理
                        //                 console.log(data);
                        //                 var datas = eval('(' + data + ')');
                        //                 if(datas.info != '1'){
                        //                     res = false;
                        //                 }
                        //             }
                        //         });
                        //         return res;
                        //     }
                        // }
                    }
                },
                model_type: {
                    group: '.col-sm-10',
                    validators: {
                        notEmpty: {
                            message: '车型类型不能为空'
                        }
                        // callback:{
                        //     message: '不存在该车型类型',        //提示信息
                        //     callback: function(value, validator) {
                        //         // //用ajax提交到后台，进行校验。如果校验失败  return false; 校验成功 return true;
                        //         // var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                        //         // return value == sum;
                        //         var value = $("#model_type").val();
                        //         var res = true;
                        //         $.ajax({
                        //             url: URL + "cars/checkchars",
                        //             type:"POST",
                        //             async:false,  //######### 调整为同步请求
                        //             datatype:'json',
                        //             data:{'parm':'model_type','value':value},
                        //             success:function(data){//data返回的是一个json字符串，先转换成json数据再处理
                        //                 console.log(data);
                        //                 var datas = eval('(' + data + ')');
                        //                 if(datas.info != '1'){
                        //                     res = false;
                        //                 }
                        //             }
                        //         });
                        //         return res;
                        //     }
                        // }
                    }
                },
                model: {
                    group: '.col-sm-10',
                    validators: {
                        notEmpty: {
                            message: '车型不能为空'
                        }
                        // callback:{
                        //     message: '不存在该车型',        //提示信息
                        //     callback: function(value, validator) {
                        //         // //用ajax提交到后台，进行校验。如果校验失败  return false; 校验成功 return true;
                        //         // var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                        //         // return value == sum;
                        //         var value = $("#model").val();
                        //         var res = true;
                        //         $.ajax({
                        //             url: URL + "cars/checkchars",
                        //             type:"POST",
                        //             async:false,  //######### 调整为同步请求
                        //             datatype:'json',
                        //             data:{'parm':'model','value':value},
                        //             success:function(data){//data返回的是一个json字符串，先转换成json数据再处理
                        //                 console.log(data);
                        //                 var datas = eval('(' + data + ')');
                        //                 if(datas.info != '1'){
                        //                     res = false;
                        //                 }
                        //             }
                        //         });
                        //         return res;
                        //     }
                        // }
                    }
                },
                displacement: {
                    group: '.col-sm-10',
                    validators: {
                        notEmpty: {
                            message: '排量不能为空'
                        }
                        // callback:{
                        //     message: '不存在该排量',        //提示信息
                        //     callback: function(value, validator) {
                        //         // //用ajax提交到后台，进行校验。如果校验失败  return false; 校验成功 return true;
                        //         // var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                        //         // return value == sum;
                        //         var value = $("#displacement").val();
                        //         var res = true;
                        //         $.ajax({
                        //             url: URL + "cars/checkchars",
                        //             type:"POST",
                        //             async:false,  //######### 调整为同步请求
                        //             datatype:'json',
                        //             data:{'parm':'displacement','value':value},
                        //             success:function(data){//data返回的是一个json字符串，先转换成json数据再处理
                        //                 console.log(data);
                        //                 var datas = eval('(' + data + ')');
                        //                 if(datas.info != '1'){
                        //                     res = false;
                        //                 }
                        //             }
                        //         });
                        //         return res;
                        //     }
                        // }
                    }
                },
                year: {
                    group: '.col-sm-10',
                    validators: {
                        notEmpty: {
                            message: '年款不能为空'
                        },
                        stringLength: {
                            min: 4,
                            max: 4,
                            message: '请输入4位的年份'
                        }
                        // callback: {
                        //     message: '不存在该年款',        //提示信息
                        //     callback: function (value, validator) {
                        //         // //用ajax提交到后台，进行校验。如果校验失败  return false; 校验成功 return true;
                        //         // var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                        //         // return value == sum;
                        //         var value = $("#year").val();
                        //         var res = false;
                        //         if(value.match(/^[1-2]\d{3}$/i)){
                        //             $.ajax({
                        //                 url: URL + "cars/checkchars",
                        //                 type: "POST",
                        //                 async: false,  //######### 调整为同步请求
                        //                 datatype: 'json',
                        //                 data: {'parm': 'year', 'value': value},
                        //                 success: function (data) {//data返回的是一个json字符串，先转换成json数据再处理
                        //                     console.log(data);
                        //                     var datas = eval('(' + data + ')');
                        //                     if (datas.info == '1') {
                        //                         res = true;
                        //                     }
                        //                 }
                        //             });
                        //         }
                        //         return res;
                        //     }
                        // }
                    }
                }
                // engine_type: {
                //     group: '.col-sm-10',
                //     validators: {
                //         notEmpty: {
                //             message: '发动机类型不能为空'
                //         }
                //         callback: {
                //             message: '不存在该发动机类型',        //提示信息
                //             callback: function (value, validator) {
                //                 // //用ajax提交到后台，进行校验。如果校验失败  return false; 校验成功 return true;
                //                 // var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                //                 // return value == sum;
                //                 var value = $("#engine_type").val();
                //                 var res = true;
                //                 $.ajax({
                //                     url: URL + "cars/checkchars",
                //                     type: "POST",
                //                     async: false,  //######### 调整为同步请求
                //                     datatype: 'json',
                //                     data: {'parm': 'engine_type', 'value': value},
                //                     success: function (data) {//data返回的是一个json字符串，先转换成json数据再处理
                //                         console.log(data);
                //                         var datas = eval('(' + data + ')');
                //                         if (datas.info != '1') {
                //                             res = false;
                //                         }
                //                     }
                //                 });
                //                 return res;
                //             }
                //         }
                //     }
                // }
            }
        });
    });