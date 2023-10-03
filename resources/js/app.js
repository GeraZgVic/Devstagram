// Quitar alertas
const alerta = document.querySelector('#mensaje');
if(alerta) {
    setTimeout(function() {
        alerta.style.display = 'none';
    }, 5000);
} 

// Importar Dropzone
import Dropzone from "dropzone";

// Por default Dropzone va a buscar un elemento que tenga la clase de dropzone, pero queremos darle
// el comportamiento y decirle a que endpoint y a que ruta queremos enviar las peticiones (imagenes)
Dropzone.autoDiscover = false;

const refImagen = document.querySelector('[name="imagen"]');
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,


    init: function () {
        if(refImagen.value.trim()) {
            const imagenPublicada = {}
            imagenPublicada.size = 1234;
            imagenPublicada.name = refImagen.value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

// dropzone.on('sending', function (file, xhr, formData){
//     console.log(formData)
// });
dropzone.on('success', function (file, response){
    refImagen.value = response.imagen;
});

// dropzone.on('error', function (file, message){
//     console.log(message)
// });

dropzone.on('removedfile', function (){
    refImagen.value = '';
});


