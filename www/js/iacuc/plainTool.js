
var IACUC = IACUC || {};

IACUC.editTools.plainTool = {
  _init: function($cell, domCellData) {

    var $table = $cell.closest(IACUC.selectors.table)
            , $row = $cell.closest(IACUC.selectors.row)
            ;

    this.domCellData = domCellData;
    this.cellData = $.extend({
      html: $cell.html()
    }, $row.iacucData(), $table.iacucData(), domCellData);

    this.$cell = $cell;
    this.$row = $row;

    this.cellHtml = [];
    this.buildHtml();
    this.onBuildHtml();

    this.attachEvents();
    this.onAttachEvents();

    this.insert();
    /**
     * onInsert needs to be called after attachEvents
     * tool toggle submits the form in onInsert
     */
    this.onInsert();

    this.onInit();

  } // end of plainTool: init

  , buildHtml: function() {
    this.$form = $('<form>');
    this.cellHtml.push(this.$form);
  }
  , onBuildHtml: function() {

  } // end of onBuildHtml
  , attachEvents: function() {
    var self = this;

    self.$form.submit(function(e) {
      e.preventDefault();

      var postData = {
        rowId: self.cellData.rowId,
        tableName: self.cellData.tableName,
        fields: self.cellData.values || {}
      };

      self.$form.find(':input').each(function() {
        var $input = $(this);
        if (typeof $input.attr('name') !== 'undefined') {
          postData.fields[$input.attr('name').toLowerCase().replace(' ', '_')] = $input.val()
        }
      })

      if (self.validate(postData) === false) {
        self.onValidateFail(postData);
        return false;
      }

      IACUC.ajax({
        url: IACUC.getUrl('updateData'),
        data: postData
      }).done(function(response) {

        if (typeof response.rowId !== 'undefined') {

          /**
           * was new row created
           */
          if (postData.rowId != response.rowId) {
            self.$row.iacucData().rowId = response.rowId;

            /**
             * applyin sortable when changing id (possible new row)
             */
            var $wrapper = self.$row.closest(IACUC.sortable.selector);
            if ($wrapper.length === 1) {
              /**
               * needs to inject iacuc object
               * cause we're skipping sortables's init phase
               */
              IACUC.sortable.iacuc = IACUC;
              IACUC.sortable.send($wrapper);
            }
          }
        }

        self.onSuccess(response);
        self.onSuccessNoty(response);
        self.end();

      }).fail(function() {
        self.onFail();
      });
    });
  } // end of attachEvents
  , onAttachEvents: function() {

  } // end of onAttachEvents

  , insert: function() {
    this.$cell.html(this.cellHtml);
  } // end of insert

  , onInsert: function() {

  } // end of onInsert

  , cancel: function() {
    this.$cell.html(this.cellData.html);
    this.end();
  } // end of plainTool: cancel

  , end: function() {
    this.domCellData.edited = false;
  } // end of plainTool: end

  , onFail: function() {
    IACUC.noty({
      text: 'Something weird happened.',
      type: 'error'
    });
  }

  , onSuccess: function() {
    
  } // end of onSuccess
  
  , onSuccessNoty: function() {
    IACUC.noty({
      text: 'Data was successfully updated.'
    });
  } // end of onSuccessNoty

  , validate: function() {

  } // end of onValidate
  , onValidateFail: function() {

  } // end of onValidate
  , onInit: function() {

  } // end of onInit
} // end of plainTool