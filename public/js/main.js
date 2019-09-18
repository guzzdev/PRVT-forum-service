document.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) {
        //13 = enter
        event.preventDefault();
        ShowRules();
    }
});

function ShowRules() {
    $('#rules-section').toggle();
    $('#main-section').toggle(500);
}

function showChoose(){
    $('#choose-section').toggle()
    $('#rules-section').toggle(250);
}

function showSignin(){
    $('#sign-in-section').toggle()
    $('#choose-section').toggle(300);
}

function showSignup(){
    $('#sign-up-section').toggle();
    $('#choose-section').toggle(300)
}

