$(function() {
	$('.js-person-tab').find('a').on('click', function() {

		var $this = $(this);
		$this.parent().addClass('active').siblings().removeClass('active');
		var _id = $this.attr('data-id');
		$('.js-tab-' + _id).removeClass('hidden').siblings().addClass('hidden');

	});
});