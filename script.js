const passwordForm = document.getElementById('password');

const revealDiv = document.getElementById('reveal-password');

revealDiv.addEventListener('click', function() {
    if (passwordForm.type === 'password') {
        passwordForm.type = 'text';
        revealDiv.innerHTML = 'Hide Password';
    } else {
        passwordForm.type = 'password';
        revealDiv.innerHTML = 'Show Password';
    }
});

