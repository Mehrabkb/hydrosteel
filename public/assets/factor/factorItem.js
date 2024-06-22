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
    function printStepsOptions(){
        let output = ``;
        for(let i = 0 ; i < steps.length ; i++){
            output += `<option value=${steps[i].step_id}>${steps[i].step_name}</option>`
        }
        return output;
    }
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
    $(document).on('click' , '.btn-add-item' , function(){
        $('.items').append(`<div class="row items-continer p-5 border">
                        <div class="col-12">
                            <h3>
                                <span>آیتم محصول</span>
                                <button type="button" class="btn btn-danger btn-delete-item">حذف</button>
<button  type="button" class="btn btn-primary btn-add-single-product"  data-id="${factor_id}" data-url="${add_single_factor_item}">ثبت محصول</button>                            </h3>

                        </div>
                        <div class="col-12 col-md-4">
                            <label>نام محصول</label>
                            <input type="text" class="form-control" name="product-title" placeholder="نام محصول" autocomplete="off">
                        </div>
                        <div class="col-12 col-md-4">
                            <label>مرحله</label>
                            <select class="form-control" name="product-step-id">
                                ${printStepsOptions()}
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>تاریخ تقریبی تحویل</label>
                            <input type="text" class="form-control product-date" placeholder="تاریخ تقریبی محصول" name="product-date" autocomplete="off" ">
                        </div>
                        <div class="col-12 col-md-12 mt-3">
                            <label>توضیحات</label>
                            <textarea class="form-control" name="product-description" autocomplete="off"></textarea>
                        </div>
                    </div>`);
        $('.product-date').persianDatepicker({
            initialValue: false,
            format : 'YYYY/M/D',
            autoClose: true
        });
    })
    $(document).on('click' , '.btn-delete-item' , function(){
        let that = $(this);
        that.parent().parent().parent().remove();
    })
    $(document).on('click' , 'button.btn-add-single-product' , function(){
        let that = $(this);
        let parent = that.closest('.items-continer');
        let product_title = parent.find('input[name="product-title"]').val();
        let step_id = parent.find('select[name="product-step-id"]').val();
        let product_date = parent.find('input[name="product-date"]').val();
        let product_description = parent.find('textarea[name="product-description"]').val();
        let factor_id = that.attr('data-id');
        let url = that.attr('data-url');
        $.ajax({
            method : 'POST',
            url : url,
            data : {
                'factor_id' : factor_id,
                'step_id' : step_id,
                'product_title' : product_title,
                'product_date' : product_date,
                'product_description' : product_description
            },
            success : function(result){
                if(result){
                    alertify.success('با موفقیت اضافه شد');
                    location.reload();
                }else{
                    alertify.error('خطایی رخ داده است');
                }
            }
        })
    })
})
