    //エラーメッセージの表示
function showErrMsg(target) {
    target.fadeIn();
    setTimeout(function(){
    target.fadeOut();
    }, 3000);
}


//5文字以上でエラーを出す
$("#zipcode").on("change", function(){
    if($(this).val().length > 8){
    showErrMsg($(".error-zz"));
    }
});

//5文字以上でエラーを出す
$("#fillname").on("change", function(){
    if($(this).val().length <= 0){
    showErrMsg($(".error-dd"));
    }
});

//5文字以上でエラーを出す
$("#email").on("change", function(){
    if($(this).val().length <= 0){
    showErrMsg($(".error-dd"));
    }
});

//5文字以上でエラーを出す
$("#address").on("change", function(){
    if($(this).val().length <= 0){
    showErrMsg($(".error-dd"));
    }
});

//5文字以上でエラーを出す
$("#opinion").on("change", function(){
    if($(this).val().length <= 0){
    showErrMsg($(".error-dd"));
    }
});

$("#postcode").blur(function(){
    changeZen($(this));
});
changeZen = function(ele){
    var val = ele.val();
    var han = val.replace( /[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function(s){return String.fromCharCode(s.charCodeAt(0) - 65248)});
    $(ele).val(han);
}