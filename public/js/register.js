// Fetch all the forms we want to apply custom Bootstrap validation styles to
const forms = $('.needs-validation')

// Loop over them and prevent submission
Array.from(forms).forEach(form => {
  form.addEventListener('submit', event => {
    let password = $('input[name="password"]')
    let password_check = $('input[name="password_check"]')

    if (!form.checkValidity() || $(password).val() !== $(password_check).val()) {
      event.preventDefault()
      event.stopPropagation()
    }

    form.classList.add('was-validated')
    password_check.addClass('is-invalid');

  }, false)
})

// check password

