$('#removeProductModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var productId = button.data('productid');
    var modal = $(this);
    $("#modalName", modal).html($("#name_"+productId).html());
    $("#modalPrice", modal).html($("#price_"+productId).html());
    $("#modalProducer", modal).html($("#producer_"+productId).html());
    $("#submitDelete").attr("data-productid", productId);
    console.log($("#submitDelete").attr("data-productid"));
});

$(function () {
    var buttons = $("#submitDelete");
    buttons.bind("click", function (event) {
        var button;
        if (!(event.target instanceof HTMLButtonElement)) {
            button = $(event.target).parent();
        } else {
            button = event.target;
        }

        var productId = $(button).data("productid");
        var url = $(button).data("url");
        var _token = $(button).data("token");
        $.ajax({
            method: "POST",
            url: url,
            cache: false,
            data: { productId: productId, _token: _token },
            success: function (isDeleted) {
                if (!!isDeleted) {
                    $("#product_"+productId).detach();
                }
            }
        });
    })

});

