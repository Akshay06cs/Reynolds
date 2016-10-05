
function update_price() {
  var row = $(this).parents('.item-row');
  var price = row.find('.cost').val().replace("$","") * row.find('.qty').val();
  price = roundNumber(price,2);
  isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html("$"+price);

  update_total();
}

function bind() {
  $(".cost").blur(update_price);
  $(".qty").blur(update_price);
}

$(document).ready(function() {

  $('input').click(function(){
    $(this).select();
  });

  $("#paid").blur(update_balance);


    $("#addrow").click(function(){
            $(".item-row:last").after('<tr class="item-row"><td><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td><textarea class="parts" placeholder="Category Moc Grade Thickness" cols="30"></textarea><br><input type="text" name="size" class="length" placeholder="Length" size="3"/>x &nbsp;&nbsp;&nbsp;<input type="text" name="width" class="width" placeholder="width"  size="6"></td><td><textarea class="quantity_no" name="qty[]" cols="1">1</textarea><input type="hidden" value="7.85" class="density"/><input type="hidden" class="thick" value="14"/><textarea class="quantity" name="qty_no[]" cols="10" placeholder="Quantity"></textarea></td><td><textarea class="uom" name="uom[]"></textarea></td><td><textarea class="work_order" name="wo[]" placeholder="Work Order No."></textarea></td><td><textarea class="rate" name="rate[]"></textarea></td><td><textarea class="price" name="price[]"></textarea></td></tr>');
            if ($(".delete").length > 0) $(".delete").show();
                $('.price').keyup(function(){
                update_price();
                });
  });

  bind();

  $(".delete").live('click',function(){
    $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
  });

  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });
  $("#delete-logo").click(function(){
    $("#logo").remove();
  });
  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  });

  $("#date").val(print_today());

});