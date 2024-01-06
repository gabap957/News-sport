$(document).ready(()=> {
    // You should update active tab with JS
    $('.tabs > a.tab').on('click', (event) => {
         $(event.target).parent('.tabs').find('> a.tab.active').removeClass('active');
         $(event.target).addClass('active');
         // Improving UX with smoothing scrolling
         if(!$(event.target.hash).length) return;
         $('body').stop().animate({
             scrollTop: $(event.target.hash).offset().top - $('#tabs').outerHeight()
         }, 300, 'swing');
    });
})
function showTab(tabId) {
    // Hide all tabs
    const tabs = document.querySelectorAll('.tab-pane.fade');
    tabs.forEach((tab) => {
        tab.classList.remove('show', 'active');
    })
    // Show the selected tab
    $(`#${tabId.id}`).addClass('show active');
  }
function slide(){
    const slide = document.querySelectorAll('.slick-slide');
    const preview = document.querySelectorAll('ul.slick-dots li button');
    console.log(slide, preview);
}

function translateXElement(x) {
    if(x<0){
        x=x-110;
    $('.tabs').css({
        "transform": "translateX("+ x +"px)",
        "justify-content": "none",
    });
}
else if(x==0){
     $('.tabs').css({
        "transform": "translateX("+ x +"px)",
        "justify-content": "none",
    });
}
}

