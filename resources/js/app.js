import Dropzone from "dropzone";

Dropzone.autoDiscover= false;

const dropzone= new Dropzone('#dropzone',{
    dictDefaultMessage: "Sube aqui tus imagenes",
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function(){
        if(document.querySelector('[name="img"]').value.trim()){
            const imagenpublish={}
            imagenpublish.size=1234;
            imagenpublish.name=document.querySelector('[name="img"]').value;

            this.options.addedfile.call(this,imagenpublish);
            this.options.thumbnail.call(this, imagenpublish, `/uploads/${imagenpublish.name}`);
            imagenpublish.previewElement.classList.add('dz-success','dz-complete');
        }
    }
})
dropzone.on('success', (file, response)=>{
    document.querySelector('[name="img"]').value = response.img;
    
})
dropzone.on('removedfile', (file, response)=>{
    document.querySelector('[name="img"]').value = "";
    
})