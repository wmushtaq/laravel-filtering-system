var Filters = (function () {

    let params = new Array();
    let qry = '';

    return {
        init: function () {
            // On filter links click
            $('body').on('click', '.filter-link', function (e) {
                e.preventDefault();
                // Get filterbox
                var filterBox = $(this).closest('.filterBox');

                // Add/Remove selected class to current link
                $(this).toggleClass('selected');

                // Remove selected class from all other links in the filter
                $(filterBox).find('.selected').not(this).each(function () {
                    $(this).removeClass('selected');
                });

                // Execute filter(s) and sorting
                var order = $('#sorting').val();
                Filters.execute(order);
            });

            // On change sorting
            $('body').on('change', '#sorting', function (e) {
                var order = $(this).val();
                Filters.execute(order);
            });

        },
        execute: function (order) {
            Filters.buildQuery(order);
            Filters.reloadPage();
        },
        buildQuery: function (order) {
            Filters.buildQueryParameters();
            var sorting = order.split("_");
            sorting = 'sort_by=' + sorting[0] + '&sort_order=' + sorting[1];

            if (params.length > 0) {
                qry = '?' + params.join('&');
                qry += '&' + sorting;
            } else {
                qry += '?' + sorting;
            }
        },
        buildQueryParameters: function () {
            if ($('.filterBox .selected').length > 0) {
                $('.filterBox .selected').each(function () {
                    var filterName = $(this).closest('.filterBox').data('filter');
                    params.push(filterName + '=' + $(this).data('value'));
                });
            }
        },
        reloadPage: function () {
            document.location = '/' + qry;
        }
    }
})();

Filters.init();