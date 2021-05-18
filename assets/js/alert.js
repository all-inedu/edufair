const flashSuccess = $('.flash-data').data('success');
const flashError = $('.flash-data').data('error');
const flashWarning = $('.flash-data').data('warning');
const flashLogin = $('.flash-data').data('login');

if (flashSuccess) {
    Swal.fire(
        'Congratulations !',
        '' + flashSuccess,
        'success'
    )
} else if (flashError) {
    Swal.fire(
        'Error !',
        '' + flashError,
        'error'
    )
} else if (flashLogin) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'success',
        title: '' + flashLogin
    })
} else if (flashWarning) {
    Swal.fire(
        'Information !',
        '' + flashWarning,
        'info'
    )
}