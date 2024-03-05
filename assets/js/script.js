
// Add functionality to each button
document.getElementById("form-login-admin-button").addEventListener("click", () => {
    setLoginButtonDisplayState("form-login-admin")
})

document.getElementById("form-login-siswa-button").addEventListener("click", () => {
    setLoginButtonDisplayState("form-login-siswa")
})

document.getElementById("form-login-guru-button").addEventListener("click", () => {
    setLoginButtonDisplayState("form-login-guru")
})

// function to reset all style to display none
resetLoginButtonState = () => {
    document.getElementById("form-login-admin").style.display = "none";
    document.getElementById("form-login-siswa").style.display = "none";
    document.getElementById("form-login-guru").style.display = "none";
}

// function to add style display to block again
setLoginButtonDisplayState = (id) => {
    resetLoginButtonState();
    document.getElementById(id).style.display = "block";
}

// initializer
resetLoginButtonState();