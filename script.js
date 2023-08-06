$.validator.addMethod(
    'dateTime',
    function (value, element) {
      return value == '' || !isNaN(Date.parse(value));
    },
    'Must be a valid date and time'
  );
  
  $('#formArticle').validate({
    rules: {
      title: {
        required: true,
      },
      content: {
        required: true,
      },
      published_at: {
        dateTime: true,
      },
    },
  });
  