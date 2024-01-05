
  function submit_reply(){
    var comment_replay = $('.comment_replay').val();
    el = document.createElement('li');
    el.className = "box_reply row";
    el.innerHTML =
          '<div class=\"avatar_comment col-md-1\">'+
            '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
          '</div>'+
          '<div class=\"result_comment col-md-11\">'+
          '<h4>Anonimous</h4>'+
          '<p>'+ comment_replay +'</p>'+
          '<div class=\"tools_comment\">'+
          '<a class=\"like\" href=\"#\">Like</a><span aria-hidden=\"true\"> · </span>'+
          '<i class=\"fa fa-thumbs-o-up\"></i> <span class=\"count\">0</span>'+
          '<span aria-hidden=\"true\"> · </span>'+
          '<a class=\"replay\" href=\"#\">Reply</a><span aria-hidden=\"true\"> · </span>'+
              '<span>1m</span>'+
          '</div>'+
          '<ul class="child_replay"></ul>'+
          '</div>';
      $current.closest('li').find('.child_replay').prepend(el);
      $('.comment_replay').val('');
      cancel_reply();
  }

  function cancel_reply(){
      $('.reply_comment').remove();
  }
