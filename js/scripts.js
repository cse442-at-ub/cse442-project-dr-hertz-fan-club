// Empty JS for your own code to be here
function logout(t) {
    alert("Are you sure?");
}

function double_check(t) {
    var result = confirm(t);
    if (result === true) {
    }
}

const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')
})