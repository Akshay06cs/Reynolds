$(document).ready(function () {
    $("#supplier").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/purchase/index.php/users/GetSupplierName",
            data: {
                keyword: $("#supplier").val()
            },
            minLength:1,
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownSupplier').empty();
                    $('#supplier').attr("data-toggle", "dropdown");
                    
                    $('#DropdownSupplier').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#supplier').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownSupplier').append('<li role="presentation" ><a role="menuitem dropdownnameli" class="dropdownlivalue">' + value['sname'] + '</a></li>');
                        $('#addr').val(value['addr']);
                        $('#ph').val(value['ph']);  email
                        $('#email').val(value['email']);
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
      $('#supplier').val($(this).text());
    });
});