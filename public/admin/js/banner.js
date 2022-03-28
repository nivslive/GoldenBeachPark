$(document).ready(function() {
    // Used events
    var drEvent = $('.dropify').dropify({
        messages: {
            'default': 'Arraste e solte um arquivo aqui ou clique',
            'replace': 'Arraste e solte ou clique para substituir',
            'remove': 'Remover',
            'error': 'Ooops, algo errado aconteceu.'
        }
    });
});