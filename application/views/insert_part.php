<html>
<head>
<title>Part Details</title>
    <script type='text/javascript' src="<?php echo base_url("assets/js/jquery-1.4.4.min.js");?>"></script>
</head>
<body>
    <div class="container">
 <h1>Insert Part Detail</h1>
 <div class = "row">
    
     <div class ="col-md-4">
<?php echo form_open_multipart('users/insert_part_db');?>
                    <b>Part Category:</b><br>
                <select name = "category" class=" category btn-default form-control" id="category">
                    <option value="1">Plate</option>
                    <option value="2">Pipe</option>
                    <option value="3">Tube</option>
                    <option value="4">Forging</option>
                    <option value="5">Casting</option>
                    <option value="6">Fastness</option>
                    <option value="7">Gasket</option>
                    <option value="8">Paint</option>
                    <option value="9">Electrode</option>
                </select><br>
                <div class="main">
                    <b>Moc:</b><br>
                    <select name = "moc" class=" moc btn-default form-control" id="moc">
                        <option>M.S.</option>
                        <option>B.Q.</option>
                        <option>S.S.</option>
                        <option>Cupronickel</option>
                        <option>Aluminium Bronze</option>
                    </select><br>
                    <b>Grade:</b><br>
                    <select name = "grade" class=" grade btn-default form-control" id="grade">
                        <option>HIC</option>
                        <option>304</option>
                        <option>304L</option>
                        <option>316</option>
                        <option>316L</option>
                        <option>321</option>
                        <option>Duplex</option>
                        <option>Super Duplex</option>
                        <option>70:30</option>
                        <option>90:10</option>
                        <option>516 Gr.60</option>
                        <option>516 Gr.70</option>
                        <option>516 Gr.60/70</option>
                </select><br>
                    <b>Thickness:</b><br>
                    <input type="text" name="thickness"  class="thickness btn-default form-control" id="thickness"/>
                    <br>
                    <b>Density:</b><br>
                        <input type="text" name="density" class="density btn-default form-control" id="density"/>
                            <br>
                        </div>
                <div class="tube">
                    <b>Moc:</b><br>
                    <select name = "moc" class=" mocDrop btn-default form-control" id="tubemoc">
                        <option>Copper</option>
                        <option>Brass</option>
                        <option>Al.Brass</option>
                        <option>Ad.Brass</option>
                        <option>Cupronickel 70:30</option>
                        <option>Cupronickel 90:10</option>
                        <option>S.S. Seamless</option>
                        <option>S.S. Welded</option>
                        <option>C.S. Seamless</option>
                    </select><br>
                     <b>Grade:</b><br>
                    <select name = "grade" class=" grade btn-default form-control" id="tubegrade">
                        <option>SA179</option>
                        <option>SA334</option>
                        <option>60:40</option>
                        <option>SB111C12200</option>
                        <option>SB111C68700</option>
                        <option>SB111C44300</option>
                        <option>SB111C71500</option>
                        <option>SB111C70600</option>
                        <option>SA213TP304</option>
                        <option>SA213TP304L</option>
                        <option>SA213TP316</option>
                        <option>SA213TP316L</option>
                        <option>SA213TP321</option>
                    </select><br>
                    <b>Outer Diameter:</b><br>
                    <input type="text" name="diameter" list="tubediameterDrop" class="diameter btn-default form-control" id="tubediameter"/>
                    <datalist id="tubediameterDrop">
                        <option>1/2 Inch</option>
                        <option>3/8 Inch</option>
                        <option>3/4 Inch</option>
                        <option>5/8 Inch</option>
                        <option>1 Inch</option>
                        <option>20 Mm</option>
                        <option>25 Mm</option>
                    </datalist><br>
                    <b>BWG:</b><br>
                   <input type="text" name="bwg" list="tubebwgDrop" class="bwg btn-default form-control" id="tubebwg"/>
                    <datalist id="tubebwgDrop">
                        <option>16 BWG</option>
                        <option>18 BWG</option>
                        <option>20 BWG</option>
                        <option>22 BWG</option>
                        <option>24 BWG</option>
                    </datalist><br>
                    <b>Thickness:</b><br>
                    <input type="text" name="thick" class="thick btn-default form-control" id="tubethick"/>
                    <br>
                    </div>
                    <div class="pipe">
                        <b>Moc:</b><br>
                        <input type="text" name="moc" list="pipemocDrop" class="moc btn-default form-control"/>
                        <datalist id="pipemocDrop">
                            <option>C.S. Seamless</option>
                            <option>C.S. Welded</option>
                            <option>S.S. Seamless</option>
                            <option>S.S. Welded</option>
                        </datalist><br>
                        <b>Grade:</b><br>
                        <input type="text" name="grade" list="pipegradeDrop" class="grade btn-default form-control"/>
                        <datalist id="pipegradeDrop">
                            <option>SA106Gr.B</option>
                            <option>SA33AGr.6</option>
                            <option>IS1239</option>
                            <option>IS3589</option>
                            <option>SA312TP304</option>
                            <option>SA312TP304L</option>
                            <option>SA316</option>
                            <option>SA316L</option>
                            <option>SA321</option>
                        </datalist><br>
                        <b>Thickness:</b><br>
                        <input type="text" name="thick" list="pipethickDrop" class="thick btn-default form-control"/>
                        <datalist id="pipethickDrop">
                            <option>1/2 Inch</option>
                            <option>3/4 Inch</option>
                            <option>1 Inch</option>
                            <option>1.5 Inch</option>
                            <option>2 Inch</option>
                        <option>3 Inch</option>
                        <option>4 Inch</option>
                        <option>6 Inch</option>
                        <option>8 Inch</option>
                        <option>10 Inch</option>
                        <option>12 Inch</option>
                        <option>14 Inch</option>
                    </datalist><br>
                    <b>Schedule:</b><br>
                    <input type="text" name="schedule" list="pipescheDrop" class="schedule btn-default form-control"/>
                    <datalist id="pipescheDrop">
                        <option>XXST</option>
                        <option>XS</option>
                        <option>SCH 40</option>
                        <option>SCH 80</option>
                        <option>SCH 120</option>
                        <option>SCH 160</option>
                    </datalist><br>
                    </div>
                <div class="casting">
                    <b>Grade:</b><br>
                    <input type="text" name="grade" list="castinggradeDrop" class="grade btn-default form-control"/>
                    <datalist id="castinggradeDrop">
                        <option>CI</option>
                        <option>CI  Saddle Spport</option>
                    </datalist><br>
                    <b>Pattern:</b><br>
                     <input type="text" name="pattern" list="castingpattDrop" class="pattern btn-default form-control"/>
                    <datalist id="castingpattDrop">
                        <option>30</option>
                        <option>40</option>
                        <option>60</option>
                        <option>80</option>
                        <option>100</option>
                        <option>46</option>
                        <option>66</option>
                        <option>69B</option>
                        <option>84</option>
                        <option>86</option>
                        <option>88</option>
                        <option>89B</option>
                        <option>106</option>
                        <option>108</option>
                        <option>126</option>
                        <option>8C2</option>
                        <option>10C1</option>
                        <option>10C9</option>
                        <option>12C1</option>
                        <option>42TT</option>
                        <option>42RF</option>
                        <option>82TT</option>
                        <option>82RF</option>
                        <option>62TT</option>
                        <option>62RF</option>
                        <option>102TT</option>
                        <option>102RF</option>
                    </datalist><br>
                    <b>Threading:</b><br>
                    <input type="text" name="threading" list="castingthreDrop" class="threading btn-default form-control"/>
                    <datalist id="castingthreDrop">
                        <option>1 Inch</option>
                        <option>1.5 Inch</option>
                        <option>2 Inch</option>
                        <option>2.5 Inch</option>
                        <option>3 Inch</option>
                    </datalist><br>
                    </div>
                <b>Uom:</b><br>
                    <input type ="text"  name = "uom" class=" btn-default form-control" id="uom"/><br>
                <b>Upload Image:</b><br>
                <input type="file" name="userfile" class="btn-default form-control"/>
                <input type="submit" value="Save" name="upload" class="btn btn-sm btn-success" />
                <input type ="text"  name = "des" class=" btn-default form-control" id="des"/>
                <div class="col-md-4">
            </form>
        </div>
    </div>
    </div>
    </div>
 
