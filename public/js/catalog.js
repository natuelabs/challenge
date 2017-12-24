var Catalog = (function(){
    
    var aProduct = [],
        aSpecification = [],
        aSpecificationFilter = [],
        sOrderBy = 'asc';

    function init(){
        getSpecificationsData(addSpecification);
        getProductsData(addProducts);
        
        bindCheckboxFilter();
        bindBtFilter();

        bindBtOrderBy();
    }

    function getSpecificationsData(callback){
        $.ajax({
            url: "http://127.0.0.1:8000/api/specification",
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
                
                if(callback){
                    callback();
                }
            },
            error: function (xhr, ajaxOptions, thrownError){
                console.error(xhr.status);
                console.error(thrownError);
            }
        });
    }

    function getProductsData(callback){
        sQueryString = getQueryString();

        $.ajax({
            url: "http://127.0.0.1:8000/api/product",
            type: "GET",
            dataType: "json",
            data: sQueryString,
            success: function (data){
                aProduct = [];
                data.forEach(function(item){                            
                    aProduct.push({
                        id: item.id,
                        name: item.name,
                        price: item.price,
                        specifications: getSpecificationsID(item.specifications)
                    });
                });

                if(callback){
                    callback();
                }
            },
            error: function (xhr, ajaxOptions, thrownError){
                console.error(xhr.status);
                console.error(thrownError);
            }
        });
    }

    function getQueryString(){
        var sQueryString = '';

        for (var i = 0; i < aSpecificationFilter.length; i++) {
            sQueryString += 'specifications[]='+aSpecificationFilter[i];
            
            if(i<aSpecificationFilter.length-1){
                sQueryString += '&';    
            }
        }
        
        sQueryString += '&sOrderBy='+sOrderBy;

        return sQueryString;
    }

    function getSpecificationsID(specifications){
        var arr = [];
        specifications.forEach(function(item){
            arr.push(item.id_specification);
        });
        return arr;
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
            str += "<input class='form-control' type='checkbox' name='specifications[]' value='"+el.id+"' id='"+el.description+"'>";
            str += "<span class='badge "+el.description+"'>"+el.description+"</span>";
            str += "</div>";

        return str;
    }

    function bindCheckboxFilter(){
        $('input[name="specifications[]"]').on('click', function(e){           

            if($(this).is(':checked') === true){                
                aSpecificationFilter.push(this.value);
            }
            else
            {
                index = aSpecificationFilter.indexOf(this.value);
                
                if (index > -1) {
                    aSpecificationFilter.splice(index, 1);
                }
            }
        });
    }

    function bindBtFilter(){
        $('input[type="submit"]').on('click', function(e){
            e.preventDefault();
            getProductsData(addProducts);
        });
    }

    function bindBtOrderBy(){
        $('#orderBy').on('click', function(e){
            e.preventDefault();

            if($(this).data('order') == 'asc'){
                $(this).data('order','desc');
            }
            else{
                $(this).data('order','asc');
            }

            sOrderBy = $(this).data('order');

            getProductsData(addProducts);
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

