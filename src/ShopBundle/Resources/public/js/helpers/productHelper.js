function runSimpleAjax(url, dataObject, successAction) {
    $.ajax({
        method: "POST",
        url: url,
        cache: false,
        data: dataObject,
        success: successAction
    });
}

function removeProductHtml(productId) {
    if (productId) {
        var obj = $.parseJSON(productId);
        return $("#product_"+obj.productId).remove();
    }

    return false;
    
}