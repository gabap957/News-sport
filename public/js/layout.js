$(document).on('click', '.btnedituser', function (){
    var array = $(this).attr('array');
    var obj = JSON.parse(array);    
    $('#eid').val(obj['id']);
    $('#ename').val(obj['name']);
    $('#eemail').val(obj['email']);
    $("#modalupdate").modal('show');
});
$(document).on('click', '.editcategory', function ()
{
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    $('#eid').val(obj['id']);
    $('#ename').val(obj['name']);
    $('#eurl').val(obj['cate_url']);
    $("#modaledit").modal('show');
});
$(document).on('click','.editimage',function(){
    $("#modalupdate").modal('show');
  })
ClassicEditor
.create( document.querySelector( '#editor' ) )
.catch( error => {

    console.error( error );
} );


