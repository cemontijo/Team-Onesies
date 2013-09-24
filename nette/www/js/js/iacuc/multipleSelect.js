var IACUC = IACUC || {};

IACUC.editTools.multipleSelect = IACUC.extend(IACUC.editTools.select, {
  onBuildFormHtml: function() {
    this.onBuildSelectHtml({multiple: true});
  }
  , onSuccess: function(response) {
    var self = this
            , $ul = $('<ul>')
            ;
    if (self.$select.val() !== null) {
      $.each(this.$select.val(), function(i, id) {
        $('<li>', {
          text: self.findOptionsName(parseInt(id))
        }).appendTo($ul);
      });
    }
    self.$cell.html($ul);
  }
  , isOptionSelected: function(name) {
    var is = false;
    this.$cell.find('li').each(function() {
      var $li = $(this);
      if ($.trim($li.text()) === name) {
        is = true;
        return false;
      }
    });
    return is;
  }
}); // end of multipleSelect

IACUC.editTools.multipleSelect = IACUC.extend(IACUC.editTools.select, IACUC.editTools.multipleSelect);