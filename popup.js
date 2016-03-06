(function(jQuery){
   
    // Options
    var delay               = 1000 * 7; // in milliseconds
    var popUpIntervalInDays = 1;        // in days
    var popUpHtmlUrl        = "popup.html";
    var popUpStyleUrl       = "popup.css";
    var coverpopUrl         = "coverPop.js";
    var emailProcessor      = "index.php";


    jQuery.noConflict();
    jQuery(document).ready(function(){ 

        // PARSE HTML FUNCTION
        var parseHTML = function(str) {
          var tmp = document.implementation.createHTMLDocument();
          tmp.body.innerHTML = str;
          return tmp.body.children;
        };

       // LOAD HTML FOR POPUP
        jQuery.ajax({
            url: popUpHtmlUrl,
            method: "get",
            success: function(data){
                html = parseHTML(data); 
                jQuery("body").append(html);
            }
        }); // end get html
        

        // Load POPUP
        jQuery.getScript( coverpopUrl, function(e){ }).done(function(){
            
         
            
            // LOAD CSS
            jQuery('<link/>', {
                rel:   "stylesheet",
                type:  "text/css",
                href:  popUpStyleUrl,
            }).appendTo("head"); // end link css
 
        

            


            CoverPop.start({
                coverId:             'CoverPop-cover',       // set default cover id
                expires:             popUpIntervalInDays,    // duration (in days) before it pops up again
                closeClassNoDefault: 'CoverPop-close',       // close if someone clicks an element with this class and prevent default action
                closeClassDefault:   'CoverPop-close-go',    // close if someone clicks an element with this class and continue default action
                openClassDefault:    'CoverPop-open',        // set class name added to HTML element when CoverPop is opened
                cookieName:          '_CoverPop',            // to change the plugin cookie name
                onPopUpOpen:         function() {},          // on popup open callback function
                onPopUpClose:        function() {},          // on popup close callback function
                forceHash:           'splash',               // hash to append to url to force display of popup (e.g. http://yourdomain.com/#splash)
                delayHash:           'go',                   // hash to append to url to delay popup for 1 day (e.g. http://yourdomain.com/#go)
                closeOnEscape:       true,                    // close if the user clicks escape
                delay:               delay,                   // set an optional delay (in milliseconds) before showing the popup
                hideAfter:           null,                    // set an optional time (in milliseconds) to autohide 
            }); // end popup init
            

            jQuery(".pop-submit").click(function(event){ 
                event.preventDefault(); 
                var serializedData = jQuery("#dws_popup").serialize();
                jQuery.ajax({
                       type: 'POST', 
                        url: emailProcessor,
                        data: { 
                            'data': serializedData 
                        },
                        success: function(response){
                            console.log(response);
                        }
                });
            }); // end ajax submit


        }); // end if coverpop has been loaded
 

    });
}(jQuery));

