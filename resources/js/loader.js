window.addEventListener('load', () => {
    const loader = document.querySelector(".loader");
    loader.classList.add('loader-hidden');
    loader.addEventListener("transitionend", () => {
        document.body.removeChild("loader");
    });
})

$(document).ready(function() {
    $('[name="id_agency"]').change(function(){
        $('#radio1').prop('checked',false);
        $('#radio2').prop('checked',true);
        $('[name="id_agency"]').prop('required',true);
        $('[name="name"]').prop('required',false);
    });
    $('[name="name"]').keyup(function(){
        $('#radio1').prop('checked',true);
        $('#radio2').prop('checked',false);
        $('[name="id_agency"]').prop('required',false);
        $('[name="name"]').prop('required',true);
    });

    $(".form-search").on("submit", (e) => {
        var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
        $(".submit-form").html(spinner);
        $('.submit-form').removeClass('btn-success').addClass('btn-secondary');
    })
});

