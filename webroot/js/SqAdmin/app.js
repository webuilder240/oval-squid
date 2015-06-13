var API_PREFIX = '/api/v1/';
var SERVER_PREFIX = "http://localhost:8765/upload_images/";
var $imgModal = $('#imageModal');
var $imgUploadModal = $('#imageUploadModal');

$(function () {

    $(document).on('click', '.sq-admin__edit_post__form__sub_area__image_insert__button--js', function () {
        event.preventDefault();
        $imgModal.modal();
        fetchImgLists();
    });

    $(document).on('click', '.sq-admin__edit_post__form__sub_area__image_upload__button--js', function () {
        event.preventDefault();
        $imgUploadModal.modal();
    });

    $(document).on('click', '.admin__edit_post__form__sub_area__imgs__area__img--js', function () {
        event.preventDefault();
        var imgURL = $(this).attr('src');
        addImgTag(imgURL);
        $imgModal.modal('hide');
    });

    //画像の追加処理
    $(document).on('click', '.sq-admin__edit_post__form__image__submit--js', function () {
        event.preventDefault();
        var $formElement = $('#UploadImgForm');
        var input_data = new FormData($formElement[0]);
        $.ajax({
            type: "POST",
            url: API_PREFIX + "imgs.json",
            data: input_data,
            contentType: false,
            processData: false
        }).done(function (data) {
            $imgUploadModal.modal('hide');
            addImgTag(data.message.url);
            //内容を空っぽにしたい
            $formElement[0] = '';
        });
    });
});


function fetchImgLists() {
    var $targetElement = $('.sq-admin__edit_post__form__sub_area__imgs__area');
    $targetElement.html('');
    $.ajax({
        type: "GET",
        url: API_PREFIX + "imgs.json"
    }).done(function (data) {
        var imgs = data.imgs;
        var img_length = imgs.length;
        var tmpArea = '';
        for (i = 0; i < img_length; i++) {
            tmpArea += genImgElement(imgs[i].name);
        }
        $targetElement.append(tmpArea);
    });
}

function genImgElement(imgName) {
    return '<img class="img-thumbnail admin__edit_post__form__sub_area__imgs__area__img--js" width="135" height="135" src="' + SERVER_PREFIX + imgName + '" alt="">';
}

function addImgTag(url) {
    var dom = '<a href="' + url + '"><img class="img-thumbnail" src="' + url + '" alt=""></a>';
    var target_val = $('.sq-admin__edit_post__form__main__content').val();
    $('.sq-admin__edit_post__form__main__content').val(target_val + dom);
}
