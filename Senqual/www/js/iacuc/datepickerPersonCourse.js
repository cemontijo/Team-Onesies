var IACUC = IACUC || {};

IACUC.editTools.datepickerPersonCourse = {
  onSuccess: function(response) {
    var self = this
            , $cell = self.$cell
            , data = response.rowData;

    $cell.siblings('.expires')
            .find('span')
            .removeClass()
            .addClass(IACUC.expandUsersCourses.getStateCssClass(data.state))
            .text(data.date_expire_formated);

    $cell.siblings('.days')
            .text(data.days);

    // shitty calling parent's method - textInput.onSucceess updates html of edited cell
    IACUC.editTools.datepicker.onSuccess.apply(this, arguments);
  }
};

IACUC.editTools.datepickerPersonCourse =IACUC.extend(IACUC.editTools.datepicker, IACUC.editTools.datepickerPersonCourse);