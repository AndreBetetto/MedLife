const currentUrl = "http://localhost:8000";
const password = document.getElementById('password');

if(password)
{
  const eye = document.getElementById('eye');
  const eyeConfirm = document.getElementById('eyeConfirm');
  const PasswordButton = document.getElementById('PasswordButton');
  const ConfirmPasswordButton = document.getElementById('ConfirmPasswordButton');
  const passwordConfirm = document.getElementById('password_confirmation');

  if(PasswordButton)
  {
    PasswordButton.addEventListener('click', () => {
      if(password.type === 'password') {
        password.type = 'text';
        eye.setAttribute('src', currentUrl+'/closedeye.svg');
      } 
      else
      {
        password.type = 'password';
        eye.setAttribute('src', currentUrl+'/eye.svg');
      }
    });
  }

  if(ConfirmPasswordButton)
  {
    ConfirmPasswordButton.addEventListener('click', () => {
      if(passwordConfirm.type === 'password') {
        passwordConfirm.type = 'text';
        eyeConfirm.setAttribute('src', currentUrl+'/closedeye.svg');
      } 
      else
      {
        passwordConfirm.type = 'password';
        eyeConfirm.setAttribute('src', currentUrl+'/eye.svg');
      }
    });
  }
}