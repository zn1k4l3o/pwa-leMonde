$(function () {
  $("form[name='registration']").validate({
    rules: {
      username: {
        required: true,
        maxlength: 5,
      },
      password: {
        required: true,
        minlength: 5,
      },
      repeatPassword: {
        required: true,
        equalTo: "#password",
      },
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      username: {
        required: "Potrebno je upisati korisničko ime",
        maxlength: "Korisničko ime nesmije biti veće od 50 znakova",
      },
      password: {
        required: "Potrebno je postaviti lozinku",
        minlength: "Lozinka treba imati minimalno 5 znakova",
      },
      repeatPassword: {
        required: "Potrebno je ponoviti lozinku",
        equalTo: "Lozinke trebaju biti iste",
      },
      email: {
          required: "Potrebno je unesti email",
          email:"Email nije dobrog oblika"
      },
    },

    submitHandler: function (form) {
      form.submit();
    },
  });
});
