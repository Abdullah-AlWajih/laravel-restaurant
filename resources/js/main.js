


const categoriesDeleteLink = document.getElementsByClassName('delete-category');
for (let categoryDeleteLink of categoriesDeleteLink) {
    categoryDeleteLink.addEventListener('click', onClickDeleteCategory, false);
}
function onClickDeleteCategory(element) {
    element.preventDefault();
    Swal.fire({
        title: 'هل تريد تأكيد الحذف',
        icon: 'question',
        iconHtml: '؟',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا',
        showCancelButton: true,
        showCloseButton: true
    }).then((result) => {
        element.target.parentElement.submit();
        // if (result.isConfirmed) {
        //     window.location.href = link;
        //     // Swal.fire(
        //     //     'تم الحذف!',
        //     //     'تم الحذف بنجاح.',
        //     //     'نجاح'
        //     // )
        // }
    });
}


const exampleModal = document.querySelector('#exampleModal');
if(exampleModal){
    exampleModal.addEventListener('show.bs.modal', showModelEditCategory, false);
    function showModelEditCategory(event) {
        const recipient = JSON.parse(event.relatedTarget.getAttribute('data-bs-whatever'));
        exampleModal.querySelector('.modal-title').textContent += ' ' + recipient['name']
        exampleModal.querySelector('.modal-body #id').value = recipient['id']
        exampleModal.querySelector('.modal-body #category-name').value = recipient['name']
    }
}


const formFile = document.getElementById('formFile')
if(formFile){
    formFile.addEventListener('change', preview, true);
    function preview(event) {
        document.getElementById('frame').src = URL.createObjectURL(event.target.files[0]);
    }
}


const addMeal = document.getElementById('add-meal')
if (addMeal) {
    document.addEventListener('DOMContentLoaded', () => {
        const toast = new bootstrap.Toast(addMeal)
        toast.show()
    });
}



