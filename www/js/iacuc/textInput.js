var IACUC = IACUC || {};

IACUC.editTools.textInput = {
  onInit: function() { // focusFirstInput
    this.$form.find(':input:first').focus();
  } // end of onInit

  , onBuildHtml: function() {

    this.$container = this.$cell.find('span').length === 1 ? this.$cell.find('span') : $('<span>');

    this.formHtml = [];

    this.$submitButton = $('<input>', {
      type: 'submit',
      value: 'Save',
      'class': 'btn btn-primary'
    });

    this.$cancelButton = $('<a>', {
      href: '#',
      type: 'reset',
      'class': 'btn btn-danger',
      html: $('<i>', {
        'class': 'icon-remove'
      }),
      data: {
        rel: 'tooltip',
        placement: 'right'
      },
      title: 'Cancel modifications (Esc)'
    }).tooltip();
    
    this.onBuildFormHtml();
    
    this.formHtml.push($('<br>'));
    this.formHtml.push(this.$submitButton);
    this.formHtml.push(this.$cancelButton);

    this.$form.html(this.formHtml);
  }

  , onBuildFormHtml: function() {
    this.$textInput = $('<input>', {
      type: 'text',
      name: this.cellData.cellName,
      value: $.trim(this.$cell.text()),
      width: Math.max(this.$cell.width(), 80) // 80px to fit both control buttons in one row
    });

    this.formHtml.push(this.$textInput);
  }

  , onAttachEvents: function() {
    var self = this;
    self.$cancelButton.click(function(e) {
      e.preventDefault();
      self.cancel();
    });
    IACUC.escQueue.push(function() {
      self.$cancelButton.click();
    })
  }
  , onSuccess: function() {
    var text = $.trim(this.$textInput.val()).length > 0 ? $.trim(this.$textInput.val()) : ' ';
    this.$cell.html(this.$container.text(text));
  } // end of onSuccess
}; //end of textInput

IACUC.editTools.textInput = IACUC.extend(IACUC.editTools.plainTool, IACUC.editTools.textInput);

