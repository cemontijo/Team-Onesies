var IACUC = IACUC || {};

IACUC.editTools.select = {
  onBuildFormHtml: function() {
    this.onBuildSelectHtml();
  }
  , onBuildSelectHtml: function(paramAttributes) {
    var self = this
            , name = self.cellData.cellName
            , source = self.cellData.source || name
            , selectAttributes = $.extend({name: name}, paramAttributes);

    self.dataSource = IACUC.getSource(source)

    self.$select = $('<select>', selectAttributes);

    $.each(self.dataSource, function() {
      $('<option>', {
        value: this.id,
        text: this.name,
        selected: self.isOptionSelected(this.name)
      }).appendTo(self.$select);
    });

    self.formHtml.push(self.$select);
  }
  , onInsert: function() {
    this.$select.chosen();
  }
  , onSuccess: function() {
    var self = this
            , text = self.findOptionsName(parseInt(self.$select.val()))
            ;

    self.$cell.text(text);
  }
  , isOptionSelected: function(name) {
    return $.trim(this.$cell.text()) === name;
  }
  , findOptionsName: function(id) {
    var name, self = this;
    $.each(self.dataSource, function() {
      if (this.id === id) {
        name = this.name;
        return false;
      }
    });
    return name;
  }
}; // end of select

IACUC.editTools.select = IACUC.extend(IACUC.editTools.textInput, IACUC.editTools.select);
