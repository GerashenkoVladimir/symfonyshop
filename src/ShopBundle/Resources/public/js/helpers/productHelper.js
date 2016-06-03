/*function handleAjaxAction(buttonSelector, successAction, data) {
    var buttons = $(buttonSelector);
    buttons.bind("click", function (event) {
        var button;
        if (!(event.target instanceof HTMLButtonElement)) {
            button = $(event.target).parent();
        } else {
            button = event.target;
        }
        var dataObject = {
            productId: $(button).data("productid"),
            url: $(button).data("url"),
            token: $(button).data("token")
        };
        if (data instanceof Object) {
            for (var d in data) {
                dataObject[d] = data[d];
            }
        }
        $.ajax({
            method: "POST",
            url: url,
            cache: false,
            data: dataObject,
            success: successAction
        });
    })

}*/





function runSimpleAjax(url, dataObject, successAction) {
    $.ajax({
        method: "POST",
        url: url,
        cache: false,
        data: dataObject,
        success: successAction
    });
}