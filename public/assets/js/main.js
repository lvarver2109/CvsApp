const elements = document.querySelectorAll('btn-delete');
const formDelete = document.getElementById('form-delete');

elements.forEach(el => el.addEventListener('click', event => {
    if(confirm('Seguro que quieres borrar el alumno: ' + event.target.dataset.nombre + '?')) {
        formDelete.action = event.target.dataset.href;
        formDelete.submit();
    }
}));