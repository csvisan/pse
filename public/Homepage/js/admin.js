$(".edit-student").on("click", function () {
  const parrent = $(this).parent().parent();
  const studentLink = parrent.find('.student-link').attr('href');
  const studentId = parrent.find('.student-id').text();
  const studentName = parrent.find('.student-name').text();

  const editStudentForm = $('#edit-student');
  editStudentForm.find('#form_id').val(studentId);
  editStudentForm.find('#form_name').val(studentName);
  editStudentForm.find('#form_link').val(studentLink);

  $('#remove-picture').attr('href', `/admin/remove-student-picture/${studentId}`);
  $('#delete-student').attr('href', `/admin/delete-student/${studentId}`);
  $('#extra-buttons').show();
});

$("#add-student").on("click", function () {
  const editStudentForm = $('#edit-student');
  editStudentForm.find('#form_id').val('');
  editStudentForm.find('#form_name').val('');
  editStudentForm.find('#form_link').val('');

  $('#extra-buttons').hide();
});