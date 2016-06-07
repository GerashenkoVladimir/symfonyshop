
function handleChangeQuantity() {
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
}


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

function handleRemoveFromBasketAction() {
    $('.removeFromBasket').bind('click', function (event) {
        var target = $(event.target);
        runSimpleAjax($.routes.removeFromBasketURL,{
            //basket ID!!!
            productId: target.data('productid'),
            _token: target.data('token')
        }, function (response) {

            removeProductHtml(response);
            calculateOrderCost();
        })
    });
}

function calculateOrderCost() {
    var summaryPriceBlocks = $('.summaryPrice');
    var summ = 0;
    if (summaryPriceBlocks.length) {
        for (var i = 0; i < summaryPriceBlocks.length; i++) {
            if (!isNaN(summaryPriceBlocks.eq(i).text())) {
                summ += +summaryPriceBlocks.eq(i).text();
            }
        }
    }
    $('#orderCost').text(summ);

}

function handleChangeQuantityBasket() {
    $('input[type="number"]').bind('input', function (event) {
        var input = $(event.target);
        var productQuantity = input.val();
        var productPrice = $('#productPrice_'+ input.data('productid')).text();
        
        if (numIsValid(productQuantity && !isNaN(productPrice))) {
            var saveQButton = $('#saveQuantity_' + input.data('productid'));
            alert(input.data('saved-quantity') !== productQuantity);
            if (input.data('saved-quantity') != productQuantity) {
                saveQButton.removeClass('disabled');
            } else {
                saveQButton.addClass('disabled');
            }
            $('#summaryPrice_' + input.data('productid')).text(productQuantity * productPrice);
            calculateOrderCost();

        }
    });
}



function numIsValid(num) {
    if (isNaN(num) || num < 1 || num > 100) {
        return false
    } else
        return true;
}
