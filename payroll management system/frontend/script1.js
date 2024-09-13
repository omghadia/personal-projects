const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
console.log(passwordInput);

const signInButton = document.getElementById('signin-button');
signInButton.addEventListener('click', () => {
  if (!emailInput.value || !passwordInput.value) {
    alert('Please fill in both email and password fields.');
    return;
  }
  const emailPattern = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,})+$/;
  if (!emailPattern.test(emailInput.value)) {
    alert('Please enter a valid email address.');
    return;
  }
  const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
  if (!passwordPattern.test(passwordInput.value)) {
    alert('Please enter a password with at least 8 characters, including at least one uppercase letter, one lowercase letter, one number, and one special character.');
    return;
  }
  alert('Sign-in successful!');
});