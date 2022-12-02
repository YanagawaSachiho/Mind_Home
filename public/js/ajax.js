$( function (){
  console.log('click');
  var mark=$('.mark-toggle');
  var ggi=$('551');
  var markId;
  
  

     
    mark.on('click',function(){
       let $this=$(this);
      //  viewからdata-postidを取得して変数に格納
       markId=$this.data('postid');
       console.log(markId);
       
       

       $.ajax({
             headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                url:'/ajaxmark',
                type:'POST',
                data:{
                   'post_id':markId
                },
       })

      //  成功した時の処理・失敗’’
       .done(function(data){
        // bookmarkされてない＝true
        if(data['record']==true){
          $this.css('color','red')
          console.log(data['record']);
        }else{
          $this.css('color','black')
          console.log(data['record']);
          
        }
       })
       .fail(function(data){
          console.log('エラー');
       });
    return false;
 
    });

});
