$(function () {
  $('.delete-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var reserve_day = $(this).attr('reserve_day');
    var reserve_part = $(this).attr('reserve_part');
    $('.modal-inner-day').val(reserve_day);
    $('.modal-inner-part').val(reserve_part);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
