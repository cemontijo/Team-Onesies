var IACUC = IACUC || {};

IACUC.editTools.typeahead = {
  onInsert: function() {
    this.$textInput.iacucTypeahead({
      source: IACUC.getSource(this.cellData.source || this.cellData.cellName)
    });
  }
};

IACUC.editTools.typeahead = IACUC.extend(IACUC.editTools.textInput, IACUC.editTools.typeahead);