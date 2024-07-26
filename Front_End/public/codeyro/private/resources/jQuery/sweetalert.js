function SuccessMessage(message, type="0") {
    if(type === "0") {
        Swal.fire({
            title: 'Success!',
            text: message,
            icon: 'success',
            confirmButtonText: 'OKAY'
        });
    } else if(type === "1" || type.toLowerCase() === "reload") {
        Swal.fire({
            title: 'Success!',
            text: message,
            icon: 'success',
            confirmButtonText: 'OKAY'
        }).then(() => {
            window.location.reload();
        });
    } else {
        Swal.fire({
            title: 'Success!',
            text: message,
            icon: 'success',
            confirmButtonText: 'OKAY'
        }).then(() => {
            window.location.href = type;
        });
    }
}


function ErrorMessage(message, type="0") {
    if(type === "0") {
        Swal.fire({
            title: 'Error!',
            text: message,
            icon: 'error',
            confirmButtonText: 'OKAY'
        });
    } else if(type === "1" || type.toLowerCase() === "reload") {
        Swal.fire({
            title: 'Error!',
            text: message,
            icon: 'error',
            confirmButtonText: 'OKAY'
        }).then(() => {
            window.location.reload();
        });
    } else {
        Swal.fire({
            title: 'Error!',
            text: message,
            icon: 'error',
            confirmButtonText: 'OKAY'
        }).then(() => {
            window.location.href = type;
        });
    }
}



function ConfirmationMessage(message, action, icon="question") {//icons: question, warning, error, success
Swal.fire({
    title: 'CONFIRMATION MESSAGE',
    text: message,
    icon: icon,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'YES'
}).then((result) => {
    if (result.isConfirmed) {
        action();
    }
});
}


function ConfirmMessage(message, action, icon="question"){//icons: question, warning, error, success
Swal.fire({
    title: 'CONFIRMATION MESSAGE',
    text: message,
    icon: icon,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'YES'
}).then((result) => {
    if (result.isConfirmed) {
       action();
    }
})
}