def generate_form(input_types):
    form_html = "<form method='post' action='handle_form.php'>"

    for input_type, input_count in input_types.items():
        for i in range(input_count):
            if input_type == 'text':
                form_html += f"<input type='text' name='text_input_{i+1}' placeholder='Tekstveld'><br>"
            elif input_type == 'password':
                form_html += f"<input type='password' name='password_input_{i+1}' placeholder='Wachtwoordveld'><br>"
            elif input_type == 'email':
                form_html += f"<input type='email' name='email_input_{i+1}' placeholder='E-mailveld'><br>"
            elif input_type == 'dropdown':
                form_html += "<select name='dropdown_input'>"
                form_html += "<option value='NL'>Nederland</option>"
                form_html += "<option value='DE'>Duitsland</option>"
                form_html += "<option value='FR'>Frankrijk</option>"
                form_html += "</select><br>"
            elif input_type == 'checkbox':
                form_html += f"<input type='checkbox' name='checkbox_input_{i+1}'>Checkbox {i+1}<br>"
            elif input_type == 'datepicker':
                form_html += f"<input type='date' name='datepicker_input_{i+1}'><br>"
    
    form_html += "<input type='submit' value='Verzenden'></form>"
    return form_html

def get_input_types():
    input_types = {}
    while True:
        input_type = input("Welk type input wilt u toevoegen (text/password/email/dropdown/checkbox/datepicker)? Voer 'stop' in om te stoppen: ").lower()
        if input_type == 'stop':
            break
        input_count = int(input("Hoeveel van dit type input wilt u toevoegen? "))
        input_types[input_type] = input_count
    return input_types

# Vraag de gebruiker welke formulierelementen ze willen toevoegen
input_types = get_input_types()

# Genereer het formulier op basis van de gebruikersinvoer
generated_form = generate_form(input_types)
print(generated_form)
