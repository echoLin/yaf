function search(){
       $('#info').css('display', 'none');
       var name = $('#name').val();
       var num = $('#num').val();
       if(name == null || name == ''){
            $('#alertName').css('display', '');
            return;
       }
       if(num == null || num == ''){
            $('#alertNum').css('display', '');
            return;
       }
       $('#alertName').css('display', 'none');
       $('#alertNum').css('display', 'none');
       $('#alert').css('display', 'none');

       $.get(
          '/index/index/linkin/xmuId/' + name + '/password/' + num,
          {},
          function(data){
            var data = jQuery.parseJSON(data);
              if(data.errno == 0){
                alert(data.errmsg);
              }else{
                $('#alertError').css('display', '');
              }
          }
        );
    }