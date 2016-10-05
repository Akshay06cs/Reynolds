<html>
<head>
<title>Reynolds</title>
</head>
<body>
<p>Select a file to upload</p>
                <?php
                if (isset($success) && strlen($success)) {
                    echo '<div class="success">';
                    echo '<p>' . $success . '</p>';
                    echo '</div>';
                }
                if (isset($errors) && strlen($errors)) {
                    echo '<div class="error">';
                    echo '<p>' . $errors . '</p>';
                    echo '</div>';
                }
                if (validation_errors()) {
                    echo validation_errors('<div class="error">', '</div>');
                }
                ?>
                <?php
                    $attributes = array('name' => 'file_upload_form', 'id' => 'file_upload_form');
                    echo form_open_multipart($this->uri->uri_string(), $attributes);
                ?>
                    <p><input name="file_name" id="file_name" readonly="readonly" type="file" /></p>
                    <p><input name="file_upload" value="Upload" type="submit" /></p>
                    <?php
                    echo form_close();
                    ?>
           
</body>
</html>