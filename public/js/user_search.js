$(function () {
  $('.search_conditions').click(function () {
    $(this).toggleClass('selected');
    $('.search_conditions_inner').slideToggle();
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
  });
});
