$(document).ready(function() {

    let base = $('base').attr('href');

    $.ajax({
        type: "GET",
        url: `${base}tag/searchData`,
        success: function(response) {
            $('#search-tag').html(response);
            if (response == '<ul></ul>') {
                $('#search-tag').html(`
                <div class="flex">
                    <p>No momento não existe nenhuma categoria cadastrada</p>
                    <a href="tag/create" class="btn waves-effect">
                        <span class="far fa-plus-square"></span>
                        Cadastre uma nova
                    </a>
                </div>
                `);
            }
        }
    });

});