const currentUrl = "http://localhost:8000";
const password = document.getElementById('password');

if(password)
{
  const eye = document.getElementById('eye');
  const PasswordButton = document.getElementById('PasswordButton');
  const ConfirmPasswordButton = document.getElementById('ConfirmPasswordButton');
  const passwordConfirm = document.getElementById('password_confirmation');

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

  if(ConfirmPasswordButton == true)
  {
    ConfirmPasswordButton.addEventListener('click', () => {
      if(passwordConfirm.type === 'password') {
        passwordConfirm.type = 'text';
      } 
      else
      {
        passwordConfirm.type = 'password'
      }
    });
  }
}