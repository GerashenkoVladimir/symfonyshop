$('#removeProductModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var productId = button.data('productid');
    var modal = $(this);
    $("#modalName", modal).html($("#name_"+productId).html());
    $("#modalPrice", modal).html($("#price_"+productId).html());
    $("#modalProducer", modal).html($("#producer_"+productId).html());
    $("#submitDelete").attr("data-productid", productId);
});

$(handleRemoveProductAction);



function handleRemoveProductAction() {
    var button = $("#submitDelete");

    $(button).bind("click", function (event) {

        var target = event.target;

        runSimpleAjax($.routes.removeURL,{
            productId: $(target).data("productid"),
            _token: $(target).data("token")
        }, function (json) {
            if (json) {
                var obj = $.parseJSON(json);

                $("#product_"+obj.productId).detach();
            }
        });

    })
}
