//Slug automático
document.getElementById("title_course").addEventListener('keyup', slugChange);

function slugChange(){
    title = document.getElementById("title_course").value;
    document.getElementById("slug_course").value = slug(title);
}

function slug (str) {

    let $slug = '';
    let trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');

    return $slug.toLowerCase();
}

//CKEDITOR
ClassicEditor
.create( document.querySelector( '#description_course' ), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
    }
} )
.catch( error => {
    console.log( error );
} );

//Cambiar imagen
document.getElementById("image_curso").addEventListener('change', cambiarImagen);

function cambiarImagen(event){
    let file = event.target.files[0];

    let reader = new FileReader();
    reader.onload = (event) => {
        document.getElementById("picture").setAttribute('src', event.target.result); 
    };

    reader.readAsDataURL(file);
}