
if (!Object.create) {
  Object.create = function(o) {
    function F() {
    }
    F.prototype = o;
    return new F();
  };
}

/**
 * helper plugin for keeping things DRY
 */
(function($) {
  $.fn.iacucData = function() {
    return $(this).data('iacuc');
  };
})(jQuery);
/**
 * helper plugin for keeping things DRY
 * requires modified file bootstrap-typeahead.js!!!!
 *  (option showAll should be present in future version 2.1.0)
 */
(function($) {
  $.fn.iacucTypeahead = function(params) {
    var defaults = {
      items: 10,
      showAll: true
    }
    , opt = $.extend(defaults, params);
    return $(this).typeahead(opt);
  };
})(jQuery);
/**
 * if IACUC object was defined before this script runs,
 * it is saved for further reference and then merged
 */
if (IACUC) {
  var IACUCInit = IACUC;
}


var IACUC = {
  //    source: {}, // data source for typeahead and chosen(multiple-select)
  //    url: {},

  /**
   * 
   * @type Array of callbacks to be called when esc is pressed
   */
  escQueue: [],
  selectors: {
    table: '.iacuc-editable-table',
    row: '.iacuc-editable-row',
    cell: '.iacuc-editable-cell',
    //
    addNewRow: '.iacuc-add-new-row-', // + tableName (in table: data-iacuc attribute)
    deleteRow: '.iacuc-delete-row'
  },
  /**
   * selector to class
   * '.iacuc-delete-row' -> 'iacuc-delete-row'
   */
  selectorToClass: function(s) {
    return s.substring(1);
  },
    /**
     * source should be specified at the beginnnig of each template
     */
  getSource: function(type) {
    if (!this.source[type]) {
      /**
       * @todo throw an error
       */
      l('source error')
      return null;
    }
    return this.source[type];
  },
    /**
     * URLs should be specified at the beginnnig of each template
     */
  getUrl: function(type) {
    if (!this.url[type]) {
      /**
       * @todo throw an error
       */
      l('url error')
      return null;
    }
    return this.url[type];
  },
  init: function($table) {
    var self = this;
    /**
     * global variable coming from charisma.js:255
     */
    if (!self.datatable) {
      self.datatable = datatable;
    }

    /**
     * prefetching ajax gif image
     * not used right now I guess
     */
    $('.ajaxloader').show().hide();

    /**
     * firing esc callbacks
     */
    $(document).keyup(function(e) {
      if (e.keyCode == 27) { //esc
        e.stopImmediatePropagation();
        var f = IACUC.escQueue.pop();
        if (f) {
          f();
        } else {
          self.noty({
            text: 'Nothing to cancel.'
                    , type: 'warning'
          });
        }
      }
    });
    /**
     * init just one specified table
     * @example when expanding users courses - need to initialize only
     *	    just created table
     */
    if ($table) {
      self.initOnTable($table);
      return;
    }

    $(self.selectors.table).each(function() {
      var $table = $(this);
      self.initOnTable($table);
    });
  }, // end of init

  initOnTable: function($table) {
    var self = this
            , tableName = $table.iacucData().tableName
            ;
            
    /**
     * functions called when initializing
     */     
    $.each(self.tableOnInitEvents, function(fName, f) {
      f(tableName, $table);
    });
    
    /**
     * functions called when clicked on the table
     */
    $table.click(function(e) {
      $.each(self.tableOnClickEvents, function(fName, f) {
        f(e);
      });
    });
  }, // end of initOnTable

  tableOnInitEvents: {
    onClickAddNewRow: function(tableName, $table) {
      $(IACUC.selectors.addNewRow + tableName).click(function(e) {
        e.preventDefault();
        var $firstRow = $table.find(IACUC.selectors.row + ':first')
                , $parent = $firstRow.parent()
                , $row = $firstRow.clone()
                ;

        // there is no row to duplicate
        if ($firstRow.length === 0) {
          // the table is empty
          // need to create one row and reload the page
          // so that the HTML can be build properly
          if (IACUC.datatable.$('tr').length === 0) {
            IACUC.ajax({
              url: IACUC.getUrl('updateData'),
              data: {rowId: 'new'}
            }).done(function(response) {
              // need to reload the page to have proper html classes with new row
              location.reload(true);
            });
            return;
          }

          // the table is not empty - need to clear filter
          IACUC.datatable.fnFilter( '' );
          // and click again on (+) button
          $(this).click();
          return;
        }

        $row.iacucData().rowId = 'new';
        $row.hide().prependTo($parent).fadeIn().css('display', 'table-row'); // css cause of firefox badly handling 'display:block'
        $row.find(IACUC.selectors.cell).each(function() {
          var $cell = $(this);
          if ($cell.find('span').length > 0) {
            $cell.find('span').text(' ');
          } else {
            $cell.text(' ');
          }
        });
        $row.find(IACUC.selectors.cell + ':first').click();
      });
    },
    onInitSortable: function(tableName, $table) {
      IACUC.extend(IACUC.sortable).init($table);
    }

  }, // end of tableOnInitEvents

  sortable: {
    initSelector: '.iacuc-sortable',
    handleSelector: '.priority',
    priorityNumberSelector: '.priority-number',
    cursor: 'move',
    init: function($table) {
      var self = this;
      /**
       * UI sortable for trainings table
       */
      $table.find(self.initSelector).sortable({
        handle: self.handleSelector,
        cursor: self.cursor,
        update: function(e, ui) {
          var $wrapper = $(ui.item).parent()
          self.send($wrapper);
        }
      });
    }, // end of init

    send: function($wrapper) {
      var self = this
              , sortedIDs = self.serialize($wrapper);
      IACUC.ajax({
        url: IACUC.getUrl('updateOrder'),
        data: {
          items: sortedIDs
        }
      }).done(function(response, u) {
        var i = 1;
        /**
         * update numbers in priority column
         */
        $wrapper.find(self.priorityNumberSelector).each(function() {
          var $td = $(this);
          $td.text(i++);
        });
        IACUC.noty({
          text: 'Priority was successfully updated.'
        });
      });
    },
    serialize: function($wrapper) {
      var IDs = [];
      $wrapper.children().each(function() {
        var rowId = $(this).iacucData().rowId;
        if (rowId) {
          IDs.push(rowId);
        }
      });
      return IDs;
    }

  }, // end of sortable

  tableOnClickEvents: {
    onClickDeleteRow: function(e) {
      var $el = $(e.target)
              , $cell = $el.closest(IACUC.selectors.deleteRow)
              ;
      if ($cell.length === 0) {
        return;
      }
      e.preventDefault();
      var $row = $cell.closest(IACUC.selectors.row)
              , text = "Are you sure you would like to delete this record?"
              , title = '';

      if ($.trim(title).length > 0) {
        text += "\n\n" + title;
      }

      if (!confirm(text)) {
        return;
      }

      IACUC.ajax({
        url: IACUC.getUrl('deleteRow'),
        data: {
          rowId: $row.iacucData().rowId
        }
      }).done(function(response, u) {
        if (response.result === 'success') {
          $row.fadeOut(function() {
            $row.remove();
          });
          IACUC.noty({
            text: 'Row was successfully deleted.'
          });
        }
      });
    }, // end of clickDeleteRow

    onClickEditCell: function(e) {
      var $el = $(e.target)
              , $cell = $el.closest(IACUC.selectors.cell)
              ;
      if ($cell.length === 0) {
        return;
      }

      var domCellData = $cell.iacucData() || {}
      , tool = domCellData.tool || IACUC.editTools.defaultTool
              ;
      if (domCellData.edited === true) {
        return;
      }

      domCellData.edited = true;
      IACUC.extend(IACUC.editTools[tool])._init($cell, domCellData);
    }, // end of click

    onClickToExpandUsersCourses: function(e) {
      var $button = $(e.target).closest('.iacuc-row-open');
      if ($button.length === 0) {
        return;
      }

      IACUC.extend(IACUC.expandUsersCourses).init(e, $button);
    } // end of expandCourses

  }, // end of tableClickEvents

  expandUsersCourses: {
    init: function(e, $button) {
      var self = this;

      var $row = $button.closest('tr')
              , personId = $row.iacucData().rowId
              ;

      self.$row = $row;

      self.getHtmlCourses(personId);

    }, // end of init

    getHtmlCourses: function(id) {
      var self = this;

      IACUC.ajax({
        url: IACUC.getUrl('getCourses'),
        type: 'GET',
        data: {
          person_id: id
        }
      }).done(function(data, u) {
        var $table = $('<table>', {
          'class': IACUC.selectorToClass(IACUC.selectors.table) + ' table',
          data: {
            iacuc: {
              tableName: 'person_course'
            }
          }
        });
        $.each(data.courses, function(training, courses) {
          $('<thead>', {
            html: $('<tr>', {
              html: [
                $('<th>'),
                $('<th>', {
                  text: training
                }),
                $('<th>', {
                  text: 'Registered'
                }),
                $('<th>', {
                  text: 'Expires'
                }),
                $('<th>', {
                  text: 'In days'
                })
              ]
            })
          }).appendTo($table);
          var $tbody = $('<tbody>');
          $.each(courses, function(course, detail) {
            var $tr = $('<tr>', {
              'class': IACUC.selectorToClass(IACUC.selectors.row),
              data: {
                iacuc: {
                  rowId: detail.id
                }
              }
            });
            var category = detail.category.substring(0, 3);
            $('<td>', {
              text: category,
              'class': category.toLowerCase()
            }).appendTo($tr);
            $('<td>', {
              text: course
            }).appendTo($tr);
            
            $('<td>', {
              html: $('<span>', {
                text: detail.date,
                'class': 'label date'
              }),
              'class': IACUC.selectorToClass(IACUC.selectors.cell),
              data: {
                iacuc: {
                  tool: 'datepickerPersonCourse',
                  cellName: 'registered_date',
                  values: {
                    person_id: data.person_id,
                    course_id: detail.course_id
                  }
                }
              }
            }).appendTo($tr);
            $('<td>', {
              'class': 'expires',
              html: $('<span>', {
                text: detail.date_expire_formated,
                'class': self.getStateCssClass(detail.state)
              })
            }).appendTo($tr);
            $('<td>', {
              'class': 'days',
              text: detail.days
            }).appendTo($tr);
            $tr.appendTo($tbody);
          });
          $tbody.appendTo($table);
        });
        /**
         * initialize editing
         */
        IACUC.init($table);

        IACUC.modal._init({
          title: self.$row.find('td:first').text()
                  , html: $table
        });
      });
    }, // end of getHtmlCourses

    //	missing
    //	expired
    //	cool
    //	expires-soon
    getStateCssClass: function(state) {
      var c = 'label label-';
      switch (state) {
        case 'missing':
          c += 'important';
          break;
        case 'expired':
          c += 'important';
          break;
        case 'expires-60':
        case 'expires-30':
          c += 'warning';
          break;
        case 'cool':
          c += 'success';
          break;
      }
      return c;
    }

  }, // end of expandCourses

  modal: {
    _init: function(content) {
      var $modal = $('<div>', {
        'class': 'modal',
        html: [
          $('<div>', {
            'class': 'modal-header',
            html: $('<h3>', {text: content.title})
          }),
          $('<div>', {
            'class': 'modal-body',
            html: content.html
          }),
          $('<div>', {
            'class': 'modal-footer',
            html: $('<a>', {
              href: '#',
              text: 'Close (Esc)',
              'class': 'btn btn-primary'
            }).click(function(e) {
              e.preventDefault();
              $(this).closest('.modal').modal('hide');
            })
          })
        ]
      }).hide().appendTo('body');

      $modal.modal({
        keyboard: false // my own escape function closes modal
      });

      IACUC.escQueue.push(function() {
        $modal.modal('hide');
      });

      $modal.on('hidden', function(e) {
        /**
         * if there's element with tooltip inside modal
         *  on hoverout tooltip's element fires 'hidden' event
         *  which bubbles up to modal, hence check...
         */
        if ($(e.target).is($modal)) { // 
          $modal.remove();
        }
      });
    }
  },
          
  /**
   * tool that will be used when no tool is specified in <td> element in template
   */
          
  editTools: {
    defaultTool: 'textInput'
  }, // end of tools

  ajax: function(arg) {
    /**
     * default options
     */
    var options = {
      type: 'POST'
    };
    $.extend(options, arg || {});
    return $.ajax(options);
  }, // end of ajax

  /**
   * @see http://needim.github.com/noty/
   * watch out - v1.2.1
   */
  noty: function(arg) {
    /**
     * default options
     */
    var options = {
      timeout: arg.type && arg.type === 'error' ? 6000 : 2000,
      type: 'success', // alert | warning | information | error | notification | success
      layout: 'bottomLeft'
    };
    $.extend(options, arg || {});
    return noty(options);
  }, // end of noty

  /**
   * http://www.adobe.com/devnet/html5/articles/javascript-object-creation.html
   */
  extend: function(o, props) {
    var prop, obj;
    obj = Object.create(o);
    if (props) {
      for (prop in props) {
        if (props.hasOwnProperty(prop)) {
          obj[prop] = props[prop];
        }
      }
    }
    return obj;
  },
  log: function(s) {
    if (typeof console !== "undefined" && console.log) {
      console.log(s);
    }
  } // end of log

  /**
   * http://stackoverflow.com/questions/5767325/remove-specific-element-from-a-javascript-array
   * @param {type} array
   * @param {type} value
   * @returns {undefined}
   */
  , arrayPop: function(array, value) {
    var index = array.indexOf(value);
    array.splice(index, 1);
  }
} // end of IACUC


if (IACUCInit) {
  $.extend(IACUC, IACUCInit);
}

$(function() {
  clearTimeout(blockerTimeout);
  $("#blocker").hide();
  $("#blocker-text").hide();
  IACUC.init();
});
function l(s) {
  IACUC.log(s);
}

/**
 * IE fix
 */
if (!Array.prototype.indexOf) {
  Array.prototype.indexOf = function(obj, start) {
    for (var i = (start || 0), j = this.length; i < j; i++) {
      if (this[i] === obj) {
        return i;
      }
    }
    return -1;
  }
}