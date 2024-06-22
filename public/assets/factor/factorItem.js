$(function(){
    $('.exp-date').persianDatepicker({
        initialValue: false,
        format : 'YYYY/M/D',
        autoClose: true
    });
    $('.product-date').persianDatepicker({
        initialValue: false,
        format : 'YYYY/M/D',
        autoClose: true
    });
    $(document).on('click' , '.btn-edit-factor-item' , function(){
        let that = $(this);
        let factor_item_id = that.attr('data-id');
        let url = that.attr('data-url');
        let parent = that.closest('.items-continer');
        let step = parent.find('select').val();
        let date = parent.find('input.product-date').val();
        let description = parent.find('textarea.product-description').val();
        $.ajax({
            method : "POST",
            url : url,
            data : {
                "factor_item_id" : factor_item_id,
                "step_id" : step,
                "date" : date,
                "description" : description
            },
            success : function(result){
                if(result){
                    console.log(result);
                    alertify.success('با موفقیت ویرایش شد');
                }else{
                    alertify.error('خطایی رخ داده است');
                }
            }
        })

    })
    $('.btn-delete-factor-item').click(function(){
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
                let factor_item_id = that.attr('data-id');
                let url = that.attr('data-url');
                $.ajax({
                    method : 'POST',
                    url : url,
                    data : {
                        'factor_item_id' : factor_item_id
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
})
