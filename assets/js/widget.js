/**
 * Created by Abhay on 9/30/2015.
 */
(function() {
// credits to: http://alexmarandon.com/articles/web_widget_jquery/
// Localize jQuery variable
    var jQuery;

    /******** Load jQuery if not present *********/
    if (window.jQuery === undefined || window.jQuery.fn.jquery !== '1.4.2') {
        var script_tag = document.createElement('script');
        script_tag.setAttribute("type","text/javascript");
        script_tag.setAttribute("src",
            "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js");
        if (script_tag.readyState) {
            script_tag.onreadystatechange = function () { // For old versions of IE
                if (this.readyState == 'complete' || this.readyState == 'loaded') {
                    scriptLoadHandler();
                }
            };
        } else {
            script_tag.onload = scriptLoadHandler;
        }
        // Try to find the head, otherwise default to the documentElement
        (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
    } else {
        // The jQuery version on the window is the one we want to use
        jQuery = window.jQuery;
        main();
    }

    /******** Called once jQuery has loaded ******/
    function scriptLoadHandler() {
        // Restore $ and window.jQuery to their previous values and store the
        // new jQuery in our local jQuery variable
        jQuery = window.jQuery.noConflict(true);
        // Call our main function
        main();
    }


    /******** Our main function ********/
    function main() {
        jQuery(document).ready(function($) {

            css_files = [
                'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css',
                'http://dblquotes.com/static/css/bootstrap-social.css'
            ];

            css_files.forEach(function(css_filepath){ // load all these css resources
                /* if file is already loaded, dont load it again */
                if ($('head link[href="' + css_filepath + '"]').length > 0) {
                    console.log('already loaded: ' + css_filepath);
                    console.log($('head link[href="' + css_filepath + '"]'));
                    return;
                }


                var css_link = $("<link>", {
                    rel: "stylesheet",
                    type: "text/css",
                    href: css_filepath
                });
                css_link.appendTo('head');
            });

            /******* Load HTML *******/
             // var jsonp_url = "http://127.0.0.1:5000/widget?callback=?";
            var jsonp_url = "http://www.dblquotes.com/widget?callback=?";
            $.getJSON(jsonp_url, function(data) {
                $('#dblquotes-widget-container').html(data.html);
            });
            /*
            $.ajax({
                crossDomain: true,
                type:"GET",
                contentType: "application/json; charset=utf-8",
                async:false,
                url: jsonp_url,
                dataType: "jsonp",
                jsonp: 'jsonp',
                success: function (data) {
                    console.log(data);
                    $('#dblquotes-widget-container').html(data.html);
                }}); */
        });
    }

})(); // We call our anonymous function immediately