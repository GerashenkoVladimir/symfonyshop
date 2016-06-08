/**
 * Handle changing of quantity on "products" page
 * @return void
 */
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
        var target = validateClickedButton(event.target);

        var productQuantity = $("input[type]",target.parent()).val();
        if (numIsValid(productQuantity)) {
            runSimpleAjax($.routes.addToBasketURL,{
                    productId: target.data("productid"),
                    _token: target.data("token"),
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
        
        if (numIsValid(productQuantity ) && !isNaN(productPrice)) {
            var saveQButton = $('#saveQuantity_' + input.data('productid'));
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

/**
 * Changed quantity saving on shopping basket page
 * @return void
 */
function handleChangedQuantitySavingAction() {
    $(".saveQuantity").bind("click", function (event) {
        var savingButton = validateClickedButton(event.target);
        var productId = savingButton.data('productid');
        if (!savingButton.hasClass('disabled')) {
            var productQuantity = $("#productQuantity_" + productId).val();
            if (numIsValid(productQuantity)) {
                runSimpleAjax($.routes.saveQuantityURL,{
                    productId: savingButton.data("productid"),
                    _token: savingButton.data("token"),
                    productQuantity: productQuantity
                },function (isSaved) {
                    if (isSaved) {
                        savingButton.addClass("disabled");
                        $("#productQuantity_" + productId).data('saved-quantity', productQuantity);

                    }
                });
            }
        }
    });
}
/**
 * Prepare modal window of order submission
 * @return void
 */
function handlePrepareOrderAction() {
    $('#prepareOrder').bind('click', function (event) {
        var button = $(event.target);
        runSimpleAjax($.routes.submitOrderURL,{
            token: button.data('token')
        }, function (html) {
            if (html) {
                $("#submitOrderModalBody").html(html);
            }
        });
    });
}

/**
 * Save order
 * @return void
 */
function handleSaveOrderAction() {
    $("#saveOrder").bind("click", function (event) {
        var button = $(event.target);
        runSimpleAjax($.routes.submitOrderURL, {
            token: button.data('data'),
            isClicked: 'saveOrder'
        });
    });
}

/**
 * Check and return clicked button wrapped in jQuery object
 * @param target
 * @returns {*}
 */

function validateClickedButton(target) {
    var button;
    if (!(target instanceof HTMLButtonElement)) {
        button = $(target).parent();
    } else {
        button = $(target);
    }
    return button;
}


function numIsValid(num) {
    if (isNaN(num) || num < 1 || num > 100) {
        return false
    } else
        return true;
}
