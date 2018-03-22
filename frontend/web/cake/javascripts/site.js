$(document).ready(function () {
    new WOW().init();

    var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: baseUrl + '/rest-data/search-product'
    });

    $('#input_search_product').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'products',
        source: products
    });
});