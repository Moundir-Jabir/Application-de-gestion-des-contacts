let usernamePatern = /^[a-zA-Z ]{3,}$/
let usernameError = document.querySelector("#error1")
let passwordError = document.querySelector("#error2")
let password2Error = document.querySelector("#error3")
let input1 = document.querySelector("#username")
let input2 = document.querySelector("#password")
let input3 = document.querySelector("#password2")
let form = document.querySelector("form")
form.addEventListener("submit",(e) => {
    let erreur = false
    if(usernamePatern.test(form.username.value)){
        input1.classList.remove("is-invalid")
        usernameError.innerHTML = ""
    }
    else{
        input1.classList.add("is-invalid")
        usernameError.innerHTML = "The username should contain only numbers and letters, and must be at least 3 characters"
        erreur = true
    }
    if(form.password.value.length >= 6){
        input2.classList.remove("is-invalid")
        passwordError.innerHTML = ""
    }
    else{
        input2.classList.add("is-invalid")
        passwordError.innerHTML = "Password must be at least 6 characters"
        erreur = true
    }
    if(form.password.value === form.password2.value){
        input3.classList.remove("is-invalid")
        password2Error.innerHTML = ""
    }
    else{
        input3.classList.add("is-invalid")
        password2Error.innerHTML = "invalide confirmation"
        erreur = true
    }
    if(erreur)
        e.preventDefault()
})