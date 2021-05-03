function validateForename(field) {
    return (field === "") ? "Name hasn't inputted.\n" : ""
}

function validateSurname(field) {
    return (field === "") ? "Surname hasn't inputted.\n" : ""
}

function validateUsername(field) {
    if (field === "") return "Username hasn't inputted.\n"
    else if (field.length < 5)
        return "Username must have 5 or more symbols.\n"
    else if (/[^a-zA-Z0-9_-]/.test(field))
        return "Username require one symbol of each set a-z, A-Z and 0-9 - and _.\n"
    return ""
}

function validatePassword(field) {
    if (field === "") return "Password hasn't inputted.\n"
    else if (field.length < 6)
        return "Password must have 6 or more symbols.\n"
    else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) || !/[0-9]/.test(field))
        return "Password require one symbol of each set a-z, A-Z and 0-9.\n"
    return ""
}

function validateAge(field) {
    if (field === "" || isNaN(field)) return "Age hasn't inputted.\n"
    else if (field < 18 || field > 110)
        return "Age must be between 18 and 110.\n "
    return ""
}

function validateEmail(field) {
    if (field === "") return "E-Mail hasn't inputted.\n"
    else if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0))
        ||
        /[^a-zA-Z0-9.@_-]/.test(field))
        return "Incorrect E-mail format.\n"
    return ""
}