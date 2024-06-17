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
    function printStepsOptions(){
        let output = ``;
        for(let i = 0 ; i < steps.length ; i++){
            output += `<option value=${steps[i].step_id}>${steps[i].step_name}</option>`
        }
        return output;
    }
    $(document).on('click' , '.btn-add-item' , function(){
        $('.items').append(`<div class="row items-continer p-5 border">
                        <div class="col-12">
                            <h3>
                                <span>آیتم محصول</span>
                                <button type="button" class="btn btn-danger btn-delete-item">حذف</button>
                            </h3>

                        </div>
                        <div class="col-12 col-md-4">
                            <label>نام محصول</label>
                            <input type="text" class="form-control" name="product-title[]" placeholder="نام محصول" autocomplete="off">
                        </div>
                        <div class="col-12 col-md-4">
                            <label>مرحله</label>
                            <select class="form-control" name="product-step-id[]">
                                ${printStepsOptions()}
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>تاریخ تقریبی تحویل</label>
                            <input type="text" class="form-control product-date" placeholder="تاریخ تقریبی محصول" name="product-date[]" autocomplete="off" ">
                        </div>
                        <div class="col-12 col-md-12 mt-3">
                            <label>توضیحات</label>
                            <textarea class="form-control" name="product-description[]" autocomplete="off"></textarea>
                        </div>
                    </div>`);
    })
    $(document).on('click' , '.btn-delete-item' , function(){
        let that = $(this);
        that.parent().parent().parent().remove();
    })
})
