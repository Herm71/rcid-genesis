(function ($){

    //set a variable for the cookie check
    var check_cookie = Cookies.set('mycookie');
    
    //check whether the cookie is already set for this visitor
    if(check_cookie != 'true'){
        //if the cookie does not exist do the following:
        
        //(1) set cookie to expire in three days
        Cookies.set('mycookie', 'true', {
            expires:3,
            path: '/',
        });
        //(2) trigger subscription popup 
        $(".subscribe-me").subscribeBetter({
          trigger: "onidle", 
          animation: "flyInUp",
          delay: 0,
          showOnce: true,
          autoClose: false,
          scrollableModal: false
        });
    };
    
    }(jQuery)); //noconflict wrapper for WordPress