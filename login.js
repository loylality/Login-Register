const container = document.querySelector('.containr');
const loginLink = document.querySelector('.signInLink');
const registerLink = document.querySelector('.signUpLink');

registerLink.addEventListener('click', (e) => {
    e.preventDefault();
    container.classList.add('active'); // Show register form
});

loginLink.addEventListener('click', (e) => {
    e.preventDefault();
    container.classList.remove('active'); // Show login form
});
