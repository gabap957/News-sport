$(document).on('keyup','#search_input',function (e){
    let searchText = $(this).val();
    console.log(searchText);
    if (searchText != " "){
        $.ajax({
            url:"{{route('search')}}",
            method:"get",
            data:{
                name : searchText
            },

        //     success:function (response) {
        //         let result = response.map(value =>{
        //             return ' <a href="/product/'+value.id+'" class="list-group-item list-group-item-action border-1 "><img style="width: 10%;"">'
        //         })
        //         $("#show-list").html("result");
        // },
    })

}else {
    $("#show-list").html("");
}
});
