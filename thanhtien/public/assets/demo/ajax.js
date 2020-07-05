   $(document).ready(function(){
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // //edit user login
    //  $('.edit').click(function(){
    //     let id= $(this).data('id');
    //     alert(id);
    //     //edit 
    //     $.ajax({
    //         url:"edit/" + id, 
    //         dataType: 'json',
    //         type: 'get',
    //         success:function($result){
    //             console.log($result);
    //         }
    //     });
    // });
     /* When click edit user */
     $('body').on('click', '#edit-user', function () {
         //lay id cua edit-user
         $('.errors').hide();
        let user_id = $(this).data('id');
        //alert(user_id);
        //di toi route ajax-curd, ham edit, lay du lieu
        $.get('ajax-crud/' + user_id +'/edit', function (data) {
           $('#userCrudModal').html("Edit User hihi");
           // $('#btn-save').val("edit-user");
            $('#ajax-crud-modal').modal('show');
            //$('#user_id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
        })
        //update user
     $('body').on('click', '.update', function () {
        // var user_id = $(this).data('id');
        
        let ten =$('#name').val();
        let email=$('#email').val();
        //alert(user_id);
        //alert(email);
        $.ajax({
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            url: "ajax-crud"+'/'+user_id,
           data:{
               name:ten,
               email:email
           },
           type:'put',
           datatype:'json',
            success:function($result){
                console.log($result);
                if($result.error=='true'){
                    $('.error').show();
                    $('.error').html($result.message.name[0]);
                }else{
                    toastr.success($result.success, 'Success', {timeOut: 5000});
                    $('#ajax-crud-modal').modal('hide');
                    location.reload();
                }
            },
        });

     });
     });
     
     //delete user login
     $('body').on('click', '#delete-user', function () {
        var user_id = $(this).data("id");
        
        //alert(user_id);
        if(confirm("Are You sure want to delete haha !")){
            $.ajax({
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            type: "DELETE",
            url: "ajax-crud"+'/'+user_id,
            success: function (data) {
              $("#user_id_" + user_id).remove();
            //    if($(this).parent().parent().remove())
            //    {
            //        console.log('oke');
            //    }else{
            //        console.log('fails');
            //    }
              
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        }else{
            console.log('ban chon no');
        }
       
    }); 
 
    
});