def generate_form():
    form_html = "<form method='post' action='handle_form.php'>"
    form_html += "<input type='text' name='name' placeholder='Naam'><br>"
    form_html += "<input type='email' name='email' placeholder='E-mail'><br>"
    form_html += "<input type='password' name='password' placeholder='Wachtwoord'><br>"
    form_html += "<select name='country'><option value='NL'>Nederland</option><option value='DE'>Duitsland</option><option value='FR'>Frankrijk</option></select><br>"
    form_html += "<input type='checkbox' name='driving_license' value='yes'>Rijbewijs<br>"
    form_html += "<input type='date' name='birthdate' placeholder='Geboortedatum'><br>"
    form_html += "<input type='submit' value='Verzenden'></form>"
    return form_html

# Generate the form
generated_form = generate_form()
print(generated_form)
