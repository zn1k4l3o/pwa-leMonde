$(function () {
  $("form[name='login']").validate({
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      username: {
        required: "Potrebno je upisati korisničko ime",
      },
      password: {
        required: "Potrebno je upisati lozinku",
      },
    },

    submitHandler: function (form) {
      form.submit();
    },
  });
});
