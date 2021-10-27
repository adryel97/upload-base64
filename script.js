$( function() {
    $( ".sortable" ).sortable();
});

$(document).ready(function () {
    preview()
    uploadImg()
    cancelar()
});

function cancelar()
{
    $('.cancelar').click(function (e) { 
        e.preventDefault();
        $("#formularioFiles")[0].reset()

        var imagensPreview = $('#preview img');
        for (let i = 0; i < imagensPreview.length; i++) {
          var imgView = imagensPreview[i].closest('li').remove();
        }
    });
}

function preview() 
{
    $('#files').change(function (e) { 
        e.preventDefault();

        if(this.files) {
            var files = this.files.length;
            for (let i = 0; i < files; i++) {
                
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML(`<li><button class="remover">remover</button><img style="width: 100px; height: 100px; object-fit: cover;" src="${event.target.result}"></li>`)).appendTo('#preview');
                    removerImg()
                }
                
                reader.readAsDataURL(this.files[i]);
            }
        }
    });
}

function removerImg()
{
    $('.remover').click(function (e) { 
        e.preventDefault();
        $(this).closest('li').remove();
    });
}

function uploadImg()
{
    $('#submit').click(function (e) { 
        e.preventDefault();
        var imagens = $('#preview img');
        var data = []
        var extensao = ['png', 'jpg', 'jpeg']

        for (let i = 0; i < imagens.length; i++) {
            var img = imagens[i].src;
            var extension = img.split(';')[0].split('/')[1];
            data.push({
                "imagem": img,
                "extensao": extension
            })
        }
        
        for (let i = 0; i < data.length; i++) {
            var verificar = data[i].extensao;
            var response = false;
            if(extensao.includes(verificar))
            {
                response = true;
            } else {
                response = false;
            }
        }
        
        if (imagens.length > 0 && response == true) {                    
            $.ajax({
                type: "POST",
                url: "ajaxfile.php",
                data: {data},
                dataType: "json"
            });
        } else if(imagens.length <= 0){
            alert('Error: Ops nenhuma imagem foi selecionada');
        }
        else {
            alert('Error: Imagem não compatível');
        }
    });
}