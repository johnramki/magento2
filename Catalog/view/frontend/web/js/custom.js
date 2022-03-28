// require([
//     "jquery"
// ], function($){
//         if (! $( ".category-image" ).length ) {
//             $('.readmore').hide();
//         }else{
//             alert($('.category-description p').height());
//             var maxLength = 200;
//             var myStr = $('.category-description p').text();
//             if($.trim(myStr).length > maxLength){
//                 var newStr = myStr.substring(0, maxLength);
//                 var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
//                 $('.category-description p').empty().html(newStr+'...');
//                 $('.readmore').show();
//             }
//         }
//         $(".readmore").click(function(){
//             $('.category-description p').text(myStr);
//             $(this).remove();
//         }); 
//     }
// )

require([
    "jquery"
], function($){
    $(".category-description [data-content-type='text']").addClass("hideContent");
    
        if ($(".category-description p").height() > 43) {
            $('.readmore').show();
        } else {
            $('.readmore').hide();
        }

        if (! $( ".category-image" ).length ) {
            $('.readmore').hide();
            $(".category-description [data-content-type='text']").removeClass("hideContent");
        }
        $(".readmore").click(function(){
            $(".category-description [data-content-type='text']").removeClass("hideContent").addClass("showContent");
            $(this).remove();
        }); 
    }
)