</body>
<script>
    $(document).ready(function () {
        $('.tube').hide();
        $('.pipe').hide();
        $('.casting').hide();
        $('.category').change(function(){
            var value=$(this).val();
            if(value == 2)
            {
                $('.tube').hide();
                $('.casting').hide();
                $('.main').hide();
                $('.pipe').show();
            }
            else if(value==3)
            {
                $('.casting').hide();
                $('.pipe').hide();
                $('.main').hide();
                $('.tube').show();
            }
            else if(value==5)
            {
                $('.casting').show();
                $('.pipe').hide();
                $('.main').hide();
                $('.tube').hide();
            }
            else
            {
                $('.casting').hide();
                $('.pipe').hide();
                $('.tube').hide();
                $('.main').show();
            }
        });
    });
</script>
 <script type="text/javascript">
             $('#uom').keyup(function(){
                var category =$('#category').find("option:selected").text();
                var grade= $('#grade').val();
                var moc= $('#moc').val();
                var thickness= $('#thickness').val();
                var tubemoc= $('#tubemoc').val();
                var tubegrade= $('#tubegrade').val();
                var tubediameter= $('#tubediameter').val();
                var tubebwg= $('#tubebwg').val();
                var tubethick= $('#tubethick').val();
                var string= category+' '+ moc +' '+tubemoc+' '+grade +' '+tubegrade+' '+thickness+' '+tubediameter+' '+tubebwg+' '+tubethick+' ';
                $('#des').val(string);
            });
           </script>
</html>