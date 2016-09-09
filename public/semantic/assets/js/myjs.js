    $(document)
      .ready(function() {
        
        // fix menu when passed
        $('.masthead')
          .visibility({
            once: false,
            onBottomPassed: function() {
              $('.fixed.menu').transition('fade in');
            },
            onBottomPassedReverse: function() {
              $('.fixed.menu').transition('fade out');
            }
          })
        ;

// create sidebar and attach to menu open
  $('.ui.sidebar')
          .sidebar('attach events', '.toc.item')
        ;

      })
    ;
$('.wodry').wodry({
    animation: 'rotateAll',
    delay: 5000
});
//---------------------------------------scroll hide download-----------------------
$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 900) {
    $('.dnl').fadeIn();
  } else {
    $('.dnl').fadeOut();
  }
});
//dropdown
$('.ui.dropdown').dropdown();
  
$(document).ready(function(){
    // All your normal JS code goes in here
    $(".rating").rating();
});
//animation

$('.flip')
.transition({
    animation:'horizontal flip',
    duration:1000,
    interval:500,   
});
$('.flip')
.transition('horizontal flip','.1s');
//card
$('.small.circular.image').dimmer({
  on: 'hover'
});
$('.special.cards .image').dimmer({
  on: 'hover'
});



//local location

/*(var location=[
{
    title:'Philippines',
    description:'Its more fun here'
},
{
    title:'USA',
    description:'Equal Black and White'
},
{
    title:'Mongolia',
    description:'Yeyyyyy'
},
{
    title:'Japan',
    description:'Konnichiwa'
},
{
    title:'China',
    description:'Ni hao ma'
},
{
    title:'Korea',
    description:'Anneyong Haseyo'
},
];
$('.ui.search.location').search({
source:location,
searchFields:['title','description'],
searchFullText:false
});
*/
//overlay
$(document)
    .ready(function() {

      // fix main menu to page on passing
      $('.main.menu').visibility({
        type: 'fixed'
      });
      $('.overlay').visibility({
        type: 'fixed',
        offset: 80
      });

      // lazy load images
      $('.image').visibility({
        type: 'image',
        transition: 'vertical flip in',
        duration: 500
      });

      // show dropdown on hover
      $('.main.menu  .ui.dropdown').dropdown({
        on: 'hover'
      });
    })
  ;