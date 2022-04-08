let namePatern = /^[a-zA-Z ]{2,}$/
let phonePatern = /^[0-9()+-]+$/
let emailPatern = /[@]/
let nameError = document.querySelector("#error1")
let phoneError = document.querySelector("#error2")
let emailError = document.querySelector("#error3")
let input1 = document.querySelector("#name")
let input2 = document.querySelector("#phone")
let input3 = document.querySelector("#email")
let form = document.querySelector("form")
form.addEventListener("submit",(e) => {
    let erreur = false
    if(namePatern.test(form.name.value)){
        input1.classList.remove("is-invalid")
        nameError.innerHTML = ""
    }
    else{
        input1.classList.add("is-invalid")
        nameError.innerHTML = "The username should contain only numbers and letters, and must be at least 2 characters"
        erreur = true
    }
    if(phonePatern.test(form.phone.value)){
        input2.classList.remove("is-invalid")
        phoneError.innerHTML = ""
    }
    else{
        input2.classList.add("is-invalid")
        phoneError.innerHTML = "The phone is invalid."
        erreur = true
    }
    if(emailPatern.test(form.email.value)){
        input3.classList.remove("is-invalid")
        emailError.innerHTML = ""
    }
    else{
        input3.classList.add("is-invalid")
        emailError.innerHTML = "The email is invalid."
        erreur = true
    }
    if(erreur)
        e.preventDefault()
})