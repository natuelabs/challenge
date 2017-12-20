var Catalog = (function(){
    
    var aProduct = [],
        aSpecification = [];

    function init(){
        getProducts(null);
        getSpecifications();
        bindBtFilter();
    }

    function getProducts(IDs=null){
        $.ajax({
            url: "http://local.natuelabschallenge:8383/api/product",
            type: "GET",
            dataType: "json",
            data: IDs,
            success: function (data){
                aProduct = [];
                data.forEach(function(item){                            
                    aProduct[item.id] = {
                        id: item.id,
                        name: item.name,
                        price: item.price,
                        specifications: getSpecificationsID(item.specifications)
                    };
                });
                
                addProducts();
            },
            error: function (xhr, ajaxOptions, thrownError){
                //console.log(xhr.status);
                //console.log(thrownError);
            }
        });
    }

    function getSpecificationsID(specifications){
        var arr = [];
        specifications.forEach(function(item){
            arr.push(item.id_specification);
        });
        return arr;
    }

    function getSpecifications(){
        $.ajax({
            url: "http://local.natuelabschallenge:8383/api/specification",
            type: "GET",
            dataType: "json",
            async: false,
            success: function (data){
                data.forEach(function(item){
                    aSpecification[item.id] = {
                        id: item.id,
                        description: item.description
                    };
                });
                addSpecification();
            },
            error: function (xhr, ajaxOptions, thrownError){
                //console.log(xhr.status);
                //console.log(thrownError);
            }
        });
    }

    function addProducts(){
        $('#catalog-list').html('');
        aProduct.forEach(function(el){
            $('#catalog-list').append(listItem(el));
        });
    }

    function addSpecification(){
        aSpecification.forEach(function(el){
            $('#specification-list').append(specificationCheck(el));
        });
    }

    function listItem(el){

        var str  = "<div class='list-group-item'>";

            str += "<h4 class='list-group-item-heading'><strong>"+el.name+"</strong></h4>";
            
            str += "<p class='list-group-item-text pull-left'>";
                        var description = '';
                        el.specifications.forEach(function(id){
                            if(aSpecification[id] != undefined){
                                description = aSpecification[id].description;
                                str += "<span class='badge "+description+"'>"+description+"</span>";
                            }
                        });
            str += "</p>";

            str += "<span class='pull-right'><strong>R$ "+el.price+"</strong></span>";
            
            str += "</div>";

        return str;            
    }

    function specificationCheck(el){
        var str  = "<div class='specification-check'>";
            str += "<input class='form-control' type='checkbox' name='specifications[]' value='"+el.id+"'>";
            // str += el.description;
            str += "<span class='badge "+el.description+"'>"+el.description+"</span>";
            str += "</div>";

        return str;
    }

    function bindBtFilter(){
        $('input[type="submit"]').on('click', function(e){
            e.preventDefault();
            var checks = $('input[name="specifications[]"]').filter(':checked'),
                   IDs = filterSpecificationsIDs(checks);

            getProducts(IDs);
        });
    }

    function filterSpecificationsIDs(itens){
        var specs = '';
        if(itens.length > 0){
            for (var i = 0; i < itens.length; i++) {                
                specs += "specifications[]="+itens[i].value+"&";
            }
        }

        return specs;
    }

    return {
        init: init
    }
})();

$(function(){
    Catalog.init();
});

