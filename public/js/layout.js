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
    $("#modaledit").modal('show');
});
$(document).on('click', '.editimage', function () {
    $("#modalupdate").modal('show');
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    id = obj['id'];
  var url = document.querySelectorAll('#image');
  var urlArray = Array.from(url);
  urlArray.forEach(function(div) {
    if(id==div.name){
        $('#efile-image').attr('src',div['src'] );
    }
});
});
