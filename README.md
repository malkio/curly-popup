# PopupPlugin
a popup plugin with simple emailing. This plugin will automatically load your css, html files for you.


## How To Use
1.) Copy the directory to your project's root folder.
2.) Include popup.js somewhere in your source code.
3.) Reload the page and voila.


## How To customize
Inside popup.js you can fool around with the code and some variables upon loading the plugin
  
```javascript  
  // Options
    var delay               = 1000 * 7; // in milliseconds
    var popUpIntervalInDays = 1;        // in days
    var popUpHtmlUrl        = "popup.html";
    var popUpStyleUrl       = "popup.css";
    var coverpopUrl         = "coverPop.js";
    var emailProcessor      = "index.php";
```




