$(document).ready(function() {
    $('input').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%'
	});
    
	subcheckboxs = $('input[name="subcheckbox[]"]');
	//全选
	$('#checkall').on('ifChecked', function(event) {
		for (var i = 0; i < subcheckboxs.length; i++) {
			$(subcheckboxs[i]).iCheck('check');
		}
	});
	//取消全选
	$('#checkall').on('ifUnchecked', function(event) {
		for (var i = 0; i < subcheckboxs.length; i++) {
			$(subcheckboxs[i]).iCheck('uncheck');
		}
	});
})

function batchDelLog(logtable) {
	$this = $(logtable);
	//属于哪张表
	var logtable = $this.attr('data');
	//都哪些被勾选啦
	var checked_ids_arr = [];
	var checked_ids = ''
	for (i = 0; i < subcheckboxs.length; i++) {
		if ($(subcheckboxs[i]).prop('checked')) {
			var id = $(subcheckboxs[i]).val();
			checked_ids_arr.push(id);
		}
	}
	checked_ids = checked_ids_arr.join(',');
	if (checked_ids.length) {
		$.ajax({
			type: 'post',
			datatype: 'json',
			url: url_batchDelLog,
			data: {'logtable':logtable,'checked_ids':checked_ids},
			success: function(data) {
				var data = eval('(' + data + ')');
				if (data.info == 1) {
					location.reload();
				} else {
					$("#tipDialogContent").empty().html(data.tip);
					$("#tipDialog").modal('show');
				}
			}
		});
	}
}