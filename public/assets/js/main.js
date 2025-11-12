const deleteModal = document.getElementById('deleteModal');
const elements = document.querySelectorAll('btn-delete');
const formDelete = document.getElementById('form-delete');
const spanModalCvsNombre = document.getElementById('modal-cvs-nombre');

elements.forEach(el => el.addEventListener('click', event => {
    if(confirm('Seguro que quieres borrar el alumno: ' + event.target.dataset.nombre + '?')) {
        formDelete.action = event.target.dataset.href;
        formDelete.submit();
    }
}));

deleteModal.addEventListener('show.bs.modal', event => {
    formDelete.action = event.relatedTarget.dataset.href;
    spanModalCvsNombre.textContent = event.relatedTarget.dataset.nombre;
});