(function($){

    // Add default init
    $(function(){

        $('#header-search').on('shown.bs.collapse', function(index, element){
       
          $('#search').focus();


        });


    });
    // fix on the chrome
    let isTheBrowser = checkBrowser();
    if(isTheBrowser.Chrome && $(window).width() > 768 && $(".is-style-stacked .wp-block-coblocks-posts__image").length > 0){
      $(".wp-block-coblocks-posts__image").css({'margin-bottom':'6em'});
    }

})(jQuery);

/**
 * Browser detection function
 */
function checkBrowser() { 
          
  // Get the user-agent string 
  let userAgentString =  
      navigator.userAgent; 
  // Detect Chrome 
  let chromeAgent =  
      userAgentString.indexOf("Chrome") > -1;
  
  // Detect Chrome 
  let EdgeAgent =  
      userAgentString.indexOf("Edg") > -1;

  // Detect Internet Explorer 
  let IExplorerAgent =  
      userAgentString.indexOf("MSIE") > -1 ||  
      userAgentString.indexOf("rv:") > -1; 

  // Detect Firefox 
  let firefoxAgent =  
      userAgentString.indexOf("Firefox") > -1; 

  // Detect Safari 
  let safariAgent =  
      userAgentString.indexOf("Safari") > -1; 
        
  // Discard Safari since it also matches Chrome 
  if ((chromeAgent) && (safariAgent))  
      safariAgent = false; 

  // Detect Opera 
  let operaAgent =  
      userAgentString.indexOf("OP") > -1; 
        
  // Discard Chrome since it also matches Opera      
  if ((chromeAgent) && (operaAgent))  
      chromeAgent = false;
      
  // Discard Chrome since it also matches Edge      
  if ((chromeAgent) && (EdgeAgent))  
      chromeAgent = false;

  return {
    "Chrome" : chromeAgent,
    "Safari" : safariAgent,
    "Firefox" : firefoxAgent,
    "MSIE" : IExplorerAgent,
    "Edge" : EdgeAgent,
    "Opera" : operaAgent,
  };
 
}