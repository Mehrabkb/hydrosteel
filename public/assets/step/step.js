$(function(){
    $('.step-btn-delete').click(function(){
        let that = $(this);
        Swal.fire({
            icon: "error",
            title: "آیا مایل به حذف این مورد هستید؟",
            showCancelButton: true,
            confirmButtonColor: "red",
            cancelButtonText : 'انصراف',
            confirmButtonText: "بله"
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                let step_id = that.attr('data-id');
                let url = that.attr('data-url');
                $.ajax({
                    method : 'POST',
                    url : url,
                    data : {
                        'step_id' : step_id
                    },
                    success : function(result){
                        if(result){
                            location.reload();
                        }else{
                            Swal.fire({
                                icon : "error",
                                title : "مشکلی در حذف مورد رخ داد",
                                confirmButtonText : 'ادامه'
                            });
                        }
                    }
                })
            }
        });
    })
    $(document).on('click' , '.step-btn-edit' , function(){
        let that = $(this);
        let step_id = that.attr('data-id');
        let url = that.attr('data-url');
        $.ajax({
            method : 'POST',
            url : url,
            data : {
                'step_id' : step_id
            },
            success : function(result){
                let editForm = $('.edit-step-form-container form');
                editForm.find('input[name="step-id"]').val(result.step_id);
                editForm.find('input[name="step-name"]').val(result.step_name);
                editForm.find('input[name="step-number"]').val(result.step_number);
            }
        })
    })
})
