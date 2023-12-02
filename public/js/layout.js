$(document).on('click', '.btnedituser', function () {
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    $('#eid').val(obj['id']);
    $('#ename').val(obj['name']);
    $('#eemail').val(obj['email']);
    $("#modalupdate").modal('show');
});
$(document).on('click', '.editcategory', function () {
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    $('#eid').val(obj['id']);
    $('#ename').val(obj['name']);
    $('#eurl').val(obj['cate_url']);
    $("#eparent_id").val(obj['parent_id']);
    $("#modaleditCategory").modal('show');
});

$(document).on('click', '.editimage', function () {
    $("#modalupdate").modal('show');
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    var url = document.querySelectorAll('#image');
    var urlArray = Array.from(url);
    urlArray.forEach(function (div) {
        if (obj['id'] == div.name) {
            $('#efile-image').attr('src', div['src']);
            $('#eid').val(obj['id']);
        }
    });
});
$("select").on("focus", function(){
    this.size = 5;
});

$("select").on("change", function(){
    this.blur();
});

$("select").on("blur", function(){
    this.size = 1;
    this.blur();
});
