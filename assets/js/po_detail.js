$(document).ready(function () {
            $("#supplier").autocomplete({
                source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/users/supplier_names",
                    data:{term: request.term},
                    dataType: "json",
                    type: "POST",
                    dataFilter: function (data) { return data; },
                    success: function (data) {
                            response($.map(data, function (item) {
                            $("#addr").val(item.addr);
                            $("#ph").val(item.ph);
                            $("#email").val(item.email);
                            return {
                                       label: item.sname,
                                       value: item.sname,
                                       id: item.sid
                                    }
                                }))
                            },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    }
                    });
                    },
                    minLength: 2,
                    select: function (event , ui) {
                    var businessEntityId = ui.item.id;
                    $.ajax({
                        type: "POST",
                        data:{'id': businessEntityId},
                        dataType:"json",
                        url: "<?php echo base_url(); ?>index.php/users/supplier_detail",//here we are calling our user controller
                        success: function(data) //we're calling the response json array 'data'
                        {
                            $("#addr").val(data.addr);
                            $("#ph").val(data.ph);
                            $("#email").val(data.email);
                        }
                    });
                    }
                });
            });