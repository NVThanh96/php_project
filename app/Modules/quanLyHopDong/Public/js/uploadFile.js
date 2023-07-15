const dt = new DataTransfer();
//cái ni dùng để lưu dữ liệu vào db nè trung

$("#attachment").on('change', function(e){
    for(var i = 0; i < this.files.length; i++){
        let fileBloc = $('<span/>', {class: 'file-block'}),
            fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
        fileBloc.append('<span class="file-delete"><span>+</span></span>')
            .append(fileName);
        $("#filesList > #files-names").append(fileBloc);
    };

    for (let file of this.files) {
        dt.items.add(file);
    }

    this.files = dt.files;
    // EventListener pour le bouton de suppression créé
    $('span.file-delete').click(function(){
        let name = $(this).next('span.name').text();
        // Supprimer l'affichage du nom de fichier
        $(this).parent().remove();
        for(let i = 0; i < dt.items.length; i++){
            // Correspondance du fichier et du nom
            if(name === dt.items[i].getAsFile().name){
                // Suppression du fichier dans l'objet DataTransfer
                dt.items.remove(i);
                continue;
            }
        }

        $('#attachment').prop('files', dt.files);
    });
});

