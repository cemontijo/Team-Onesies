var IACUC = IACUC || {};

IACUC.editTools.personName = {
  onBuildFormHtml: function() {
    var self = this
            , $cell = self.$cell
            , $div = $('<div>')
            ;

    self.$input1 = $('<input>', {
      type: 'text',
      name: 'first_name',
      value: $cell.find('span[title="First Name"]').text(),
      width: $cell.width(),
      placeholder: 'First Name'
    });

    self.$input2 = $('<input>', {
      type: 'text',
      name: 'last_name',
      value: $cell.find('span[title="Last Name"]').text(),
      width: $cell.width(),
      placeholder: 'Last Name'
    });

    self.$input3 = $('<input>', {
      type: 'text',
      name: 'degree',
      value: $cell.find('span[title="Degree"]').text(),
      width: $cell.width(),
      placeholder: 'Degree'
    });

    self.$input4 = $('<input>', {
      type: 'text',
      name: 'title',
      value: $cell.find('span[title="Title"]').text(),
      width: $cell.width(),
      placeholder: 'Title'
    });

    self.formHtml = self.formHtml.concat([
      self.$input1, $('<br>'),
      self.$input2, $('<br>'),
      self.$input3, $('<br>'),
      self.$input4]);
  }
  , onInsert: function() {
    this.$input3.iacucTypeahead({
      source: IACUC.getSource('degree')
    });
    this.$input4.iacucTypeahead({
      source: IACUC.getSource('title')
    });
  }
  , onSuccess: function() {
    var self = this
            , content = []
            , $lastName = $('<span>', {
      title: 'Last Name',
      text: self.$input2.val()
    })
            , $space = $('<span>', {
      text: ' '
    })
            , $firstName = $('<span>', {
      title: 'First Name',
      text: self.$input1.val()
    })
            ;

    content.push($lastName, $space, $firstName);

    var degree = self.$input3.val();
    if ($.trim(degree) !== '') {
      content.push(
              $('<span>', {
        text: ', '
      }));
      content.push($('<span>', {
        title: 'Degree',
        text: degree
      })
              );
    }
    var title = self.$input4.val();
    if ($.trim(title) !== '') {
      content.push($('<span>', {
        text: ', '
      }));
      content.push($('<span>', {
        title: 'Title',
        text: title
      }));
    }

    self.$cell.html(content);
  }
}; // end of personName

IACUC.editTools.personName = IACUC.extend(IACUC.editTools.textInput, IACUC.editTools.personName);