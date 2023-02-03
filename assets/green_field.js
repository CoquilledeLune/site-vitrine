const greenUser = document.getElementById('username');

if (greenUser != null)
    greenUser.addEventListener('keyup', function () {
        if (
            greenUser.value.length == 21
        )
        {
            greenUser.classList.add('green');
        }
        if (greenUser.value.length < 21) {
            greenUser.classList.remove('green');
        }
        if (greenUser.value.length > 21) {
            greenUser.classList.remove('green');
        }
    })
