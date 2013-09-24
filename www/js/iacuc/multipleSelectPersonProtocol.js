var IACUC = IACUC || {};

IACUC.editTools.multipleSelectPersonProtocol = {
  logState: function() {
    var self = this;
    l("Active: (" + self.activeOptions.length + ")");
    $.each(self.activeOptions, function(i, name) {
      l(' ' + name);
    });

    l("Archive: (" + self.archiveOptions.length + ")");
    $.each(self.archiveOptions, function(i, name) {
      l(' ' + name);
    });
    l("------");
  }

  , onBuildFormHtml: function() {
    this.myInit();
    this.myBuildSelectHtml();
    this.syncDomOptions();
  }
  , myInit: function() {
    var self = this;

    self.activeOptions = [];

    self.archiveOptions = [];

    self.$storage = $('<ul>');

    this.$cell.find('li').each(function() {
      var $li = $(this);
      var name = $.trim($li.text());
      if ($li.find('strike').length) {
        self.archiveOptions.push(name)
      } else {
        self.activeOptions.push(name)
      }
    });
  }

  , myBuildSelectHtml: function() {
    var self = this
            , name = self.cellData.cellName;

    self.dataSource = IACUC.getSource(name);

    self.$selectActive = $('<select>', {
      multiple: true,
      name: 'activePeople'
    });
    $.each(self.dataSource, function() {
      var name = $.trim(this.name);
      $('<option>', {
        value: this.id,
        text: name,
        selected: ($.inArray(name, self.activeOptions) > -1)
      }).appendTo(self.$selectActive);
    });

    self.$selectArchive = $('<select>', {
      multiple: true,
      name: 'archivePeople'
    });
    $.each(self.dataSource, function() {
      var name = $.trim(this.name);
      $('<option>', {
        value: this.id,
        text: name,
        selected: ($.inArray(name, self.archiveOptions) > -1)
      }).appendTo(self.$selectArchive);
    });

    self.formHtml.push(self.$selectActive)
    self.formHtml.push(self.$selectArchive)
  }
  , syncDomOptions: function() {
    var self = this;
    $.each(self.activeOptions, function(i, name) {
      var $option = self.findOptionByName(self.$selectArchive, name);
      if ($option.length) {
        $option.appendTo(self.$storage);
      }

      $option = self.findOptionByName(self.$selectActive, name);
      if ($option.length === 0) {
        $option = self.findOptionByName(self.$storage, name);
        $option.appendTo(self.$selectActive);
      }
    });

    $.each(self.archiveOptions, function(i, name) {
      var $option = self.findOptionByName(self.$selectActive, name);
      if ($option.length) {
        $option.appendTo(self.$storage);
      }

      $option = self.findOptionByName(self.$selectArchive, name);
      if ($option.length === 0) {
        $option = self.findOptionByName(self.$storage, name);
        $option.appendTo(self.$selectArchive);
      }
    });

    self.$selectActive.trigger("liszt:updated");
    self.$selectArchive.trigger("liszt:updated");
  }
  , removeOptionFromActive: function(name) {
    var self = this;

    IACUC.arrayPop(self.activeOptions, name);
    self.addOptionToArchive(name);

    self.syncDomOptions();

    var $option = self.findOptionByName(self.$selectArchive, name);
    $option.attr('selected', 'selected');
    self.$selectArchive.trigger("liszt:updated");
  }
  , addOptionToActive: function(name) {
    this.activeOptions.push(name);
    this.syncDomOptions();
  }
  , addOptionToArchive: function(name) {
    this.archiveOptions.push(name);
    this.syncDomOptions();
  }
  , removeOptionFromArchive: function(name) {
    var self = this;
    IACUC.arrayPop(self.archiveOptions, name);

    var $option = self.findOptionByName(self.$storage, name);
    $option.appendTo(self.$selectActive);

    self.syncDomOptions();
  }
  , findOptionByName: function($select, name) {
    return $select.find('option:contains("' + name + '"):first');
  }
  , onInsert: function() {
    var self = this;

    self.logState();

    self.$selectActive.chosen().change(function(e) {
      var $select = $(this);

      // removing
      $.each(self.activeOptions, function(i, name) {
        var $option = self.findOptionByName($select, name);
        if ($option.is(':selected') === false) {
          self.removeOptionFromActive($option.text());
          self.logState();
        }
      });

      // adding
      $select.find('option:selected').each(function() {
        var $option = $(this);
        var name = $.trim($option.text());
        if ($.inArray(name, self.activeOptions) === -1) {
          self.addOptionToActive(name);
          self.logState();
          return false;
        }
      });
    });

    self.$selectArchive.chosen().change(function(e) {
      var $select = $(this);

      // removing
      $.each(self.archiveOptions, function(i, name) {
        var $option = self.findOptionByName($select, name);
        if ($option.is(':selected') === false) {
          self.removeOptionFromArchive($option.text());
          self.logState();
        }
      });

      // adding
      $select.find('option:selected').each(function() {
        var $option = $(this);
        var name = $.trim($option.text());
        if ($.inArray(name, self.archiveOptions) === -1) {
          self.addOptionToArchive(name);
          self.logState();
          return false;
        }
      });
    });
  }
  , onSuccess: function() {
    var self = this
            , $ul = $('<ul>')
            ;

    self.logState();

    if (self.$selectActive.val() !== null) {
      $.each(this.$selectActive.val(), function(i, id) {
        $('<li>', {
          text: self.findOptionsName(parseInt(id))
        }).appendTo($ul);
      });
    }

    if (self.$selectArchive.val() !== null) {
      $.each(this.$selectArchive.val(), function(i, id) {
        $('<li>', {
          html: $('<strike>', {
            text: self.findOptionsName(parseInt(id))
          })
        }).appendTo($ul);
      });
    }

    self.$cell.html($ul);
  }
} // end of multipleSelectPersonProtocol

IACUC.editTools.multipleSelectPersonProtocol = IACUC.extend(IACUC.editTools.select, IACUC.editTools.multipleSelectPersonProtocol);

