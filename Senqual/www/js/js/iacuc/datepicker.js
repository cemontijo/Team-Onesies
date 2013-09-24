var IACUC = IACUC || {};

IACUC.editTools.datepicker = {
  onInsert: function() {
    var self = this;
    self.$textInput.datepicker({
      showButtonPanel: true,
      closeText: "Close (Esc)",
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
    
    IACUC.escQueue.push(function () {
      self.$textInput.datepicker('hide');
    });
  }
};

IACUC.editTools.datepicker = IACUC.extend(IACUC.editTools.textInput, IACUC.editTools.datepicker);