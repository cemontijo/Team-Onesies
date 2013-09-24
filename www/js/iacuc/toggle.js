var IACUC = IACUC || {};

IACUC.editTools.toggle = {
  onBuildHtml: function() {
    var self = this
            , values = {}
    ;

    this.value = self.$cell.find('span').length === 1 ? 'set-active' : 'set-archive';

    values[self.cellData.cellName] = this.value;
    self.cellData.values = values;
  }
  , onInsert: function() {
    this.$form.submit();
  }
  , onSuccess: function() {
    var self = this
            , content;

    if (this.value === 'set-active') { // uncheck
      content = ' ';
    } else {           // check
      content = $('<span>', {
        'class': 'icon icon-check'
      });
    }

    self.$cell.html(content);
  }
}; // end of IACUC.tools.toggle

IACUC.editTools.toggle = IACUC.extend(IACUC.editTools.plainTool, IACUC.editTools.toggle);