$(document).ready(function(){
//    nav-li hover e
/*    var num;
    $('.nav-main>li[id]').hover(function(){
       //图标向上旋转
       
        $(this).children('span').removeClass().addClass('hover-up');
        //下拉框出现
        var Obj = $(this).attr('id');
        num = Obj.substring(3, Obj.length);
        $('#box-'+num).slideDown(300);        
    },function(){
        //图标向下旋转
        $(this).children('span').removeClass().addClass('hover-down');
        //下拉框消失
        $('#box-'+num).hide();
    });
*/


$('.nav-main').children('li').click(function(){
      box = $(this).children('div');
      if(box.css('display')=='none'){
          var div = $(this).children('div').first();
          $(this).children('span').removeClass('hover-down').addClass('hover-up');
          div.slideDown(300);
          $(this).siblings().children('div').hide();
          $(this).siblings().children('span').removeClass('hover-up').addClass('hover-down');
     
      }else{
        box.hide();
        $(this).children('span').removeClass('hover-up').addClass('hover-down');
      }
      
})

/*$('.innbox').click(function(e){
  e.stopPropagation();  
})*/

});
