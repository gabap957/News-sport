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
$(document).on("click", '.owl-next', function () {
    $('.tabs').css({
        "transform": "translateX(-250px)",
        "justify-content": "none",
    });
})
$(document).on("click", '.owl-prev', function () {
    $('.tabs').css({
        "transform": "translateX(0px)",
        "justify-content": "none", 
    });
})

