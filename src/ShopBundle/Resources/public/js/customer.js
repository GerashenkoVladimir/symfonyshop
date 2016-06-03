$(function () {
    $("input[type='number']").bind("input", function (event) {
        var input = event.target;
        var message = $("#basketMessage_" + $(input).data("productid"));
        if (!numIsValid($(input).val())) {
            message.html("Введите число от 1 до 100!");
            message.fadeIn(1500);
        } else {
            message.fadeOut(1500);
            if (message.css("display") == "none") {
                message.html("");
            }
        }
    });

});

handleAddToBasketAction();

function handleAddToBasketAction() {
    $('.addToBasket').bind("click", function (event) {
        var target;
        if (!(event.target instanceof HTMLButtonElement)) {
            target = $(event.target).parent();
        } else {
            target = event.target;
        }
        var productQuantity = $("input[type]",$(target).parent()).val();
        if (numIsValid(productQuantity)) {
            runSimpleAjax($.routes.addToBasketURL,{
                productId: $(target).data("productid"),
                _token: $(target).data("token"),
                productQuantity: productQuantity
            }, function (json) {
                    if (json) {
                        var obj = $.parseJSON(json);
                        var message = $("#basketMessage_" + obj.productId);
                        message.html("Товар успешно добавлен в Вашу корзину.");
                        message.fadeIn(1500);
                        setInterval(function () {
                            message.fadeOut(1500, function () {
                                message.html("");

                            });
                        }, 3000)
                    }
                }
                
            );
        }
    });
}




function numIsValid(num) {
    if (isNaN(num) || num < 1 || num > 100) {
        return false
    } else
        return true;
}