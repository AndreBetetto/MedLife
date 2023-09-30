const password = document.getElementById('password');

if(password)
{
  const PasswordButton = document.getElementById('PasswordButton');
  const ConfirmPasswordButton = document.getElementById('ConfirmPasswordButton');
  const passwordConfirm = document.getElementById('password_confirmation');

  PasswordButton.addEventListener('click', () => {
    if(password.type === 'password') {
      password.type = 'text';
    } 
    else
    {
      password.type = 'password'
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


