var SmartMultiFiled = (function() {
    var rowcount, tableBody;

    rowcount = $("#autocomplete_table tbody tr").length + 1;
    tableBody = $("#autocomplete_table tbody");



    function getFieldNo(type) {
        var fieldNo;
        switch (type) {
            case 'sch_name':
                fieldNo = 0;
                break;
            case 'sch_code':
                fieldNo = 1;
                break;
            case 'cluster':
                fieldNo = 2;
                break;
            case 'region':
                fieldNo = 3;
                break;
            default:
                break;
        }
        return fieldNo;
    }

    function handleAutocomplete() {
        var type, fieldNo, currentEle;
        type = $(this).data('type');
        fieldNo = getFieldNo(type);
        currentEle = $(this);

        if (typeof fieldNo === 'undefined') {
            return false;
        }

        $(this).autocomplete({
            source: function(data, cb) {
                $.ajax({
                    url: 'ajax.php',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        name: data.term,
                        fieldNo: fieldNo
                    },
                    success: function(res) {
                        var result;
                        result = [{
                            label: 'There is matching record found for ' + data.term,
                            value: ''
                        }];

                        if (res.length) {
                            result = $.map(res, function(obj) {
                                var arr = obj.split("|");
                                return {
                                    label: arr[fieldNo],
                                    value: arr[fieldNo],
                                    data: obj
                                };
                            });
                        }
                        cb(result);
                    }
                });
            },
            autoFocus: true,
            minLength: 1,
            select: function(event, ui) {
                var resArr, rowNo;


                rowNo = getId(currentEle);
                resArr = ui.item.data.split("|");


                $('#countryname_' + rowNo).val(resArr[0]);
                $('#countryno_' + rowNo).val(resArr[1]);
                $('#phone_code_' + rowNo).val(resArr[2]);
                $('#country_code_' + rowNo).val(resArr[3]);
            }
        });
    }

    function getId(element) {
        var id, idArr;
        id = element.attr('id');
        idArr = id.split("_");
        return idArr[idArr.length - 1];
    }


    function registerEvents() {
        //register autocomplete events
        $(document).on('focus', '.autocomplete_txt', handleAutocomplete);
    }

    function init() {
        registerEvents();
    }

    return {
        init: init
    };
})();



$(document).ready(function() {
    SmartMultiFiled.init();
});